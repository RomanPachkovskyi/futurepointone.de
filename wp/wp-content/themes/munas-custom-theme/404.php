<?php
/**
 * @package Case-Themes
 */
$subtitle_404 = vintech()->get_theme_opt('subtitle_404');
$title_404 = vintech()->get_theme_opt('title_404');
$des_404 = vintech()->get_theme_opt('des_404');
$button_404 = vintech()->get_theme_opt('button_404');
$img_404 = vintech()->get_opt( 'img_404', ['url' => get_template_directory_uri().'/assets/img/404-image.webp', 'id' => '' ] );
get_header(); ?>
<div class="wrap-content-404 container" >
    <div class="content row">
        <div class="col-12 col-lg-6">
            <h3 class="pxl-error-title wow fadeInUp">
                <?php if (!empty($title_404)) {
                    echo pxl_print_html($title_404);
                } else{
                    echo '<span>Oops!</span>';
                    echo esc_html__('Page not found!', 'vintech'); 
                } ?>

            </h3>
            <p class="pxl-error-description wow fadeInUp">
                <?php if (!empty($des_404)) {
                    echo pxl_print_html($des_404);
                } else{
                    echo esc_html__('We\'re sorry, but the page you\'re looking for doesn\'t exist. It might have been moved or mistyped. Please check the URL or return to our homepage. If you need assistance, our support team is here to help.', 'vintech');
                } ?>
            </p>
            <a class="btn-sm wow fadeInUp" href="<?php echo esc_url(home_url('/')); ?>" >
                <span>
                    <?php if (!empty($button_404)) {
                        echo pxl_print_html($button_404);
                    } else{
                       echo esc_html__('back to homepage', 'vintech'); 
                   } ?>
               </span>
           </a>
       </div>
       <div class="pxl-error-image col-12 col-lg-6">
        <img src="<?php echo esc_url($img_404['url']); ?>" alt="404">
    </div>
</div>
</div>
<?php get_footer();
