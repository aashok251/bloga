<?php
/**
 * Define all the theme hooks.
 *
 * @package WordPress
 * @subpackage bfastmag
 */



/**
 * Hook at the before head of top bar.
 */
function bfastmag_action_before_head() {
	do_action( 'bfastmag_action_before_head' );
}


/**
 * Hook at the before wp_head 
 */
function bfastmag_action_before_wp_head() {
	do_action( 'bfastmag_action_before_wp_head' );
}

 

/**
 * Hook at the beginning the page content wrap.
 */
function bfastmag_action_page_start() {
	do_action( 'bfastmag_action_page_start' );
}


/**
 * Hook at the beginning the page content wrap.
 */
function bfastmag_action_header() {
	do_action( 'bfastmag_action_header' );
}

/**
 * Hook at the beginning of top bar.
 */
function bfastmag_action_inner_navbar_top() {
	do_action( 'bfastmag_action_inner_navbar_top' );
}

/**
 * Hook at the end of top bar.
 */
function bfastmag_after_navbar_top() {
	do_action( 'bfastmag_after_navbar_top' );
}

/**
 * Hook at the beginning of header.
 */
function bfastmag_action_inner_header() {
	do_action( 'bfastmag_action_inner_header' );
}

/**
 * Hook at the end of header.
 */
function bfastmag_action_after_inner_header() {
	do_action( 'bfastmag_action_after_inner_header' );
}

/**
 *  Hook before main navigation.
 */
function bfastmag_action_before_main_nav() {
	do_action( 'bfastmag_action_before_main_nav' );
}

/**
 *  Hook after main navigation.
 */
function bfastmag_action_after_main_nav() {
	do_action( 'bfastmag_action_after_main_nav' );
}

/**
 *  Hook add header links skip to content
 */
function bfastmag_action_header_links() {
	do_action( 'bfastmag_action_header_links' );
}

/**
 *  Hook at the beginning of footer container.
 */
function bfastmag_action_footer_container_start() {
	do_action( 'bfastmag_action_footer_container_start' );
}



/**
 * Hook at the beginning site content wrap.
 */
function bfastmag_action_site_content_start() {
	do_action( 'bfastmag_action_site_content_start' );
}



/**
 * Hook at the beginning site content wrap.
 */
function bfastmag_action_site_content_end() {
	do_action( 'bfastmag_action_site_content_end' );
}


/**
 *  Hook at the end of footer widgets.
 */
function bfastmag_action_widget_before_footer() {
	do_action( 'bfastmag_action_widget_before_footer' );
}


/**
 *  Hook at the end of footer container.
 */
function bfastmag_action_footer_container_end() {
	do_action( 'bfastmag_action_footer_container_end' );
}

/**
 *  Hook for footer content.
 */
function bfastmag_action_footer_content() {
	do_action( 'bfastmag_action_footer_content' );
}

/**
 *  Hook for comments title
 */
function bfastmag_comments_title() {
	do_action( 'bfastmag_comments_title' );
}

/**
 * Hook for comments content.
 *
 * @param array                 $args                     Comment arguments.
 * @param integer/string/object $comment  Author’s User ID (an integer or string), an E-mail Address (a string) or the comment object from the comment loop.
 * @param int                   $depth                      Depth of comments.
 * @param string                $add_below               For the JavaScript addComment.moveForm() method parameters.
 */
function bfastmag_comment_content( $args, $comment, $depth, $add_below ) {
	do_action( 'bfastmag_comment_content', $args, $comment, $depth, $add_below );
}

/**
 * Hook for footer on content.php
 */
function bfastmag_content_footer() {
	do_action( 'bfastmag_entry_footer' );
}

/**
 * Hook for date format.
 */
function bfastmag_entry_date() {
	do_action( 'bfastmag_entry_date' );
}

/**
 * Hook for date format.
 */
function bfastmag_action_page_end() {
	do_action( 'bfastmag_action_page_end' );
}

/**
 * At the top of the slider posts
 */
function bfastmag_top_slider_posts_trigger() {
	do_action( 'bfastmag_top_slider_posts' );
}

/**
 * At the bottom of the slider posts
 */
function bfastmag_bottom_slider_posts_trigger() {
	do_action( 'bfastmag_bottom_slider_posts' );
}

/**
 * At the bottom of the slider posts
 */
function bfastmag_action_front_page() {
	do_action( 'bfastmag_action_front_page' );
}

/**
 * At the content block start
 */
function bfastmag_action_content_bloc_start() {
	do_action( 'bfastmag_action_content_bloc_start' );
}

/**
 * At the content blocks  
 */
function bfastmag_action_content_bloc() {
	do_action( 'bfastmag_action_content_bloc' );
}

/**
 * At the content block end
 */
function bfastmag_action_content_bloc_end() {
	do_action( 'bfastmag_action_content_bloc_end' );
}
