<?php
/**
 * @package Case-Themes
 */
$title_404 = vintech()->get_theme_opt('title_404');
$des_404 = vintech()->get_theme_opt('des_404');
$button_404 = vintech()->get_theme_opt('button_404');
get_header();
?>
<main id="pxl-content-main" class="pxl-error-inner" role="main">
    <section class="wrap-content-404 container">
        <div class="content row align-items-center">
            <div class="col-12">
                <h1 class="pxl-error-title wow fadeInUp">
                    <?php
                    if (!empty($title_404)) {
                        echo pxl_print_html($title_404);
                    } else {
                        echo '<span>Hoppla!</span>';
                        echo esc_html__('Seite nicht gefunden.', 'vintech');
                    }
                    ?>
                </h1>
                <p class="pxl-error-description wow fadeInUp">
                    <?php
                    if (!empty($des_404)) {
                        echo pxl_print_html($des_404);
                    } else {
                        echo esc_html__('Die aufgerufene Seite existiert nicht oder wurde verschoben. Bitte pruefen Sie die URL oder gehen Sie zur Startseite zurueck.', 'vintech');
                    }
                    ?>
                </p>
                <a class="btn-sm wow fadeInUp" href="<?php echo esc_url(home_url('/')); ?>">
                    <span>
                        <?php
                        if (!empty($button_404)) {
                            echo pxl_print_html($button_404);
                        } else {
                            echo esc_html__('Zur Startseite', 'vintech');
                        }
                        ?>
                    </span>
                </a>
            </div>
        </div>
    </section>
</main>
<?php get_footer();
