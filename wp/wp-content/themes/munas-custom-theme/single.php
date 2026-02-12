<?php
/**
 * @package Case-Themes
 */
get_header();
$vintech_sidebar = vintech()->get_sidebar_args(['type' => 'post', 'content_col'=> '8']); ?>
<div class="container">
    <div class="row <?php echo esc_attr($vintech_sidebar['wrap_class']) ?>">
        <div id="pxl-content-area" class="<?php echo esc_attr($vintech_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content-single', get_post_format() );
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
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
<?php vintech()->blog->get_related_post(); ?>
<?php get_footer();
