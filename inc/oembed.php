<?php

/**
 * Add extra oEmbed providers via thier own APIs via wp_oembed_add_provider().
 */
function mdwpbp_oembed() {
  wp_oembed_add_provider('http://codepen.io/*/pen/*', 'http://codepen.io/api/oembed', false);
}

/**
 * Add JSFiddle auto oEmbeds.
 * JSFiddle does not have an oEmbed API, so we must write some custom code using wp_embed_register_handler().
 */
class JSFiddle_oEmbed {

  public function __construct() {
    add_action('init', array($this, 'setup_handler'));
  }

  public function result($url) {
    $url = $url[0];
    $height = '500';
    $width = '100%';
    $query = parse_url($url,PHP_URL_QUERY);
    $url = trailingslashit(preg_replace('#\?.+#i', '', $url));
    parse_str($query, $query);
    if (isset($query['height'])) {
      $height = $query['height'];
    }
    if (isset($query['width'])) {
      $width = $query['width'];
    }
    if(!preg_match('#/embedded/#i', $url)) {
      $url .= 'embedded/';
    }
    return '<iframe width="'.$width.'" height="'.$height.'" src="'.$url.'result,html,js,css/dark/" allowfullscreen="allowfullscreen" frameborder="0"></iframe>';
  }

  public function setup_handler() {
    wp_embed_register_handler('jsfiddle', '#https?://jsfiddle.net/.*#i', array($this, 'result'));
  }

}
// Create a new JSFiddle_oEmbed object.
$jsfiddle_oembed = new JSFiddle_oEmbed();
