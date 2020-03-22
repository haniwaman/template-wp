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


<header class="p-header">
<div class="l-inner">
<div class="p-header__row">

<?php if ( is_front_page() ) : ?>
<h1 class="p-header__logo">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" alt=""></a>
</h1><!-- /p-header__logo -->
<?php else : ?>
<div class="p-header__logo">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" alt=""></a>
</div><!-- /p-header__logo -->
<?php endif; ?>

<nav class="p-header__nav">
<?php
wp_nav_menu(
	array(
		'container'      => false,
		'depth'          => 1,
		'theme_location' => 'global',
	)
);
?>
</nav><!-- /.p-header__nav -->


<div class="p-header__drawer">
	<div class="p-drawer-icon js-drawer for-drawer" data-target="for-drawer">
		<button class="p-drawer-icon__bars">
				<span class="p-drawer-icon__bar"></span>
				<span class="p-drawer-icon__bar"></span>
				<span class="p-drawer-icon__bar"></span>
		</div><!-- /.p-drawer-icon__bars -->
	</button><!-- /.p-drawer-icon -->
</div><!-- /.p-header__drawer -->

</div><!-- /.p-header__row -->
</div><!-- /.l-inner -->
</header><!-- /.p-header -->


<?php get_template_part( 'parts/drawer' );
