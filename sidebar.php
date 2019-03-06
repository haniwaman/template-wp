<?php
/**
 * Sidebar
 *
 * @package WordPress
 */

if ( is_active_sidebar( 'sidebar' ) ) : ?>

<!-- secondary -->
<aside id="secondary">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside><!-- secondary -->

<?php endif; ?>
