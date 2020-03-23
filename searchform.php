<?php
/**
 * SearchForm
 */

?>

<form role="search" method="get" class="p-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s">検索</label>
	<input type="search" class="p-search-form__field" value="<?php echo esc_html( get_search_query() ); ?>" placeholder="サイト内検索" name="s" id="s">
	<button type="submit" class="c-button p-search-form__button">検索</button>
</form><!-- /p-search-form -->
