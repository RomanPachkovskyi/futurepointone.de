<?php
/**
* Template Name: Blog Classic
* @package Case-Themes
*/
get_header();
$vintech_sidebar = vintech()->get_sidebar_args(['type' => 'blog', 'content_col'=> '8']);
?>
<div class="container">
    <div class="row <?php echo esc_attr($vintech_sidebar['wrap_class']) ?>" >
        <div id="pxl-content-area" class="<?php echo esc_attr($vintech_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/content/content' );
                    }
                    vintech()->page->get_pagination();
                } else {
                    get_template_part( 'template-parts/content/content', 'none' );
                } ?>
            </main>
        </div>
        <?php if ($vintech_sidebar['sidebar_class']) : ?>
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($vintech_sidebar['sidebar_class']) ?>">
                <div class="pxl-sidebar-sticky">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();
