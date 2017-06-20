<?php

function mdwpfp_head_cleanup() {
  
  // Remove canonical link.
  remove_action('wp_head', 'rel_canonical');
  
  // Remove EditURI link from head.
  remove_action('wp_head', 'rsd_link');

  // Remove windows live writer link from head.
  remove_action('wp_head', 'wlwmanifest_link');

  // Remove WP shortlink from head.
  remove_action('wp_head', 'wp_shortlink_wp_head'); 

  // Remove comment feed from head.
  add_filter('feed_links_show_comments_feed', '__return_false');

  // Remove start link from head.
  remove_action('wp_head', 'start_post_rel_link', 10, 0);

  // Remove adjacent posts link from head.
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

  // Remove previous link from head.
  remove_action('wp_head', 'parent_post_rel_link', 10, 0);

  // Remove the link to WP JSON API from head.
  remove_action('wp_head', 'rest_output_link_wp_head', 10);
  remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

  // Remove WP version from output.
  remove_action('wp_head', 'wp_generator');

  // Remove WP emoji scripts and css.
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('admin_print_styles', 'print_emoji_styles');

  // Remove WP s.w.org dns-prefetch
  remove_action('wp_head', 'wp_resource_hints', 2);

	// Remove WP version from css.
	add_filter('style_loader_src', 'mdwpfp_remove_wp_ver_css_js', 9999);

	// Remove WP version from scripts.
	add_filter('script_loader_src', 'mdwpfp_remove_wp_ver_css_js', 9999);

} // mdwpfp_head_cleanup()

// Remove WP version from RSS.
function mdwpfp_rss_version() { return ''; }

// Remove WP version from CSS and JS. (Function called above).
function mdwpfp_remove_wp_ver_css_js($src) {
	if (strpos($src, 'ver='))
		$src = remove_query_arg('ver', $src);
	return $src;
}

// Remove the <p> from around <img>s: 
// http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/
function mdwpfp_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

function mdwpfp_init_markup_cleanup() {

  // Launch Operation Head Cleanup!
  add_action('init', 'mdwpfp_head_cleanup');

  // Remove WP version from the RSS feed.
  add_filter('the_generator', 'mdwpfp_rss_version');

  // Clean the WP generated code around images.
  add_filter('the_content', 'mdwpfp_filter_ptags_on_images');

} // mdwpfp_init_markup_cleanup
