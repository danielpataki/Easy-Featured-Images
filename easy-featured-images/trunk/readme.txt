=== Easy Featured Images ===
Contributors: danielpataki
Tags: media, featured images, ajax
Requires at least: 3.5.0
Tested up to: 4.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows you to add and remove featured images from admin post lists. Works with AJAX and magic for your image assignment pleasure.

== Description ==

Easy Featured Images allows you to assign featured images to posts much more efficiently, especially if you have a number of posts to go through. Normally you have to visit the edit page of each post, launch the media window and upload/assign the image.

With the plugin enabled you can do this from the post list screen. Everything words via AJAX so images are assigned instantly, without having to wait for pages to load. It uses the regular WordPress media box making the plugin 100% WordPress awesome.

Easy Featured Images also support **WooCommerce**, yay!

You can use the `efi/post_types` filter to modify the array of post types that the plugin's functionality is assigned to. Return the final list of post types you want the plugin to be applied to:

`add_filter( 'efi/post_types', 'my_post_type_images' );
function my_post_type_images( $post_types ) {
    unset( $post_types['page'] );
}`

As of 1.2.0 the plugin has an `efi/settings` filter which allows developers to change some settings. For now the only setting available is `show_thumbnail_preview` which can be set to true or false.

`add_filter( 'efi/settings', 'my_efi_settings' );
function my_efi_settings( $settings ) {
    $settings['show_thumbnail_preview'] = false;
    return $settings
}`



= Thanks =

* [Tom McFarlin](https://tommcfarlin.com/the-wordpress-media-uploader/) for the basis of the Javascript that initiates the media uploader
* [Cole Patrick](https://unsplash.com/colepatrick) for the fantastic photo for the plugin's featured image
* [Thomas Meyer](https://github.com/tmconnect) for the German translation.

== Installation ==

= Automatic Installation =

Installing this plugin automatically is the easiest option. You can install the plugin automatically by going to the plugins section in WordPress and clicking Add New. Type "Easy Featured Images" in the search bar and install the plugin by clicking the Install Now button.

= Manual Installation =

To manually install the plugin you'll need to download the plugin to your computer and upload it to your server via FTP or another method. The plugin needs to be extracted in the `wp-content/plugins` folder. Once done you should be able to activate it as usual.

If you are having trouble, take a look at the [Managing Plugins](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation) section in the WordPress Codex, it has more information on this topic.


== Screenshots ==

1. The post edit screen
2. WooCommerce Support

== Changelog ==

= 1.2.0 (2015-05-05) =
* Added the efi/settings filter which allows plugins/themes to overwrite basic settings. For now this is just the usage of the medium size image popout.
* Recoded the plugin in an OOP fashion

= 1.1.5 (2015-04-30) =
* Fixed a bug that may have prevented images working for some custom post types

= 1.1.4 (2015-04-21) =

* WordPress 4.2 compatibility check

= 1.1.3 (2015-04-20) =

* Added hook for modifying the post types
* Added Hungarian translation

= 1.1.2 =

* Added proper translation support
* Added German translation

= 1.1.1 =

* I made an oopsie which made WooCommerce thumbnails show up as well as well as our own. I have disciplined myself sufficiently.

= 1.1.0 =

* Now supports all post types
* Added WooCommerce support - Easy Featured Images will replace the WooCommerce thumbnail in the admin list
* Added a bit more documentation inside the main plugin file

= 1.0.0 =

* Initial Release.
