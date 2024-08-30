<?php
/**
 * Template for the entry meta means metadata.
 * 
 * @package Aquila
 */
?>

<div class="entry-meta mb-3">
    <?php 
        //call the function to display the post created and modifiy time and date
        aquila_posted_on(); 

        // call function to display the author name on blog post
        aquila_posted_by(); 
    ?>
</div>