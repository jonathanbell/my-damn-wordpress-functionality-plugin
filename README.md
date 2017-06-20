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
- WP JSON API link (does not remove the actual REST API, just the link pointing to it inside `<head>`)
- WP version
- WP emoji scripts and CSS
- WP s.w.org dns-prefetch link
- WP version from CSS
- WP version from scripts

Removes these things from your sites's RSS feed: 

- WP version

Also: 

- Removes the `<p>` tags that Wordpress tends to place around `<img>` tags.

### Move JavaScript to the Bottom of the Page

We all know JavaScript belongs at the bottom of the page, right? Well, it does if your server still uses HTTP 1.1 :wink:

This plugin attempts to move JavaScript (even jQuery) from the `<head>` of the page to the bottom/footer of the page.

My Damn Wordpress Functionality Plugin will also remove:

- jQuery Migrate (One less HTTP connection to make). :smile:
- [wp-embed.js](https://wordpress.stackexchange.com/questions/211701/what-does-wp-embed-min-js-do-in-wordpress-4-4)

## Why This Plugin?

My Damn Wordpress Functionality Plugin is in use on my own site and provides me with the tweaks to WordPress that I like. Feel free to clone this plugin and use it on your own site. Also, pull requests are welcome. 

## Inspiration

Inspired by these cats:

- [https://css-tricks.com/wordpress-functionality-plugins/](https://css-tricks.com/wordpress-functionality-plugins/)
- ["Theme Plugins"](http://www.smashingmagazine.com/2011/09/how-to-create-a-wordpress-plugin/)
- [Bones](https://themble.com/bones/)
