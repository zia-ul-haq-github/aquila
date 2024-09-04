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

    echo '<span class= "posted-one text-secondary">'.$posted_on .'</span>';
}

// Display the Post Author name
function aquila_posted_by() {
    $byline = sprintf(
        esc_html_x(' by %s', 'post author', 'aquila'),
        '<span class="author vcard"><a href="'.esc_url(get_author_posts_url(get_the_author_meta('ID'))) .'">'. esc_html(get_the_author()).'</a></span>'
    );

    echo '<span class="byline text-secondary">'.$byline.'</span>';
}

// Display the excerpt on the blog post and customize the excerpt
function aquila_the_excerpt( $trim_character_count = 0 ) {

    // Check if it has not excerpt or trim variable equll to 0 then display the excerpt and return it.
    if( ! has_excerpt() || 0 === $trim_character_count) {
        the_excerpt();
        return;
    }

    //Get the excerpt and remove the script and style tag from excerpt by function then store in the variable.
    $excerpt = wp_strip_all_tags( get_the_excerpt() );

    // Return the string after extract from specifice position means stating poistion is 0 and end is vaariable.
    $excerpt = substr( $excerpt, 0, $trim_character_count );

    // The excerpt string again equll to 0 and string position is from the excerpt where there is empty space.
    $excerpt = substr( $excerpt, 0, strrpos( $excerpt, ''));
    echo $excerpt . '[...]';
}

// Display the Read More text inside the button for excerpt
function aquila_excerpt_more ( $more = '' ) {

    // if user is not on the single page and $more variable is empty then return the read more text with permalink
    if( ! is_single() ) {
        $more = sprintf(
            '<button class= " mt-4 btn btn-info"><a class="aquila-read-more text-white" href="%1$s">%2$s</a></button>',
            get_permalink( get_the_ID() ),
            __('Read more', 'aquila')
        );
    }

    return $more;
}