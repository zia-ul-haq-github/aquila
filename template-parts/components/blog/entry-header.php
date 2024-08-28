<?php
/**
 * Template for post entry header
 * 
 * @package aquila
 */

 $the_post_id = get_the_ID();
 $has_post_thumbnail = get_the_post_thumbnail($the_post_id);
?>

<header class="entry-header">
    <?php 
        // Featured Image
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
    ?>
</header>