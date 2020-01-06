<?php
/**
 * Index
 *
 * @package WordPress
 */

get_header(); ?>


<div class="mv">
<div class="inner">
</div><!-- /inner -->
</div><!-- /mv -->


<div class="content">
<div class="inner">
<div class="row">

	<main class="primary">
		<?php my_breadcrumb(); ?>

		<?php
		if ( have_posts() ) :
			?>
		<div class="archive-head">
			<h2 class="archive-title"><?php the_archive_title(); ?></h2><!-- /archive-title -->
			<div class="archive-description"><?php the_archive_description(); ?></div><!-- /archive-description -->
		</div><!-- /archive-head -->

		<div class="entry-items">
			<?php
			while ( have_posts() ) :
				the_post();
				?>

		<div <?php post_class( array( 'entry-item' ) ); ?>>

		<div class="entry-item-img">
			<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'my_thumbnail' );
				} else {
					echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
				}
				?>
			</a>
		</div><!-- /entry-item-img -->

		<div class="entry-item-body">
			<div class="entry-item-meta">
				<time class="entry-item-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time><!-- /entry-item-published -->
				<div class="entry-item-tag"><?php my_the_post_category(); ?></div><!-- /entry-item-tag -->
			</div><!-- /entry-item-meta -->
			<h2 class="entry-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><!-- /entry-item-title -->
			<div class="entry-item-excerpt"><?php the_excerpt(); ?></div><!-- /entry-item-excerpt -->
		</div><!-- /entry-item-body -->

	</div><!-- /entry-item -->
				<?php
		endwhile;
			?>
		</div><!-- /entry-items -->

			<?php if ( paginate_links() ) : ?>
		<div class="pagenation">
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
		</div><!-- /pagenation -->
		<?php endif; ?>
			<?php
		endif;
		?>
</main><!-- /primary -->

<?php get_sidebar(); ?>

</div><!-- /row -->
</div><!-- /inner -->
</div><!-- /content -->



<?php get_footer(); ?>
