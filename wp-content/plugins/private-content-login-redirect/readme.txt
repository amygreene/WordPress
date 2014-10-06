=== Private Content Login Redirect === 
Contributors: meabhisek  
Tags: private content, redirection, login  
Requires at least: 3.0 
Tested up to: 4.0 
Stable tag: trunk
License: GPLv2
	
Redirects non-logged users to login page when they follow a private post or private page link.

==Mods for usage with CAS auth==
adds an extra /sitename/sitename on redirect
remove ["REQUEST_URI"]

original:    
$location = wp_login_url($_SERVER["REQUEST_URI"]);

becomes:
$location = wp_login_url($_SERVER);


==Description== 

Do you post private content? Are you sending those links to your users with private content access? 

WordPress by default redirects all non-logged users to a 404(content not found) page when they follow a private post or private page link.Instead of showing a 404 page, this plugin simply redirects those users to the login page.After successful login, it automatically redirects users with private content access to the private content link they followed.

**Note**: If you post private content and want to get more subscribers to read your private content, I developed a Free plugin for that too...Check out  [Mini Membership](http://wordpress.org/plugins/mini-membership/).


Follow the developer on [Twitter](https://twitter.com/twitabhisek)
Visit [Developer Website](http://increasy.com)



==Installation== 

1. Download The Private Content Login Redirect package file, extract the private-content-login-redirect directory from ZIP file, upload it to WordPress Plugins directory '/wp-content/plugins/' or install plugin from Plugin panel in WordPress Dashboard 

2. Activate Private Content Login Redirect via Plugin page                 

3. All set

If you are new to WordPress : [Installing Plugins](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)