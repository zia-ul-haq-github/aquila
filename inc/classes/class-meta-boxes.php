<?php

/**
 * Register Meta Boxes
 *
 * @package Aquila
 */

 namespace AQUILA_THEME\Inc;

 use AQUILA_THEME\Inc\Traits\Singleton;

 class Meta_Boxes {
    use Singleton;
    protected function __construct() {
        
        // load other classes
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        
        /**
         * Action & Filter Hooks
         * In first hook we Register Meta box for any post type.
         * Second hook to use the save metabox when the post is save
         */
        add_action('add_meta_boxes', [$this, 'add_custom_meta_box']);
        add_action( 'save_post', [$this, 'save_post_meta_data'] );
    }

    /**
     * This function is register the meta boxes when fire the hook.
     * In screen variable we pass the post which means the name of the screen where to show the meta field
     */
    public function add_custom_meta_box() {

        $screens = [ 'post' ];                
        foreach ( $screens as $screen ) {
            add_meta_box(
                'hide-page-title',                  // Unique ID
                __( 'Hide Page Title', 'aquila' ),  // MetaBox title
                [ $this, 'custom_meta_box_html' ],  // Content callback, means hold the HTML for the meta box
                $screen,                           // Post type
                'side'                            // locations
            );
        }
    }

    // This Callback function hold the HTML for the meta boxes
    public function custom_meta_box_html( $post) {

        // Get the post meta field for the given post ID.
        $value = get_post_meta( $post->ID, '_hide-page-title', true );
        ?>
        <label for="aquila_field"> 
            <?php esc_html_e('Hide the page title', 'aquila'); ?> 
        </label>
        <select name="aquila_hide_title_field" id="aquila_field" class="postbox">
            <option value="">
                <?php esc_html_e('Select', 'aquila'); ?>
            </option>
            <option value="yes" <?php selected( $value, 'yes' ); ?>>
                <?php esc_html_e('Yes', 'aquila'); ?>
            </option>
            <option value="no" <?php selected( $value, 'no' ); ?>>
                <?php esc_html_e('No', 'aquila'); ?>
            </option>
        </select>
        <?php
    }

    /**
     * This Callback function save the metabox values in database.
     * check if the key is exists in post array then use the update function
     */
    public function save_post_meta_data( $post_id ) {
        if ( array_key_exists( 'aquila_hide_title_field', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_hide-page-title',
                $_POST['aquila_hide_title_field']
            );
        }
    }

 }