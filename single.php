<?php
/**
 * Single
 *
 * @package WordPress
 */

get_header();
get_template_part( 'parts/mv/single' );
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
		?>

<article <?php post_class( array( 'p-entry', 'p-entry--single' ) ); ?>>

	<div class="p-entry__header">
		<h1 class="p-entry__title"><?php the_title(); ?></h1><!-- /.p-entry__title -->

		<div class="p-entry__meta">
			<time class="p-entry__published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time><!-- /.p-entry__published -->
			<div class="p-entry__label"><?php my_the_post_category(); ?></div><!-- /.p-entry__label -->
		</div><!-- /p-entry__meta -->

		<div class="p-entry__img">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'my_thumbnail' );
		} else {
			echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
		}
		?>
		</div><!-- /p-entry__img -->
	</div><!-- /p-entry__header -->

	<div class="p-entry__body">
		<div class="p-entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages(
			array(
				'before'         => '<nav class="p-entry-links">',
				'after'          => '</nav>',
				'link_before'    => '',
				'link_after'     => '',
				'next_or_number' => 'number',
				'separator'      => '',
			)
		);
		?>
		</div><!-- /.p-entry-content -->
	</div><!-- /.p-entry__body -->

</article><!-- /.p-entry -->


<div class="p-entry-pager">
	<div class="p-entry-pager__prev"><?php previous_post_link( '%link', '<i class="fas fa-angle-left"></i> 前の記事', false ); ?></div>
	<div class="p-entry-pager__next"><?php next_post_link( '%link', '次の記事 <i class="fas fa-angle-right"></i>', false ); ?></div>
</div><!-- /p-entry-pager -->

		<?php
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
