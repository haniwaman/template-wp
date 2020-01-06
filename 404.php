<?php
/**
 * 404
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

<article <?php post_class( array( 'entry' ) ); ?>>

	<p>コンテンツが存在しません。</p>

</article><!-- /entry -->

</main><!-- /primary -->


<?php get_sidebar(); ?>


</div><!-- /row -->
</div><!-- /inner -->
</div><!-- /content -->


<?php get_footer(); ?>
