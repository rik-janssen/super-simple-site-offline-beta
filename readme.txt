=== Super Simple Site Offline ===
Contributors: @betacore
Tags: offline mode, under construction, redirect
Requires at least: 5.2
Tested up to: 5.8
Requires PHP: 7
Stable tag: 2.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Simple Site Offline by Beta is a super simple but versatile site-offline plugin. No bells and whistles, just straight to the point. A nice little maintenance message. Nothing more.

== Description ==
I experienced most site offline plugins as bulky, intrusive and annoying. Super Simple Site Offline is as light as a feather and has no paid options. The nav item is neatly tucked away within the settings menu so it feels like it is part of Wordpress. The relative simple options makes this plugin a good choice for quick maintenance work on your website, longer under construction signalling or even forwarding entire websites to another URL.

= Super Simple Site Offline contains the following features: =
* Simple enable and disable button and settings page to toggle the offline mode of your entire website.
* Custom background, display text and the option to add a logo to your offline landing page.
* A redirect option for if you want to close a site and make sure all the trafic is forwarded to the new site. Of course with the proper HTTP headers so Google knows what your intentions are.
* Put a form below or in your message using shortcode to gather emailadresses or other important information so that your offline page turns in to a simple temporary landing page and you do not mis out on leads.
* Add the ip addresses of your clients or other people so they have unrestricted access to the website while the rest of the world will see an 'offline message'. [NEW!]
* Whitelist pages so that they are not affected by the offline-mode. [NEW!]

== Installation ==
1. Upload the unpacked folder to the "/wp-content/plugins/" directory or install it via the WP plugin directory accessable by your WP instance.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Go to the settings menu and activate the offline mode, set up your offline page and add a nice little message.

== Frequently Asked Questions ==
= Can it do a redirect? =
Oh yes it sure can! The best redirect you've ever seen.

= Does it work with shortcodes? =
Oh yeah! Now it does! Thanks to Bill P. Thanks for the idea!

= How customisable is it? =
At the moment you can edit the background image, logo, text and css. Custom HTML will be a future feature. But for now it's perfect as a quick and simple solution.

= Is half of it unusable because I have to pay? =
No. The entire thing is free and it will be in the future.

= What about foo bar? =
To answer to foo bar dilemma. We still don't know how the foo hit the bar. But 42 is always the answer as far as I'm concerned.

== Screenshots ==
1. Some of the options you can work with all neatly tucked away under the settings tab.
2. Even some custom CSS, and header information and Google Analytics/Google Tag Manager magic is possible.
3. Select your logo and enjoy a classic Wordpress view.
4. If you want a background image, no problem! Branding is really simple.

== Changelog ==
= 2.0 =
This version is a major release. Please check all the functions and settings you've made earlier.
* Grouped a bunch of functions in classes
* Editor upgrade, now it has a nice editor for your message
* Added a way to exempt pages from being hidden (thanks Christian Zumbrunnen)
* Added a way to exempt ip addresses from being shown the offline message 
* Restructured the admin page a bit
* testing up to 5.7.2 and 5.8 
* removed some not-needed files such as images

= 1.10 =
* Fixed an escape bug (thanks @pattihis)
* Tested up to 5.7

= 1.9 =
* Added a way to check for bugs and keep track of running instances.
* Added a notification about WP Audit
* Cleaned up the install/uninstall functions

= 1.8.1 =
* Added shortcode support to the message field
* Added some extra sanitisation for safety
* Fixed a undefined variable issue

= 1.8 =
* Tested for WP 5.5

= 1.7.7 =
* Tested for WP 5.4

= 1.7.5 =
* Small link in footer fix

= 1.7 - 1.7.4 = 
* Added some headers
* Added a documentation link
* Added a template
* Removed some grammar errors

= 1.6 and 1.6.1 =
* Problem solved with open ended php files (gave errors at header level)
* Problem solved with some style and image files.

= 1.4 =
* Some small fixes and new artwork

= 1.3.5 =
* Wordpress 5.3 ready and tested

= 1.3 =
* Landing page HTML tag fix
* Added some extra themes

= 1.2 =
* Gui fixes

= 1.1 =
* Added languages
* Some small fixes

= 1.0 =
The full release!
* Added different themes for the offline page.
* A preview button so you can check it out when you are logged in.
* Google Analytics or Tagmanager code.
* Added the classes to the CSS edit box for your convenience.

= 0.9 =
* Some stylesheet fixes for when the plugin is not activated.
* Changed a couple of labels on the admin -> settings -> offline page to make it neater and more convenient.

= 0.8 =
* Initial release.

= Up to 0.7 =
* Lots and lots of updates that happened on my own server but didn't take the time to write them down.

== Upgrade Notice ==

= 1.4 =
* This is the most stable version of the plugin so far.

= 0.8 =
* Some improved functions since the previous versions.
