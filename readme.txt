=== Songkick Concerts and Festivals ===
Contributors: saleandro, coox
Tags: songkick, concerts, events, festivals, widget
Requires at least: 2.8.2
Tested up to: 3.0.1
Stable tag: trunk

This plugin lets you display upcoming events for a Songkick user or artist on your WordPress blog.
It can be used as a widget or shortcode.

== Description ==

This plugin lets you display upcoming events for a Songkick user or artist on your WordPress blog.

Events can be displayed by adding the Songkick widget to your template, or by adding the shortcode [songkick_concerts_and_festivals] anywhere in your blog.

Go to the Settings page to configure the plugin. For a user, simply put your username in the admin interface. For an artist, you should use the artist's Songkick id, as shown in the url for your artist page. For example, the url "http://www.songkick.com/artists/123-your-name" has the id "123".

Different artist and user ids can be set using the shortcode function:

*   Users:   `[songkick_concerts_and_festivals songkick_id=your_username songkick_id_type=user]`
*   Artists: `[songkick_concerts_and_festivals songkick_id=your_artist_id songkick_id_type=artist]`

You'll need a Songkick API key. Apply for a key here: [Songkick API docs](http://www.songkick.com/developer)

== Installation ==

1. Upload the directory "songkick_concerts_and_festivals" to the "/wp-content/plugins/" directory
1. Activate the plugin through the "Plugins" menu
1. Go to the Settings page for Songkick and set your username/artist ID and API key. Apply for a key here: http://www.songkick.com/developer
1. Add the widget to a sidebar or the shortcode anywhere in your blog.

== Changelog ==

= 0.6 =
* Added shortcode

= 0.7 =
* Fixed some warnings
* Made calendar date style inline

= 0.8 =
* Fixed bug where shortcode content would always display on top of other content

= 0.9 =
* Default options can be overridden when calling shortcode function. This means you can use the plugin for different users and artists.
See Songkick's admin settings for details.
