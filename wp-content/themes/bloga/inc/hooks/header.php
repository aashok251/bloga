<?php


if ( ! function_exists( 'bfastmag_doctype' ) ) :
/**
 * Doctype Declaration
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_doctype() {
    ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<?php
}
endif;
add_action( 'bfastmag_action_before_head', 'bfastmag_doctype', 10 );

if ( ! function_exists( 'bfastmag_before_wp_head' ) ) :
/**
 * Before wp head codes
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_before_wp_head() {
    ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
}
endif;
add_action( 'bfastmag_action_before_wp_head', 'bfastmag_before_wp_head', 10 );
 

if ( ! function_exists( 'bfastmag_page_start' ) ) :
/**
 * page start
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_page_start() {
?>
 <div id="page" class="site">
    <div id="wrapper" class="boxed">
<?php
}
endif;
add_action( 'bfastmag_action_page_start', 'bfastmag_page_start', 15 );

if ( ! function_exists( 'bfastmag_skip_to_content' ) ) :
/**
 * Skip to content
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_skip_to_content() {
    ?>
    <a class="skip-link screen-reader-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'bfastmag' ); ?>"><?php esc_html_e( 'Skip to content', 'bfastmag' ); ?></a>
<?php
}
endif;
add_action( 'bfastmag_action_header_links', 'bfastmag_skip_to_content', 10 );


  
if ( ! function_exists( 'bfastmag_header' ) ) :
/**
 * Main header
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_header() {
     ?>
        <header id="header" class="site-header tp_header_v2" role="banner">
            <div  class="navbar-top container-fluid">

                <?php bfastmag_action_inner_navbar_top(); ?>

                <div class="navbar-left social-links">
                 </div>
                
              
         <span class="breaking"><?php _e( 'Trending', 'bfastmag' );?></span>
         <div class="bfastmag-breaking-container"><ul class="bfastmag-breaking">
              <?php
                            $wp_query = new WP_Query( array(
                //'posts_per_page'        => $bfastmag_featured_slider_max_posts,
                'posts_per_page'        => 4,
                'order'                 => 'DESC',
                'post_status'           => 'publish',
             ) );

               while ( $wp_query->have_posts() ) : $wp_query->the_post();
                   ?>
                   <li>
                      <?php the_title( sprintf( ' <a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>', apply_filters( 'bfastmag_filter_article_title_on_slider_posts',true ) ); ?>
      
                    </li> 
                   <?php
               endwhile;
                ?></ul>
        </div>   <!-- .bfastmag-breaking-container -->

                <div class="navbar-right">
                  <div id="navbar" class="navbar">
                            <nav id="navigation-top" class="navigation-top" role="navigation">
                                <button class="menu-toggle"><i class="fa fa-bars"></i></button>

                                <?php bfastmag_action_header_links();
                                if ( has_nav_menu( 'bfastmag-top' ) ) {
                                        wp_nav_menu( array(
                                        'theme_location' => 'bfastmag-top',
                                        'menu_class' => 'nav-menu',
                                        'menu_id' => 'primary-menu',
                                        'depth' => 1,
                                                ) );  
                                    } 
                                    ?>
                            </nav><!-- #navigation-top -->
                    </div>
                    <div class="tp_time_date"><i class="fa fa-calendar-o"></i><span><?php  echo date(get_option('date_format'));?></span></div>
                </div>

                <?php bfastmag_after_navbar_top();?>

            </div>

            <div class="inner-header clearfix">
                
                <?php bfastmag_action_inner_header(); ?>

                <div class="col-md-3 col-sm-3 col-xs-12 navbar-brand">
                  <div class="site-branding">
                    <?php
 
                    if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) :

                        the_custom_logo();

                        echo '<div class="head-logo-container text-header bfastmag_customizer_only">';
                        echo '<h1 itemprop="headline" id="site-title" class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
                        echo '<p itemprop="description" id="site-description" class="site-description">' . esc_attr( get_bloginfo( 'description' ) ) . '</p>';
                        echo '</div>';

                        else :
  
                             echo '<div class="head-logo-container text-header">';
                            echo '<h1 itemprop="headline" id="site-title" class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a></h1>';
                            echo '<p itemprop="description" id="site-description" class="site-description">' . esc_attr( get_bloginfo( 'description' ) ) . '</p>';
                            echo '</div>';

                        endif;
                    ?>
                    </div><!-- .site-branding -->
                </div>
            
                <div class="col-xs-12  col-sm-9 col-md-9 bfastmag-a-d-v">
                    <?php
                    if ( is_active_sidebar( 'bfastmag-header-ad' ) ) {
                        dynamic_sidebar( 'bfastmag-header-ad' );
                    }?>
                </div>

                <?php bfastmag_action_after_inner_header(); ?>

            </div> <!--.inner-header-->

            <?php bfastmag_action_before_main_nav(); ?>

            <?php $bfastmag_sticky_menu = get_theme_mod( 'bfastmag_sticky_menu', false ); ?>

            <div id="navbar" class="navbar <?php if ( isset( $bfastmag_sticky_menu ) && $bfastmag_sticky_menu == false ) { echo 'bfastmag-sticky';} ?>">

              <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                <button class="menu-toggle"><i class="fa fa-bars"></i></button>
                 <button type="button" class="navbar-btn nav-mobile"><i class="fa fa-search"></i></button>
                <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'bfastmag' ); ?>"><?php _e( 'Skip to content', 'bfastmag' ); ?></a>

                <?php 
                    
                                 wp_nav_menu( array(
                                    'theme_location' => 'bfastmag-primary',
                                    'menu_class' => 'nav-menu',
                                    'menu_id' => 'primary-menu',
                                    'depth' => 6,
                                ) );
                          ?>

                <button type="button" class="navbar-btn nav-desktop"><i class="fa fa-search"></i></button>

                <div class="navbar-white top" id="header-search-form">
                    <?php get_search_form(); ?>
                </div><!-- End #header-search-form -->

              </nav><!-- #site-navigation -->


            </div><!-- #navbar -->

            <?php bfastmag_action_after_main_nav(); ?>


        </header><!-- End #header -->
 <?php 
}
endif;
add_action( 'bfastmag_action_header', 'bfastmag_header', 10 );

if ( ! function_exists( 'bfastmag_site_content_start' ) ) :
/**
 * page start
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_site_content_start() {
?>
 <div id="content" class="site-content">     

<?php
}
endif;
add_action( 'bfastmag_action_site_content_start', 'bfastmag_site_content_start', 15 );









if ( ! function_exists( 'bfastmag_site_content_end' ) ) :
/**
 * page start
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_site_content_end() {
?>
 </div><!-- #content -->

        <footer id="footer" class="site-footer footer-inverse" role="contentinfo">
<?php
}
endif;
add_action( 'bfastmag_action_site_content_end', 'bfastmag_site_content_end', 10 );
 



if ( ! function_exists( 'bfastmag_page_end' ) ) :
/**
 * page start
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_page_end() {
?>
    </div><!-- #page -->
</div><!-- End #wrapper -->

<?php
}
endif;
add_action( 'bfastmag_action_page_end', 'bfastmag_page_end', 10 );
 




/////front page hooks

if ( ! function_exists( 'bfastmag_home_slider' ) ) :
/**
 * page start
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_home_slider(){


 get_template_part( 'template-parts/featured-big', get_post_format() );



?>
 
<?php

$bfastmag_featured_slider_disable = (bool) get_theme_mod( 'bfastmag_featured_slider_disable', false );
$bfastmag_featured_slider_category = esc_attr( get_theme_mod( 'bfastmag_featured_slider_category', 'all' ) );
$bfastmag_featured_slider_max_posts = esc_attr( get_theme_mod( 'bfastmag_featured_slider_max_posts', '6' ) );
 
$wp_query = new WP_Query( array(
    'posts_per_page'        => $bfastmag_featured_slider_max_posts,
    'order'                 => 'DESC',
    'post_status'           => 'publish',
    'category_name'         => ( ! empty( $bfastmag_featured_slider_category ) && $bfastmag_featured_slider_category != 'all' ? $bfastmag_featured_slider_category : '' ),
) );

$bfastmag_block_title = get_theme_mod( 'bfastmag_featured_slider_title', esc_html__( 'Latest Topics', 'bfastmag' ) );

if ( (bool) $bfastmag_featured_slider_disable !== true ) {
    if ( $wp_query->have_posts() ) { ?>

        <div class="bfastmag-featured-slider ">

           <?php     if ( ! empty( $bfastmag_block_title ) ) { ?>
            <h2 class="title-border title-bg-line mb30">
                <span><?php echo esc_attr( $bfastmag_block_title ); ?><span class="line"></span></span>
            </h2>
            <?php
        }  ?>
            <div class="owl-carousel bfastmag-top-carousel">
                <?php
                while ( $wp_query->have_posts() ) : $wp_query->the_post();
                    get_template_part( 'template-parts/slider-posts', get_post_format() );
                endwhile;
                ?>
            </div><!-- End .bfastmag-top-carousel -->
        </div><!-- End .bfastmag-featured-slider -->

        <?php
    } else {
        get_template_part( 'template-parts/content', 'none' );
    }
    wp_reset_postdata();
}


}
endif;
add_action( 'bfastmag_action_front_page', 'bfastmag_home_slider', 10 );


if ( ! function_exists( 'bfastmag_content_bloc_start' ) ) :
/**
 * page start
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_home_content_bloc_start(){

    $bfast_lo_class = 'col-md-9';
    if ( ! is_active_sidebar( 'bfastmag-sidebar' ) ) {
        $bfast_lo_class = 'col-md-12';
    }
?>
    <div class="container">
        <div class="row">

            <div class="bfastmag-content-left <?php echo $bfast_lo_class;?>">
<?php

}
endif;
add_action( 'bfastmag_action_content_bloc_start', 'bfastmag_home_content_bloc_start', 40 );


if ( ! function_exists( 'bfastmag_content_bloc_end' ) ) :
/**
 * page start
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_home_content_bloc_end(){
?>
             </div><!-- End .bfastmag-content-left -->
             <?php get_sidebar(); ?>
        </div><!-- End .row -->
    </div><!-- End .container -->
<?php
}
endif;
add_action( 'bfastmag_action_content_bloc_end', 'bfastmag_home_content_bloc_end', 40 );

 
if ( ! function_exists( 'bfastmag_content_bloc' ) ) :
/**
 * page start
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
function bfastmag_home_content_bloc(){
$bfastmag_block1_disable = (bool) get_theme_mod( 'bfastmag_block1_disable', false );
$bfastmag_block2_disable = (bool) get_theme_mod( 'bfastmag_block2_disable', false );
$bfastmag_block3_disable = (bool) get_theme_mod( 'bfastmag_block3_disable', false );
$bfastmag_block4_disable = (bool) get_theme_mod( 'bfastmag_block4_disable', false );
$bfastmag_block5_disable = (bool) get_theme_mod( 'bfastmag_block5_disable', false );


                 if ( ! $bfastmag_block1_disable ) {
                    bfastmag_show_block( 1 );
                }


                 if ( ! $bfastmag_block2_disable ) {
                    bfastmag_show_block( 2 );
                }

                 if ( ! $bfastmag_block3_disable ) {
                    bfastmag_show_block( 3 );
                }

                 if ( ! $bfastmag_block4_disable ) {
                    bfastmag_show_block( 4 );
                }

            
    
}
endif;
add_action( 'bfastmag_action_content_bloc', 'bfastmag_home_content_bloc', 40 );