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

<!-- header -->
<header id="header">
<div class="inner">

	<!-- header-logo -->
	<div class="header-logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" alt=""></a>
	</div><!-- /header-logo -->

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

</div><!-- /inner -->
</header><!-- /header -->


<div class="header-drawer">
<div class="c-drawer">
    <div class="c-drawer__icon js-drawer for-drawer01" data-target="for-drawer01">
        <div class="c-drawer__bars">
            <span class="c-drawer__bar"></span>
            <span class="c-drawer__bar"></span>
            <span class="c-drawer__bar"></span>
        </div>
    </div>
    <div class="c-drawer__close js-drawer for-drawer01" data-target="for-drawer01"></div>
    <div class="c-drawer__content for-drawer01">
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
		</div>
</div><!-- /c-drawer -->
</div><!-- /header-drawer -->

