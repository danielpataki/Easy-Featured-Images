<?php
/*
Plugin Name:       Easy Featured Images
Description:       Adds featured images to the admin post lists and allows you to add and modify them without loading the post's edit page.
Version:           1.0.0
Author:            Daniel Pataki
Author URI:        http://danielpataki.com/
License:           GPLv2 or later
*/



add_action( 'admin_enqueue_scripts', 'efi_enqueue_assets' );
/**
 * Enqueue Assets
 *
 * Adds the scripts and styles needed for the plugin to work. The script is
 * targeted to edit pages only. Our own script and styles is added in addtion
 * to wp_enqueue_media() being used to pull in the requirements for the
 * media uploader. wp_localize_script() is used to add translations to our
 * javascript and to pass the admin ajax url.
 *
 * @param string $page The name of the page we're on.
 *
 */
function efi_enqueue_assets( $page ) {

    if ( 'edit.php' != $page ) {
        return;
    }

    wp_enqueue_style( 'efi_styles', plugin_dir_url( __FILE__ ) . 'style.css' );
	wp_enqueue_script( 'efi_scripts', plugin_dir_url( __FILE__ ) . '/scripts.js' );
	wp_enqueue_media();

	wp_localize_script( 'efi_scripts', 'efi_strings', array(
		'browse_images' => __( 'Browse Or Upload An Image', 'easy-featured-images' ),
		'select_image' =>  __( 'Set featured image', 'easy-featured-images' ),
		'ajaxurl' =>  admin_url( 'admin-ajax.php' )
	));

}



add_filter( 'manage_post_posts_columns', 'efi_table_head' );
/**
 * Custom Column Headers
 *
 * This function adds the custom column we need. It is added to the beginning
 * by splitting the original array.
 *
 * @param array $columns The columns contained in the post list
 *
 */
function efi_table_head( $columns ) {
	$checkbox = array_slice( $columns , 0, 1 );
	$columns = array_slice( $columns , 1 );

	$new['_post_thumbnail'] = 'Image';

	$columns = array_merge( $checkbox, $new, $columns );

	return $columns;

}


add_action( 'manage_post_posts_custom_column', 'efi_column_content', 10, 2 );
/**
 * Custom Column Content
 *
 * This function is responsible for generating the content of our columns. It
 * outputs the image, the links that launch the media uploader and the remove
 * image link.
 *
 * @param $column string
 */
function efi_column_content( $column_slug, $post_id ) {

	if ( '_post_thumbnail' == $column_slug ) {

		$nonce = wp_create_nonce( "set_post_thumbnail-" . $post_id );
		$no_image = ( has_post_thumbnail( $post_id ) ) ? '' : 'no-image';

		echo "<div class='efi-thumbnail " . $no_image . "'>";
		echo "<div class='efi-images'>";

		if( has_post_thumbnail( $post_id ) ) {
			echo "<a class='efi-choose-image' data-nonce='" . $nonce . "' href='" . get_edit_post_link( $post_id ) . "'>" . get_the_post_thumbnail( $post_id, 'thumbnail' ) . '</a>';
			echo "<a class='efi-choose-image' data-nonce='" . $nonce . "' href='" . get_edit_post_link( $post_id ) . "'>" . get_the_post_thumbnail( $post_id, 'medium' ) . '</a>';
		}
		else {
			echo "<a class='efi-choose-image' data-nonce='" . $nonce . "' href='" . get_edit_post_link( $post_id ) . "'> <i class='dashicons dashicons-plus'></i> <br> add image</a>";
		}

		echo '</div>';

		echo "<a href='" . get_edit_post_link( $post_id ) . "' data-nonce='" . $nonce . "' class='efi-remove-image'><i class='dashicons dashicons-no'></i> remove</a>";

		echo '</div>';


	}

}
