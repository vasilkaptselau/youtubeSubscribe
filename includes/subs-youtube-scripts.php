<?php

	function subs_add_scripts() {
		wp_enqueue_style('subs-main-style', plugins_url(). '/subs-youtube/includes/css/style.css');
		wp_enqueue_script('subs-main-script', plugins_url(). '/subs-youtube/includes/js/main.js');
		//Add google/youtube
		wp_register_script('google', 'https://apis.google.com/js/platform.js');
		wp_enqueue_script('google');
	}

add_action('wp_enqueue_scripts', 'subs_add_scripts');