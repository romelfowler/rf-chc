<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package EightMedi Pro
 */

if ( ! is_active_sidebar( 'eightmedi-pro-sidebar-1' ) ) {
	return;
}
?>

<div id="secondary-right" class="widget-area right-sidebar sidebar">
	<?php dynamic_sidebar( 'eightmedi-pro-sidebar-1' ); ?>
</div><!-- #secondary -->
