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

        // using wp core function to allow the title tage and custom logo and their propaties etc
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo', [
            'header-text'          => ['site-title', 'site-description'],
            'height'               => 100,
		    'width'                => 400,
		    'flex-height'          => true,
		    'flex-width'           => true,
        ] );

        add_theme_support( 'custom-background', [
            'default-color' => '#fff',
            'default-image' => '',
            'default-repeat'=> 'no-repeat',
        ] );
    }

}




