<?php

function add_ys_scripts() {
    wp_register_script('google', 'https://apis.google.com/js/platform.js');
    wp_enqueue_script('google');
}

add_action('wp_enqueue_scripts', 'add_ys_scripts');