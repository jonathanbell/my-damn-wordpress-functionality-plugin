<?php

function mdwpbp_misc() {
  // add extra inline embed copy/paste links (in the editor)
  wp_oembed_add_provider('http://codepen.io/*/pen/*', 'http://codepen.io/api/oembed', false);
  wp_oembed_add_provider('#http://(www\.)?vimeo\.com/.*#i', 'http://vimeo.com/api/oembed.{format}', true);
}

// add JSFiddle auto embeds
class JSFiddle_oEmbed {

  public function __construct() {
    add_action('init', array($this, 'setup_handler'));
  }

  public function result($url){
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

} // class JSFiddle_oEmbed
$jsfiddle_oembed = new JSFiddle_oEmbed();
