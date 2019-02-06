<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfastmag
 */

	$post_id = get_the_ID();
?>

		  <div class="row">
			<div class="col-md-12">

				<article id="post-<?php echo $post_id; ?>" <?php post_class( 'entry single' ); ?>>
					<?php
					$bfastmag_disable_singlePost_featured_img = get_theme_mod( 'bfastmag_disable_singlePost_featured_img','1' );
					if ( ! isset( $bfastmag_disable_singlePost_featured_img ) || $bfastmag_disable_singlePost_featured_img != '1' ) {
						if ( has_post_thumbnail() ) { ?>
							<div class="tp-post-thumbnail">
							  <figure>
								<?php the_post_thumbnail(); ?>
							  </figure>
							</div><!-- End .tp-post-thumbnail -->
						<?php
						}
					}  ?>

		 
			 <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			  <div class="entry-meta">
				  <div class="entry-meta-inner">
	 				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"> <?php the_author(); ?></a>
	 			  	<span class="tp-post-item-date"> <?php echo get_the_date( ); ?></span>
				</div> 
 
				   
			  </div> <!-- End .entry-meta -->
				  <div class="entry-content">
						<?php the_content( 'Continue Reading' ); ?>
						<?php
				  			wp_link_pages( array(
				  				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bfastmag' ),
				  				'after'  => '</div>',
				  			) );
				  		?>
				  </div><!-- End .entry-content -->

				  <footer class="entry-footer clearfix">
					<?php
					$category = get_the_category(); 
					$tags = get_the_tags();?>
					<span class="cat-links">
						 <ul>
						<?php
						if ( ! empty( $tags ) ) {
							 
 							$len = count( $tags );
							foreach ( $tags as $tag ) {
								echo '<li><a href="' . esc_url( get_tag_link($tag->term_id) ) . '">' . esc_attr( $tag->name ) . '</a></li>';
								 
								 
							}
						}


						if ( ! empty( $category ) ) {
							 
							$len = count( $category );
							foreach ( $category as $cat ) {
								echo '<li><a href="' . esc_url( get_category_link( $cat->cat_ID ) ) . '">' . esc_attr( $cat->cat_name ) . '</a></li>';
								 
								 
							}
						} ?>
					</ul></span><!-- End .entry-tags -->
					 <?php

					  edit_post_link(

            sprintf(
                /* translators: %s: Name of current post */
                ( ! empty( $tags_list ) || ! empty( $categories_list ) ? esc_html__( 'Edit %s', 'bfastmag' ) : esc_html__( 'Edit %s', 'bfastmag' ) ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ),
            '<span class="edit-link">',
            '</span>'
        ); ?>
				  </footer>

					<?php $bfastmag_disable_single_hide_author = get_theme_mod( 'bfastmag_disable_single_hide_author' ); ?>
				  <div class="about-author clearfix <?php if ( $bfastmag_disable_single_hide_author == true ) { echo 'bfastmag_hide';} ?>">
					  
						<?php
						  $author_id = get_the_author_meta( 'ID' );
						  $profile_pic = get_avatar( $author_id, 'bfastmag_blk_small_thumb' );
						if ( ! empty( $profile_pic ) ) {  ?>
							<figure class="single-author-thumb">
								<?php echo $profile_pic; ?>
							</figure>
						<?php
						} ?>

					  <div class="author-details">
					  <h3 class="title-underblock custom">  <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></h3>
					
					  <div class="author-content">
							<?php echo get_the_author_meta( 'description', $author_id ); ?>
					  </div><!-- End .athor-content -->
					  </div>
				  </div><!-- End .about-author -->
				</article>

				<?php $bfastmag_single_post_hide_related_posts = get_theme_mod( 'bfastmag_single_post_hide_related_posts' ); ?>
				<div class="bfastmag-related-posts-wrap">
				<h3 class="mb30 title-underblock title-border title-bg-line custom bfastmag-related-posts-title <?php if ( $bfastmag_single_post_hide_related_posts == true ) { echo 'bfastmag_hide';} ?> "><span><?php esc_html_e( 'Related Posts', 'bfastmag' ); ?><span class="line"></span></span></h3>

 
				<div class="bfastmag-related-posts owl-carousel small-nav <?php if ( $bfastmag_single_post_hide_related_posts == true ) { echo 'bfastmag_hide';} ?> ">
				<?php
				  $related = get_posts( array(
					  'category__in' => wp_get_post_categories( $post_id ),
					  'numberposts' => 5,
					  'post__not_in' => array( $post_id ),
				  ) );
				  if ( $related ) {
					  foreach ( $related as $post ) {
						  setup_postdata( $post ); ?>
						  <article class="entry entry-box">
							<div class="tp-post-thumbnail">
							  <div class="tp-post-thumbnail">
								<figure>
								  <a href="<?php the_permalink(); ?>">
										<?php
										if ( has_post_thumbnail() ) {
											$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $wp_query->ID ), 'bfastmag_related_post' );
							  					$url = $thumb['0'];
							  					echo '<img class="owl-lazy" data-src="' . esc_url( $url ) . '" />';
										} else {
											echo '<img class="owl-lazy" data-src="' . get_template_directory_uri() . '/assets/images/related-default.jpg"/>';
										} ?>
								  </a>
								</figure>
							  </div><!-- End .tp-post-thumbnail -->
							</div><!-- End .tp-post-thumbnail -->

							<div class="entry-content-wrapper">
 								<?php
		 
								if ( ! empty( $icon_class ) ) {  ?>
									<span class="entry-format"><i class="fa <?php echo $icon_class; ?>"></i></span>
								<?php
								} ?>
								<?php $title = get_the_title(); if ( ! empty( $title ) ) { ?>
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php } ?>
							  
							</div><!-- End .entry-content-wrapper -->
 
						  </article>
							<?php
						}// End foreach().
					}// End if().
					wp_reset_postdata(); ?>
				</div><!-- End .bfastmag-related-posts -->
				</div>
			</div><!-- End .col-md-12 -->
		  </div><!-- End .row -->
		  <div class="mb20"></div><!-- space -->
