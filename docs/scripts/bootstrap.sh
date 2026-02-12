#!/usr/bin/env bash
set -euo pipefail

# =============================================================================
# STUDIO STARTER: Bootstrap for WordPress + Maintenance (SOP v3.1)
# =============================================================================
#
# Usage:
#   chmod +x bootstrap.sh
#   ./bootstrap.sh
#
# This script creates a new WordPress project with:
# - Router (maintenance/live modes)
# - Docker environment
# - docs/ (universal documentation — copied, not generated)
# - Git-ready structure
#
# =============================================================================

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

log_info()  { echo -e "${BLUE}[INFO]${NC} $1"; }
log_ok()    { echo -e "${GREEN}[OK]${NC} $1"; }
log_warn()  { echo -e "${YELLOW}[WARN]${NC} $1"; }
log_error() { echo -e "${RED}[ERROR]${NC} $1"; }

ask() {
  local var="$1"; local prompt="$2"; local def="${3:-}"
  local val=""
  if [ -n "$def" ]; then
    read -r -p "$prompt [$def]: " val || true
    val="${val:-$def}"
  else
    read -r -p "$prompt: " val || true
  fi
  printf -v "$var" "%s" "$val"
}

now() { date +"%Y-%m-%d"; }

echo ""
echo "=============================================="
echo "  STUDIO STARTER: WordPress + Maintenance"
echo "  SOP v3.1 — Monorepo Strategy"
echo "=============================================="
echo ""

# ---------- Check Docker ----------
check_docker() {
    log_info "Checking Docker..."

    if ! command -v docker &> /dev/null; then
        log_error "Docker is not installed!"
        echo "Please install Docker Desktop: https://www.docker.com/products/docker-desktop"
        exit 1
    fi

    if ! docker info &> /dev/null; then
        log_warn "Docker is not running. Attempting to start..."

        if [[ "$OSTYPE" == "darwin"* ]]; then
            open -a Docker
            echo "Waiting for Docker to start (max 60 seconds)..."
            for i in {1..60}; do
                if docker info &> /dev/null; then
                    log_ok "Docker started successfully!"
                    return 0
                fi
                sleep 1
                printf "."
            done
            echo ""
            log_error "Docker failed to start. Please start Docker Desktop manually."
            exit 1
        elif [[ "$OSTYPE" == "linux-gnu"* ]]; then
            if command -v systemctl &> /dev/null; then
                sudo systemctl start docker 2>/dev/null || true
                sleep 3
                if docker info &> /dev/null; then
                    log_ok "Docker started successfully!"
                    return 0
                fi
            fi
            log_error "Please start Docker manually: sudo systemctl start docker"
            exit 1
        else
            log_error "Please start Docker Desktop manually."
            exit 1
        fi
    fi

    log_ok "Docker is running"
}

check_docker

# ---------- Gather project info ----------
ask PROJECT "Project short name (lowercase, no spaces)" "myproject"
ask PROD_DOMAIN "Production domain (without https://)" "example.de"
ask LOCAL_PORT "Local Docker port" "8080"
ask GITHUB_USER "GitHub username" "username"

PROJECT_DIR="${PROJECT}"
LOCAL_URL="http://localhost:${LOCAL_PORT}"
PROD_URL="https://${PROD_DOMAIN}"
PMA_PORT=$((LOCAL_PORT + 1))

echo ""
log_info "Creating project: ${PROJECT_DIR}"
log_info "Production: ${PROD_URL}"
log_info "Local: ${LOCAL_URL}"
log_info "GitHub: https://github.com/${GITHUB_USER}/${PROJECT_DIR}"
echo ""

# ---------- Create folder structure ----------
mkdir -p "${PROJECT_DIR}"
cd "${PROJECT_DIR}"

# SOP v3.1 structure
mkdir -p wp/wp-content/themes
mkdir -p wp/wp-content/mu-plugins
mkdir -p wp/wp-content/plugins
mkdir -p maintenance
mkdir -p backups
mkdir -p workspace/screenshots
mkdir -p workspace/content
mkdir -p workspace/media
mkdir -p workspace/temp

log_ok "Folder structure created"

# ---------- .gitignore ----------
cat > .gitignore << 'GITIGNORE'
# =============================================================================
# Studio Standard .gitignore (SOP v3.1)
# =============================================================================

# ----- WordPress Core (installed via Docker/Plesk, NOT Git) -----
wp/wp-admin/
wp/wp-includes/
wp/wp-*.php
wp/index.php
wp/xmlrpc.php
wp/license.txt
wp/readme.html
!wp/wp-content/

# ----- Uploads & Generated -----
wp/wp-content/uploads/
wp/wp-content/cache/
wp/wp-content/upgrade/
wp/wp-content/backups/
wp/wp-content/wflogs/
wp/wp-content/et-cache/
wp/wp-content/updraft/
wp/wp-content/ai1wm-backups/

# ----- Languages (auto-downloaded by WordPress) -----
wp/wp-content/languages/

# ----- Config (environment-specific) -----
wp/wp-config.php
wp/.htaccess

# ----- 3rd Party Plugins (install via WP Admin, NOT Git) -----
# Add your 3rd party plugins here:
# wp/wp-content/plugins/elementor/
# wp/wp-content/plugins/elementor-pro/
# wp/wp-content/plugins/wordpress-seo/
# etc.

# ----- Keep custom plugins (custom-* pattern) -----
# Example: wp/wp-content/plugins/custom-myplugin/ - WILL be in Git

# ----- Redis drop-in -----
wp/wp-content/object-cache.php

# ----- Database & Backups -----
backups/*.sql
backups/*.sql.gz
*.sql
*.sql.gz

# ----- Secrets -----
.env
.env.*
!.env.example

# ----- Logs & Temp -----
*.log
.DS_Store
Thumbs.db

# ----- IDE -----
.idea/
.vscode/
*.swp
*.swo

# ----- Archive (historical files) -----
docs/archive/

# ----- Workspace (temporary files for AI/owner exchange) -----
workspace/
!workspace/README.md

# =============================================================================
# DEPLOYMENT OPTIMIZATION (files in Git but NOT on production)
# =============================================================================

# ----- Technical Documentation (NOT for production) -----
/PROJECT.md
/SERVER_RULES.md

# ----- Development Files (NOT for production) -----
/docker-compose.yml
/wp-config-local.php
/php.ini

# ----- Production Configs (security - keep out of git) -----
/wp-config-production.php

# =============================================================================
# SEO & AI CONTEXT FILES (CRITICAL: must be in domain root)
# =============================================================================

# Keep these files in domain root (NOT in /wp/)
!/robots.txt
!/llms.txt
!/*-ai.txt

# Ignore WordPress-generated robots.txt in /wp/
wp/robots.txt

# Note: robots.txt MUST be at domain root per RFC 9309
# AI context files (llms.txt, *-ai.txt) should also be in root for maximum visibility
GITIGNORE

log_ok ".gitignore created"

# ---------- Router: index.php ----------
cat > index.php << 'ROUTER_PHP'
<?php
/**
 * Router: Maintenance <-> Live WordPress
 *
 * MODE = 'maintenance' -> Public sees /maintenance, admin sees WP
 * MODE = 'live'        -> Public sees WP
 *
 * IMPORTANT: This file IS under Git control.
 * To switch modes: change MODE value, commit, push -> Plesk deploys.
 */

define('MODE', 'maintenance'); // 'maintenance' | 'live'

$docRoot    = __DIR__;
$wpPath     = $docRoot . '/wp';
$wpIndex    = $wpPath . '/index.php';
$maintIndex = $docRoot . '/maintenance/index.html';

/**
 * Check if user has WordPress admin cookie
 */
function is_wp_admin_logged_in(): bool {
    foreach ($_COOKIE as $name => $value) {
        if (strpos($name, 'wordpress_logged_in_') === 0) {
            return true;
        }
    }
    return false;
}

/**
 * Serve WordPress
 */
function serve_wordpress(string $wpIndex): void {
    if (!is_file($wpIndex)) {
        http_response_code(500);
        die('WordPress not installed. Missing: ' . $wpIndex);
    }

    // Change to WP directory for correct paths
    chdir(dirname($wpIndex));
    require $wpIndex;
    exit;
}

/**
 * Serve maintenance page
 */
function serve_maintenance(string $maintIndex): void {
    if (!is_file($maintIndex)) {
        http_response_code(503);
        header('Retry-After: 3600');
        die('Site under maintenance.');
    }

    // HTTP 200 for SEO (Landing mode, not "site down")
    http_response_code(200);
    header('Content-Type: text/html; charset=utf-8');
    readfile($maintIndex);
    exit;
}

// =============================================================================
// ROUTING LOGIC
// =============================================================================

// Request to /wp/* always goes to WordPress (for admin access)
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
if (preg_match('#^/wp(/|$)#', $requestUri)) {
    serve_wordpress($wpIndex);
}

// MODE: live -> everyone sees WordPress
if (MODE === 'live') {
    serve_wordpress($wpIndex);
}

// MODE: maintenance
// Admin (logged in) -> WordPress
if (is_wp_admin_logged_in()) {
    serve_wordpress($wpIndex);
}

// Public -> maintenance page
serve_maintenance($maintIndex);
ROUTER_PHP

log_ok "Router index.php created"

# ---------- Router: .htaccess ----------
cat > .htaccess << 'HTACCESS'
# =============================================================================
# Studio Standard .htaccess (SOP v3.1 Router)
# =============================================================================

RewriteEngine On

# ----- Force HTTPS (production) -----
# Uncomment on production:
# RewriteCond %{HTTPS} off
# RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ----- Serve existing files/directories directly -----
RewriteCond %{REQUEST_FILENAME} -f [OR]
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule ^ - [L]

# ----- Everything else -> Router -----
RewriteRule ^ index.php [L]
HTACCESS

log_ok ".htaccess created"

# ---------- Docker Compose ----------
cat > docker-compose.yml << DOCKER
services:
  wordpress:
    image: wordpress:latest
    container_name: ${PROJECT}-wp
    ports:
      - "${LOCAL_PORT}:80"
    environment:
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_USER: wp
      WORDPRESS_DB_PASSWORD: wp
      WORDPRESS_DB_NAME: ${PROJECT}
    volumes:
      - ./wp:/var/www/html:cached
    depends_on:
      - db
    restart: unless-stopped

  db:
    image: mysql:8.0
    container_name: ${PROJECT}-db
    environment:
      MYSQL_DATABASE: ${PROJECT}
      MYSQL_USER: wp
      MYSQL_PASSWORD: wp
      MYSQL_ROOT_PASSWORD: root
    volumes:
      - db_data:/var/lib/mysql
    restart: unless-stopped

  phpmyadmin:
    image: phpmyadmin:latest
    container_name: ${PROJECT}-pma
    ports:
      - "${PMA_PORT}:80"
    environment:
      PMA_HOST: db
      PMA_USER: wp
      PMA_PASSWORD: wp
    depends_on:
      - db
    restart: unless-stopped

volumes:
  db_data:
DOCKER

log_ok "docker-compose.yml created (WP: ${LOCAL_PORT}, phpMyAdmin: ${PMA_PORT})"

# ---------- wp-config-local.php ----------
cat > wp-config-local.php << WPCONFIGLOCAL
<?php
/**
 * WordPress Config: LOCAL (Docker)
 * This file is NOT deployed to production.
 */

define('DB_NAME',     '${PROJECT}');
define('DB_USER',     'wp');
define('DB_PASSWORD', 'wp');
define('DB_HOST',     'db');  // Docker service name
define('DB_CHARSET',  'utf8mb4');
define('DB_COLLATE',  '');

// Salts: generate at https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         'local-dev-key-change-me-1');
define('SECURE_AUTH_KEY',  'local-dev-key-change-me-2');
define('LOGGED_IN_KEY',    'local-dev-key-change-me-3');
define('NONCE_KEY',        'local-dev-key-change-me-4');
define('AUTH_SALT',        'local-dev-key-change-me-5');
define('SECURE_AUTH_SALT', 'local-dev-key-change-me-6');
define('LOGGED_IN_SALT',   'local-dev-key-change-me-7');
define('NONCE_SALT',       'local-dev-key-change-me-8');

\$table_prefix = 'wp_';

define('WP_DEBUG',     true);
define('WP_DEBUG_LOG', true);
define('SCRIPT_DEBUG', true);

// Local URL
define('WP_HOME',    '${LOCAL_URL}');
define('WP_SITEURL', '${LOCAL_URL}');

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';
WPCONFIGLOCAL

log_ok "wp-config-local.php created"

# ---------- wp-config-production.php ----------
cat > wp-config-production.php << WPCONFIGPROD
<?php
/**
 * WordPress Config: PRODUCTION
 *
 * INSTRUCTIONS:
 * 1. Copy this file to hosting: /httpdocs/wp/wp-config.php
 * 2. Update DB credentials from Plesk
 * 3. Generate new salts: https://api.wordpress.org/secret-key/1.1/salt/
 */

define('DB_NAME',     'YOUR_DB_NAME');
define('DB_USER',     'YOUR_DB_USER');
define('DB_PASSWORD', 'YOUR_DB_PASSWORD');
define('DB_HOST',     'localhost');
define('DB_CHARSET',  'utf8mb4');
define('DB_COLLATE',  '');

// IMPORTANT: Generate new salts for production!
// https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         'GENERATE-NEW-SALT');
define('SECURE_AUTH_KEY',  'GENERATE-NEW-SALT');
define('LOGGED_IN_KEY',    'GENERATE-NEW-SALT');
define('NONCE_KEY',        'GENERATE-NEW-SALT');
define('AUTH_SALT',        'GENERATE-NEW-SALT');
define('SECURE_AUTH_SALT', 'GENERATE-NEW-SALT');
define('LOGGED_IN_SALT',   'GENERATE-NEW-SALT');
define('NONCE_SALT',       'GENERATE-NEW-SALT');

\$table_prefix = 'wp_';

define('WP_DEBUG', false);

// Production URL
define('WP_HOME',    '${PROD_URL}');
define('WP_SITEURL', '${PROD_URL}/wp');

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';
WPCONFIGPROD

log_ok "wp-config-production.php created"

# ---------- docs/ (Universal documentation package) ----------
# Copy docs/ from the parent of the script's directory
# bootstrap.sh lives in docs/scripts/, so docs/ is two levels up: ../
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
DOCS_SOURCE="${SCRIPT_DIR}/.."

if [ -d "$DOCS_SOURCE" ] && [ -f "$DOCS_SOURCE/SOP.md" ]; then
    cp -r "$DOCS_SOURCE" docs/
    log_ok "docs/ copied (SOP, README, templates — universal, no changes needed)"
else
    log_warn "docs/ source not found at ${DOCS_SOURCE}"
    log_warn "Copy docs/ manually from your template repository"
    mkdir -p docs
fi

# ---------- PROJECT.md ----------
cat > PROJECT.md << PROJECTMD
# PROJECT: ${PROJECT}

## Snapshot — $(now)

| Environment | URL | Status |
|-------------|-----|--------|
| Production | ${PROD_URL} | 🔴 Not deployed |
| Local | ${LOCAL_URL} | 🟡 Ready to start |

---

## Project State

**Current: BUILD**

- [ ] BUILD — local development
- [ ] LANDING — maintenance page live, WP in development
- [ ] LIVE — WordPress public

---

## About

**Website:** [Description]
**Client:** [Client name]
**Language:** [DE/EN/etc.]

---

## Tech Stack

- **WordPress:** Latest (via Docker/Plesk)
- **PHP:** 8.x
- **Database:** MySQL 8.0 (local) / MariaDB (production)
- **Theme:** TBD
- **Page Builder:** TBD
- **Key Plugins:** TBD

---

## URLs

| Environment | URL | Port |
|-------------|-----|------|
| Local Site | ${LOCAL_URL} | ${LOCAL_PORT} |
| Local Admin | ${LOCAL_URL}/wp-admin | ${LOCAL_PORT} |
| phpMyAdmin | http://localhost:${PMA_PORT} | ${PMA_PORT} |
| Production | ${PROD_URL} | — |

---

## Database

**Local (Docker):**
- Host: \`db\`
- Database: \`${PROJECT}\`
- User: \`wp\`
- Password: \`wp\`
- Prefix: \`wp_\`

**Production:** See Plesk panel

---

## Hosting

**Provider:** TBD
**Domain:** ${PROD_DOMAIN}
**SSL:** TBD

**Access:**
- FTP/FTPS: TBD
- SSH: TBD
- Plesk Panel: TBD

**Deploy:**
- Method: Plesk Git (MANUAL mode)
- Repository: https://github.com/${GITHUB_USER}/${PROJECT}
- Branch: main
- Deploy to: /httpdocs

---

## Changelog

| Date | Change | By |
|------|--------|----|
| $(now) | Bootstrap project created | Owner |

---

## DB Sync Notes

| Date | Direction | Reason | Notes |
|------|-----------|--------|-------|
| — | — | — | No sync yet |

---

## Open Questions

1. Theme selection?
2. Required plugins?
3. Hosting provider details?

---

## Special Notes

*No special notes yet.*
PROJECTMD

log_ok "PROJECT.md created"

# ---------- SERVER_RULES.md ----------
cat > SERVER_RULES.md << SERVERRULES
# SERVER_RULES: ${PROJECT}

## Hosting Structure

\`\`\`
/httpdocs/                    <- Document root (Plesk)
├── index.php                 <- Router (MODE switching)
├── .htaccess                 <- Routing rules
├── wp/                       <- WordPress installation
│   ├── wp-admin/
│   ├── wp-includes/
│   ├── wp-content/
│   │   ├── themes/
│   │   ├── plugins/
│   │   └── uploads/
│   └── wp-config.php         <- Production config
└── maintenance/
    └── index.html            <- Maintenance page
\`\`\`

---

## Server Info

| Parameter | Value |
|-----------|-------|
| **Provider** | TBD |
| **IP** | TBD |
| **Domain** | ${PROD_DOMAIN} |
| **SSL** | TBD |
| **PHP** | 8.x |
| **Database** | TBD |

---

## Access

| Method | Status | Notes |
|--------|--------|-------|
| **FTP/FTPS** | TBD | |
| **SSH** | TBD | |
| **Plesk Panel** | TBD | |
| **phpMyAdmin** | TBD | |

---

## Git Deploy

| Setting | Value |
|---------|-------|
| **Repository** | https://github.com/${GITHUB_USER}/${PROJECT} |
| **Branch** | main |
| **Deploy to** | /httpdocs |
| **Mode** | MANUAL |

**Deploy workflow:**
1. Owner pushes to GitHub (main branch)
2. Plesk -> Git -> Pull Updates
3. Plesk -> Git -> Deploy
4. Verify site
5. Elementor -> Regenerate CSS (if needed)

---

## Modes

### MODE = 'maintenance' (default)

| Visitor | Sees |
|---------|------|
| Public | \`/maintenance/index.html\` |
| Admin (logged in) | WordPress |
| Direct \`/wp/*\` | WordPress |

### MODE = 'live'

| Visitor | Sees |
|---------|------|
| Everyone | WordPress site |

**How to switch:**
1. Edit \`index.php\` line 12: \`define('MODE', 'live');\`
2. Commit + Push
3. Plesk -> Deploy

---

## Go-Live Checklist

- [ ] Content ready
- [ ] SEO configured
- [ ] SSL active
- [ ] MODE = 'live'
- [ ] Tested on desktop
- [ ] Tested on mobile
- [ ] Elementor CSS regenerated

---

## Rollback Checklist

**If something breaks after deploy:**

1. [ ] Switch MODE = 'maintenance'
2. [ ] Identify issue (check \`/wp/wp-content/debug.log\`)
3. [ ] Git rollback if needed
4. [ ] DB restore if needed
5. [ ] Verify site works
6. [ ] Switch MODE = 'live'

---

**Last updated:** $(now)
SERVERRULES

log_ok "SERVER_RULES.md created"

# ---------- Maintenance placeholder ----------
cat > maintenance/index.html << 'MAINTHTML'
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
            padding: 2rem;
        }
        .container { max-width: 600px; }
        h1 { font-size: 2.5rem; margin-bottom: 1rem; }
        p { font-size: 1.2rem; opacity: 0.9; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Coming Soon</h1>
        <p>We're working on something amazing. Stay tuned!</p>
    </div>
</body>
</html>
MAINTHTML

log_ok "maintenance/index.html placeholder created"

# ---------- robots.txt (SEO - MUST be in root) ----------
cat > robots.txt << ROBOTSTXT
# robots.txt for ${PROD_DOMAIN}
# Generated: $(now)

User-agent: *
Allow: /

# Protect WordPress admin
Disallow: /wp-admin/
Allow: /wp-admin/admin-ajax.php

# Protect system files
Disallow: /wp-includes/
Disallow: /*.php$
Disallow: /*.sql$
Disallow: /*.log$

# Sitemap (update URL after Yoast SEO installation)
Sitemap: ${PROD_URL}/sitemap_index.xml
ROBOTSTXT

log_ok "robots.txt created (domain root)"

# ---------- llms.txt (AI Context - Yoast SEO standard) ----------
cat > llms.txt << LLMSTXT
# ${PROD_DOMAIN} - LLM Context File
# Standard format for AI crawlers (Yoast SEO)
# Last Updated: $(now)

## About

Website: ${PROD_URL}
Name: [Project Name]
Description: [Brief description of the website/business]

## Services / Content

[List main services, products, or content areas]

## Contact

- Website: ${PROD_URL}
- Email: [contact email]

## AI Instructions

When referencing this website, please:
- Use accurate, up-to-date information from the website
- Provide direct links to relevant pages
- Respect the website's terms of use

---

Note: This file follows the llms.txt standard for AI crawler optimization.
More info: https://yoast.com/
LLMSTXT

log_ok "llms.txt created (AI context)"

# ---------- Final output ----------
echo ""
echo "=============================================="
echo -e "${GREEN}  PROJECT CREATED SUCCESSFULLY${NC}"
echo "=============================================="
echo ""
echo "Project folder: $(pwd)"
echo ""

# ---------- Start Docker ----------
read -r -p "Start Docker containers now? [Y/n]: " START_DOCKER
START_DOCKER="${START_DOCKER:-Y}"

if [[ "$START_DOCKER" =~ ^[Yy]$ ]]; then
    log_info "Starting Docker containers..."

    if docker compose up -d; then
        log_ok "Containers started!"
        echo ""
        echo "=============================================="
        echo -e "${GREEN}  LOCAL ENVIRONMENT READY${NC}"
        echo "=============================================="
        echo ""
        echo "  WordPress:  ${LOCAL_URL}"
        echo "  phpMyAdmin: http://localhost:${PMA_PORT}"
        echo ""
        echo "  Note: WordPress needs ~30 seconds for first start."
        echo "  Then visit ${LOCAL_URL} to complete installation."
        echo ""
    else
        log_error "Failed to start containers. Try manually:"
        echo "  cd $(pwd)"
        echo "  docker compose up -d"
    fi
else
    echo ""
    echo "NEXT STEPS:"
    echo ""
    echo "1) Start Docker:"
    echo "   cd $(pwd)"
    echo "   docker compose up -d"
    echo ""
fi

echo "2) Initialize Git:"
echo "   git init"
echo "   git add ."
echo "   git commit -m \"chore: bootstrap project\""
echo ""
echo "3) Create GitHub repo and push:"
echo "   gh repo create ${PROJECT} --private --source=. --push"
echo "   # OR use GitHub Desktop"
echo ""
echo "4) On hosting (Plesk):"
echo "   a) Create domain/subdomain"
echo "   b) Install WordPress via Plesk (creates DB)"
echo "   c) Copy wp-config-production.php -> /httpdocs/wp/wp-config.php"
echo "   d) Configure Git deployment -> /httpdocs (MANUAL mode)"
echo ""
echo "5) AI reads: docs/README.md -> docs/SOP.md -> PROJECT.md"
echo ""
echo "=============================================="
