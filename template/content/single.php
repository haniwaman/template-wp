<?php
/**
 * Single Content
 */

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
	<?php $tp_tags = my_get_post_tags(); ?>
	<?php if ( $tp_tags ) : ?>
	<div class="p-entry__tags">
	<div class="p-entry-tags">
		<?php foreach ( $tp_tags as $tp_tag ) : ?>
			<div class="p-entry-tags__item"><a href="<?php echo esc_url( $tp_tag['link'] ); ?>"><?php echo esc_html( $tp_tag['name'] ); ?></a></div><!-- /.p-entry-tags__item -->
		<?php endforeach; ?>
	</div><!-- /.p-entry-atags -->
	</div><!-- /.p-entry__tags -->
	<?php endif; ?>

</article><!-- /.p-entry -->
