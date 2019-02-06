<?php

if( ! function_exists( 'bfastmag_inline_style' ) ) :

    /**
     * bfastmag wp_head hook
     *
     * @since  bfastmag 1.0.0
     */
    function bfastmag_inline_style(){
 
        echo '<style type="text/css">';

    $bfastmag_title_color = esc_attr( get_theme_mod( 'bfastmag_title_color',apply_filters( 'bfastmag_title_color_default_filter','#333' ) ) );
    if ( ! empty( $bfastmag_title_color ) ) {
        echo '.title-border span { color: ' . $bfastmag_title_color . ' }';
         echo '.page-header h1 { color: ' . $bfastmag_title_color . ' }';
    }

    $bfastmag_sidebar_textcolor = esc_attr( get_theme_mod( 'header_textcolor',apply_filters( 'bfastmag_header_textcolor_default_filter','#181818' ) ) );
    if ( ! empty( $bfastmag_sidebar_textcolor ) ) {
        echo '.sidebar .widget li a, .bfastmag-content-right, .bfastmag-content-right a, .post .entry-content, .post .entry-content p,
         .post .entry-cats, .post .entry-cats a, .post .entry-comments', '.post .entry-separator, .post .entry-footer a,
         .post .entry-footer span, .post .entry-footer .entry-cats, .post .entry-footer .entry-cats a, .author-content { color: ' . $bfastmag_sidebar_textcolor . '}';
    }

    $bfastmag_top_slider_post_title_color = esc_attr( get_theme_mod( 'bfastmag_top_slider_post_title_color','#ffffff' ) );
    if ( ! empty( $bfastmag_top_slider_post_title_color ) ) {
        echo '.bfastmag-featured-slider .tp-item-block .tp-post-item-meta .entry-title a { color: ' . $bfastmag_top_slider_post_title_color . ' }';
    }

    $bfastmag_top_slider_post_text_color = esc_attr( get_theme_mod( 'bfastmag_top_slider_post_text_color','#ffffff' ) );
    if ( ! empty( $bfastmag_top_slider_post_text_color ) ) {
        echo '.bfastmag-featured-slider .tp-post-item-meta .tp-post-item-date { color: ' . $bfastmag_top_slider_post_text_color . ' }';
        echo '.bfastmag-featured-slider .tp-post-item-meta .entry-separator { color: ' . $bfastmag_top_slider_post_text_color . ' }';
        echo '.bfastmag-featured-slider .tp-post-item-meta > a { color: ' . $bfastmag_top_slider_post_text_color . ' }';
    }

    $bfastmag_blocks_post_title_color = esc_attr( get_theme_mod( 'bfastmag_blocks_post_title_color',apply_filters( 'bfastmag_blocks_post_title_color_default_filter','#333' ) ) );
    if ( ! empty( $bfastmag_blocks_post_title_color ) ) {
        echo '.home.blog .bfastmag-content-left .entry-title a, .bfastmag-related-posts .entry-title a { color: ' . $bfastmag_blocks_post_title_color . ' }';
    }

    $bfastmag_blocks_post_text_color = esc_attr( get_theme_mod( 'bfastmag_blocks_post_text_color',apply_filters( 'bfastmag_blocks_post_text_color_default_filter','#333' ) ) );
    if ( ! empty( $bfastmag_blocks_post_text_color ) ) {
        echo '.bfastmag-content-left .entry-meta, .bfastmag-content-left .bfastmag-related-posts .entry-content p,
        .bfastmag-content-left .bfastmag-related-posts .entry-cats .entry-label, .bfastmag-content-left .bfastmag-related-posts .entry-cats a,
        .bfastmag-content-left .bfastmag-related-posts > a, .bfastmag-content-left .bfastmag-related-posts .entry-footer > a { color: ' . $bfastmag_blocks_post_text_color . ' }';
        echo '.bfastmag-content-left .entry-meta a { color: ' . $bfastmag_blocks_post_text_color . ' }';
    }

    echo '</style>';
      
     
    }
endif;