<?php

// This function is just retuen the thumbnail 
function get_the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ) {
    $custom_thumbnail = '';

    // check if post id is equal to null then get the post id by function and store in variable
    if( null === $post_id) {
        $post_id = get_the_ID();
    }

    // check if post have thumbnail then add lazy loding images
    if( has_post_thumbnail( $post_id ) ) {
        $default_attributes = [
            'loading' => 'lazy'
        ];

        $attributes = array_merge( $additional_attributes, $default_attributes);

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id( $post_id ),
            $size,
            false,
            $additional_attributes
        );
    }

    return $custom_thumbnail;
}


// This function is echo the thumbnail means it will give me the thumbnail
function the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ) {
    echo get_the_post_custom_thumbnail( $post_id, $size, $additional_attributes );
}

// Display post publish and modified time
function aquila_posted_on() {
    $time_string = '<time class = "entry-date published updated" datetime="%1$s">%2$s</time>';

    /**
     * Post is modified
     * check when post published time is not equll to modified time then value store in $time_string variable
     */
    if( get_the_time('U') !== get_the_modified_time('U') ) {

        $time_string = '<time class = "entry-date published" datetime="%1$s">%2$s</time><time class= "updated" datetime="%3$s">%4$s</time>';
    }

    // Return the formatted string to the provided variable
    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( DATE_W3C ) ),       //for Published the post
        esc_attr( get_the_date() ),
        esc_attr( get_the_modified_date( DATE_W3C ) ), //for modified the post
        esc_attr( get_the_modified_date() )
    );

    $posted_on = sprintf(
        // concanated the permalink and bookmark time sting value in anchor tage and replace it with the %s
        esc_html_x( 'Posted on %s', 'post date', 'aquila'),
        '<a href="'. esc_url( get_permalink() ) .'" rel="bookmark">'. $time_string .'</a>'
    );

    echo '<span class= "posted-on text-secondary">'.$posted_on .'</span>';
}