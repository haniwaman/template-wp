<?php
/**
 * Page
 *
 * @package WordPress
 */

get_header();
get_template_part( 'parts/mv/page' );
get_template_part( 'parts/breadcrumb' );
?>

<div class="p-content">
<div class="l-inner">
<div class="p-content__row">

<main class="p-primary">
<div class="p-content__page">

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

<article <?php post_class( array( 'p-entry', 'p-entry--page' ) ); ?>>

	<div class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->

		<div class="entry-meta">
			<time class="entry-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
			<div class="entry-tag"><?php my_the_post_category(); ?></div><!-- /entry-item-tag -->
		</div><!-- /entry-meta -->

		<div class="entry-img">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'my_thumbnail' );
		} else {
			echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
		}
		?>
		</div><!-- /entry-img -->
	</div><!-- /entry-header -->

	<div class="entry-body">
		<?php the_content(); ?>
		<?php
		wp_link_pages(
			array(
				'before'         => '<nav class="entry-links">',
				'after'          => '</nav>',
				'link_before'    => '',
				'link_after'     => '',
				'next_or_number' => 'number',
				'separator'      => '',
			)
		);
		?>
	</div><!-- /entry-body -->

</article><!-- /entry -->


<div class="entry-pager">
	<div class="entry-prev"><?php previous_post_link( '%link', '<i class="fas fa-angle-left"></i> 前の記事', false ); ?></div>
	<div class="entry-next"><?php next_post_link( '%link', '次の記事 <i class="fas fa-angle-right"></i>', false ); ?></div>
</div><!-- /entry-pager -->

		<?php
endwhile;
endif;
?>

</div><!-- /.p-content__page -->
</main><!-- /.p-primary -->


<?php get_sidebar(); ?>


</div><!-- /.p-content__row -->
</div><!-- /.l-inner -->
</div><!-- /.p-content -->


<?php get_footer(); ?>
