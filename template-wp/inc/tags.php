<?php
/**
 * My template tags Functions
 */

/**
 * カテゴリー取得
 *
 * @param integer $id 投稿id.
 * @return array $this_categories id name link の配列.
 * @codex https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/get_the_category
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/get_category_link
 */
function my_get_post_categories( $id ) {
	global $post;
	$this_categories = array();
	if ( 0 === $id ) {
		$id = $post->ID;
	}
	$categories = get_the_category( $id );
	if ( ! $categories ) {
		return false;
	}
	$category_num = count( $categories );
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
 *
 * @param boolean $anchor aタグで出力するかどうか.
 * @param integer $id 投稿id.
 * @return void
 */
function my_the_post_category( $anchor = true, $id = 0 ) {
	$this_categories = my_get_post_categories( $id );
	if ( isset( $this_categories[0] ) ) {
		if ( $anchor ) {
			echo '<a href="' . esc_url( $this_categories[0]['link'] ) . '">' . esc_html( $this_categories[0]['name'] ) . '</a>';
		} else {
			echo esc_html( $this_categories[0]['name'] );
		}
	}
}



/**
 * タグ取得
 *
 * @param integer $id 投稿id.
 * @return array $this_tags id name slug link の配列.
 */
function my_get_post_tags( $id = 0 ) {
	global $post;
	$this_tags = array();
	if ( 0 === $id ) {
		$id = $post->ID;
	}
	$tags = get_the_tags( $id );
	if ( ! $tags ) {
		return false;
	}
	$tags_num = count( $tags );
	for ( $i = 0; $i < $tags_num; $i++ ) {
		$this_tags[ $i ]['id']   = $tags[ $i ]->term_id;
		$this_tags[ $i ]['name'] = $tags[ $i ]->name;
		$this_tags[ $i ]['slug'] = $tags[ $i ]->slug;
		$this_tags[ $i ]['link'] = get_tag_link( $tags[ $i ]->term_id );
	}
	return $this_tags;
}




/**
 * ターム取得
 *
 * @param integer $id 投稿id.
 * @param string  $taxonomy タクソノミーのスラッグ名.
 * @return array  ターム情報.
 */
function my_get_post_terms( $id = 0, $taxonomy ) {
	global $post;
	$this_terms = array();
	if ( 0 === $id ) {
		$id = $post->ID;
	}
	$terms    = get_the_terms( $id, $taxonomy );
	if ( ! $terms ) {
		return false;
	}
	$term_num = count( $terms );
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
 * @param boolean $anchor aタグで出力するかどうか.
 * @param integer $id 投稿id.
 * @param string  $taxonomy タクソノミーのスラッグ名.
 */
function my_the_post_term( $anchor = true, $id = 0, $taxonomy ) {
	$this_terms = my_get_post_terms( $taxonomy );
	if ( isset( $this_terms[0] ) ) {
		if ( $anchor ) {
			echo '<a href="' . esc_url( $this_terms[0]['link'] ) . '">' . esc_html( $this_terms[0]['name'] ) . '</a>';
		} else {
			echo esc_html( $this_terms[0]['name'] );
		}
	}
}
