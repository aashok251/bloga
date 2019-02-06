<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfastmag
 */

get_header(); 
bfastmag_action_content_bloc_start();
?>
<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<?php
								the_archive_title( '<h1 class="page-title title-border  title-bg-line"><span> ', '<span class="line"></span></span></h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
						</header><!-- .page-header -->
				<?php
					/* Start the Loop */
						while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						the_posts_pagination( array(
				'prev_text' =>   '<i class="fa fa-caret-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'bfastmag' ) . '</span>',
				'next_text' => '<i class="fa fa-caret-right"></i><span class="screen-reader-text">' . __( 'Next page', 'bfastmag' ) . '</span>' ,
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bfastmag' ) . ' </span>',
			) );
					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;

			bfastmag_action_content_bloc_end();
?>
<?php get_footer(); ?>
