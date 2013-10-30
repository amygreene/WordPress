=== Slim Jetpack ===
Contributors: wingerspeed
Tags: jetpack, slim jetpack, views, tweets, twitter, widget, gravatar, hovercards, profile, equations, latex, math, maths, youtube, shortcode, archives, audio, blip, bliptv, dailymotion, digg, flickr, googlevideo, google, googlemaps, kyte, kytetv, livevideo, redlasso, rockyou, rss, scribd, slide, slideshare, soundcloud, vimeo, shortlinks, wp.me, subscriptions, notifications, notes, json, api, rest, mosaic, gallery, slideshow
Requires at least: 3.5
Tested up to: 3.6
Stable tag: 2.5.0.2

Slim version of Jetpack unlinked from WordPress.com :)
Supercharge your self-hosted wp site even you're NOT WP.COM users.

== Description ==

[Jetpack](http://jetpack.me/) is an awesome plugin bundle provided by the Automattic, but it requires WordPress.com account
even for those modules previously work as independent plugins. The marketing banners are very obtrusive too.

I smashed the bundle to remove the annoying parts and keep the awesomeness. Slim Jetpack will track the updates of Jetpack modules,
but is definitely INCOMPATIBLE with its original version because a lot of API functions had been mocked or removed.

All credit goes to original developers @
[Jetpack](http://wordpress.org/extend/plugins/jetpack/developers/)!

SlimJetpack 2.1.1.x is corresponding to Jetpack 2.1.1 and the x is the bugfix mark.

If you need the wordpress.com likes/stats, subscription and push notification services etc., please deactivate Slim Jetpack
and use the original Jetpack instead.

==Modules Included==

* Beautiful Math
* Carousel
* Contact Form
* Custom CSS
* Extra Sidebar Widgets
* Gravatar Hovercards
* Holiday Snow (Put back since v2.4.2)
* Infinite Scroll
* Minileven Mobile Theme
* Omnisearch
* Sharing
* Spelling and Grammar (Partly Available)
* Tiled Galleries (Partly Available)
* Widget Visibility (New from v2.4.2)
* WordPress.com Connect (New from v2.4.2)

==Modules Removed==

* Photon (Supported) <But violates ToS of WP.COM.
  You may put the module back and use at your own RISK!>
* WordPress.com Stats
* Wp.me shortlinks
* Publicize
* Notifications
* Google+ Profile
* VideoPress
* Jetpack Comments
* Likes
* Subscriptions
* Post by Email
* VaultPress
* JSON API
* Mobile Push Notifications
* Enhanced Distribution

== Installation ==

1. Install Slim Jetpack either via the WordPress.org plugin directory or by uploading the files to your server
2. Go to Settings-->Slim Jetpack and activate the modules you need. Configure them if the 'configure' buttons appear. You need at least 'activate_plugins' capability to access the configuration page.
   Click 'toggle' to show the 'deactivate' button and the infinite-scroll module is only for twenty-xxx series themes, you may extend it to support your own themes.
3. That's it.  You're ready to go!

== Frequently Asked Questions ==

How many files are touched? Use a comparing tool to find out. But as I
remember, the list is:

Modified: jetpack.php(->slimjetpack.php), class.jetpack.php

Removed: files and folders of all removed modules

Not all unused blocks are removed from jetpack.php which might cause problems but if it works,just ignore them :-)

I believe the functions I touched won't cause security issues, but use at your own risk!

If you don't like certain modules, just delete them :-)

If you need a new module from Jetpack future releases, copy the files into Slim Jetpack and try.

It should work without problem :)

== Screenshots ==

1. SlimJetpack

http://plugins.svn.wordpress.org/slimjetpack/assets/SlimJetpack.png

== Weight-loss Diary ==

= 2.5.0.2 =
* Remove photon support to avoid conflicts

= 2.5 =
* Update to Jetpack v2.5

= 2.4.2 =
* Update to Jetpack v2.4.2
* Lift the configuration page access capability to "activate_plugins"
* Put back "Holiday Snow" module, because holidays are coming :)

= 2.3.3 =
* Updated to Jetpack v2.3.3

= 2.2.2 =
* Added Jetpack check before activation
* Removed wp.me shortlinks module

= 2.1.1 =
* Removed and mocked the api authentication codes
* Removed the admin marketing banners
* Disabled the 'Learn More' slide box and make all screen clean
* Changed the Jetpack admin menu into Settings -> Slim Jetpack submenu
* Changed the default status of modules to be 'inactive'


== Original Jetpack Changelog ==

= 2.5 =
* Enhancement: Connect your Google+ profile and WordPress site to prove authorship of posts. 
* Enhancement: Improved sharing buttons display.
* Enhancement: Comment on your posts using Google+ to signin.
* Enhancement: Embed Google+ posts into your posts.
* Enhancement: Added event logging capabilities for debugging
* Enhancement: LaTeX is now available in dev mode
* Enhancement: Introduced gallery widget
* Enhancement: Added new module: VideoPress
* Enhancement: Updated identity crisis checker
* Enhancement: Tiled Gallery widget added
* Enhancement: Google +1 button changed to Google+ Share button, to avoid confusion
* Enhancement: Added check to ensure Google+ authorship accounts have disconnected properly
* Enhancement: Updated identity crisis checker
* Enhancement: Tiled Gallery widget added
* Enhancement: Google +1 button changed to Google+ Share button, to avoid confusion
* Enhancement: Added the ability to embed Facebook posts
* Bug Fix: Redirect issue with G+ authorship when WordPress is not in the root directory
* Enhancement: Better security if carousel to prevent self-XSS
* Enhancement: Better handling of cookies for subsites on multisite installs
* Bug Fix: Check for post in G+ authorship before accessing it


