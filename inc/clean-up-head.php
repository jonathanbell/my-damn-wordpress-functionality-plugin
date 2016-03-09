<?php

function mdwpfp_head_cleanup() {
	// EditURI link
	remove_action('wp_head', 'rsd_link');
	// windows live writer
	remove_action('wp_head', 'wlwmanifest_link');
	// WP version
	remove_action('wp_head', 'wp_generator');
	// remove WP version from css
	add_filter('style_loader_src', 'mdwpfp_remove_wp_ver_css_js', 9999);
	// remove Wp version from scripts
	add_filter('script_loader_src', 'mdwpfp_remove_wp_ver_css_js', 9999);
} // mdwpfp_head_cleanup()

// remove WP version from RSS
function mdwpfp_rss_version() { return ''; }

// remove WP version from scripts
function mdwpfp_remove_wp_ver_css_js($src) {
	if (strpos($src, 'ver='))
		$src = remove_query_arg('ver', $src);
	return $src;
}

// remove injected CSS for recent comments widget
function mdwpfp_remove_wp_widget_recent_comments_style() {
	if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
		remove_filter('wp_head', 'wp_widget_recent_comments_style');
	}
}

// remove injected CSS from recent comments widget
function mdwpfp_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}
}

// remove the <p> from around imgs: http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/
function mdwpfp_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

function mdwpfp_init_cleanup_head() {

  // launching operation cleanup
  add_action('init', 'mdwpfp_head_cleanup');
  // remove WP version from RSS
  add_filter('the_generator', 'mdwpfp_rss_version');
  // remove pesky injected css for recent comments widget
  add_filter('wp_head', 'mdwpfp_remove_wp_widget_recent_comments_style', 1);
  // clean up comment styles in the head
  add_action('wp_head', 'mdwpfp_remove_recent_comments_style', 1);
  // cleaning up random code around images
  add_filter('the_content', 'mdwpfp_filter_ptags_on_images');

} // mdwpfp_init()
