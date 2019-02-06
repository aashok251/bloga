<?php
/**
 * Class to display upsells.
 *
 * @package WordPress
 * @subpackage bfastmag
 */
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Class bfastmag_Info
 */
class bfastmag_Info extends WP_Customize_Control {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'info';

	/**
	 * Control label
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $label = '';


	/**
	 * The render function for the controler
	 */
	public function render_content() {
		$links = array(
			array(
				'name' => __( 'Documentation','bfastmag' ),
				'link' => esc_url( 'http://docs.themepacific.com/bfastmag' ),
			),
			array(
				'name' => __( 'Demo','bfastmag' ),
				'link' => esc_url( 'http://demo.themepacific.com/bfastmag' ),
			),
			array(
				'name' => __( 'Theme Details','bfastmag' ),
				'link' => admin_url( 'themes.php?page=bfastmag-welcome' ),
			),
			array(
				'name' => __( 'Leave a review','bfastmag' ),
				'link' => esc_url( 'https://wordpress.org/support/theme/bfastmag/reviews/#new-post/' ),
			),
		); ?>


		<div class="bfastmag-theme-info">
			<?php
			foreach ( $links as $item ) {  ?>
				<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank"><?php echo esc_html( $item['name'] ); ?></a>
				<hr/>
				<?php
			} ?>
		</div>
		<?php
	}
}

/**
 * Class bfastmagChooseCategory
 */
class bfastmagChooseCategory extends WP_Customize_Control {

	/**
	 * bfastmagChooseCategory constructor.
	 *
	 * @param WP_Customize_Manager $manager WordPress manager.
	 * @param string               $id Control id.
	 * @param array                $args Control arguments.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Render the content on the theme customizer page
	 */
	public function render_content() {
		$categories = get_categories();
?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<select <?php $this->link(); ?>>
		<option value="all"><?php esc_html_e( 'All', 'bfastmag' );?></option>
		<?php
		foreach ( $categories as $cat ) {
			if ( $cat->count > 0 ) {
				echo '<option value="' . esc_attr( $cat->slug ) . '" ' . selected( $this->value(), $cat->slug ) . '>' . esc_attr( $cat->cat_name ) . '</option>';
			}
		}
			?>
			</select>
	<?php
	}
}
