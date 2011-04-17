<?php
/*
Plugin Name: Sitemap
Plugin URI: http://web-profile.com.ua/wordpress/plugins/sitemap/
Description: Show sitemap with [sitemap] shortcode.
Version: 1.0.0
Author: webvitaly
Author Email: webvitaly(at)gmail.com
Author URI: http://web-profile.com.ua/
*/

function sitemap_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'depth' => '0',
		'child_of' => '0',
		'exclude' => '0'
	), $atts ) );
	
	$return = '';
	
	$list_pages_args = array(
	'depth'        => $depth,
	'show_date'    => '',
	'date_format'  => get_option('date_format'),
	'child_of'     => $child_of,
	'exclude'      => $exclude,
	'include'      => '',
	'title_li'     => '',
	'echo'         => 0,
	'authors'      => '',
	'sort_column'  => 'menu_order, post_title',
	'link_before'  => '',
	'link_after'   => '',
	'walker' => '' );
	
	$list_pages = wp_list_pages( $list_pages_args );
	
	$return = '<ul>'.$list_pages.'</ul>';
	
	return $return;
}
add_shortcode( 'sitemap', 'sitemap_shortcode' );
