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
        $this->set_hooks();
    }

    protected function set_hooks() {
        // Actions and Filters
    }
}




