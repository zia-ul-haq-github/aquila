<?php
/**
 * Content Template This template render all of the content
 * 
 * @package aquila
 */
?>

<article id="post-<?php the_ID() ?>" <?php post_class('mb-5'); ?>>
    <?php
    // include the small chunk templates files in the content.php file
    get_template_part('template-parts/components/blog/entry-header');
    get_template_part('template-parts/components/blog/entry-meta');
    get_template_part('template-parts/components/blog/entry-content');
    get_template_part('template-parts/components/blog/entry-footer');
    ?>
</article>