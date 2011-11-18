<?php
/*
Plugin Name: Sitemap
Plugin URI: http://web-profile.com.ua/wordpress/plugins/page-list/
Description: Show list of pages with [pagelist], [subpages], [siblings] and [pagelist_ext] shortcodes.
Version: 1.7
Author: webvitaly
Author Email: webvitaly(at)gmail.com
Author URI: http://web-profile.com.ua/wordpress/

Future features:
- add support exclude="current,5";
- exclude_by_alias;
- exclude_front_page;
- exclude_post_page;
*/

add_action('wp_print_styles', 'page_list_add_stylesheet');
function page_list_add_stylesheet() {
	wp_enqueue_style( 'page-list-style', plugins_url( '/css/page-list.css', __FILE__ ), false, '1.7', 'all' );
}

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
			$return = "\n".'<!-- powered by Page-list plugin ver.1.7 (wordpress.org/extend/plugins/page-list/) -->'."\n";
			$return .= '<ul class="page-list '.$class.'">'."\n".$list_pages."\n".'</ul>';
		}else{
			$return = '';
		}
		return $return;
	}
	add_shortcode( 'pagelist', 'pagelist_shortcode' );
	add_shortcode( 'page_list', 'pagelist_shortcode' );
	add_shortcode( 'page-list', 'pagelist_shortcode' ); // not good (Shortcode names should be all lowercase and use all letters, but numbers and underscores (not dashes!) should work fine too.)
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
			$return = "\n".'<!-- powered by Page-list plugin ver.1.7 (wordpress.org/extend/plugins/page-list/) -->'."\n";
			$return .= '<ul class="page-list subpages-page-list '.$class.'">'."\n".$list_pages."\n".'</ul>';
		}else{
			$return = '';
		}
		return $return;
	}
	add_shortcode( 'subpages', 'subpages_shortcode' );
	add_shortcode( 'sub_pages', 'subpages_shortcode' );
	add_shortcode( 'sub-pages', 'subpages_shortcode' ); // not good (Shortcode names should be all lowercase and use all letters, but numbers and underscores (not dashes!) should work fine too.)
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
			$return = "\n".'<!-- powered by Page-list plugin ver.1.7 (wordpress.org/extend/plugins/page-list/) -->'."\n";
			$return .= '<ul class="page-list siblings-page-list '.$class.'">'."\n".$list_pages."\n".'</ul>';
		}else{
			$return = '';
		}
		return $return;
	}
	add_shortcode( 'siblings', 'siblings_shortcode' );
}

if ( !function_exists('pagelist_ext_shortcode') ) {
	function pagelist_ext_shortcode( $atts ) {
		global $post;
		$return = '';
		extract( shortcode_atts( array(
			'show_image' => 1,
			'show_title' => 1,
			'show_content' => 1,
			'limit_content' => 250,
			'image_width' => '40',
			'image_height' => '40',
			'child_of' => '0',
			'sort_order' => 'ASC',
			'sort_column' => 'menu_order, post_title',
			'hierarchical' => 1,
			'exclude' => '0',
			'include' => '0',
			'meta_key' => '',
			'meta_value' => '',
			'authors' => '',
			'parent' => -1,
			'exclude_tree' => '',
			'number' => '',
			'offset' => 0,
			'post_type' => 'page',
			'post_status' => 'publish',
			'class' => '',
			'strip_tags' => 1
		), $atts ) );
		
		if( $child_of == 'current' || $child_of == 'this' || $child_of == '0' ){
			$child_of = $post->ID;
		}
		
		if( $exclude == 'current' || $exclude == 'this' ){
			$exclude = $post->ID;
		}
		
		$page_list_image_args = array(
			'show_image' => $show_image,
			'show_title' => $show_title,
			'show_content' => $show_content,
			'limit_content' => $limit_content,
			'image_width' => $image_width,
			'image_height' => $image_height,
			'child_of' => $child_of,
			'sort_order' => $sort_order,
			'sort_column' => $sort_column,
			'hierarchical' => $hierarchical,
			'exclude' => $exclude,
			'include' => $include,
			'meta_key'     => $meta_key,
			'meta_value'   => $meta_value,
			'authors' => $authors,
			'parent' => $parent,
			'exclude_tree' => $exclude_tree,
			'number' => $number,
			'offset' => $offset,
			'post_type' => $post_type,
			'post_status' => $post_status,
			'class' => $class,
			'strip_tags' => $strip_tags
		);
		$list_pages = get_pages( $page_list_image_args );
		$list_pages_html = '';
		foreach($list_pages as $page){
			$link = get_permalink( $page->ID );
			$list_pages_html .= '<div class="page-list-ext-item">';
			if( $show_image == 1 ){
				if( get_the_post_thumbnail($page->ID) ){
					$list_pages_html .= '<div class="page-list-ext-image"><a href="'.$link.'" title="'.$page->post_title.'">';
					$list_pages_html .= get_the_post_thumbnail($page->ID, array($image_width,$image_height));
					$list_pages_html .= '</a></div> ';
				}
			}
			if( $show_title == 1 ){
				$list_pages_html .= '<h3 class="page-list-ext-title"><a href="'.$link.'" title="'.$page->post_title.'">'.$page->post_title.'</a></h3>';
			}
			if( $show_content == 1 ){
				$content = apply_filters('the_content', $page->post_content);
				$content = str_replace(']]>', ']]&gt;', $content);
				$content = page_list_parse_content( $page->post_content, $limit_content, $strip_tags );
				
				$list_pages_html .= '<div class="page-list-ext-item-content">'.$content.'</div>';
			}
			
			$list_pages_html .= '</div>'."\n";
		}
		if ($list_pages_html) {
			$return = "\n".'<!-- powered by Page-list plugin ver.1.7 (wordpress.org/extend/plugins/page-list/) -->'."\n";
			$return .= '<div class="page-list page-list-ext '.$class.'">'."\n".$list_pages_html."\n".'</div>';
		}else{
			$return = '';
		}
		return $return;
	}
	add_shortcode( 'pagelist_ext', 'pagelist_ext_shortcode' );
}


if ( !function_exists('page_list_parse_content') ) {
	function page_list_parse_content($content, $limit_content = 250, $strip_tags = 1) {
		global $more, $preview;
		
		$output = '';
		
		if ( preg_match('/<!--more(.*?)?-->/', $content, $matches) ) {
			$content = explode($matches[0], $content, 2);
			
		} else {
			if( $strip_tags ){
				$content_stripped = strip_tags($content); // ,'<p>'
			}else{
				$content_stripped = $content;
			}
			
			if( strlen($content_stripped) > $limit_content ){
				$pos = strpos($content_stripped, ' ', $limit_content);
				if ($pos !== false) {
					$first_space_pos = $pos;
				}else{
					$first_space_pos = $limit_content;
				}
				$content_cut = mb_substr($content_stripped, 0, $first_space_pos,'UTF-8');
				$content = $content_cut.'...';
			}else{
				$content = $content_stripped;
			}
			$content = array($content);
		}
		
		$output .= $content[0];
		
		$output = force_balance_tags($output);
		
		return $output;
	}
}