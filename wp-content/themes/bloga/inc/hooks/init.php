<?php
/**
 * Implement Editor Styles
 *
 * @since bfastmag 1.0.0
 *
 * @param null
 * @return null
 *
 */
add_action( 'init', 'bfastmag_add_editor_styles' );

if ( ! function_exists( 'bfastmag_add_editor_styles' ) ) :
    function bfastmag_add_editor_styles() {
        add_editor_style( 'editor-style.css' );
    }
endif;
