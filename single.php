<?php
/**
 * Main Template File
 * 
 * @package Aquila
 */

// we include the header file by using the WP function which is Loads header template 
 get_header();
?>

   <div class="content">
      <?php esc_html_e('Single Post', 'aquila'); ?>
   </div>

<?php

get_footer();
