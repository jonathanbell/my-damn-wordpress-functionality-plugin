<?php

// Remove jQuery Migrate.
function mdwpfp_dequeue_jquery_migrate($scripts) {
  if (is_admin()) {
    return;
  }
  if (!empty($scripts->registered['jquery'])) {
    $jquery_dependencies = $scripts->registered['jquery']->deps;
    $scripts->registered['jquery']->deps = array_diff($jquery_dependencies, array('jquery-migrate'));
  }
}
add_action('wp_default_scripts', 'mdwpfp_dequeue_jquery_migrate');

// Move jQuery to the bottom of the page.
function mdwpfp_move_jquery_into_footer($wp_scripts) {
  if (is_admin()) {
    return;
  }
  $wp_scripts->add_data('jquery', 'group', 1);
  $wp_scripts->add_data('jquery-core', 'group', 1);
  // $wp_scripts->add_data('jquery-migrate', 'group', 1); // (jQuery Migrate already removed).
}
add_action('wp_default_scripts', 'mdwpfp_move_jquery_into_footer');

// Remove wp-embed.min.js
// Borrowed from the Disable Embeds Plugin:
// https://wordpress.org/plugins/disable-embeds/
function mdwpfp_remove_wp_embed() {

  // Remove the REST API endpoint.
  remove_action('rest_api_init', 'wp_oembed_register_route');

  // Turn off oEmbed auto discovery.
  remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

  // Remove oEmbed discovery links.
  remove_action('wp_head', 'wp_oembed_add_discovery_links');

  // Remove oEmbed-specific JavaScript from the front-end and back-end.
  remove_action('wp_head', 'wp_oembed_add_host_js');

}
add_action('init', 'mdwpfp_remove_wp_embed', PHP_INT_MAX - 1);

/**
 * Move the damn JavaScripts to the bottom of the damn page.
 */
function mdwpbp_move_js() {

  // Don't echo the scripts in the <head>.
  remove_action('wp_head', 'wp_print_scripts');
  remove_action('wp_head', 'wp_print_head_scripts', 9);
  remove_action('wp_head', 'wp_enqueue_scripts', 1);

  // Print the <head> scripts in the footer instead, next to the closing <body> tag.
  // Give add_action() a third param if you want to prioritize:
  // https://developer.wordpress.org/reference/functions/add_action/
  add_action('wp_footer', 'wp_print_scripts', 5);
  add_action('wp_footer', 'wp_enqueue_scripts', 5);
  add_action('wp_footer', 'wp_print_head_scripts', 5);

}
