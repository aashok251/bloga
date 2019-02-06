<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bfastmag
 */

get_header(); 
bfastmag_action_content_bloc_start();

?>



		<?php

		if ( have_posts() ) : ?>

				<header class="page-header">
 			<?php
				 printf( '<h1 class="page-title title-border  title-bg-line"><span> %s %1s<span class="line"></span></span></h1>',__( 'Search Results for:', 'bfastmag' ), '<span>' . get_search_query() . '</span>'  );
?>
				</header><!-- .page-header -->

				<?php
				while ( have_posts() ) : the_post();

						/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
						get_template_part( 'template-parts/content', '' );

			endwhile;
			the_posts_pagination( array(
				'prev_text' =>   '<i class="fa fa-caret-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'bfastmag' ) . '</span>',
				'next_text' => '<i class="fa fa-caret-right"></i><span class="screen-reader-text">' . __( 'Next page', 'bfastmag' ) . '</span>' ,
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bfastmag' ) . ' </span>',
			) );
  ?>

			<?php

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; 

bfastmag_action_content_bloc_end();
?>

	 
<?php get_footer(); ?>
