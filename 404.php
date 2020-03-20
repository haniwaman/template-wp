<?php
/**
 * 404
 *
 * @package WordPress
 */

get_header();
get_template_part( 'parts/mv/archive' );
get_template_part( 'parts/breadcrumb' );
?>


<div class="p-content">
<div class="l-inner">
<div class="p-content__row">


<main class="p-primary">
<div class="p-content__page">

<article <?php post_class( array( 'p-entry', 'p-entry--page' ) ); ?>>

	<p>コンテンツが存在しません。</p>

</article><!-- /entry -->

</div><!-- /.p-content__page -->
</main><!-- /.p-primary -->


<?php get_sidebar(); ?>


</div><!-- /.p-content__row -->
</div><!-- /.l-inner -->
</div><!-- /.p-content -->


<?php get_footer(); ?>
