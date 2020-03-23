<?php
/**
 * Pagenation
 */

 ?>

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
