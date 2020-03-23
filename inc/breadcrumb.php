<?php
/**
 * My template Breadcrumb Functions
 */

if ( ! function_exists( 'my_breadcrumb' ) ) {

	/**
	 * Display Breadcrumbs List
	 *
	 * @param string $object_type Taxonomy Name.
	 * @return void
	 */
	function my_breadcrumb( $object_type = '' ) {
		$breadcrumb_html       = '';
		$breadcrumb_beore      = '<div class="p-breadcrumb"><ul>';
		$breadcrumb_after      = '</ul></div>';
		$breadcrumb_home       = apply_filters( 'my_breadcrumb_home', 'Home' );
		$breadcrumb_home_tag   = '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . $breadcrumb_home . '</a></li>';
		$breadcrumb_bridge     = apply_filters( 'my_breadcrumb_bridge', '&gt;' );
		$breadcrumb_bridge_tag = '<li><span class="p-breadcrumb__bridge">' . $breadcrumb_bridge . '</span></li>';

		if ( is_front_page() ) { /* Front Page */
			echo '';

		} elseif ( is_home() ) { /* Blog Archive */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="p-breadcrumb__current">' . apply_filters( 'my_breadcrumb_title', get_the_title() ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_attachment() ) { /* Media */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="p-breadcrumb__current">' . apply_filters( 'my_breadcrumb_title', get_the_title() ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_single() ) { /* Single */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			if ( 'post' !== get_post_type() ) {
				$breadcrumb_html .= '<li><a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '">' . esc_html( get_post_type_object( get_post_type() )->labels->name ) . '</a></li>' . $breadcrumb_bridge_tag;
			} else {
				$this_categories = my_get_post_categories( get_the_ID() );
				$thie_parents    = get_ancestors( $this_categories[0]['id'], 'category' );
				if ( $thie_parents ) {
					$thie_parents       = array_reverse( $thie_parents );
					$thie_parents_count = count( $thie_parents );
					for ( $i = 0; $i < $thie_parents_count; $i++ ) {
						$this_parent_category = get_category( $thie_parents[ $i ] );
						$breadcrumb_html     .= '<li><a href="' . get_category_link( $this_parent_category->term_id ) . '">' . $this_parent_category->cat_name . '</a></li>' . $breadcrumb_bridge_tag;
					}
				}
				$breadcrumb_html .= '<li><a href="' . $this_categories[0]['link'] . '">' . $this_categories[0]['name'] . '</a></li>' . $breadcrumb_bridge_tag;
			}
			$breadcrumb_html .= '<li><span class="p-breadcrumb__current">' . apply_filters( 'my_breadcrumb_title', get_the_title() ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_page() ) { /* Page */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$thie_parents     = get_ancestors( get_the_ID(), 'page' );
			if ( $thie_parents ) {
				$thie_parents       = array_reverse( $thie_parents );
				$this_parents_count = count( $thie_parents );
				for ( $i = 0; $i < $this_parents_count; $i++ ) {
					$breadcrumb_html .= '<li><a href="' . get_permalink( $thie_parents[ $i ] ) . '">' . get_the_title( $thie_parents[ $i ] ) . '</a></li>' . $breadcrumb_bridge_tag;
				}
			}
			$breadcrumb_html .= '<li><span class="p-breadcrumb__current">' . apply_filters( 'my_breadcrumb_title', get_the_title() ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_category() ) { /* Category Archive */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$thie_parents     = get_ancestors( get_query_var( 'cat' ), 'category' );
			if ( $thie_parents ) {
				$thie_parents       = array_reverse( $thie_parents );
				$this_parents_count = count( $thie_parents );
				for ( $i = 0; $i < $this_parents_count; $i++ ) {
					$this_parent_category = get_category( $thie_parents[ $i ] );
					$breadcrumb_html     .= '<li><a href="' . get_category_link( $this_parent_category->term_id ) . '">' . $this_parent_category->cat_name . '</a></li>' . $breadcrumb_bridge_tag;
				}
			}
			$breadcrumb_html .= '<li><span class="p-breadcrumb__current">' . apply_filters( 'my_breadcrumb_title', single_cat_title( '', false ) ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_search() ) { /* Search Archive */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="p-breadcrumb__current">' . apply_filters( 'my_breadcrumb_title', '「' . get_query_var( 's' ) . '」の検索結果' ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_tag() ) { /* Tag Archive */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="p-breadcrumb__current">' . apply_filters( 'my_breadcrumb_title', single_tag_title( '', false ) ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_post_type_archive() ) { /* Other PostType Archive */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="p-breadcrumb__current">' . apply_filters( 'my_breadcrumb_title', post_type_archive_title( '', false ) ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_tax() ) { /* Term Archive */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '">' . esc_html( get_post_type_object( get_post_type() )->labels->name ) . '</a></li>' . $breadcrumb_bridge_tag;
			if ( $object_type ) {
				$thie_parents = get_ancestors( get_queried_object_id(), $object_type );
				if ( $thie_parents ) {
					$thie_parents       = array_reverse( $thie_parents );
					$this_parents_count = count( $thie_parents );
					for ( $i = 0; $i < $this_parents_count; $i++ ) {
						$this_parent_term = get_term( $thie_parents[ $i ], $object_type );
						$breadcrumb_html .= '<li><a href="' . get_category_link( $this_parent_term->term_id ) . '">' . $this_parent_term->name . '</a></li>' . $breadcrumb_bridge_tag;
					}
				}
			}
			$breadcrumb_html .= '<li><span class="p-breadcrumb__current">' . apply_filters( 'my_breadcrumb_title', single_term_title( '', false ) ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_author() ) { /* Author Archive */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="p-breadcrumb__current">' . apply_filters( 'my_breadcrumb_title', get_the_author() ) . '</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_date() ) { /* Date Archive */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$this_year        = get_query_var( 'year' );
			$this_month       = get_query_var( 'monthnum' );
			$this_day         = get_query_var( 'day' );
			if ( $this_year ) {
				$breadcrumb_html .= '<li><a href="' . get_year_link( $this_year ) . '">' . $this_year . '年' . '</a></li>' . $breadcrumb_bridge_tag;
			}
			if ( $this_month ) {
				$breadcrumb_html .= '<li><a href="' . get_month_link( $this_year, $this_month ) . '">' . $this_month . '月' . '</a></li>' . $breadcrumb_bridge_tag;
			}
			if ( $this_day ) {
				$breadcrumb_html .= '<li><a href="' . get_day_link( $this_year, $this_month, $this_day ) . '">' . $this_day . '日' . '</a></li>' . $breadcrumb_bridge_tag;
			}
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		} elseif ( is_404() ) { /* 404 */
			$breadcrumb_html .= $breadcrumb_beore . $breadcrumb_home_tag . $breadcrumb_bridge_tag;
			$breadcrumb_html .= '<li><span class="p-breadcrumb__current">404</span></li>';
			$breadcrumb_html .= $breadcrumb_after;
			echo wp_kses_post( $breadcrumb_html );

		}
	}
}
