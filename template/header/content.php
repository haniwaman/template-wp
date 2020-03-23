<?php
/**
 * Header Content
 */

?>

<?php $tp_logo_tag = is_front_page() ? 'h1' : 'div'; ?>
<header class="l-header p-header" role="banner">
<div class="l-inner">
<div class="p-header__row">

<<?php echo esc_attr( $tp_logo_tag ); ?> class="p-header__logo">
<?php if ( has_custom_logo() ) : ?>
	<?php the_custom_logo(); ?>
<?php else : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( apply_filters( 'tp_logo', get_bloginfo( 'name' ) ) ); ?></a>
<?php endif; ?>
</<?php echo esc_attr( $tp_logo_tag ); ?>><!-- /.p-header__logo -->

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
		</button><!-- /.p-drawer-icon__bars -->
	</div><!-- /.p-drawer__icon -->
</div><!-- /.p-header__drawer -->

</div><!-- /.p-header__row -->
</div><!-- /.l-inner -->
</header><!-- /.p-header -->


<?php
get_template_part( 'parts/drawer' );
