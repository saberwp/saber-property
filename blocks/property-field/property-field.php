<?php
/**
 * Plugin Name:       Property Field
 * Description:       Block for creation of custom property fields.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            SaberWP
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       property-field
 *
 * @package           saber-property
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/writing-your-first-block-type/
 */
function create_block_property_field_block_init() {
	register_block_type( __DIR__ );
}
add_action( 'init', 'create_block_property_field_block_init' );

// Meta register _field_key.
register_post_meta( 'property_field', '_field_key', array(
	'show_in_rest'  => true,
	'single'        => true,
	'type'          => 'string',
	'auth_callback' => function() {
		return current_user_can( 'edit_posts' );
	}
));

// Meta register _field_label.
register_post_meta( 'property_field', '_field_label', array(
	'show_in_rest'  => true,
	'single'        => true,
	'type'          => 'string',
	'auth_callback' => function() {
		return current_user_can( 'edit_posts' );
	}
) );
