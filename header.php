<?php
/**
 * Header
 *
 * @package WordPress
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- header -->
<header id="header">
<div class="inner">

	<!-- header-logo -->
	<div class="header-logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" alt=""></a>
	</div><!-- /header-logo -->

	<!-- header-nav -->
	<nav class="header-nav">
	<?php
	wp_nav_menu(
		array(
			'container'       => false,
			'depth'           => 1,
			'theme_location'  => 'global',
			'container'       => 'nav',
			'container_class' => 'header-nav',
			'menu_class'      => 'header-list',
		)
	);
	?>
	</nav><!-- /header-nav -->

</div><!-- /inner -->
</header><!-- /header -->


<!-- drawer -->
<div class="drawer">
<div class="drawer-open"><span></span></div>
<div class="drawer-close"></div>

<!-- drawer-content -->
<div class="drawer-content">
<?php
	wp_nav_menu(
		array(
			'container'       => false,
			'depth'           => 1,
			'theme_location'  => 'drawer',
			'container'       => 'nav',
			'container_class' => 'drawer-nav',
			'menu_class'      => 'drawer-list',
		)
	);
	?>
</div><!-- /drawer-content -->
</div><!-- /drawer -->
