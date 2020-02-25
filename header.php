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
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<header class="header">
<div class="inner">
<div class="row--middle">

<?php if ( is_front_page() ) : ?>
<h1 class="header-logo">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" alt=""></a>
</h1><!-- /header-logo -->
<?php else : ?>
<div class="header-logo">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" alt=""></a>
</div><!-- /header-logo -->
<?php endif; ?>

<nav class="header-nav">
<?php
wp_nav_menu(
	array(
		'container'      => false,
		'depth'          => 1,
		'theme_location' => 'global',
	)
);
?>
</nav><!-- /.header-nav -->


<div class="header-drawer">
	<div class="drawer">
		<div class="drawer-icon js-drawer for-drawer" data-target="for-drawer">
			<div class="drawer-bars">
					<span class="drawer-bar"></span>
					<span class="drawer-bar"></span>
					<span class="drawer-bar"></span>
			</div><!-- /drawer-bars -->
		</div><!-- /drawer-icon -->
		<div class="drawer-close js-drawer for-drawer" data-target="for-drawer"></div>
		<div class="drawer-content for-drawer">
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
</div><!-- /header-drawer -->

</div><!-- /row -->
</div><!-- /inner -->
</header><!-- /header -->

