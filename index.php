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
         if( have_posts() ) :
            ?>
            <div class="container">
               <?php
               /**
                * Display the page title using single_post_title()function
                * first check the condiction is it home page and not a front page and call a function
                */
                  if( is_home() && ! is_front_page() ) {
                     ?>
                        <header class="mb-5">
                           <h1 class="page-title screen-render-text">
                              <?php single_post_title(); ?>
                           </h1>
                        </header>
                     <?php
                  }
               ?>
               <div class="row">
                  <?php
                  $index = 0;
                  $no_of_columns = 3;

                  while( have_posts() ) : the_post();
                  
                     if( 0 === $index % $no_of_columns ) {
                        ?>
                           <div class="col-lg-4 col-md-6 col-sm-12">
                        <?php
                     }
                     
                     get_template_part('template-parts/content');

                     $index++;

                     if( 0 !== $index && 0 === $index % $no_of_columns) {
                        ?>
                           </div>
                        <?php
                     }
                    
                  endwhile;
                  ?>
               </div>
            </div>
            <?php

else :  
   get_template_part('template-parts/content-none');
         endif;
      ?>
   </main>
 </div>

<?php
get_footer();
