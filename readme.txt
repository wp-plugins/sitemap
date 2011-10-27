=== Sitemap ===
Contributors: webvitaly
Plugin URI: http://web-profile.com.ua/wordpress/plugins/page-list/
Tags: page, page-list, pagelist, sitemap, subpages
Author URI: http://web-profile.com.ua/wordpress/
Requires at least: 3.0
Tested up to: 3.3
Stable tag: 1.4

"Sitemap" plugin helps you to show list of pages with [pagelist], [subpages] and [siblings] shortcodes.

== Description ==

Code moved to [page-list plugin](http://wordpress.org/extend/plugins/page-list/).

You can use aditional parameters: `[pagelist depth="2" child_of="4" exclude="6,7,8"]`.

Plugin is based on [wp_list_pages('title_li=')](http://codex.wordpress.org/Template_Tags/wp_list_pages) function;
= Examples: =
* show hierarchical tree of pages: `[pagelist]`;
* show hierarchical tree of subpages: `[subpages]`;
* show hierarchical tree of sibling pages: `[siblings]`;

[Sitemap plugin page](http://web-profile.com.ua/wordpress/plugins/page-list/)

[CMS WordPress](http://web-profile.com.ua/wordpress/)

== Other Notes ==

= Documentation =

Plugin is based on [wp_list_pages('title_li=')](http://codex.wordpress.org/Template_Tags/wp_list_pages) function;
You can use aditional parameters: **`[pagelist depth="2" child_of="4" exclude="6,7,8"]`**.
Shortcodes [pagelist], [subpages] and [siblings] accept the same parameters. The only difference is that [subpages] and [siblings] not accept  `child_of` parameter, because [subpages] shows subpages to the current page and [siblings] shows subpages to the parent page.

= Parameters: =
* depth - means how many levels in the hierarchy of pages are to be included in the list, by default depth is unlimited (depth=0), but you can specify it like this: `[pagelist depth="3"]`;
* if you want to show flat list of pages (not hierarchical tree) you can use this shortcode: `[pagelist depth="-1"]`;
* if you want to show subpages of the specific page you can use this shortcode: `[pagelist child_of="4"]` where `4` is the ID of the specific page;
* if you want to show subpages of the current page you can use this shortcodes: `[subpages]` or `[pagelist child_of="current"]` or `[pagelist child_of="this"]`;
* if you want to show sibling pages of the current page you can use this shortcodes: `[siblings]` or `[pagelist child_of="parent"]`;
* if you want to exclude some pages from the list you can use this shortcode: `[pagelist exclude="6,7,8"]` where `exclude` parameter accepts comma-separated list of Page IDs; You may exclude current page with this shortcode: `[pagelist exclude="current"]`;
* if you want to exclude the tree of pages from the list you can use this shortcode: `[pagelist exclude_tree="7,10"]` where `exclude_tree` parameter accepts comma-separated list of Page IDs (all this pages and their subpages will be excluded);
* if you want to include certain pages into the list of pages you can use this shortcode: `[pagelist include="6,7,8"]` where `include` parameter accepts comma-separated list of Page IDs;
* if you want to specify the title of the list of pages you can use this shortcode: `[pagelist title_li="<h2>List of pages</h2>"]`; by default there is no title (title_li="");
* if you want to specify the number of pages to be included into list of pages you can use this shortcode: `[pagelist number="10"]`; by default the number is unlimited (number="");
* if you want to pass over (or displace) some pages you can use this shortcode: `[pagelist offset="5"]`; by default there is no offset (offset="");
* if you want to include the pages that have this Custom Field Key you can use this shortcode: `[pagelist meta_key="metakey" meta_value="metaval"]`;
* if you want to show the date of the page you can use this shortcode: `[pagelist show_date="created"]`; you can use this values for `show_date` parameter: created, modified, updated;
* if you want to specify the column by what to sort you can use this shortcode: `[pagelist sort_column="menu_order"]`; by default order columns are `menu_order` and `post_title` (sort_column="menu_order, post_title"); you can use this values for `sort_column` parameter: post_title, menu_order, post_date (sort by creation time), post_modified (sort by last modified time), ID, post_author (sort by the page author's numeric ID), post_name (sort by page slug);
* if you want to change the sort order of the list of pages (either ascending or descending) you can use this shortcode: `[pagelist sort_order="desc"]`; by default sort_order is `asc` (sort_order="asc"); you can use this values for `sort_order` parameter: asc, desc;
* if you want to specify the text or html that precedes the link text inside the link tag you can use this shortcode: `[pagelist link_before="<span>"]`; you may specify html tags only in the `HTML` tab in your Rich-text editor;
* if you want to specify the text or html that follows the link text inside the link tag you can use this shortcode: `[pagelist link_after="</span>"]`; you may specify html tags only in the `HTML` tab in your Rich-text editor;
* if you want to specify the CSS class for list of pages you can use this shortcode: `[pagelist class="listclass"]`; by default the class is empty (class="");

== Changelog ==

= 1.4 =
* Added exclude="current" parameter;

= 1.3.0 =
* Added class to ul elements by default;
* Added "class" option (thanks to Arvind);

= 1.2.0 =
* Added [subpages] and [siblings] shortcodes;

= 1.0.0 =
* Initial release;

== Installation ==

1. Install plugin and activate it on the Plugins page;
2. Add shortcode `[pagelist]`, `[subpages]` or `[siblings]` to page content;
