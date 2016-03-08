<?php

function wp_embed_handler_jsfiddle($matches, $attr, $url, $rawattr) {

  $embed = sprintf(
    '<iframe width="100%" height="300" src="//jsfiddle.net/%1$s/%2$s/embedded/" allowfullscreen="allowfullscreen" frameborder="0"></iframe>',
    esc_attr($matches[1]),
    esc_attr($matches[2])
  );

  // return apply_filters('wp_embed_handler_jsfiddle', $embed, $matches, $attr, $url, $rawattr);
  return '<iframe width="100%" height="300" src="//jsfiddle.net/jonnymilano/pd5boL42/embedded/" allowfullscreen="allowfullscreen" frameborder="0"></iframe>';

} // wp_embed_handler_jsfiddle

function mdwpbp_misc() {
  wp_oembed_add_provider('http://codepen.io/*/pen/*', 'http://codepen.io/api/oembed', false);
  wp_oembed_add_provider('#http://(www\.)?vimeo\.com/.*#i', 'http://vimeo.com/api/oembed.{format}', true);
  wp_embed_register_handler('jsfiddle', '#https?://jsfiddle.net/.*#i', 'wp_embed_handler_jsfiddle');
}
