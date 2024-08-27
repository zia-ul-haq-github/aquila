<?php
/**
 * Theme Functions.
 * 
 * @package Aquila
 */

// create a constant for root directoy
if ( ! defined( 'AQUILA_DIR_PATH' ) ) {
	define( 'AQUILA_DIR_PATH', untrailingslashit( get_template_directory() ) );
}
 
if ( ! defined( 'AQUILA_DIR_URI' ) ) {
	define( 'AQUILA_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

// echo '<pre>';
// print_r(AQULIA_DIR_PATH);
// wp_die();

//Include the files of autoloader.php and template-tags.php
require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';
require_once AQUILA_DIR_PATH . '/inc/helpers/template-tags.php';

function aquila_get_theme_instance() {
   \AQUILA_THEME\Inc\AQUILA_THEME::get_instance();
}

aquila_get_theme_instance();

 function aquila_enqueue_scripts() {

    /*include the stylesheet and js file with dynamic way

       wp_enqueue_style('style-css', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all');
       wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime(get_template_directory() . '/assets/main.js'), true);

    *Another way to enqueue the files and this is recommended and real word use

    ** Register Styles */
   
   
   //  Enqueue the files
   
 }

 add_action('wp_enqueue_scripts', 'aquila_enqueue_scripts');
 ?>