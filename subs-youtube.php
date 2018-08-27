<?php
/*
 * Plugin Name: Youtube subscribers
 * Plugin URI: https://wordpress/plugin
 * Description: Preview Video
 * Version: 1.1.0
 * Author: vk
 * License: GPLv2 or later
 */

if(!defined('ABSPATH')){ 
	exit;
}

require_once(plugin_dir_path(__FILE__). '/includes/subs-youtube-scripts.php');

require_once(plugin_dir_path(__FILE__). '/includes/subs-youtube-class.php');

function register_subsyoutube() {
	
	register_widget('Subs_Youtube_Widget');
}

add_action('widgets_init', 'register_subsyoutube');