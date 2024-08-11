<?php
/**
 * Theme Functions.
 * 
 * @package Aquila
 */

//  print_r(filemtime(get_template_directory() . '/style.css'));
 
 function aquila_enqueue_scripts() {

    // include the stylesheet and js file with dynamic way
    // wp_enqueue_style('style-css', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all');
    // wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime(get_template_directory() . '/assets/main.js'), true);

    // Another way to enqueue the files and this is recommended and real word use
    wp_register_style('style-css', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all');
    wp_register_script('main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime(get_template_directory() . '/assets/main.js'), true);

    wp_enqueue_style('style-css');
    wp_enqueue_script('main-js');
 }

 add_action('wp_enqueue_scripts', 'aquila_enqueue_scripts');
 ?>