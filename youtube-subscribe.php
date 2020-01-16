<?php
/**
 * Plugin Name: Youtube Subscribe
 * Plugin URI: google.com
 * Author: Mansoor Khan
 * Author URI: google.com
 * Description: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis delectus eius deleniti repellat doloremque praesentium aliquid nobis. Facilis similique consequatur ipsam sit alias maiores incidunt recusandae culpa tempora architecto pariatur aspernatur nostrum aperiam, nemo laboriosam officiis itaque dolores fugit doloribus! Explicabo itaque temporibus quasi quos magni eveniet tempore dolorem suscipit?
 */

if(! defined('ABSPATH')) {
    exit('No Direct Script Access Allowed');
}

require_once(plugin_dir_path(__FILE__) . '/includes/Youtube_Widget.php');
require_once(plugin_dir_path(__FILE__) . '/includes/ys_scripts.php');

function add_ys_widget() {
    register_widget('Youtube_Widget');
}

add_action('widgets_init', 'add_ys_widget');