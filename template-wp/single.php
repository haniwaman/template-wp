<?php
/**
 * Single
 */

get_header();
get_template_part( 'parts/template/mainvisual/single' );
get_template_part( 'parts/breadcrumb' );
?>

<div class="p-content">
<div class="l-inner">
<div class="p-content__row">

<main class="l-primary">
<div class="p-content__single">

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template/content/single' );
		get_template_part( 'parts/pagenation', 'page' );
endwhile;
endif;
?>

</div><!-- /.p-content__single -->
</main><!-- /.l-primary -->


<?php get_sidebar(); ?>


</div><!-- /.p-content__row -->
</div><!-- /.l-inner -->
</div><!-- /.p-content -->


<?php get_footer(); ?>
