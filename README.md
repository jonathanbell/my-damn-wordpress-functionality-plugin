My Damn Wordpress Functionality Plugin
======================================

![Tested on WordPress 4.8](https://img.shields.io/badge/wordpress-4.8%20tested-green.svg?style=flat-square)

## What This Plugin Does

### Add oEmbed Providers

Adds these [oEmbed providers](https://codex.wordpress.org/Embeds#oEmbed) (not installed by default):

  - [Codepen](https://codepen.io/)
  - [JSFiddle](https://jsfiddle.net/)

To add oEmbed support for GitHub or GitHub Gists, checkout [this plugin](https://en-ca.wordpress.org/plugins/github-embed/) or [this plugin](https://en-ca.wordpress.org/plugins/oembed-gist/).

### Clean Wordpress HTML/Markup

Removes these things from the `<head>` of your pages:

- Canonical link
- Edit URI link
- Windows live writer link
- WP shortlink
- Comment feed
- Start link
- Adjacent posts link
- Previous link
- WP JSON API link (does not remove the entire JS REST API, just the link pointing to it inside on the front-end inside `<head>` AND oEmbed discovery)
- WP version
- WP emoji scripts and CSS
- WP s.w.org dns-prefetch link
- WP version from CSS (query string since WP v4)
- WP version from scripts (query string since WP v4)

More tidying up outside of the `<head>`:

- Removes WP version from the RSS feed
- Removes the `<p>` tags that Wordpress tends to place around `<img>` tags
- Removes the injected CSS styling for the recent comments widget.
- Removes the injected CSS for the default WP photo gallery.

### Move JavaScript to the Bottom of the Page

We all know JavaScript belongs at the bottom of the page, right? Well, it does if your server still uses HTTP 1.1 :wink:

This plugin attempts to move JavaScript (even jQuery) from the `<head>` of the page to the bottom/footer of the page.

My Damn Wordpress Functionality Plugin will also remove:

- jQuery Migrate (One less HTTP connection to make). :smile:
- [wp-embed.js](https://wordpress.stackexchange.com/questions/211701/what-does-wp-embed-min-js-do-in-wordpress-4-4)

## Installation

1. [Download the latest release.](https://github.com/jonathanbell/my-damn-wordpress-functionality-plugin/archive/master.zip)
1. Go to `/wp-admin/plugin-install.php` on your site and click the "Upload Plugin" button.
1. Click "Choose File" and select the `.zip` file from step one.
1. Click "Install Now" and then "Activate Plugin".

## Why This Plugin?

My Damn Wordpress Functionality Plugin is in use on my own site and provides me with the tweaks to WordPress that I like. Feel free to clone this plugin and use it on your own site. Also, pull requests are welcome.

## Inspiration

Inspired by these cats:

- [https://css-tricks.com/wordpress-functionality-plugins/](https://css-tricks.com/wordpress-functionality-plugins/)
- [Smashing Magazine, "Theme Plugins"](http://www.smashingmagazine.com/2011/09/how-to-create-a-wordpress-plugin/)
- [Bones](https://themble.com/bones/)
