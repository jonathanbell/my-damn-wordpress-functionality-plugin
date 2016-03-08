<?php

function wp_embed_handler_jsfiddle($matches, $attr, $url, $rawattr) {

  $embed = sprintf(
    '<iframe width="100%" height="300" src="//jsfiddle.net/%1$s/%2$s/embedded/" allowfullscreen="allowfullscreen" frameborder="0"></iframe>',
    esc_attr($matches[1]),
    esc_attr($matches[2])
  );

  return apply_filters('embed_jsfiddle', $embed, $matches, $attr, $url, $rawattr);

} // wp_embed_handler_jsfiddle

function mdwpbp_misc() {
  wp_oembed_add_provider('http://codepen.io/*/pen/*', 'http://codepen.io/api/oembed', false);
  wp_oembed_add_provider('#http://(www\.)?vimeo\.com/.*#i', 'http://vimeo.com/api/oembed.{format}', true);
  wp_embed_register_handler('jsfiddle', '#http(?:s)://jsfiddle.net/(?:[a-zA-Z]+)/(?:^[a-zA-Z0-9_.-]*$)/*', 'wp_embed_handler_jsfiddle');
}
