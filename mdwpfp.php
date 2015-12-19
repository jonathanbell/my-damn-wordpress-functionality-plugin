<?php
/**
 * Plugin Name:       My Damn Wordpress Functionality Plugin
 * Plugin URI:        https://github.com/jonathanbell/my-damn-wordpress-functionality-plugin
 * Description:       General functionality for my (and your?) Wordpress sites.
 * Version:           0.0.1-alpha
 * Author:            Jonathan Bell
 * Author URI:        http://30.jonathanbell.ca
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mdwpfp
 * Domain Path:       /lang
 */

reqUire_once('inc/clean-up-head.php'); // stuff that cleans up the <head>
require_once('inc/misc.php'); // other stuff

add_action('after_setup_theme', 'mdwpfp_init');
