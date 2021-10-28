<?php

// Register the Property Custom Post Type.

function register_post_type_property() {

	$labels = array(
		'name'                  => _x( 'Properties', 'Post Type General Name', 'saber-property' ),
		'singular_name'         => _x( 'Property', 'Post Type Singular Name', 'saber-property' ),
		'menu_name'             => __( 'Properties', 'saber-property' ),
		'name_admin_bar'        => __( 'Properties', 'saber-property' ),
		'archives'              => __( 'Property Archives', 'saber-property' ),
		'attributes'            => __( 'Item Attributes', 'saber-property' ),
		'parent_item_colon'     => __( 'Parent Item:', 'saber-property' ),
		'all_items'             => __( 'All Properties', 'saber-property' ),
		'add_new_item'          => __( 'Add New Property', 'saber-property' ),
		'add_new'               => __( 'Add Property', 'saber-property' ),
		'new_item'              => __( 'New Property', 'saber-property' ),
		'edit_item'             => __( 'Edit Property', 'saber-property' ),
		'update_item'           => __( 'Update Property', 'saber-property' ),
		'view_item'             => __( 'View Property', 'saber-property' ),
		'view_items'            => __( 'View Properties', 'saber-property' ),
		'search_items'          => __( 'Search Property', 'saber-property' ),
		'not_found'             => __( 'Not found', 'saber-property' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'saber-property' ),
		'featured_image'        => __( 'Main Property Image', 'saber-property' ),
		'set_featured_image'    => __( 'Set Main Property Image', 'saber-property' ),
		'remove_featured_image' => __( 'Remove Main Property Image', 'saber-property' ),
		'use_featured_image'    => __( 'Use as featured image', 'saber-property' ),
		'insert_into_item'      => __( 'Insert into item', 'saber-property' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'saber-property' ),
		'items_list'            => __( 'Items list', 'saber-property' ),
		'items_list_navigation' => __( 'Items list navigation', 'saber-property' ),
		'filter_items_list'     => __( 'Filter items list', 'saber-property' ),
	);
	$args = array(
		'label'                 => __( 'Property', 'saber-property' ),
		'description'           => __( 'Real estate properties post type.', 'saber-property' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'properties',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'property', $args );

}
add_action( 'init', 'register_post_type_property', 0 );
