<?php
/*
Plugin Name: Sitemap
Plugin URI: http://web-profile.com.ua/wordpress/plugins/page-list/
Description: Show list of pages with [pagelist], [subpages] and [siblings] shortcodes.
Version: 1.4
Author: webvitaly
Author Email: webvitaly(at)gmail.com
Author URI: http://web-profile.com.ua/wordpress/

Future features:
- add support exclude="current,5";
- exclude_by_alias;
- exclude_front_page;
- exclude_post_page;
*/

if ( !function_exists('pagelist_shortcode') ) {
	function pagelist_shortcode( $atts ) {
		global $post;
		$return = '';
		extract( shortcode_atts( array(
			'depth' => '0',
			'child_of' => '0',
			'exclude' => '0',
			'exclude_tree' => '',
			'include' => '0',
			'title_li' => '',
			'number' => '',
			'offset' => '',
			'meta_key' => '',
			'meta_value' => '',
			'show_date' => '',
			'sort_column' => 'menu_order, post_title',
			'sort_order' => 'ASC',
			'link_before' => '',
			'link_after' => '',
			'class' => ''
		), $atts ) );
		
		if( $child_of == 'current' || $child_of == 'this' ){
			$child_of = $post->ID;
		}
		if( $child_of == 'parent' ){
			$child_of = $post->post_parent;
		}
		if( $exclude == 'current' || $exclude == 'this' ){
			$exclude = $post->ID;
		}
		
		$page_list_args = array(
			'depth'        => $depth,
			'child_of'     => $child_of,
			'exclude'      => $exclude,
			'exclude_tree' => $exclude_tree,
			'include'      => $include,
			'title_li'     => $title_li,
			'number'       => $number,
			'offset'       => $offset,
			'meta_key'     => $meta_key,
			'meta_value'   => $meta_value,
			'show_date'    => $show_date,
			'date_format'  => get_option('date_format'),
			'echo'         => 0,
			'authors'      => '',
			'sort_column'  => $sort_column,
			'sort_order'   => $sort_order,
			'link_before'  => $link_before,
			'link_after'   => $link_after,
			'walker' => ''
		);
		$list_pages = wp_list_pages( $page_list_args );
		
		if ($list_pages) {
			$return = "\n".'<!-- powered by Page-list plugin ver. 1.4 (wordpress.org/extend/plugins/page-list/) -->'."\n";
			$return .= '<ul class="page-list '.$class.'">'."\n".$list_pages."\n".'</ul>';
		}else{
			$return = '';
		}
		return $return;
	}
	add_shortcode( 'pagelist', 'pagelist_shortcode' );
	add_shortcode( 'page-list', 'pagelist_shortcode' );
	add_shortcode( 'sitemap', 'pagelist_shortcode' );
}

if ( !function_exists('subpages_shortcode') ) {
	function subpages_shortcode( $atts ) {
		global $post;
		$return = '';
		extract( shortcode_atts( array(
			'depth' => '0',
			//'child_of' => '0',
			'exclude' => '0',
			'exclude_tree' => '',
			'include' => '0',
			'title_li' => '',
			'number' => '',
			'offset' => '',
			'meta_key' => '',
			'meta_value' => '',
			'show_date' => '',
			'sort_column' => 'menu_order, post_title',
			'sort_order' => 'ASC',
			'link_before' => '',
			'link_after' => '',
			'class' => ''
		), $atts ) );
		
		$page_list_args = array(
			'depth'        => $depth,
			'child_of'     => $post->ID,
			'exclude'      => $exclude,
			'exclude_tree' => $exclude_tree,
			'include'      => $include,
			'title_li'     => $title_li,
			'number'       => $number,
			'offset'       => $offset,
			'meta_key'     => $meta_key,
			'meta_value'   => $meta_value,
			'show_date'    => $show_date,
			'date_format'  => get_option('date_format'),
			'echo'         => 0,
			'authors'      => '',
			'sort_column'  => $sort_column,
			'sort_order'   => $sort_order,
			'link_before'  => $link_before,
			'link_after'   => $link_after,
			'walker' => ''
		);
		$list_pages = wp_list_pages( $page_list_args );
		
		if ($list_pages) {
			$return = "\n".'<!-- powered by Page-list plugin ver. 1.4 (wordpress.org/extend/plugins/page-list/) -->'."\n";
			$return .= '<ul class="page-list subpages-page-list '.$class.'">'."\n".$list_pages."\n".'</ul>';
		}else{
			$return = '';
		}
		return $return;
	}
	add_shortcode( 'subpages', 'subpages_shortcode' );
	add_shortcode( 'sub-pages', 'subpages_shortcode' );
	add_shortcode( 'children', 'subpages_shortcode' );
}

if ( !function_exists('siblings_shortcode') ) {
	function siblings_shortcode( $atts ) {
		global $post;
		$return = '';
		extract( shortcode_atts( array(
			'depth' => '0',
			//'child_of' => '0',
			'exclude' => '0',
			'exclude_tree' => '',
			'include' => '0',
			'title_li' => '',
			'number' => '',
			'offset' => '',
			'meta_key' => '',
			'meta_value' => '',
			'show_date' => '',
			'sort_column' => 'menu_order, post_title',
			'sort_order' => 'ASC',
			'link_before' => '',
			'link_after' => '',
			'class' => ''
		), $atts ) );
		
		if( $exclude == 'current' || $exclude == 'this' ){
			$exclude = $post->ID;
		}
		
		$page_list_args = array(
			'depth'        => $depth,
			'child_of'     => $post->post_parent,
			'exclude'      => $exclude,
			'exclude_tree' => $exclude_tree,
			'include'      => $include,
			'title_li'     => $title_li,
			'number'       => $number,
			'offset'       => $offset,
			'meta_key'     => $meta_key,
			'meta_value'   => $meta_value,
			'show_date'    => $show_date,
			'date_format'  => get_option('date_format'),
			'echo'         => 0,
			'authors'      => '',
			'sort_column'  => $sort_column,
			'sort_order'   => $sort_order,
			'link_before'  => $link_before,
			'link_after'   => $link_after,
			'walker' => ''
		);
		$list_pages = wp_list_pages( $page_list_args );
		
		if ($list_pages) {
			$return = "\n".'<!-- powered by Page-list plugin ver. 1.4 (wordpress.org/extend/plugins/page-list/) -->'."\n";
			$return .= '<ul class="page-list siblings-page-list '.$class.'">'."\n".$list_pages."\n".'</ul>';
		}else{
			$return = '';
		}
		return $return;
	}
	add_shortcode( 'siblings', 'siblings_shortcode' );
}
