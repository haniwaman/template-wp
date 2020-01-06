<?php
/**
 * Sidebar
 *
 * @package WordPress
 */

if ( is_active_sidebar( 'sidebar' ) ) : ?>

<aside class="secondary">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside><!-- secondary -->

<?php endif; ?>
