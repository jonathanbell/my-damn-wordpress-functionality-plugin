<?php
/**
 * Plugin Name:       My Damn Wordpress Functionality Plugin
 * Plugin URI:        https://github.com/jonathanbell/my-damn-wordpress-functionality-plugin
 * Description:       A damn basic plugin that cleans up the HTML output of a Wordpress site. See the damn GitHub README file for more information.
 * Version:           0.0.2-alpha
 * Author:            Jonathan Bell
 * Author URI:        http://30.jonathanbell.ca
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mdwpfp
 */

require_once('inc/oembed.php');
require_once('inc/markup-cleanup.php');
require_once('inc/move-js.php');

add_action('init', 'mdwpbp_oembed');
add_action('after_setup_theme', 'mdwpfp_init_markup_cleanup');
add_action('wp_enqueue_scripts', 'mdwpbp_move_js', 999); 
