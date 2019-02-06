<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage bfastmag.
 */

get_header();
bfastmag_action_front_page();
bfastmag_action_content_bloc_start();
bfastmag_action_content_bloc();
bfastmag_action_content_bloc_end();
get_footer();