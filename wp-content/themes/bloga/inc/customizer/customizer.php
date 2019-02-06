<?php
/**
 * bfastmag Theme Customizer.
 *
 * @package WordPress
 * @subpackage bfastmag
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bfastmag_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->default   = '#333';
	$wp_customize->get_control( 'header_textcolor' )->label     = __( 'Text color', 'bfastmag' );
	$wp_customize->get_control( 'header_textcolor' )->priority  = 2;
	$wp_customize->remove_control( 'background_color' );
	$wp_customize->get_control( 'custom_logo' )->section = 'bfastmag_appearance_general_logo';
	$wp_customize->get_control( 'blogname' )->section = 'title_tagline2';
	$wp_customize->get_control( 'blogdescription' )->section = 'title_tagline2';
	$wp_customize->get_control( 'site_icon' )->section = 'title_tagline2';
	$wp_customize->get_control( 'header_text' )->section = 'title_tagline2';


	$wp_customize->add_section( 'bfastmag_theme_info', array(
		'title'    => __( 'Getting Started', 'bfastmag' ),
		'priority' => 0,
	) );
 
	$wp_customize->add_setting( 'bfastmag_theme_info', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new bfastmag_Info( $wp_customize, 'bfastmag_theme_info', array(
		'section'  => 'bfastmag_theme_info',
		'priority' => 10,
	) ) );

	/**
	 *****************************
	 *********** Panels ***********
	 */

	$wp_customize->add_panel( 'general_panel', array(
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'title'      => esc_html__( 'General Options', 'bfastmag' ),
	) );	

	$wp_customize->add_panel( 'featured_panel', array(
		'priority'   => 35,
		'capability' => 'edit_theme_options',
		'title'      => esc_html__( 'Featured Blocks', 'bfastmag' ),
	) );

	$wp_customize->add_panel( 'sections_panel', array(
		'priority'   => 36,
		'capability' => 'edit_theme_options',
		'title'      => esc_html__( 'HomePage Blocks', 'bfastmag' ),
	) );

	$wp_customize->add_panel( 'social_links_panel', array(
		'priority'   => 40,
		'capability' => 'edit_theme_options',
		'title'      => esc_html__( 'Social Links', 'bfastmag' ),
	) );


 
 

	$wp_customize->add_section( 'bfastmag_featured_big', array(
		'title'    => esc_html__( 'Featured Home Big Grid', 'bfastmag' ),
		'priority' => 1,
		'panel'    => 'featured_panel',
	) );
	$wp_customize->add_section( 'bfastmag_featured_slider', array(
		'title'    => esc_html__( 'Featured Home Slider', 'bfastmag' ),
		'priority' => 1,
		'panel'    => 'featured_panel',
	) );

 
 

	$wp_customize->add_section( 'title_tagline2', array(
		'title'    => esc_html__( 'Site Identity', 'bfastmag' ),
		'priority' => 1,
		'panel'    => 'general_panel',
	) );

	$wp_customize->add_section( 'bfastmag_appearance_general_logo', array(
		'title'       => esc_html__( 'Logo', 'bfastmag' ),
		'description' => esc_html__( 'Set Logo', 'bfastmag' ),
		'priority'    => 2,
		'panel'       => 'general_panel',
	) );

	$wp_customize->add_section( 'bfastmag_appearance_general', array(
		'title'       => esc_html__( 'Sticky Menu', 'bfastmag' ),
		'description' => esc_html__( 'Disable Sticky Navigation Menu', 'bfastmag' ),
		'priority'    => 2,
		'panel'       => 'general_panel',
	) );

	$wp_customize->add_section( 'bfastmag_appearance_general', array(
		'title'       => esc_html__( 'Sticky Menu', 'bfastmag' ),
		'description' => esc_html__( 'Disable Sticky Navigation Menu', 'bfastmag' ),
		'priority'    => 2,
		'panel'       => 'general_panel',
	) );

 

	$wp_customize->add_section( 'bfastmag_block1', array(
		'title'    => esc_html__( 'Block 1', 'bfastmag' ),
		'priority' => 1,
		'panel'    => 'sections_panel',
	) );

	$wp_customize->add_section( 'bfastmag_block2', array(
		'title'    => esc_html__( 'Block 2', 'bfastmag' ),
		'priority' => 2,
		'panel'    => 'sections_panel',
	) );

	$wp_customize->add_section( 'bfastmag_block3', array(
		'title'    => esc_html__( 'Block 3', 'bfastmag' ),
		'priority' => 3,
		'panel'    => 'sections_panel',
	) );

	$wp_customize->add_section( 'bfastmag_block4', array(
		'title'    => esc_html__( 'Block 4', 'bfastmag' ),
		'priority' => 4,
		'panel'    => 'sections_panel',
	) );

	$wp_customize->add_section( 'bfastmag_block5', array(
		'title'    => esc_html__( 'Block 5', 'bfastmag' ),
		'priority' => 5,
		'panel'    => 'sections_panel',
	) );

	$wp_customize->add_section( 'bfastmag_single_post', array(
		'title'    => __( 'Single post settings', 'bfastmag' ),
		'priority' => 38,
	) );

 
	$wp_customize->add_section( 'static_front_page', array(
	     'title'          => __( 'HomePage Layout', 'bfastmag' ),
 	      'priority'       => 20,
	      'description'    => __( 'Set the Home Page Layout.Your theme supports a static front page.', 'bfastmag' ),
	) );
	$wp_customize->add_section( 'title_tagline', array(
	     'title'          => __( 'General Options' , 'bfastmag' ),
 	      'priority'       => 10,
	      'description'    => __( 'General Options.', 'bfastmag' ),
	) );
 

	/**
	 * Option to get the frontpage settings to the old default template if a static frontpage is selected
	 */
	$wp_customize->add_setting( 'bfastmag_set_original_fp', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => false
	));
	$wp_customize->add_control( 'bfastmag_set_original_fp', array(
		'type' => 'checkbox',
		'label' => esc_html__( 'Use Magazine Style frontpage?','bfastmag' ),
		'section' => 'static_front_page',
		'priority'    => 9,
	));

	/**
	 *****************************
	 ********** Settings ***********
	 */

	$wp_customize->add_setting( 'bfastmag_title_color', array(
		'default'           => apply_filters( 'bfastmag_title_color_default_filter', '#333' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'bfastmag_top_slider_post_title_color', array(
		'default'           => '#ffffff',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );
 

	$wp_customize->add_setting( 'bfastmag_blocks_post_title_color', array(
		'default'           => apply_filters( 'bfastmag_blocks_post_title_color_default_filter', '#333' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

 

	$wp_customize->add_setting( 'bfastmag_social_links', array(
		'transport'         => 'postMessage',
		'sanitize_callback' => 'bfastmag_sanitize_repeater',
	) );

	$wp_customize->add_setting( 'bfastmag_sticky_menu', array(
		'default'           => false,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'bfastmag_featured_big_disable', array(
		'default'            => false,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'bfastmag_featured_big_category', array(
		'default'           => 'all',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'bfastmag_sanitize_category_dropdown',
	) );

 	$wp_customize->add_setting( 'bfastmag_featured_slider_disable', array(
		'default'            => false,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'bfastmag_featured_slider_category', array(
		'default'           => 'all',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'bfastmag_sanitize_category_dropdown',
	) );


		$wp_customize->add_setting( 'bfastmag_featured_slider_title', array(
			'default'           => esc_html__( 'Latest Topics', 'bfastmag' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		) );


	$wp_customize->add_setting( 'bfastmag_featured_slider_max_posts', array(
		'default'           => 6,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	for ( $i = 1; $i <= 4; $i ++ ) {
		$bfastmag_block_name = '';
		switch ( $i ) {
			case 1:
				$bfastmag_block_name = esc_html__( 'Block 1', 'bfastmag' );
				$wp_customize->add_setting( 'bfastmag_block' . $i . '_posts_per_page', array(
					'default'           => 4,
					'transport'         => 'postMessage',
					'sanitize_callback' => 'absint',
				) );
				break;
			case 2:
				$bfastmag_block_name = esc_html__( 'Block 2', 'bfastmag' );
				break;
			case 3:
				$bfastmag_block_name = esc_html__( 'Block 3', 'bfastmag' );
				break;
			case 4:
				$bfastmag_block_name = esc_html__( 'Block 4', 'bfastmag' );
				break;
	
 		}
		$wp_customize->add_setting( 'bfastmag_block' . $i . '_disable', array(
			'default'            => true,
			'sanitize_callback' => 'sanitize_text_field',
		) );

 

		$wp_customize->add_setting( 'bfastmag_block' . $i . '_title', array(
			'default'           => $bfastmag_block_name,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_setting( 'bfastmag_block' . $i . '_category', array(
			'default'           => 'all',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'bfastmag_sanitize_category_dropdown',
		) );

		$wp_customize->add_setting( 'bfastmag_block' . $i . '_max_posts', array(
			'default'           => 6,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		) );
		if($i==1){
				$wp_customize->add_setting( 'bfastmag_block' . $i . '_max_posts', array(
			'default'           => 8,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		) );
		}
	
	}// End for().

	$wp_customize->add_setting( 'bfastmag_disable_single_hide_author', array(
		'defalt'            => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'bfastmag_single_post_hide_related_posts', array(
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_setting( 'bfastmag_disable_singlePost_featured_img', array(
		'default'           => '1',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );
 
 
	/**
	 *****************************
	 ********** Controls ***********
	 */

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bfastmag_title_color', array(
		'label'    => esc_html__( 'Home Blocks, Widget Title color', 'bfastmag' ),
		'section'  => 'colors',
		'priority' => 1,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bfastmag_top_slider_post_title_color', array(
		'label'    => esc_html__( 'Top slider\'s posts title color', 'bfastmag' ),
		'section'  => 'colors',
		'priority' => 3,
	) ) );

 

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bfastmag_blocks_post_title_color', array(
		'label'    => esc_html__( 'Block\'s posts title color', 'bfastmag' ),
		'section'  => 'colors',
		'priority' => 5,
	) ) );
 
 

	$wp_customize->add_control( 'bfastmag_sticky_menu', array(
 		'type'     => 'checkbox',
		'label'    => esc_html__( 'Disable Sticky Menu', 'bfastmag' ),
		'section'  => 'bfastmag_appearance_general',
		'priority' => 2,
	) );

	$wp_customize->add_control( 'bfastmag_featured_big_disable', array(
		'type'     => 'checkbox',
		'label'    => __( 'Disable section', 'bfastmag' ),
		'section'  => 'bfastmag_featured_big',
		'priority' => 1,
	) );

	$wp_customize->add_control( new bfastmagChooseCategory( $wp_customize, 'bfastmag_featured_big_category', array(
		'label'    => esc_html__( 'Category', 'bfastmag' ),
		'section'  => 'bfastmag_featured_big',
		'priority' => 2,
	) ) );

 	$wp_customize->add_control( 'bfastmag_featured_slider_disable', array(
		'type'     => 'checkbox',
		'label'    => __( 'Disable section', 'bfastmag' ),
		'section'  => 'bfastmag_featured_slider',
		'priority' => 1,
	) );

		$wp_customize->add_control( 'bfastmag_featured_slider_title', array(
			'label'    => esc_html__( 'Title', 'bfastmag' ),
			'section'  => 'bfastmag_featured_slider' ,
			'priority' => 3,
		) );

	$wp_customize->add_control( new bfastmagChooseCategory( $wp_customize, 'bfastmag_featured_slider_category', array(
		'label'    => esc_html__( 'Category', 'bfastmag' ),
		'section'  => 'bfastmag_featured_slider',
		'priority' => 2,
	) ) );

	$wp_customize->add_control( 'bfastmag_featured_slider_max_posts', array(
		'label'       => esc_html__( 'Number of posts in this section', 'bfastmag' ),
		'description' => esc_html__( 'To display all posts, set this field to -1.', 'bfastmag' ),
		'section'     => 'bfastmag_featured_slider',
		'type'        => 'number',
		'input_attrs' => array(
			'min' => - 1,
			'step' => 1,
		),
		'priority'    => 3,
	) );

	for ( $i = 1; $i <= 4; $i ++ ) {
		$wp_customize->add_control( 'bfastmag_block' . $i . '_disable', array(
			'type'     => 'checkbox',
			'label'    => __( 'Disable section', 'bfastmag' ),
			'section'  => 'bfastmag_block' . $i,
			'priority' => 1,
		) );

 

		$wp_customize->add_control( 'bfastmag_block' . $i . '_title', array(
			'label'    => esc_html__( 'Title', 'bfastmag' ),
			'section'  => 'bfastmag_block' . $i,
			'priority' => 3,
		) );

		$wp_customize->add_control( new bfastmagChooseCategory( $wp_customize, 'bfastmag_block' . $i . '_category', array(
			'label'    => esc_html__( 'Category', 'bfastmag' ),
			'section'  => 'bfastmag_block' . $i,
			'priority' => 4,
		) ) );

		$wp_customize->add_control( 'bfastmag_block' . $i . '_max_posts', array(
			'label'       => esc_html__( 'Number of posts', 'bfastmag' ),
			'description' => esc_html__( 'To display all posts, set this field to -1.', 'bfastmag' ),
			'section'     => 'bfastmag_block' . $i,
			'type'        => 'number',
			'input_attrs' => array(
				'min' => - 1,
				'step' => 1,
			),
			'priority'    => 5,
		) );

		if ( $i === 1 ) {
			$wp_customize->add_control( 'bfastmag_block' . $i . '_posts_per_page', array(
				'label'       => esc_html__( 'Number of posts in each slide', 'bfastmag' ),
				'section'     => 'bfastmag_block' . $i,
				'type'        => 'number',
				'input_attrs' => array(
					'min' => 1,
					'step' => 1,
				),
				'priority'    => 6,
			) );
		}
	}// End for().

	$wp_customize->add_control( 'bfastmag_disable_single_hide_author', array(
		'type'        => 'checkbox',
		'label'       => __( 'Hide author\'s description?', 'bfastmag' ),
		'description' => __( 'Check this box to hide the author\'s description Box on single page.', 'bfastmag' ),
		'section'     => 'bfastmag_single_post',
		'priority'    => 1,
	) );

	$wp_customize->add_control( 'bfastmag_single_post_hide_related_posts', array(
		'type'        => 'checkbox',
		'label'       => __( 'Hide related posts?', 'bfastmag' ),
		'description' => __( 'Check this box to remove Related posts on single page.', 'bfastmag' ),
		'section'     => 'bfastmag_single_post',
		'priority'    => 2,
	) );

	$wp_customize->add_control( 'bfastmag_disable_singlePost_featured_img', array(
		'type'        => 'checkbox',
		'label'       => __( 'Hide Featured Image on single page?', 'bfastmag' ),
		'description' => __( 'Check this box to hide Featured Image on single page.', 'bfastmag' ),
		'section'     => 'bfastmag_single_post',
		'priority'    => 3,
	) );

 
 

}

add_action( 'customize_register', 'bfastmag_customize_register' );


/**
 * Sanitize repeater
 *
 * @param object $input Json array.
 *
 * @return mixed|string|void
 */
function bfastmag_sanitize_repeater( $input ) {
	$input_decoded = json_decode( $input, true );
	if ( ! empty( $input_decoded ) ) {
		foreach ( $input_decoded as $boxk => $box ) {
			foreach ( $box as $key => $value ) {
				$input_decoded[ $boxk ][ $key ] = wp_kses_post( force_balance_tags( $value ) );
			}
		}

		return json_encode( $input_decoded );
	}

	return $input;
}

/**
 * Sanitize dropdown.
 *
 * @param string $input Category slug.
 *
 * @return string
 */
function bfastmag_sanitize_category_dropdown( $input ) {
	$cat = get_category_by_slug( $input );
	if ( empty( $cat ) ) {
		return 'all';
	}

	return $input;
}

/**
 * Sanitize banner.
 *
 * @param object $input Banner input.
 *
 * @return mixed|string
 */
function bfastmag_sanitize_banner( $input ) {
	$input_decoded = json_decode( $input, true );

	$choice   = $input_decoded['choice'];
	$position = $input_decoded['position'];
	$code     = html_entity_decode( $input_decoded['code'] );
	$link     = $input_decoded['link'];
	$image    = $input_decoded['image_url'];

	$banner_type = array( 'code', 'image' );
	if ( ! in_array( $choice, $banner_type ) ) {
		$input_decoded['choice'] = 'image';
	}

	$banner_position = array( 'right', 'center', 'left' );
	if ( ! in_array( $position, $banner_position ) ) {
		$input_decoded['position'] = 'center';
	}

	$allowed_html = array(
		'a'      => array(
			'href'   => array(),
			'class'  => array(),
			'id'     => array(),
			'target' => array(),
		),
		'img'    => array(
			'src'    => array(),
			'alt'    => array(),
			'title'  => array(),
			'width'  => array(),
			'height' => array(),
		),
		'iframe' => array(
			'src'               => array(),
			'width'             => array(),
			'height'            => array(),
			'seamless'          => array(),
			'scrolling'         => array(),
			'frameborder'       => array(),
			'allowtransparency' => array(),
		),
	);

	$string                = force_balance_tags( $code );
	$input_decoded['code'] = wp_kses( $string, $allowed_html );

	$input_decoded['link']  = esc_url( $link );
	$input_decoded['image'] = esc_url( $image );

	return json_encode( $input_decoded );
}

 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bfastmag_customize_preview_js() {
	wp_enqueue_script( 'bfastmag_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '1.0.5', true );
	wp_localize_script( 'bfastmag_customizer', 'get_post_aj', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),

	) );
}

add_action( 'customize_preview_init', 'bfastmag_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function bfastmag_customizer_panels_js() {

	wp_enqueue_style( 'bfastmag-fontawesome-admin', get_template_directory_uri() . '/assets/css/font-awesome.min.css',array(), '4.6.3' );

	wp_enqueue_script( 'bfastmag-customize-controls', get_template_directory_uri() . '/assets/js/bfastmag-customize-controls.js', array( 'jquery', 'jquery-ui-draggable' ), '1.0.2', true );

	wp_enqueue_style( 'bfastmag-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css','1.0.0' );

}
add_action( 'customize_controls_enqueue_scripts', 'bfastmag_customizer_panels_js' );