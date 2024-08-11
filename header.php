<?php
/**
 * Header Template File
 * 
 * @package Aquila
 */

?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordPress Theme Development</title>
    <?php wp_head(); ?>
</head>
<body>
    
<!-- This function allows developers to add content to the beginning of the body tag. -->
    <?php wp_body_open(); ?>
    <header>This is Header</header>