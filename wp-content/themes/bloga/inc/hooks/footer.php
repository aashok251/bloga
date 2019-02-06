<?php

if ( ! function_exists( 'bfastmag_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function bfastmag_entry_footer() {
        // Hide category and tag text for pages.
        echo '<footer class="entry-footer">';
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */ 
            $categories_list = get_the_category_list();
            if ( $categories_list ) {
                /* translators: Categories list */
                printf( '<span class="cat-links"> %1$s </span>', $categories_list ); // WPCS: XSS OK.
            }
        }

     /* */
            echo '</footer>';
    }
endif;
add_action( 'bfastmag_entry_footer','bfastmag_entry_footer' );

if ( ! function_exists( 'bfastmag_widget_before_footer' ) ) :
/**
 * page start
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_widget_before_footer() {
?>
            <div id="footer-inner">
                <div class="container">
                    <div class="row">

 
                        <?php if ( is_active_sidebar( 'bfastmag-footer-block1' ) ) {  ?>
                                <div itemscope itemtype="http://schema.org/WPSideBar" class="col-md-4 col-sm-12 bfast-footer-widget" id="sidebar-widgets-area-1" aria-label="<?php esc_html_e( 'Widgets Area 1','bfastmag' ); ?>">
                                    <?php dynamic_sidebar( 'bfastmag-footer-block1' ); ?>
                                </div>
                        <?php }

                        if ( is_active_sidebar( 'bfastmag-footer-block2' ) ) {  ?>
                                <div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-2" class="col-md-4 col-sm-12 bfast-footer-widget" aria-label="<?php esc_html_e( 'Widgets Area 2','bfastmag' ); ?>">
                                    <?php dynamic_sidebar( 'bfastmag-footer-block2' ); ?>
                                </div>
                        <?php }

                        if ( is_active_sidebar( 'bfastmag-footer-block3' ) ) {  ?>
                                <div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-3" class="col-md-4 col-sm-12 bfast-footer-widget" aria-label="<?php esc_html_e( 'Widgets Area 3','bfastmag' ); ?>">
                                    <?php dynamic_sidebar( 'bfastmag-footer-block3' ); ?>
                                </div>
                        <?php
                            }
                        ?>

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End #footer-inner -->
<?php
}
endif;
  
add_action( 'bfastmag_action_widget_before_footer', 'bfastmag_widget_before_footer', 10 );










if ( ! function_exists( 'bfastmag_footer_container_start' ) ) :
/**
 * page start
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_footer_container_start() {
?>
<div id="footer-bottom" class="no-bg">
        <div class="container">
              <div class="bfastmag-footer-container">
<?php
}
endif;
add_action( 'bfastmag_action_footer_container_start', 'bfastmag_footer_container_start', 10 );
 


/**
 * Display footer function.
 */
function bfastmag_footer() {
    ?>
    <div class="col-md-6 col-md-push-6 bfastmag-footer-menu">
        <?php

        $defaults = array(
            'theme_location'  => 'bfastmag-footer',
            'fallback_cb'     => false,
            'items_wrap'      => '<ul class="footer-menu" id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 1,
        );

        wp_nav_menu( $defaults );

        ?>
    </div><!-- End .col-md-6 -->
    <div class="col-md-6 col-md-pull-6 poweredby">
        <?php printf(
            /* translators: 1 - Theme name , 2 - WordPress link */
            __( ' %4$s %1$s %5$s  %2$s Powered by %3$s', 'bfastmag' ),
             esc_html__('&copy;  ','bfastmag'),
            sprintf('%s <a href="%1s" title="%2s">%3s</a>',esc_html__( '- Designed By', 'bfastmag' ),  esc_url('https://themepacific.com/bfastmag/'),esc_attr__( 'Free bfast News Magazine WordPress Theme', 'bfastmag' ), esc_html__( 'BfastMag', 'bfastmag' ) ),
            sprintf( '<a href="https://wordpress.org/">%s</a>', esc_html__( 'WordPress', 'bfastmag' )),
            get_bloginfo( 'name' ),
            date( 'Y' )
        ); ?>
    </div><!-- End .col-md-6 -->
    <?php
}
add_action( 'bfastmag_action_footer_content','bfastmag_footer' );


if ( ! function_exists( 'bfastmag_footer_container_end' ) ) :
/**
 * page start
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_footer_container_end() {
?>
                </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End #footer-bottom -->
        </footer><!-- End #footer -->
    <?php
}
endif;
add_action( 'bfastmag_action_footer_container_end', 'bfastmag_footer_container_end', 10 );

