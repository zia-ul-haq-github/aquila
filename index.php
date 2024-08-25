<?php
/**
 * Main Template File
 * 
 * @package Aquila
 */

// we include the header file by using the WP function which is Loads header template 
 get_header();
?>

<!-- Render the post templates and show it's content through  the_loop -->
 <div id="primary">
   <main id="main" class="site-main mt-5" role="main">
      <?php
         if( have_posts() ) {
            ?>
            <div class="container">
               <?php
               /**
                * Display the page title using single_post_title()function
                * first check the condiction is it home page and not a front page and call a function
                */
                  if( is_home() && !is_front_page()) {
                     ?>
                        <header class="mb-5">
                           <h1 class="page-title screen-render-text">
                              <?php single_post_title(); ?>
                           </h1>
                        </header>
                     <?php
                  }
               ?>
               <?php
               while( have_posts() ) : the_post();
                  the_title();
                  the_content();
                  the_post_thumbnail();
               endwhile;
               ?>
            </div>
            <?php
         }
      ?>
   </main>
 </div>

<?php
get_footer();
