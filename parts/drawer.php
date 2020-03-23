<?php
/**
 * Drawer
 */

?>

<div class="p-drawer-close js-drawer for-drawer" data-target="for-drawer"></div>
<div class="p-drawer-content p-drawer-content--right for-drawer">
	<?php
	wp_nav_menu(
		array(
			'container'       => false,
			'depth'           => 1,
			'theme_location'  => 'drawer',
			'container'       => 'nav',
			'container_class' => 'p-drawer-content__nav',
			'menu_class'      => 'p-drawer-content__list',
		)
	);
	?>
</div><!-- /.p-drawer-content -->
