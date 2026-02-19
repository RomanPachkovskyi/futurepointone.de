<?php

if (!class_exists('Vintech_Header')) {

    class Vintech_Header
    {
        public function getHeader()
        {
            // Check if header should be hidden for this page
            $header_display = vintech()->get_page_opt('header_display', 'show');
            if ($header_display === 'hide' && !is_search()) {
                return;
            }

            $header_layout = (int)vintech()->get_opt('header_layout');
            $header_layout_sticky = (int)vintech()->get_opt('header_layout_sticky');

            if ($header_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                get_template_part( 'template-parts/header/default');
            } else {
                $args = [
                    'header_layout' => $header_layout,
                    'header_layout_sticky' => $header_layout_sticky
                ];
                get_template_part( 'template-parts/header/elementor','', $args );
            }

        }
 
    }
}
