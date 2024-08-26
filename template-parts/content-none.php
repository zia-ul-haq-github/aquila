<?php
/**
 * This template part for displaying amessage that posts cannot be found.
 * 
 * @package aquila
 */
?>

<section class="no-result not-found">
    <header class="page-header">
        <h1 class="page-title">
            <?php esc_html_e('Nothing Found', 'aquila'); ?>
        </h1>
    </header>

    <div class="page-content">
        <?php
        // check the condiction if is it a home page and current user can access the publish the post
            if( is_home() && current_user_can('publish_posts') ) {
                ?>
                <p>
                    <?php 
                    /**
                     * The "printf" function replace the %s to the second parameter values of href.
                     * The "kses" functions only allow html tag name, attributes, and values.
                     * The "admin_url" function get the url of the admin area for current site means when i click on link it redirect to the new post 
                    */
                        printf(
                            wp_kses(
                                __( 'Ready to publish your first post? <a href="%s"> Get Started here </a>', 'aquila'),
                                [
                                    'a' => [
                                        'href' => []
                                    ]
                                ]
                            ),
                            esc_url( admin_url('post-new.php') )
                        )
                    ?>
                </p>
                <?php
            } elseif( is_search() ) {
                ?>
                <p>
                    <?php esc_html_e('Sorry but nothing match your search iteam. Please try again with some different keywords', 'aquila'); ?>
                </p>
                <?php
                get_search_form();
            } else {
                ?>
                <p>
                    <?php esc_html_e('It seems that we cannot find what you are look for. Perhaps search can helps', 'aquila'); ?>
                </p>
                <?php
                get_search_form();
            }
        ?>
    </div>
</section>