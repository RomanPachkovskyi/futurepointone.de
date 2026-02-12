<?php 
use Elementor\Embed;
if(!function_exists('vintech_get_post_grid')){
    function vintech_get_post_grid($posts = [], $settings = []){ 
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
            vintech_get_post_grid_layout1($posts, $settings);
            break;

            case 'portfolio-1':
            vintech_get_portfolio_grid_layout1($posts, $settings);
            break;

            case 'portfolio-2':
            vintech_get_portfolio_grid_layout2($posts, $settings);
            break;

            case 'service-1':
            vintech_get_service_grid_layout1($posts, $settings);
            break;

            case 'service-2':
            vintech_get_service_grid_layout2($posts, $settings);
            break;

            case 'industries-1':
            vintech_get_industries_grid_layout1($posts, $settings);
            break;

            default:
            return false;
            break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function vintech_get_post_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '767x550';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }
            $author_id = $post->post_author;
            $author = get_user_by('id', $author_id);
            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = ''; ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $img_id = get_post_thumbnail_id($post->ID);
                    $img          = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size
                    ) );
                    $thumbnail    = $img['thumbnail']; 
                    ?>
                    <div class="pxl-post--featured hover-imge-effect2">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if($show_category == 'true'): ?>
                    <div class="pxl-post--category">
                        <?php the_terms( $post->ID, 'category', '', ' ' ); ?>
                    </div>
                <?php endif; ?>
                <h5 class="pxl-post--title title-hover-line"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h5>
                <?php if($show_excerpt == 'true'): ?>
                    <div class="pxl-post--content">
                        <?php if($show_excerpt == 'true'): ?>
                            <?php
                            echo wp_trim_words( $post->post_excerpt, $num_words, null );
                            ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="pxl-post--meta pxl-flex-middle">
                    <?php if($show_author == 'true'): ?>
                        <div class="pxl-item--author">
                           <?php echo esc_html__('by','vintech') ?>
                           <span>
                               <?php echo esc_html($author->display_name);?>
                               <span>
                               </div>
                           <?php endif; ?>

                           <?php if($show_date == 'true'): ?>
                            <div class="post-date">
                                <?php echo get_the_date('d F Y', $post->ID)  ?>
                            </div>
                        <?php endif; ?>

                        <?php if($show_comment == 'true') : ?>
                            <div class="post-comments d-flex">
                                <a href="<?php echo get_comments_link($post->ID); ?>">
                                    <span><?php comments_number(esc_html__('No Comments', 'vintech'), esc_html__(' 1 Comment', 'vintech'), esc_html__('%  Comments', 'vintech'), $post->ID); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if($show_button == 'true') : ?>
                        <div class="pxl-post--button">
                            <a class="btn--readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <span class="btn--text">
                                    <?php if(!empty($button_text)) {
                                        echo esc_attr($button_text);
                                    } else {
                                        echo esc_html__('Continue Reading', 'vintech');
                                    } ?>
                                </span>
                                <span class="button-arrow-hover"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="6" viewBox="0 0 20 6" fill="none">
                                  <path d="M17.7721 5.477L19.8245 3.42458C19.9369 3.31189 20 3.15921 20 3.00003C20 2.84085 19.9369 2.68817 19.8245 2.57548L17.7721 0.523097C17.68 0.433323 17.5562 0.383455 17.4275 0.384288C17.2989 0.385121 17.1757 0.436588 17.0848 0.527548C16.9938 0.618508 16.9423 0.741639 16.9414 0.870284C16.9406 0.998928 16.9904 1.12273 17.0802 1.21489L18.376 2.51071H0.489219C0.35947 2.51071 0.235035 2.56226 0.143289 2.654C0.0515425 2.74575 0 2.87018 0 2.99993C0 3.12968 0.0515425 3.25412 0.143289 3.34586C0.235035 3.43761 0.35947 3.48915 0.489219 3.48915H18.3759L17.0802 4.78521C16.9896 4.8772 16.939 5.00126 16.9395 5.13037C16.94 5.25948 16.9915 5.38315 17.0828 5.47445C17.1741 5.56574 17.2978 5.61725 17.4269 5.61775C17.556 5.61825 17.6801 5.5677 17.7721 5.47712V5.477Z" fill="black"/>
                              </svg><svg xmlns="http://www.w3.org/2000/svg" width="20" height="6" viewBox="0 0 20 6" fill="none">
                                  <path d="M17.7721 5.477L19.8245 3.42458C19.9369 3.31189 20 3.15921 20 3.00003C20 2.84085 19.9369 2.68817 19.8245 2.57548L17.7721 0.523097C17.68 0.433323 17.5562 0.383455 17.4275 0.384288C17.2989 0.385121 17.1757 0.436588 17.0848 0.527548C16.9938 0.618508 16.9423 0.741639 16.9414 0.870284C16.9406 0.998928 16.9904 1.12273 17.0802 1.21489L18.376 2.51071H0.489219C0.35947 2.51071 0.235035 2.56226 0.143289 2.654C0.0515425 2.74575 0 2.87018 0 2.99993C0 3.12968 0.0515425 3.25412 0.143289 3.34586C0.235035 3.43761 0.35947 3.48915 0.489219 3.48915H18.3759L17.0802 4.78521C16.9896 4.8772 16.939 5.00126 16.9395 5.13037C16.94 5.25948 16.9915 5.38315 17.0828 5.47445C17.1741 5.56574 17.2978 5.61725 17.4269 5.61775C17.556 5.61825 17.6801 5.5677 17.7721 5.47712V5.477Z" fill="black"/>
                              </svg></span>
                          </a>
                          <?php if($show_social == 'true') : ?>
                            <div class="post-shares align-items-center">
                                <span class="label"><?php echo esc_html__('Share Post:', 'vintech'); ?></span>
                                <div class="social-share">
                                    <div class="social">
                                        <a class="pxl-icon " title="<?php echo esc_attr__('Facebook', 'vintech'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink($post->ID)); ?>">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="pxl-icon " title="<?php echo esc_attr__('Twitter', 'vintech'); ?>" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urldecode(home_url('/')); ?>&url=<?php echo urlencode(get_the_permalink($post->ID)); ?>&text=<?php the_title();?>%20">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pxl-icon " title="<?php echo esc_attr__('Linkedin', 'vintech'); ?>" target="_blank" href="https://www.linkedin.com/cws/share?url=<?php echo urlencode(get_the_permalink($post->ID));?>">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>
                                        <a class="pxl-icon " title="<?php echo esc_attr__('Pinterest', 'vintech'); ?>" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_the_post_thumbnail_url($post->ID, 'full')); ?>&media=&description=<?php echo urlencode(the_title_attribute(array('echo' => false, 'post' => $post))); ?>">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    endforeach;
endif;
}

// End Post Grid
//--------------------------------------------------

// Start industries Grid
//--------------------------------------------------
function vintech_get_industries_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : 'full';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }
            $author_id = $post->post_author;
            $author = get_user_by('id', $author_id);
            $industries_icon_type = get_post_meta($post->ID, 'industries_icon_type', true);
            $industries_icon_font = get_post_meta($post->ID, 'industries_icon_font', true);
            $industries_icon_img = get_post_meta($post->ID, 'industries_icon_img', true);
            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = ''; ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $img_id = get_post_thumbnail_id($post->ID);
                    $img          = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size
                    ) );
                    $thumbnail    = $img['thumbnail']; 
                    $thumbnail_url    = $img['url']; 
                    ?>
                <?php endif; ?>
                <div class="pxl-post-content-hide">
                    <?php if($industries_icon_type == 'icon' && !empty($industries_icon_font)) : ?>
                        <div class="pxl-post-icon-wrap">
                            <div class="pxl-post--icon">
                                <i class="<?php echo esc_attr($industries_icon_font); ?>"></i>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($industries_icon_type == 'image' && !empty($industries_icon_img)) : 
                        $icon_img = pxl_get_image_by_size( array(
                            'attach_id'  => $industries_icon_img['id'],
                            'thumb_size' => 'full',
                        ));
                        $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                        <div class="pxl-post-icon-wrap">
                            <div class="pxl-post--icon">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <h4 class="pxl-post--title title-hover-line"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h4>
                    <?php if($show_excerpt == 'true'): ?>
                        <div class="pxl-post--content">
                            <p>
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, null ); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    <?php if($show_button == 'true') : ?>
                        <div class="pxl-post--button">
                            <a class="btn--readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <span class="btn--text">
                                    <?php if(!empty($button_text)) {
                                        echo esc_attr($button_text);
                                    } else {
                                        echo esc_html__('Learn More', 'vintech');
                                    } ?>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="6" viewBox="0 0 20 6" fill="none">
                                  <path d="M17.7721 5.477L19.8245 3.42458C19.9369 3.31189 20 3.15921 20 3.00003C20 2.84085 19.9369 2.68817 19.8245 2.57548L17.7721 0.523097C17.68 0.433323 17.5562 0.383455 17.4275 0.384288C17.2989 0.385121 17.1757 0.436588 17.0848 0.527548C16.9938 0.618508 16.9423 0.741639 16.9414 0.870284C16.9406 0.998928 16.9904 1.12273 17.0802 1.21489L18.376 2.51071H0.489219C0.35947 2.51071 0.235035 2.56226 0.143289 2.654C0.0515425 2.74575 0 2.87018 0 2.99993C0 3.12968 0.0515425 3.25412 0.143289 3.34586C0.235035 3.43761 0.35947 3.48915 0.489219 3.48915H18.3759L17.0802 4.78521C16.9896 4.8772 16.939 5.00126 16.9395 5.13037C16.94 5.25948 16.9915 5.38315 17.0828 5.47445C17.1741 5.56574 17.2978 5.61725 17.4269 5.61775C17.556 5.61825 17.6801 5.5677 17.7721 5.47712V5.477Z" fill="white"/>
                              </svg>
                          </a>
                      </div>
                  <?php endif; ?>
              </div>
              <div style="background-image: url(<?php echo esc_attr($thumbnail_url); ?>);" class="pxl-item--overlay bg-image">
                <?php if($industries_icon_type == 'icon' && !empty($industries_icon_font)) : ?>
                    <div class="pxl-post--icon">
                        <i class="<?php echo esc_attr($industries_icon_font); ?>"></i>
                    </div>
                <?php endif; ?>
                <?php if($industries_icon_type == 'image' && !empty($industries_icon_img)) : 
                    $icon_img = pxl_get_image_by_size( array(
                        'attach_id'  => $industries_icon_img['id'],
                        'thumb_size' => 'full',
                    ));
                    $icon_thumbnail = $icon_img['thumbnail'];
                    ?>
                    <div class="pxl-post--icon">
                        <?php echo wp_kses_post($icon_thumbnail); ?>
                    </div>
                <?php endif; ?>
                <h4 class="pxl-post--title title-hover-line"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h4>
                <?php if($show_excerpt == 'true'): ?>
                    <div class="pxl-post--content">
                        <?php echo wp_trim_words( $post->post_excerpt, $num_words, null ); ?>
                    </div>
                <?php endif; ?>
                <?php if($show_button == 'true') : ?>
                    <div class="pxl-post--button">
                        <a class="btn--readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <span class="btn--text">
                                <?php if(!empty($button_text)) {
                                    echo esc_attr($button_text);
                                } else {
                                    echo esc_html__('Learn More', 'vintech');
                                } ?>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="6" viewBox="0 0 20 6" fill="none">
                              <path d="M17.7721 5.477L19.8245 3.42458C19.9369 3.31189 20 3.15921 20 3.00003C20 2.84085 19.9369 2.68817 19.8245 2.57548L17.7721 0.523097C17.68 0.433323 17.5562 0.383455 17.4275 0.384288C17.2989 0.385121 17.1757 0.436588 17.0848 0.527548C16.9938 0.618508 16.9423 0.741639 16.9414 0.870284C16.9406 0.998928 16.9904 1.12273 17.0802 1.21489L18.376 2.51071H0.489219C0.35947 2.51071 0.235035 2.56226 0.143289 2.654C0.0515425 2.74575 0 2.87018 0 2.99993C0 3.12968 0.0515425 3.25412 0.143289 3.34586C0.235035 3.43761 0.35947 3.48915 0.489219 3.48915H18.3759L17.0802 4.78521C16.9896 4.8772 16.939 5.00126 16.9395 5.13037C16.94 5.25948 16.9915 5.38315 17.0828 5.47445C17.1741 5.56574 17.2978 5.61725 17.4269 5.61775C17.556 5.61825 17.6801 5.5677 17.7721 5.47712V5.477Z" fill="white"/>
                          </svg>
                      </a>
                  </div>
              <?php endif; ?>
              <a class="pxl-item--link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"></a>
          </div>
      </div>
  </div>
  <?php
endforeach;
endif;
}

// End industries Grid
//--------------------------------------------------

// Start Portfolio Grid
//--------------------------------------------------
function vintech_get_portfolio_grid_layout1($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '464x545';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                if($img_id) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                }  ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <div class="pxl-post--featured ">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">   
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>    
                        </div>
                        <div class="pxl-post--holder">
                            <h5 class="pxl-post--title">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                            </h5>
                            <?php if($show_excerpt == 'true'): ?>
                                <div class="pxl-post--content">
                                    <?php if($show_excerpt == 'true'): ?>
                                        <?php
                                        echo wp_trim_words( $post->post_excerpt, $num_words, null );
                                        ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($show_category == 'true'): ?>
                                <div class="pxl-post--category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', '' ); ?>
                                </div>
                            <?php endif; ?>
                            <a class="btn-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">   
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                  <path d="M13.0044 4.26004L2.26441 15L0.5 13.2356L11.2387 2.49563H1.77402V0H15.5V13.726H13.0044V4.26004Z" fill="black"/>
                              </svg>
                          </a>
                      </div>
                  </div>
              </div>
          <?php endif; ?>
      <?php endforeach;
  endif;
}

function vintech_get_portfolio_grid_layout2($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '767x629';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                if($img_id) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                }  ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <div class="pxl-post--featured ">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">   
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>    
                        </div>
                        <div class="pxl-post--holder">
                            <?php if($show_category == 'true'): ?>
                                <div class="pxl-post--category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', '' ); ?>
                                </div>
                            <?php endif; ?>
                            <h5 class="pxl-post--title">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                            </h5>
                            <?php if($show_excerpt == 'true'): ?>
                                <div class="pxl-post--content">
                                    <?php if($show_excerpt == 'true'): ?>
                                        <?php
                                        echo wp_trim_words( $post->post_excerpt, $num_words, null );
                                        ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach;
    endif;
}

// End Portfolio Grid
//--------------------------------------------------

// Start Service Grid
//--------------------------------------------------
function vintech_get_service_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : 'full';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            $img_id = get_post_thumbnail_id($post->ID);
            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true); 
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }  ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $img_id = get_post_thumbnail_id($post->ID);
                    $img          = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size
                    ) );
                    $thumbnail    = $img['thumbnail']; 
                    $thumbnail_url    = $img['url']; 
                    ?>
                <?php endif; ?>
                <div class="pxl-post-content-hide">
                    <?php if($show_number == 'true'): ?>
                        <div class="pxl-post--number">
                            <?php echo esc_attr(str_pad($key + 1, 2, '0', STR_PAD_LEFT)); ?>
                        </div>
                    <?php endif; ?>
                    <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                        <div class="pxl-post-icon-wrap">
                            <div class="pxl-post--icon">
                                <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                        $icon_img = pxl_get_image_by_size( array(
                            'attach_id'  => $service_icon_img['id'],
                            'thumb_size' => 'full',
                        ));
                        $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                        <div class="pxl-post-icon-wrap">
                            <div class="pxl-post--icon">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <h4 class="pxl-post--title title-hover-line"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h4>
                    <?php if($show_excerpt == 'true'): ?>
                        <div class="pxl-post--content">
                            <p>
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, null ); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    <?php if($show_button == 'true') : ?>
                        <div class="pxl-post--button">
                            <a class="btn--readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <span class="btn--text">
                                    <?php if(!empty($button_text)) {
                                        echo esc_attr($button_text);
                                    } else {
                                        echo esc_html__('Learn More', 'vintech');
                                    } ?>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="6" viewBox="0 0 20 6" fill="none">
                                  <path d="M17.7721 5.477L19.8245 3.42458C19.9369 3.31189 20 3.15921 20 3.00003C20 2.84085 19.9369 2.68817 19.8245 2.57548L17.7721 0.523097C17.68 0.433323 17.5562 0.383455 17.4275 0.384288C17.2989 0.385121 17.1757 0.436588 17.0848 0.527548C16.9938 0.618508 16.9423 0.741639 16.9414 0.870284C16.9406 0.998928 16.9904 1.12273 17.0802 1.21489L18.376 2.51071H0.489219C0.35947 2.51071 0.235035 2.56226 0.143289 2.654C0.0515425 2.74575 0 2.87018 0 2.99993C0 3.12968 0.0515425 3.25412 0.143289 3.34586C0.235035 3.43761 0.35947 3.48915 0.489219 3.48915H18.3759L17.0802 4.78521C16.9896 4.8772 16.939 5.00126 16.9395 5.13037C16.94 5.25948 16.9915 5.38315 17.0828 5.47445C17.1741 5.56574 17.2978 5.61725 17.4269 5.61775C17.556 5.61825 17.6801 5.5677 17.7721 5.47712V5.477Z" fill="white"/>
                              </svg>
                          </a>
                      </div>
                  <?php endif; ?>
              </div>
              <div style="background-image: url(<?php echo esc_attr($thumbnail_url); ?>);" class="pxl-item--overlay bg-image">
                <?php if($show_number == 'true'): ?>
                    <div class="pxl-post--number">
                        <?php echo esc_attr(str_pad($key + 1, 2, '0', STR_PAD_LEFT)); ?>
                    </div>
                <?php endif; ?>
                <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                    <div class="pxl-post--icon">
                        <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                    </div>
                <?php endif; ?>
                <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                    $icon_img = pxl_get_image_by_size( array(
                        'attach_id'  => $service_icon_img['id'],
                        'thumb_size' => 'full',
                    ));
                    $icon_thumbnail = $icon_img['thumbnail'];
                    ?>
                    <div class="pxl-post--icon">
                        <?php echo wp_kses_post($icon_thumbnail); ?>
                    </div>
                <?php endif; ?>
                <h4 class="pxl-post--title title-hover-line"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h4>
                <?php if($show_excerpt == 'true'): ?>
                    <div class="pxl-post--content">
                        <?php echo wp_trim_words( $post->post_excerpt, $num_words, null ); ?>
                    </div>
                <?php endif; ?>
                <?php if($show_button == 'true') : ?>
                    <div class="pxl-post--button">
                        <a class="btn--readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <span class="btn--text">
                                <?php if(!empty($button_text)) {
                                    echo esc_attr($button_text);
                                } else {
                                    echo esc_html__('Learn More', 'vintech');
                                } ?>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="6" viewBox="0 0 20 6" fill="none">
                              <path d="M17.7721 5.477L19.8245 3.42458C19.9369 3.31189 20 3.15921 20 3.00003C20 2.84085 19.9369 2.68817 19.8245 2.57548L17.7721 0.523097C17.68 0.433323 17.5562 0.383455 17.4275 0.384288C17.2989 0.385121 17.1757 0.436588 17.0848 0.527548C16.9938 0.618508 16.9423 0.741639 16.9414 0.870284C16.9406 0.998928 16.9904 1.12273 17.0802 1.21489L18.376 2.51071H0.489219C0.35947 2.51071 0.235035 2.56226 0.143289 2.654C0.0515425 2.74575 0 2.87018 0 2.99993C0 3.12968 0.0515425 3.25412 0.143289 3.34586C0.235035 3.43761 0.35947 3.48915 0.489219 3.48915H18.3759L17.0802 4.78521C16.9896 4.8772 16.939 5.00126 16.9395 5.13037C16.94 5.25948 16.9915 5.38315 17.0828 5.47445C17.1741 5.56574 17.2978 5.61725 17.4269 5.61775C17.556 5.61825 17.6801 5.5677 17.7721 5.47712V5.477Z" fill="white"/>
                          </svg>
                      </a>
                  </div>
              <?php endif; ?>
              <a class="pxl-item--link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"></a>
          </div>
      </div>
  </div>
<?php endforeach;
endif;
}

function vintech_get_service_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : 'full';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            $img_id = get_post_thumbnail_id($post->ID);
            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true); 
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }  ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-post-content-hide">
                      <a class="pxl-item--link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"></a>
                      <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                        <div class="pxl-post--icon">
                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                        </div>
                    <?php endif; ?>
                    <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                        $icon_img = pxl_get_image_by_size( array(
                            'attach_id'  => $service_icon_img['id'],
                            'thumb_size' => 'full',
                        ));
                        $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                        <div class="pxl-post-icon-wrap">
                            <div class="pxl-post--icon">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <h4 class="pxl-post--title title-hover-line"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h4>
                    <?php if($show_excerpt == 'true'): ?>
                        <div class="pxl-post--content">
                            <p>
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, null ); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach;
endif;
}
// End Service Grid
//-------------------------------------------------

add_action( 'wp_ajax_vintech_load_more_post_grid', 'vintech_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_vintech_load_more_post_grid', 'vintech_load_more_post_grid' );
function vintech_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'vintech'));
        }

        $settings = isset($_POST['settings']) ? $_POST['settings'] : null;

        $source = isset($settings['source']) ? $settings['source'] : '';
        $term_slug = isset($settings['term_slug']) ? $settings['term_slug'] : '';
        if( !empty($term_slug) && $term_slug !='*'){
            $term_slug = str_replace('.', '', $term_slug);
            $source = [$term_slug.'|'.$settings['tax'][0]]; 
        }
        if( isset($_POST['handler_click']) && sanitize_text_field(wp_unslash( $_POST[ 'handler_click' ] )) == 'filter'){
            set_query_var('paged', 1);
            $settings['paged'] = 1;
        }elseif( isset($_POST['handler_click']) && sanitize_text_field(wp_unslash( $_POST[ 'handler_click' ] )) == 'select_orderby'){
            set_query_var('paged', 1);
            $settings['paged'] = 1;
        }else{
            set_query_var('paged', (int)$settings['paged']);
        }

        extract(pxl_get_posts_of_grid($settings['post_type'], [
            'source'      => $source,
            'orderby'     => isset($settings['orderby'])?$settings['orderby']:'date',
            'order'       => isset($settings['order']) ? ($settings['orderby'] == 'title' ? 'asc' : sanitize_text_field($settings['order']) ) : 'desc',
            'limit'       => isset($settings['limit'])?$settings['limit']:'6',
            'post_ids'    => isset($settings['post_ids'])?$settings['post_ids']: [],
            'post_not_in' => isset($settings['post_not_in'])?$settings['post_not_in']: [],
        ],
        $settings['tax']
    ));

        ob_start();
        if( isset($settings['wg_type']) && $settings['wg_type'] == 'post-list'){
            vintech_get_post_list($posts, $settings);
        }else{
            vintech_get_post_grid($posts, $settings);
        }
        $html = ob_get_clean();

        $pagin_html = '';
        if( isset($settings['pagination_type']) && $settings['pagination_type'] == 'pagination' ){ 
            ob_start();
            vintech()->page->get_pagination( $query,  true );
            $pagin_html = ob_get_clean();
        }

        $result_count = '';
        if( isset($settings['show_toolbar']) && $settings['show_toolbar'] == 'show' ){ 
            ob_start();
            if( (int)$settings['paged'] == 0){
                $limit_start = 1;
                $limit_end = ( (int)$settings['limit'] >= $total ) ? $total : (int)$settings['limit'];
            }else{
                $limit_start = (((int)$settings['paged'] - 1 ) * (int)$settings['limit']) + 1;
                $limit_end = (int)$settings['paged'] * (int)$settings['limit'];
                $limit_end = ( $limit_end >= $total ) ? $total : $limit_end;
            }
            if( isset($settings['pagination_type']) && $settings['pagination_type'] == 'loadmore' ){ 
                printf(
                    '<span class="result-count">%1$s %2$s %3$s %4$s %5$s</span>',
                    esc_html__('Showing','vintech'),
                    '1-'.$limit_end,
                    esc_html__('of','vintech'),
                    $total,
                    esc_html__('results','vintech')
                );
            }else{
                printf(
                    '<span class="result-count">%1$s %2$s %3$s %4$s %5$s</span>',
                    esc_html__('Showing','vintech'),
                    $limit_start.'-'.$limit_end,
                    esc_html__('of','vintech'),
                    $total,
                    esc_html__('results','vintech')
                );
            }

            $result_count = ob_get_clean();
        }

        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'vintech'),
                'data' => array(
                    'html' => $html,
                    'pagin_html' => $pagin_html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                    'result_count' => $result_count,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}
