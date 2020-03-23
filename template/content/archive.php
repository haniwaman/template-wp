<?php
/**
 * Archive Content
 */
?>

<?php
$tp_entries_column_class = 'p-entries--column-three';
$tp_media_class          = 'c-media--horizon01';
?>
<div <?php post_class( array( 'p-entries__item', $tp_entries_column_class ) ); ?>>

<div class="c-media c-media--fit <?php echo esc_attr( $tp_media_class ); ?>">
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
