<?php
/**
 * Index
 */

get_header();
get_template_part( 'parts/template/mainvisual/archive' );
get_template_part( 'parts/breadcrumb' );
?>



<div class="p-content p-content--column-one">
<div class="l-inner">
<div class="p-content__row">

	<main class="l-primary">
	<div class="p-content__archive">

		<?php
		if ( have_posts() ) :
			?>
		<div class="p-archive-head">
			<h2 class="p-archive-head__title"><?php the_archive_title(); ?></h2><!-- /.p-archive-head__title -->
			<div class="p-archive-head__description"><?php the_archive_description(); ?></div><!-- /.p-archive-head__description -->
		</div><!-- /p-archive-head -->

		<div class="p-entries">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template/content/archive' );

		endwhile;
			?>
		</div><!-- /p-entries -->

			<?php get_template_part( 'parts/pagenation', 'archive' ); ?>
			<?php
		endif;
		?>

</div><!-- /.p-content__archive -->
</main><!-- /.l-primary -->

<?php get_sidebar(); ?>

</div><!-- /.p-content__row -->
</div><!-- /.l-inner -->
</div><!-- /.p-content -->



<?php get_footer(); ?>
