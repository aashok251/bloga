<?php
/**
 * Template part for displaying Featured Big posts content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfastmag
 */
?>
<?php 
 
$bfastmag_featured_big_disable = (bool) get_theme_mod( 'bfastmag_featured_big_disable', false );
$bfastmag_featured_big_category = esc_attr( get_theme_mod( 'bfastmag_featured_big_category', 'all' ) );
  $wp_query = new WP_Query( array(
    'posts_per_page'        => 4,
     'order'                 => 'DESC',
    'post_status'           => 'publish',
    'ignore_sticky_posts'           => true,
    'category_name'         => ( ! empty( $bfastmag_featured_big_category ) && $bfastmag_featured_big_category != 'all' ? $bfastmag_featured_big_category : '' ),
) );

 if( isset($cat)){

		$wp_query = new WP_Query( array(
			'posts_per_page'        => 4,
			'order'                 => 'DESC',
			'post_status'           => 'publish',
			'ignore_sticky_posts'           => true,
			'category_name'         => ( ! empty( $cat ) && $cat != 'all' ? $cat : '' ),
		));
			
 }

if ( (bool) $bfastmag_featured_big_disable !== true ) {
    if ( $wp_query->have_posts() ) { ?>

   
 <div class="featured-wrap rowItem animate animate-moveup animate-fadein">
                
    
<?php
$counter = 0;
 while ( $wp_query->have_posts() ) : $wp_query->the_post();


if($counter == 0){

	$img_thumb = 'bfastmag_blog_post';
}else{
	$img_thumb = 'bfastmag_blk_big_thumb_no_crop';
}

 ?>
<div class="featured-large">
    <div class="featured-o-thumb">
    <figure>

        <a href="<?php the_permalink(); ?>" >
                   <?php

				$thumb_id = get_post_thumbnail_id( $wp_query->ID );
				$thumb_meta = wp_get_attachment_metadata( $thumb_id );
 				if ( ! empty( $thumb_id ) ) {
					  
						$thumb = wp_get_attachment_image_src( $thumb_id, $img_thumb );
						$url = $thumb['0'];
					 
					echo '<img class="owl-lazy"  src="' . esc_url( $url ) . '" />';
				} else {
					echo '<img class="owl-lazy" src="' . get_template_directory_uri() . '/assets/images/default-image.jpg" />';
				}
				?>                      
        </a>
         </figure>           
    </div>
    <div class="featured-o">
        <div class="featured-o-title"><?php the_title(); ?></div>
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"> <?php the_author(); ?></a>
         <span class="tp-post-item-date"><?php echo get_the_date(  ); ?></span>
    </div>
</div>          
<?php $counter++; endwhile;?>
                  

 
</div><!-- End .featured-wrap -->
<div class="clear"></div>










        <?php
    } else {
        get_template_part( 'template-parts/content', 'none' );
    }
    wp_reset_postdata();
}