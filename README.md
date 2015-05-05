# Easy Featured Images

A WordPress plugin that adds featured image adding/removing functionality to post lists. This is super-helpful because you don't need to go into single post edit pages to modify your featured images. If you'd like to learn about how this plugin was made, I wrote an article about the process on [WPMU DEV](https://premium.wpmudev.org/blog/easy-featured-images/).

## Description

When activated, the plugin adds an "add image" column in your admin post list. Clicking on the add image area will bring up the image selector where you can upload/select an image. Once selected, the image shows up right away and is saved.

If a post has a featured image it is shown, displaying a larger image on hover. In addition, featured image can be removed and changed, once set.

#### Thanks

- [Tom McFarlin](https://tommcfarlin.com/the-wordpress-media-uploader/) for the basis of the Javascript that initiates the media uploader
- [Cole Patrick](https://unsplash.com/colepatrick) for the fantastic photo for the plugin's featured image
- [Thomas Meyer](https://github.com/tmconnect) for the German translation.

#### Translations

The plugin is currently available in English, German and Hungarian. Please feel free to submit any new languages via a pull request, I'd be mighty thankful.

#### Useful Links

This Github repository is for the development of this plugin. If you would like to read installation and in-depth usage instructions you might want to look at the WordPress plugin page instead.

* [Plugin Page](https://wordpress.org/plugins/easy-featured-images/)
* [SVN Repository](http://plugins.svn.wordpress.org/easy-featured-images/)

# Developer Features

Right now the plugin will add the image feature to every post type. This will clash with some special plugins which may have their own image display in the admin. You may also want to disable the functionality for posts which don't need a featured image.

You can use the `efi/post_types` filter to modify the array of post types that the plugin's functionality is assigned to. Return the final list of post types you want the plugin to be applied to:

```
add_filter( 'efi/post_types', 'my_post_type_images' );
function my_post_type_images( $post_types ) {
    unset( $post_types['page'] );
}
```

As of 1.2.0 the plugin has an `efi/settings` filter which allows developers to change some settings. For now the only setting available is `show_thumbnail_preview` which can be set to true or false.

```
add_filter( 'efi/settings', 'my_efi_settings' );
function my_efi_settings( $settings ) {
    $settings['show_thumbnail_preview'] = false;
    return $settings
}
```


# Want To Help?

If you like the plugin and you like helping others out there are a few things you can do:

* **[Review the plugin](https://wordpress.org/support/view/plugin-reviews/easy-featured-images)**
* **Submit a translation** If you speak another language goodly, you can submit a language file, I'd be mighty thankful! Take a look at the lang directory to see what languages we already have. If a language isn't there create one and submit a pull request. If you have no idea what I'm talking about drop me a line and I'll help you out
* **[Tip me on Gratipay](https://gratipay.com/danielpataki/)**
