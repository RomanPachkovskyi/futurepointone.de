<?php
	$default_settings = [
	    'date' => '2030/10/10',
	    'pxl_day' => '',
	    'pxl_hour' => '',
	    'pxl_minute' => '',
	    'pxl_second' => '',
	];
	$html_id = pxl_get_element_id($settings);
	$settings = array_merge($default_settings, $settings);
	extract($settings); 
	$month = esc_html__('Month', 'vintech');
	$months = esc_html__('Months', 'vintech');
	$day = esc_html__('Day', 'vintech');
	$days = esc_html__('Days', 'vintech');
	$hour = esc_html__('Hour', 'vintech');
	$hours = esc_html__('Hours', 'vintech');
	$minute = esc_html__('Minute', 'vintech');
	$minutes = esc_html__('Minutes', 'vintech');
	$second = esc_html__('Second', 'vintech');
	$seconds = esc_html__('Seconds', 'vintech');
	if($style == 'style3') {
		$hour = esc_html__('Hour', 'vintech');
		$hours = esc_html__('Hour', 'vintech');
		$minute = esc_html__('Min', 'vintech');
		$minutes = esc_html__('Min', 'vintech');
		$second = esc_html__('Sec', 'vintech');
		$seconds = esc_html__('Sec', 'vintech');
	}
?>
<div class="pxl-countdown pxl-countdown-layout1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?> <?php echo esc_attr($pxl_day.' '.$pxl_hour.' '.$pxl_minute.' '.$pxl_second); ?>" 
	data-month="<?php echo esc_attr($month) ?>"
	data-months="<?php echo esc_attr($months) ?>"
	data-day="<?php echo esc_attr($day) ?>"
	data-days="<?php echo esc_attr($days) ?>"
	data-hour="<?php echo esc_attr($hour) ?>"
	data-hours="<?php echo esc_attr($hours) ?>"
	data-minute="<?php echo esc_attr($minute) ?>"
	data-minutes="<?php echo esc_attr($minutes) ?>"
	data-second="<?php echo esc_attr($second) ?>"
	data-seconds="<?php echo esc_attr($seconds) ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<div class="pxl-countdown-inner" data-count-down="<?php echo esc_attr($date);?>"></div>
</div>