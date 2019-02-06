<?php
/**
 * Template for displaying search forms in bfastmag
 *
 * @package WordPress
 * @subpackage bfastmag
 */
?>
<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="navbar-form"  action="<?php echo home_url( '/' ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'bfastmag' ) ?>
		</span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>"  name="s" class="form-control" placeholder="<?php echo esc_attr_x( 'Search in here &hellip;', 'placeholder', 'bfastmag' ) ?>" title="<?php echo esc_attr_x( 'Search for:', 'label', 'bfastmag' ) ?>">
	<button type="submit" title="Search"><i class="fa fa-search"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'bfastmag' ); ?></span></button>
</form>
