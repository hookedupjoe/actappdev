<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ActAppDev
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="col-sm-12 col-md-3">

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

</div>
