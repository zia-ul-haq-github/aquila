<?php

/**
 * Bootstraps the theme means add all basic functionaly for theme
 * 
 * @package Aquila
 */
namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME {
    use Singleton;

    // This is main class & it protected means no one can access the main class construct method
    protected function __construct() {
        
        // load other classes
        Assets::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // Actions and Filters
        add_action('after_setup_theme',[ $this, 'setup_theme']);
    }

    public function setup_theme() {
        add_theme_support( 'title-tag' );
    }

}




