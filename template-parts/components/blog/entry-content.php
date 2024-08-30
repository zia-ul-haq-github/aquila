<?php
/**
 * Template for the entry-content.
 * 
 * To be used inside Wordpress The loop.
 * 
 * @package Aquila
 */
?>

<div class="entry-content">
    <?php
        if( is_single() ) {
            the_content(
                sprintf(
                    wp_kses(
                        /**
                         * This function is filter the text content and allow only provided html
                         * in allow html we pass the array it accept only the span tag and their class attribute
                         */
                        __('Continue Reading %s <span class="meta-nav">&rarr;</span>', 'aquila'),
                        [
                            'span' => [
                                'class' => []
                            ]
                        ]
                    ),
                    /**
                     * The %S is replace with the post title which is get by the_title function and pass parameter
                     * add span tag before and after and dont echo only return it*/
                    the_title('<span class= "screen-reader-text">"','"</span>', false)
                )
            );
        } else{
            aquila_the_excerpt(200);   // Call the function
        }
    ?>
</div>