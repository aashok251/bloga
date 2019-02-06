<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bfastmag
 */

if ( ! is_active_sidebar( 'bfastmag-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-md-3 sidebar" role="complementary">
	<?php

	if (  is_active_sidebar( 'bfastmag-sidebar' ) ) {
 	 	  		dynamic_sidebar( 'bfastmag-sidebar' );

		 }


 	?>
</aside><!-- #secondary -->
