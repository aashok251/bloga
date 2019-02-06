<?php
/**
 * Welcome Screen Class
 */
class bfastmag_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'bfastmag_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'bfastmag_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'bfastmag_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'bfastmag_welcome_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'bfastmag_welcome', array( $this, 'bfastmag_welcome_getting_started' ),10 );
		add_action( 'bfastmag_welcome', array( $this, 'bfastmag_welcome_required_actions' ),20 );
		add_action( 'bfastmag_welcome', array( $this, 'bfastmag_welcome_contribute' ),30 );
		add_action( 'bfastmag_welcome', array( $this, 'bfastmag_welcome_changelog' ),40 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_bfastmag_dismiss_required_action', array( $this, 'bfastmag_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_bfastmag_dismiss_required_action', array($this, 'bfastmag_dismiss_required_action_callback') );

	}

	/**
	 * Creates the page in WP Dashboard
	 * @see  add_theme_page()
	 * 
	 */
	public function bfastmag_welcome_register_menu() {
		add_theme_page( 'About bfastmag', 'About bfastmag', 'activate_plugins', 'bfastmag-welcome', array( $this, 'bfastmag_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * 
	 */
	public function bfastmag_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'bfastmag_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * 
	 */
	public function bfastmag_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our %2$swelcome page%3$s.', 'bfastmag' ), 'bfastmag', '<a href="' . esc_url( admin_url( 'themes.php?page=bfastmag-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=bfastmag-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php printf( __( 'Get started with %s', 'bfastmag' ), 'bfastmag' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @since  1.0.11
	 */
	public function bfastmag_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_bfastmag-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'bfastmag-welcome-screen-css', get_template_directory_uri() . '/inc/welcome_page/css/welcome.css' );
			wp_enqueue_script( 'bfastmag-welcome-screen-js', get_template_directory_uri() . '/inc/welcome_page/js/welcome.js', array('jquery') );

			global $bfastmag_required_actions;

			$nr_required_actions = 0;

			/* get number of required actions */
			if( get_option('bfastmag_show_required_actions') ):
				$bfastmag_show_required_actions = get_option('bfastmag_show_required_actions');
			else:
				$bfastmag_show_required_actions = array();
			endif;

			if( !empty($bfastmag_required_actions) ):
				foreach( $bfastmag_required_actions as $bfastmag_required_action_value ):
					if(( !isset( $bfastmag_required_action_value['check'] ) || ( isset( $bfastmag_required_action_value['check'] ) && ( $bfastmag_required_action_value['check'] == false ) ) ) && ((isset($bfastmag_show_required_actions[$bfastmag_required_action_value['id']]) && ($bfastmag_show_required_actions[$bfastmag_required_action_value['id']] == true)) || !isset($bfastmag_show_required_actions[$bfastmag_required_action_value['id']]) )) :
						$nr_required_actions++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'bfastmag-welcome-screen-js', 'bfastmagWelcomeScreenObject', array(
				'nr_required_actions' => $nr_required_actions,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','bfastmag' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @since  1.0.11
	 */
	public function bfastmag_welcome_scripts_for_customizer() {

		global $bfastmag_required_actions;

		$nr_required_actions = 0;

		/* get number of required actions */
		if( get_option('bfastmag_show_required_actions') ):
			$bfastmag_show_required_actions = get_option('bfastmag_show_required_actions');
		else:
			$bfastmag_show_required_actions = array();
		endif;

		if( !empty($bfastmag_required_actions) ):
			foreach( $bfastmag_required_actions as $bfastmag_required_action_value ):
				if(( !isset( $bfastmag_required_action_value['check'] ) || ( isset( $bfastmag_required_action_value['check'] ) && ( $bfastmag_required_action_value['check'] == false ) ) ) && ((isset($bfastmag_show_required_actions[$bfastmag_required_action_value['id']]) && ($bfastmag_show_required_actions[$bfastmag_required_action_value['id']] == true)) || !isset($bfastmag_show_required_actions[$bfastmag_required_action_value['id']]) )) :
					$nr_required_actions++;
				endif;
			endforeach;
		endif;

	}

	/**
	 * Dismiss required actions
	 * 
	 */
	public function bfastmag_dismiss_required_action_callback() {

		global $bfastmag_required_actions;

		$bfastmag_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $bfastmag_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($bfastmag_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('bfastmag_show_required_actions') ):

				$bfastmag_show_required_actions = get_option('bfastmag_show_required_actions');

				$bfastmag_show_required_actions[$bfastmag_dismiss_id] = false;

				update_option( 'bfastmag_show_required_actions',$bfastmag_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$bfastmag_show_required_actions_new = array();

				if( !empty($bfastmag_required_actions) ):

					foreach( $bfastmag_required_actions as $bfastmag_required_action ):

						if( $bfastmag_required_action['id'] == $bfastmag_dismiss_id ):
							$bfastmag_show_required_actions_new[$bfastmag_required_action['id']] = false;
						else:
							$bfastmag_show_required_actions_new[$bfastmag_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'bfastmag_show_required_actions', $bfastmag_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * 
	 */
	public function bfastmag_welcome_screen() {
  		?>
  		<div class="wrap bfastmag-admin-page page-bfastmag_titles">
		<h1 class="bfastmag-start-title"><?php esc_html_e( 'Welcome to bfastmag! ','bfastmag'); if( !empty($bfastmag['Version']) ): ?> <sup id="bfastmag-theme-version"><?php echo esc_attr( $bfastmag['Version'] ); ?> </sup><?php endif; ?></h1>
		<ul class="bfastmag-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started','bfastmag'); ?></a></li>
			<li role="presentation" class="bfastmag-req-red-tab"><a href="#required_actions" aria-controls="required_actions" role="tab" data-toggle="tab"><?php esc_html_e( 'Required Actions','bfastmag'); ?></a></li>
			<li role="presentation"><a href="#bfastmag_contri" aria-controls="bfastmag_contri" role="tab" data-toggle="tab"><?php esc_html_e( 'Contribute','bfastmag'); ?></a></li>
			<li role="presentation"><a href="#changelog" aria-controls="changelog" role="tab" data-toggle="tab"><?php esc_html_e( 'Changelog','bfastmag'); ?></a></li>
		</ul>

		<div class="bfastmag-tab-content">

			<?php
			/**
			 * @hooked bfastmag_welcome_getting_started - 10
			 * @hooked bfastmag_welcome_required_actions - 20
			 * @hooked bfastmag_welcome_contribute - 30
			 * @hooked bfastmag_welcome_changelog - 40
			 */
			do_action( 'bfastmag_welcome' ); ?>

		</div>
		</div>
		<?php
	}

	/**
	 * Getting started
	 * 
	 */
	public function bfastmag_welcome_getting_started() {
		
$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="bfastmag-tab-pane active">

	<div class="bfastmag-tab-pane-left">

		<h1 class="bfastmag-about-title"><?php esc_html_e( 'About bfastmag! ','bfastmag'); if( !empty($bfastmag['Version']) ): ?> <sup id="bfastmag-theme-version"><?php echo esc_attr( $bfastmag['Version'] ); ?> </sup><?php endif; ?></h1>

		<p><?php printf( esc_html__( 'Our best Ultra Fast Blog magazine WordPress theme, %s!','bfastmag'), 'bfastmag' ); ?></p>
		<p><?php printf( esc_html__( 'Get the best experience using %1$s and that is why we have created this page with all the necessary informations for you. ThemePacific team hopes that you will enjoy using %1$s, as much as we enjoy creating it.', 'bfastmag' ), 'bfastmag' ); ?>

	</div>

	<hr />

	<div class="bfastmag-tab-pane-center">

		<h1><?php esc_html_e( 'Getting started', 'bfastmag' ); ?></h1>

		<h4><?php esc_html_e( 'Customize everything in a single place.' ,'bfastmag' ); ?></h4>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'bfastmag' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'bfastmag' ); ?></a></p>

	</div>

	<hr />
 
	<div class="bfastmag-tab-pane-center">

		<h1><?php esc_html_e( 'View full documentation', 'bfastmag' ); ?></h1>
		<p><?php printf( esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use %s.', 'bfastmag' ), 'bfastmag' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themepacific.com/bfastmag' ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Read full documentation', 'bfastmag' ); ?></a></p>

	</div>

	<hr />

	<div class="bfastmag-tab-pane-center">
		<h1><?php esc_html_e( 'Recommended plugins', 'bfastmag' ); ?></h1>
	</div>

	<div class="bfastmag-tab-pane-center">

		<!-- Page Builder by SiteOrigin -->
		<h4><?php esc_html_e( 'Tiled Gallery Carousel Without JetPack', 'bfastmag' ); ?></h4>
		<p><?php esc_html_e( 'Create Stylish Gallery with Carousel Like Jetpack', 'bfastmag' ); ?></p>

		<?php if ( is_plugin_active( 'tiled-gallery-carousel-without-jetpack/tiled-gallery.php' ) ) { ?>

				<p><span class="bfastmag-w-activated button"><?php esc_html_e( 'Already activated', 'bfastmag' ); ?></span></p>

			<?php
		}
		else { ?>

				<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=tiled-gallery-carousel-without-jetpack' ), 'install-plugin_tiled-gallery-carousel-without-jetpack' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Tiled Gallery Carousel Without JetPack', 'bfastmag' ); ?></a></p>

			<?php
		}

		?>

		<hr />
  

	</div>

	<div class="bfastmag-clear"></div>

</div><?php
	}

	/**
	 * Actions required
	 * 
	 */
	public function bfastmag_welcome_required_actions() {
		?>

<div id="required_actions" class="bfastmag-tab-pane">

    <h1><?php printf( esc_html__( 'Keep up with %s\'s recommended actions' ,'bfastmag' ), 'bfastmag' ); ?></h1>

    <!-- NEWS -->
    <hr />

	<?php
	global $bfastmag_required_actions;

	if( !empty($bfastmag_required_actions) ):

		/* bfastmag_show_required_actions is an array of true/false for each required action that was dismissed */
		$bfastmag_show_required_actions = get_option("bfastmag_show_required_actions");

		foreach( $bfastmag_required_actions as $bfastmag_required_action_key => $bfastmag_required_action_value ):
			if($bfastmag_show_required_actions[$bfastmag_required_action_value['id']] === false) continue;
			if($bfastmag_required_action_value['check']) continue;
			?>
			<div class="bfastmag-action-required-box">
				<span class="dashicons dashicons-no-alt bfastmag-dismiss-required-action" id="<?php echo $bfastmag_required_action_value['id']; ?>"></span>
				<h4><?php echo $bfastmag_required_action_key + 1; ?>. <?php if( !empty($bfastmag_required_action_value['title']) ): echo $bfastmag_required_action_value['title']; endif; ?></h4>
				<p><?php if( !empty($bfastmag_required_action_value['description']) ): echo $bfastmag_required_action_value['description']; endif; ?></p>
				<?php
					if( !empty($bfastmag_required_action_value['plugin_slug']) ):
						?><p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='.$bfastmag_required_action_value['plugin_slug'] ), 'install-plugin_'.$bfastmag_required_action_value['plugin_slug'] ) ); ?>" class="button button-primary"><?php if( !empty($bfastmag_required_action_value['title']) ): echo $bfastmag_required_action_value['title']; endif; ?></a></p><?php
					endif;
				?>

				<hr />
			</div>
			<?php
		endforeach;
	endif;

	$nr_required_actions = 0;

	/* get number of required actions */
	if( get_option('bfastmag_show_required_actions') ):
		$bfastmag_show_required_actions = get_option('bfastmag_show_required_actions');
	else:
		$bfastmag_show_required_actions = array();
	endif;

	if( !empty($bfastmag_required_actions) ):
		foreach( $bfastmag_required_actions as $bfastmag_required_action_value ):
			if(( !isset( $bfastmag_required_action_value['check'] ) || ( isset( $bfastmag_required_action_value['check'] ) && ( $bfastmag_required_action_value['check'] == false ) ) ) && ((isset($bfastmag_show_required_actions[$bfastmag_required_action_value['id']]) && ($bfastmag_show_required_actions[$bfastmag_required_action_value['id']] == true)) || !isset($bfastmag_show_required_actions[$bfastmag_required_action_value['id']]) )) :
				$nr_required_actions++;
			endif;
		endforeach;
	endif;

	if( $nr_required_actions == 0 ):
		echo '<p>'.__( 'Hooray! There are no required actions for you right now.','bfastmag' ).'</p>';
	endif;
	?>

</div>

		<?php
	}

	/**
	 * Contribute
	 * 
	 */
	public function bfastmag_welcome_contribute() {		
		?>
<div id="bfastmag_contri" class="bfastmag-tab-pane">

	<h1><?php esc_html_e( 'How can I contribute?', 'bfastmag' ); ?></h1>

	<hr/>

	<div class="bfastmag-tab-pane-half bfastmag-tab-pane-first-half">
		<p><strong><?php esc_html_e( 'Found a bug? Want to contribute with a fix or create a new feature?','bfastmag'); ?></strong></p>

		<p><?php esc_html_e( 'Visit Our Contact Page!','bfastmag' ); ?></p>

		<p>
			<a href="<?php echo esc_url( 'https://themepacific.com/contact-us-form/' ); ?>" class="bfastmag_contri-button button button-primary"><?php printf( esc_html__( '%s on Contact Form', 'bfastmag' ), 'bfastmag' ); ?></a>
		</p>
		<hr>
	</div>

	<div class="bfastmag-tab-pane-half">
		<p><strong><?php printf( esc_html__( 'Are you a polyglot? Want to translate %s into your own language?', 'bfastmag' ), 'bfastmag' ); ?></strong></p>

		<p><?php esc_html_e( 'Get involved at WordPress.org.', 'bfastmag' ); ?></p>

		<p>
			<a href="<?php echo esc_url( 'https://translate.wordpress.org/projects/wp-themes/bfastmag' ); ?>" class="translate-button button button-primary"><?php printf( __( 'Translate %s', 'bfastmag' ), 'bfastmag' ); ?></a>
		</p>
		<hr>
	</div>

	<div>
		<h4><?php printf( esc_html__( 'Are you enjoying %s?', 'bfastmag' ), 'bfastmag' ); ?></h4>

		<p class="review-link"><?php echo sprintf( esc_html__( 'Rate our theme on %1$sWordPress.org%2$s. We\'d really appreciate it!', 'bfastmag' ), '<a href="https://wordpress.org/support/view/theme-reviews/bfastmag#postform/">', '</a>' ); ?></p>

		<p><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></p>
	</div>

</div>
		<?php
	}

	/**
	 * Changelog
	 * 
	 */
	public function bfastmag_welcome_changelog() {
		
		$bfastmag = wp_get_theme( 'bfastmag' );

?>
<div class="bfastmag-tab-pane" id="changelog">

	<div class="bfastmag-tab-pane-center">
	
		<h1>bfastmag <?php if( !empty($bfastmag['Version']) ): ?> <sup id="bfastmag-theme-version"><?php echo esc_attr( $bfastmag['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$bfastmag_changelog = $wp_filesystem->get_contents( get_template_directory().'/CHANGELOG.md' );
	$bfastmag_changelog_lines = explode(PHP_EOL, $bfastmag_changelog);
	foreach($bfastmag_changelog_lines as $bfastmag_changelog_line){
		if(substr( $bfastmag_changelog_line, 0, 3 ) === "###"){
			echo '<hr /><h1>'.substr($bfastmag_changelog_line,3).'</h1>';
		} else {
			echo $bfastmag_changelog_line.'<br/>';
		}
	}

	?>
	
</div><?php
	}
}

$GLOBALS['bfastmag_Welcome'] = new bfastmag_Welcome();