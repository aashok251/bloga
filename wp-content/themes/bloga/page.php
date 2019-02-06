<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfastmag
 */

get_header(); 
 $bfast_lo_class = 'col-md-9';
    if ( ! is_active_sidebar( 'bfastmag-sidebar' ) ) {
        $bfast_lo_class = 'col-md-12';
    }
?>

	<div id="primary" class="content-area">
	 
		<div  class="bfastmag-content-left <?php echo $bfast_lo_class;?>">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- .bfastmag-content-left -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
