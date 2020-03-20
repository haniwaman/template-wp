<?php
/**
 * Sidebar
 *
 * @package WordPress
 */

if ( is_active_sidebar( 'sidebar' ) ) : ?>

<aside class="p-secondary">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside><!-- /.p-secondary -->

<?php endif; ?>
