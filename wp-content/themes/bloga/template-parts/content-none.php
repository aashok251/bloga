<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfastmag
 */

?>
	<div class="container">
	<div class="row">

	  <section class="no-results not-found col-md-9">
		<header class="page-header">
		  <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'bfastmag' ); ?></h1>
		</header><!-- End .page-header -->

		<div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			  <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bfastmag' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php
			elseif ( is_search() ) : ?>

			  <p><?php esc_html_e( 'Please Try with Different Search Keywords.', 'bfastmag' ); ?></p>

			<?php
			  get_search_form();
			else : ?>

			  <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bfastmag' ); ?></p>
			  
			<?php
			get_search_form();
			endif; ?>
		</div><!-- End .page-content -->
	  </section><!-- End .no-results -->

	</div><!-- End .row -->
	</div><!-- End .container -->
