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


<div class="content">
<div class="inner">
<div class="row">


<main class="primary">
<div class="content__page">

<article <?php post_class( array( 'entry', 'entry--page' ) ); ?>>

	<p>コンテンツが存在しません。</p>

</article><!-- /entry -->

</div><!-- /.content__page -->
</main><!-- /primary -->


<?php get_sidebar(); ?>


</div><!-- /row -->
</div><!-- /inner -->
</div><!-- /content -->


<?php get_footer(); ?>
