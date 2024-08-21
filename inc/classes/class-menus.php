<?php

/**
 * Register the Menus
 *
 * @package Aquila
 */

 namespace AQUILA_THEME\Inc;

 use AQUILA_THEME\Inc\Traits\Singleton;

 class Menus {
    use Singleton;
    protected function __construct() {
        
        // load other classes
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // Actions and Filters
        add_action('init', [$this, 'register_menus']);
    }

    // Register custom navigation menu.
    public function register_menus() {
        register_nav_menus([
            'aquila-header-menu' => esc_html__( 'Header Menu', 'aquila' ),
            'aquila-footer-menu' => esc_html__( 'Footer Menu', 'aquila' ),
        ]);
    }

    public function get_menu_id($location) {

        // Get all registered nav menu Locations
        $locations = get_nav_menu_locations();

        // Get Object ID by location
        $menu_id = $locations[$location];

        return !empty($menu_id) ? $menu_id: '';
       
    }
 }