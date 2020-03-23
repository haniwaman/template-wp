<?php
/**
 * Footer Content
 */

?>

<footer class="l-footer p-footer" role="contentinfo">

<div class="p-footer__menu">
<div class="l-inner">

<nav class="p-footer-nav">
<?php
	wp_nav_menu(
		array(
			'container'      => false,
			'depth'          => 1,
			'theme_location' => 'utility',
		)
	);
	?>
</nav><!-- /.p-footer-nav -->

</div><!-- /.l-inner -->
</div><!-- /.p-footer__menu -->

<div class="p-footer__copy">
<div class="l-inner">
	<p>Copyright &copy; <?php echo esc_html( date( 'Y' ) ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a> All Rights Reserved.</p>
</div><!-- /.l-inner -->
</div><!-- /.p-footer__copy -->

</footer><!-- /.p-footer -->
