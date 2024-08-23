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

    // This function is fatch the menu id
    public function get_menu_id($location) {

        // Get all registered nav menu Locations
        $locations = get_nav_menu_locations();

        // Get Object ID by location
        $menu_id = $locations[$location];

        return !empty($menu_id) ? $menu_id: '';
       
    }

    /**
     * Create a function to get the child menu items and put each items in child_menu varable though loop.
     * first get all menus which parent id is equall to menu_item_parent then push the child to the child array
     * Return the just child menus and call the function into the code.
    */
    public function get_child_menu_items($menu_array, $parent_id) {
        $child_menus = [];

            if(!empty($menu_array) && is_array($menu_array)) {
                foreach($menu_array as $menu) {
                
                    if(intval($menu->menu_item_parent) === $parent_id) {
                        array_push( $child_menus, $menu );
                    }
                }
            }

        return $child_menus;
    }
 }