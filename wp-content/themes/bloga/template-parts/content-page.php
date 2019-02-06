<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfastmag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bfastmag' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	
	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'bfastmag' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer>'
		);
	?>

</article><!-- #post-## -->

