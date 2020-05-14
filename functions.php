<?php
/**
 * Functions
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );



/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init() {
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all' );
	wp_enqueue_style( 'my', get_template_directory_uri() . '/css/style.css', array(), '1.0.1', 'all' );
	wp_enqueue_style( 'df', get_stylesheet_uri(), array(), '1.0.1', 'all' );

	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), '3.3.1', true );
	wp_enqueue_script( 'my', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.1', true );
}
add_action( 'wp_enqueue_scripts', 'my_script_init' );



/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
function my_menu_init() {
	register_nav_menus(
		array(
			'global'  => 'ヘッダーメニュー',
			'utility' => 'ユーティリティメニュー',
			'drawer'  => 'ドロワーメニュー',
		)
	);
}
add_action( 'init', 'my_menu_init' );



/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
function my_widget_init() {
	register_sidebar(
		array(
			'name'          => 'サイドバー',
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="p-widget__title">',
			'after_title'   => '</div>',
		)
	);
}
add_action( 'widgets_init', 'my_widget_init' );



/**
 * 画像サイズ
 */
add_image_size( 'my_thumbnail', 840, 600, true );




/**
 * テンプレートタグ
 */
require_once get_template_directory() . '/inc/tags.php';



/**
 * パンくず
 */
require_once get_template_directory() . '/inc/breadcrumb.php';

/**
 * パンくずリストの「ホーム」テキストの書き換え
 *
 * @param string $home 書き換え前のホーム.
 * @return string $home 書き換え後のホーム.
 */
function my_breadcrumb_home_change( $home ) {
	return 'Home';
}
add_filter( 'my_breadcrumb_home', 'my_breadcrumb_home_change' );

/**
 * パンくずリストの区切り文字の書き換え
 *
 * @param string $bridge 書き換え前の区切り文字.
 * @return string $bridge 書き換え後の区切り文字.
 */
function my_breadcrumb_bridge_change( $bridge ) {
	return $bridge;
}
add_filter( 'my_breadcrumb_bridge', 'my_breadcrumb_bridge_change' );

/**
 * パンくずリストのタイトルの書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_breadcrumb_title_change( $title ) {
	if ( is_home() ) {
		$title = 'ブログ';
	}
	return $title;
}
add_filter( 'my_breadcrumb_title', 'my_breadcrumb_title_change' );


/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title( $title ) {

	if ( is_home() ) { /* ホームの場合 */
		$title = 'ブログ';
	} elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
		$title = '' . single_cat_title( '', false ) . '';
	} elseif ( is_tag() ) { /* タグアーカイブの場合 */
		$title = '' . single_tag_title( '', false ) . '';
	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title( '', false ) . '';
	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
		$title = '' . single_term_title( '', false );
	} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
		$title = '「' . esc_html( get_query_var( 's' ) ) . '」の検索結果';
	} elseif ( is_author() ) { /* 作者アーカイブの場合 */
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) { /* 日付アーカイブの場合 */
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . '年';
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . '月';
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . '日';
		}
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'my_archive_title' );




/**
 * ウィジェットの投稿件数をaタグ内に
 *
 * @param string $output もともと出力するHTMLタグ.
 * @return string $output 変換後に出力するHTMLタグ.
 */
function my_list_anchor( $output ) {
	$output = preg_replace( '/<\/a>.*?\((\d+)\)/', ' <span>($1)</span></a>', $output );
	return $output;
}
add_filter( 'wp_list_categories', 'my_list_anchor' );
add_filter( 'get_archives_link', 'my_list_anchor' );


/**
 * タイトル文字列の変換
 *
 * @param string $title 変更前のタイトル.
 * @return string $title 変更後のタイトル.
 */
function my_breadcrumb_title( $title ) {
	$max_num = 300;
	if ( mb_strlen( $title ) > $max_num ) {
		$title = mb_substr( $title, 0, $max_num ) . '...';
	}

	return $title;
}
add_filter( 'my_breadcrumb_title', 'my_breadcrumb_title', 10, 2 );

/**
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
 */
function my_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );


/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
function my_excerpt_more( $more ) {
	return '...';

}
add_filter( 'excerpt_more', 'my_excerpt_more' );
