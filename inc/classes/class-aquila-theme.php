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
        Menus::get_instance();
        Assets::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // Actions and Filters
        add_action('after_setup_theme',[ $this, 'setup_theme']);
    }

    public function setup_theme() {

        /**
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
         * and also add custom logo and their propaties etc.
		 */
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo', [
            'header-text'          => ['site-title', 'site-description'],
            'height'               => 100,
		    'width'                => 400,
		    'flex-height'          => true,
		    'flex-width'           => true,
        ] );

        add_theme_support( 'custom-background', 
            ['default-color' => '#fff',
            'default-image' => '',
            'default-repeat'=> 'no-repeat',] 
        );

        /** Post Thumbnail add/Enable support for Post Thumbnails on posts and pages.
		 *
		 * Adding this will allow you to select the featured image on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support( 'post-thumbnails' );

        /**
		 * Register image sizes.
		 */
        add_image_size('featured-thumbnail', 350, 263, true);

    /** refresh widgest **/
        add_theme_support( 'customize-selective-refersh-widgets' );

    /** automatic feed link*/
        add_theme_support( 'automatic-feed-links' );

    /** HTML5 support **/
        add_theme_support( 'html5', 

            ['comment-list',
            'comment-form',
            'search-form', 
            'gallery', 
            'caption'
             ] 
        );

     /**custom TinyMCE editor stylesheets.*/
        add_theme_support( 'editor-style' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'align-wide' );

        /** MAx width of contnet on the frontend */
        global $content_width;
        if(!isset($content_width)){
            $content_width = 1240;
        }
    }

}




