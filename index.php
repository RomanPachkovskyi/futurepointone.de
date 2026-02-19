<?php
/**
 * Router: Maintenance <-> Live WordPress
 */

define('MODE', 'live'); // 'maintenance' | 'live'

$docRoot = __DIR__;
$wpIndex = $docRoot . '/wp/index.php';
$maintIndex = $docRoot . '/maintenance/index.html';

function is_wp_admin_logged_in(): bool {
    foreach ($_COOKIE as $name => $value) {
        if (strpos($name, 'wordpress_logged_in_') === 0) {
            return true;
        }
    }
    return false;
}

function serve_wordpress(string $wpIndex): void {
    if (!is_file($wpIndex)) {
        http_response_code(500);
        die('WordPress not installed. Missing: ' . $wpIndex);
    }

    chdir(dirname($wpIndex));
    require $wpIndex;
    exit;
}

function serve_maintenance(string $maintIndex): void {
    if (!is_file($maintIndex)) {
        http_response_code(503);
        header('Retry-After: 3600');
        die('Site under maintenance.');
    }

    http_response_code(200);
    header('Content-Type: text/html; charset=utf-8');
    readfile($maintIndex);
    exit;
}

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
if (preg_match('#^/wp(/|$)#', $requestUri)) {
    serve_wordpress($wpIndex);
}

if (MODE === 'live') {
    serve_wordpress($wpIndex);
}

if (is_wp_admin_logged_in()) {
    serve_wordpress($wpIndex);
}

serve_maintenance($maintIndex);
