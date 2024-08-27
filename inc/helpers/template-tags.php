<?php

// This function is just retuen the thumbnail 
function get_the_post_custom_thumbnail( $post_id, $size = 'featured-large', $additional_attributes = [] ) {
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
function the_post_custom_thumbnail( $post_id, $size = 'featured-large', $additional_attributes = [] ) {
    echo get_the_post_custom_thumbnail( $post_id, $size, $additional_attributes );
}