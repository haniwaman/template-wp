<?php
/**
 * Footer
 *
 * @package WordPress
 */

?>

<!-- footer-menu -->
<div id="footer-menu">
<div class="inner">

<?php
	wp_nav_menu(
		array(
			'container'       => false,
			'depth'           => 1,
			'theme_location'  => 'utility',
			'container'       => 'nav',
			'container_class' => 'footer-nav',
			'menu_class'      => 'footer-list',
		)
	);
	?>

</div><!-- /inner -->
</div><!-- /footer-menu -->


<!-- footer -->
<footer id="footer">
<div class="inner">

<div class="copy">Copyright &copy; <?php echo esc_html( date( 'Y' ) ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a> All Rights Reserved.</div><!-- /copy -->

</div><!-- /inner -->
</footer><!-- /footer -->

<?php wp_footer(); ?>
</body>
</html>
