<?php
/**
 * 404
 */

get_header();
get_template_part( 'parts/template/mainvisual/page' );
get_template_part( 'parts/breadcrumb' );
?>


<div class="p-content">
<div class="l-inner">
<div class="p-content__row">


<main class="l-primary">
<div class="p-content__page">

<article <?php post_class( array( 'p-entry', 'p-entry--page' ) ); ?>>

	<p>コンテンツが存在しません。</p>

</article><!-- /.p-entry -->

</div><!-- /.p-content__page -->
</main><!-- /.l-primary -->


<?php get_sidebar(); ?>


</div><!-- /.p-content__row -->
</div><!-- /.l-inner -->
</div><!-- /.p-content -->


<?php get_footer(); ?>
