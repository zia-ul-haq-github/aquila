<?php
/**
 * Template for post entry header
 * 
 * @package aquila
 */

 $the_post_id = get_the_ID();
 $hide_title = get_post_meta($the_post_id, '_hide-page-title', true);

//  if the user selected "yes" from the editor it's return the hide which is the class name other wise not use any class
 $heading_class = ! empty( $hide_title ) && 'yes'=== $hide_title ? 'hide' : '';
 $has_post_thumbnail = get_the_post_thumbnail($the_post_id);
?>

<header class="entry-header">
    <?php 
        // Add condition on Display Featured Image
        if( $has_post_thumbnail ) {
            ?>
            <div class="entry-image mb-5">
                <a href=" <?php echo esc_url( get_permalink() ); ?> ">
                    <?php 
                        the_post_custom_thumbnail(
                            $the_post_id,
                            'featured-thumbnail', // Custom Name of the Image
                            [
                                'sizes' => '(max-width: 350px) 350px, 263',
                                'class' => 'attachment-featured-image size-featured-image'
                            ]
                        )
                    ?>
                </a>
            </div>
            <?php
        }

       /**
        * Add condition to Display Title on single post and blog post.
        * Check wheither or not the user on single page because we don't need permalink on single page.
        * if it is then show the title only after sanitize for santize we pass parameter and replace their vaules.
        */
        if( is_single($post) || is_page($page) ) {
            printf(
                '<h1 class="page-title text-dark %1$s" > %2$s </h1>',
                esc_attr($heading_class),           // First Parameter
                wp_kses_post( get_the_title() )     // Second Parameter
            );

        } else {
            /**
             * if it's not on single page means blog page then we need to the heading and permalink.
             *  when user click on the link it redirect to the single post.
             */
            printf(
                '<h2 class="entry-title mb-3" ><a class="text-dark" href="%1$s"> %2$s</a></h2>',
                esc_url( get_the_permalink() ),
                wp_kses_post( get_the_title() )
            );
        }

    ?>
</header>