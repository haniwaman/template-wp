<?php
/**
 * My template tags Functions
 *
 * @package WordPress
 */

/**
 * カテゴリー取得
 *
 * @return array $this_categories id name link の配列.
 * @codex https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/get_the_category
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/get_category_link
 */
function my_get_post_categories() {
	$this_categories = array();
	$categories      = get_the_category();
	$category_num    = count( $categories );
	for ( $i = 0; $i < $category_num; $i++ ) {
		$this_categories[ $i ]['id']   = $categories[ $i ]->cat_ID;
		$this_categories[ $i ]['name'] = $categories[ $i ]->name;
		$this_categories[ $i ]['slug'] = $categories[ $i ]->slug;
		$this_categories[ $i ]['link'] = get_category_link( $categories[ $i ]->cat_ID );
	}
	return $this_categories;
}


/**
 * カテゴリーを1つだけ表示
 */
function my_the_post_category() {
	$this_categories = my_get_post_categories();
	if ( isset( $this_categories[0] ) ) {
		echo '<a href="' . esc_url( $this_categories[0]['link'] ) . '">' . esc_html( $this_categories[0]['name'] ) . '</a>';
	}
}


/**
 * ターム取得
 *
 * @param string $taxonomy タクソノミーのスラッグ名.
 * @return array ターム情報.
 */
function my_get_post_terms( $taxonomy ) {
	$this_terms = array();
	$terms      = get_the_terms( get_the_ID(), $taxonomy );
	$term_num   = count( $terms );
	for ( $i = 0; $i < $term_num; $i++ ) {
		$this_terms[ $i ]['id']   = $terms[ $i ]->term_id;
		$this_terms[ $i ]['name'] = $terms[ $i ]->name;
		$this_terms[ $i ]['slug'] = $terms[ $i ]->slug;
		$this_terms[ $i ]['link'] = get_term_link( $terms[ $i ]->term_id, $taxonomy );
	}
	return $this_terms;
}

/**
 * タームを1つだけ表示
 *
 * @param string $taxonomy タクソノミーのスラッグ名.
 */
function my_the_post_term( $taxonomy ) {
	$this_terms = my_get_post_terms( $taxonomy );
	if ( isset( $this_terms[0] ) ) {
		echo '<div class="shopnews-tag m_' . $this_terms[0]['slug'] . '">' . esc_html( $this_terms[0]['name'] ) . '</div>';
	}
}
