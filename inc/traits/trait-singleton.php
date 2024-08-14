<?php

namespace AQUILA_THEME\Inc\Traits;

// create a trait
trait Singleton{

    // create a constructor function
    public function __constructor() {

    }

    // it prevents the object cloning
    public function __clone() {

    }

    final public static function get_instance() {
        static $instance = [];
        $called_class = get_called_class();

        if(!isset($instance[$called_class])) {
            $instance[$called_class] = new $called_class();

            do_action(sprintf('aqulia_theme_singleton_init%s', $called_class));
        }

        return $instance[$called_class];
    }
}

?>
