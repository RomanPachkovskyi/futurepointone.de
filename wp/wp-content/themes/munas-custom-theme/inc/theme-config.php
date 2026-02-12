<?php if(!function_exists('vintech_configs')){
    function vintech_configs($value){
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'vintech'), 
                    'value' => vintech()->get_opt('primary_color', '#5230DA')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'vintech'), 
                    'value' => vintech()->get_opt('secondary_color', '#000000')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'vintech'), 
                    'value' => vintech()->get_opt('third_color', '#444444')
                ],
                'four'   => [
                    'title' => esc_html__('Four', 'vintech'), 
                    'value' => vintech()->get_opt('four_color', '#483886')
                ],
                'body_bg'   => [
                    'title' => esc_html__('Body Background Color', 'vintech'), 
                    'value' => vintech()->get_opt('body_bg_color', '#fff')
                ]
            ],

            'link' => [
                'color' => vintech()->get_opt('link_color', ['regular' => '#000000'])['regular'],
                'color-hover'   => vintech()->get_opt('link_color', ['hover' => '#5230DA'])['hover'],
                'color-active'  => vintech()->get_opt('link_color', ['active' => '#5230DA'])['active'],
            ],
            'gradient' => [
                'color-from' => vintech()->get_opt('gradient_color', ['from' => '#00614B'])['from'],
                'color-to' => vintech()->get_opt('gradient_color', ['to' => '#73A145'])['to'],
            ],
            'gradient_two' => [
                'color-from_two' => vintech()->get_opt('gradient_color_two', ['from' => '#9E85FF'])['from'],
                'color-to_two' => vintech()->get_opt('gradient_color_two', ['to' => '#2C1A74'])['to'],
            ],
        ];
        return $configs[$value];
    }
}
if(!function_exists('vintech_inline_styles')) {
    function vintech_inline_styles() {  

        $theme_colors      = vintech_configs('theme_colors');
        $link_color        = vintech_configs('link');
        $gradient_color        = vintech_configs('gradient');
        $gradient_color_two        = vintech_configs('gradient_two');
        ob_start();
        echo ':root{';

        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
        }
        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  vintech_hex_rgb($value['value']));
        }
        foreach ($link_color as $color => $value) {
            printf('--link-%1$s: %2$s;', $color, $value);
        } 
        foreach ($gradient_color as $color => $value) {
            printf('--gradient-%1$s: %2$s;', $color, $value);
        } 
        foreach ($gradient_color_two as $color => $value) {
            printf('--gradient-two-%1$s: %2$s;', $color, $value);
        } 
        echo '}';

        return ob_get_clean();

    }
}
