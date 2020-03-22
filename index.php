<?php
/**
 * Index
 *
 * @package WordPress
 */

get_header();
get_template_part( 'parts/mv/archive' );
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
				?>

		<div <?php post_class( array( 'p-entries__item', 'p-entries--column-three' ) ); ?>>

		<div class="c-media c-media--fit c-media--horizon01">
			<div class="c-media__img">
				<a class="c-media__img-in" href="<?php the_permalink(); ?>">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'my_thumbnail' );
					} else {
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
					}
					?>
				</a><!-- /.c-media__img-in -->
			</div><!-- /.c-media__img -->

			<div class="c-media__body">
				<div class="c-media__meta">
					<time class="c-media__published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time><!-- /c-media__published -->
					<div class="c-media__label"><?php my_the_post_category(); ?></div><!-- /c-media__label -->
				</div><!-- /c-media__meta -->
				<div class="c-media__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!-- /c-media__title -->
				<div class="c-media__excerpt"><?php the_excerpt(); ?></div><!-- /c-media__excerpt -->
			</div><!-- /c-media__body -->
		</div><!-- /.c-media -->

	</div><!-- /p-entries__item -->
				<?php
		endwhile;
			?>
		</div><!-- /p-entries -->

			<?php if ( paginate_links() ) : ?>
		<div class="p-pagenation">
				<?php
				echo wp_kses_post(
					paginate_links(
						array(
							'end_size'  => 0,
							'mid_size'  => 1,
							'prev_next' => true,
							'prev_text' => '<i class="fas fa-angle-left"></i>',
							'next_text' => '<i class="fas fa-angle-right"></i>',
						)
					)
				);
				?>
		</div><!-- /.p-pagenation -->
		<?php endif; ?>
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
