<?php
/**
 * Footer
 *
 * @package WordPress
 */

?>


<div class="footer-menu">
<div class="inner">

<nav class="footer-nav">
<?php
	wp_nav_menu(
		array(
			'container'      => false,
			'depth'          => 1,
			'theme_location' => 'utility',
		)
	);
	?>
</nav><!-- /.footer-nav -->

</div><!-- /inner -->
</div><!-- /footer-menu -->


<footer class="footer">
<div class="inner">

<div class="footer-copy">Copyright &copy; <?php echo esc_html( date( 'Y' ) ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a> All Rights Reserved.</div><!-- /footer-copy -->

</div><!-- /inner -->
</footer><!-- /footer -->

<div class="totop"><a href="#"><i class="fas fa-chevron-up"></i></a></div><!-- /.totop -->

<?php wp_footer(); ?>
</body>
</html>
