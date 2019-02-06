<?php
 
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package bfastmag
 */

/**
 * Home Icon Menu
 */

add_filter( 'wp_nav_menu_items', 'bfastmag_custom_menu_filter', 10, 2 );
function bfastmag_custom_menu_filter( $items, $args ) {
    /**
     * If menu primary menu is set.
     */
    if ( $args->theme_location == 'bfastmag-primary' ) {        

        $home = '<li class="menu-item menu-item-home menu-item-home-icon"><a href="' . esc_url( home_url( '/' ) ) . '" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'"><i class="fa fa-home" aria-hidden="true"></i></a></li>';
        $items = $home . $items;
    }

    return $items;
}


/**
 * Sets the Magazine Template Instead of front-page.
 */
function bfastmag_fp_template_set( $template ) {
	$bfastmag_set_original_fp = get_theme_mod( 'bfastmag_set_original_fp' ,false);
	if ( $bfastmag_set_original_fp ) {
		return is_home() ? '' : $template;
	} else {
		return '';
	}
}
add_filter( 'frontpage_template', 'bfastmag_fp_template_set' );


/**
 *  Excerpt
 **/
function bfastmag_excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit);
}


add_filter('wp_list_categories', 'bfastmag_cat_count_span');
function bfastmag_cat_count_span($links) {
  $links = str_replace('</a> (', ' <span>', $links);
  $links = str_replace(')', '</span></a>', $links);
  return $links;
}

/**
 * Callback function for comment form
 **/
function bfastmag_comment( $comment, $args, $depth ) {
 	if ( 'div' === $args['style'] ) {
		$tag       = 'div ';
		$add_below = 'comment bfast-mag-comment';
	} else {
		$tag       = 'li ';
		$add_below = 'div-comment bfast-mag-comment';
	}
	?>
	<<?php echo $tag ?><?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' !== $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>

	<?php
	bfastmag_comment_content( $args, $comment, $depth, $add_below ); ?>

	<?php if ( 'div' !== $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}



add_action( 'wp_ajax_nopriv_get_post_aj_act', 'bfastmag_get_post_aj' );
add_action( 'wp_ajax_get_post_aj_act', 'bfastmag_get_post_aj' );

$bfastmag_block1_category = '';


/*<h3 class="title-border   title-bg-line"><span> 				<a href=""> Recent Posts</a>
			<span class="line"></span></span></h3>
*/

/**
 * Heading of comments.
 */
function bfastmag_comments_heading() {
	$comments_number = get_comments_number();
	if ( 1 === $comments_number ) {
		/* translators: %s: post title */
		printf( _x( ' %1$s Comment', 'comments title','bfastmag' ),'<span>'.number_format_i18n( $comments_number ) );
	} else {
		printf(
			/* translators: 1: number of comments */
			_nx(
				'%1$s Comment',
				'%1$s Comments',
				$comments_number,
				'comments title',
 				'bfastmag'
			),
			'<span>'.number_format_i18n( $comments_number )
 		);
	}
}
add_action( 'bfastmag_comments_title','bfastmag_comments_heading' );

/**
 * Comment action.
 *
 * @param string $args Comment arguments.
 * @param object $comment Comment object.
 * @param int    $depth Comments depth.
 * @param string $add_below  Add bellow comments.
 */
function bfastmag_comment_action( $args, $comment, $depth, $add_below ) {
	?>

	<div class="comment-author vcard">
		<?php
		if ( $args['avatar_size'] != 0 ) {
			echo get_avatar( $comment, $args['avatar_size'] );
		} ?>
		<?php /* translators: 1- comment author link, 2 - comment date, 3 - comment time */ printf( __( '<h4 class="media-heading">%1$s</h4><a href="%4$s"><span class="comment-date">(%2$s - %3$s)</span></a>','bfastmag' ), get_comment_author_link(), get_comment_date(),  get_comment_time(),get_comment_link() ); ?><?php edit_comment_link( __( '(Edit)','bfastmag' ), '  ', '' ); ?>

	</div>


	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bfastmag' ); ?></em>
		<br />
	<?php endif; ?>



	<div class="media-body">
		<?php comment_text(); ?>
			<div class="reply pull-right reply-link"> <?php comment_reply_link( array_merge( $args, array(
			'add_below' => $add_below,
			'depth' => $depth,
			'max_depth' => $args['max_depth'],
		) ) ); ?> </div>
	</div>

	<?php
}
add_action( 'bfastmag_comment_content','bfastmag_comment_action', 10, 5 );


add_filter( 'comment_form_fields', 'bfastmag_move_comment_field_to_bottom' );

/**
 * Move comment field to bottom.
 *
 * @param array $fields Fields of comment form.
 *
 * @return mixed
 */
function bfastmag_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

// for the comment wrapping functions - ensures HTML does not break.
$comment_open_div = 0;

/**
 * Creates an opening div for a bootstrap row.
 *
 * @global int $comment_open_div
 */
add_action( 'comment_form_before_fields', 'bfastmag_before_comment_fields' );

/**
 * Creates an opening div for a bootstrap row.
 *
 * @global int $comment_open_div
 */
function bfastmag_before_comment_fields() {
	global $comment_open_div;
	$comment_open_div = 1;
	echo '<div class="row">';
}

add_action( 'comment_form_after_fields', 'bfastmag_after_comment_fields' );

/**
 * Creates a closing div for a bootstrap row.
 *
 * @global int $comment_open_div
 * @return type
 */
function bfastmag_after_comment_fields() {
	global $comment_open_div;
	if ( $comment_open_div == 0 ) {
		return;
	}
	echo '</div>';
}
 


/**
 * Jetpack Compatibility File.
 *
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 * @link https://jetpack.me/
 *
 * @package bfastmag
 */
function bfastmag_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'bfastmag_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
} // end function bfastmag_jetpack_setup
add_action( 'after_setup_theme', 'bfastmag_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function bfastmag_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
}   




/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bfastmag_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	if ( bfastmag_isprevdem() ) {
		$classes[] = 'prevpac';
	}

	return $classes;
}
add_filter( 'body_class', 'bfastmag_body_classes' );