=== Plugin Name ===
Contributors: eyn
Donate link: http://www.channel-ai.com/blog/donate.php?plugin=quicktime-embed
Tags: qt, QuickTime, video, media, embed, movie, mov, apple
Requires at least: 1.5
Tested up to: 2.3
Stable tag: 0.2

Standards compliant QuickTime embedding in your blog posts using Javascript, supports vodcasting.

== Description ==

Adds QuickTime movies into your blog using simple, intuitive inline [qt:] tags.

Features:

* uses simple, intuitive tags to generate QuickTime movies for your posts
* standards compliant: valid XHTML
* movie autostart can be globally turned on or off
* supports poster movie
* supports text only output for RSS that ask reader to visit the original post for QuickTime content
* supports vodcasting
* requires javascript to display content, but will prompt user to enable Javascript when disabled
* no annoying ActiveX pop ups for users that do not have QuickTime installed


== Screenshots ==

1. QuickTime Embed plugin in action

== Usage ==

This plugin uses one universal, standard tag style:

	[qt:url width height]

* qt - the URL of the QuickTime movie file you want to embed, the path can either be site-relative or absolute
* width - width of the QuickTime movie
* height - height of the QuickTime movie

More usage details can be found at the plugin's homepage.

== Installation ==

1. Download and extract the “quicktime-embed” folder
1. Upload the “quicktime-embed” folder to your WordPress plugin directory, usually “wp-content/plugins”
1. Activate the plugin in your WordPress admin panel

== History ==

0.2 [2008.03.02]

* Major rewrite of the code
* Added: show hide controller feature
* Added: target cache feature
* Added: custom movie and poster path feature
* Added: global poster feature
* Added: global enable/disable poster feature
* Fixed: automatically detect .m4v filesize
* Fixed: height + 16px hassle

0.1.1 [2007.10.08]

* Fixed server path error
* Added kiosk mode support

0.1 [2006.07.09]

* Initial release

