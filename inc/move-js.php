<?php

// move JS to footer
function mdwpbp_move_js() {
  remove_action('wp_head', 'wp_print_scripts');
  remove_action('wp_head', 'wp_print_head_scripts', 9);
  remove_action('wp_head', 'wp_enqueue_scripts', 1);
  
  // Give add_action() a third param if you want to prioritize:
  // https://developer.wordpress.org/reference/functions/add_action/
  add_action('wp_footer', 'wp_print_scripts');
  add_action('wp_footer', 'wp_enqueue_scripts');
  add_action('wp_footer', 'wp_print_head_scripts');
}
