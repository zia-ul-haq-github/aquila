<?php

/**
 * Enqueue the Theme Assests
 *
 * @package Aquila
 */

 namespace AQUILA_THEME\Inc;

 use AQUILA_THEME\Inc\Traits\Singleton;

 class Assets{
    use Singleton;
    protected function __construct() {
        
        // load other classes
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // Actions and Filters
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
    }

    public function register_styles() {
    //  Register styles
        wp_register_style('style-css', get_stylesheet_uri(), [], filemtime(AQUILA_DIR_PATH . '/style.css'), 'all');
        wp_register_style('bootstrap-css', AQUILA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');
        
        wp_enqueue_style('style-css');
        wp_enqueue_style('bootstrap-css');
        
    }

    public function register_scripts() {
        //  Register JS
        wp_register_script('main-js', AQUILA_DIR_URI . '/assets/main.js', [], filemtime(AQUILA_DIR_PATH . '/assets/main.js'), true);
        wp_register_script('bootstrap-js', AQUILA_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);
 
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }

 }