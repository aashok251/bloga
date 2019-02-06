<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @package bfastmag
 */

/**
 * bfastmag_action_before_head hook
 * 
 * @hooked bfastmag_doctype -  10
 */
bfastmag_action_before_head();
bfastmag_action_before_wp_head();


wp_head(); 
?>

</head>

<body <?php body_class(); ?>>
<?php
/**
 * bfastmag_action_page_start hook
 *
 * @hooked bfastmag_page_start - 15
 */
	
	bfastmag_action_page_start(); 
/**
 * bfastmag_action_header hook
 *
 * @hooked bfastmag_header - 10
 */	
	bfastmag_action_header();

	bfastmag_action_site_content_start(); 
?>