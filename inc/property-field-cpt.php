<?php

// Register the Property Custom Post Type.

function register_post_type_property_field() {

	$labels = array(
		'name'                  => _x( 'Property Fields', 'Post Type General Name', 'saber-property' ),
		'singular_name'         => _x( 'Property Field', 'Post Type Singular Name', 'saber-property' ),
		'menu_name'             => __( 'Property Fields', 'saber-property' ),
		'name_admin_bar'        => __( 'Property Fields', 'saber-property' ),
		'archives'              => __( 'Property Field Archives', 'saber-property' ),
		'attributes'            => __( 'Item Attributes', 'saber-property' ),
		'parent_item_colon'     => __( 'Parent Item:', 'saber-property' ),
		'all_items'             => __( 'All Property Fields', 'saber-property' ),
		'add_new_item'          => __( 'Add New Property Field', 'saber-property' ),
		'add_new'               => __( 'Add Property Field', 'saber-property' ),
		'new_item'              => __( 'New Property Field', 'saber-property' ),
		'edit_item'             => __( 'Edit Property Field', 'saber-property' ),
		'update_item'           => __( 'Update Property Field', 'saber-property' ),
		'view_item'             => __( 'View Property Field', 'saber-property' ),
		'view_items'            => __( 'View Properties Field', 'saber-property' ),
		'search_items'          => __( 'Search Property Field', 'saber-property' ),
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
		'label'                 => __( 'Property Field', 'saber-property' ),
		'description'           => __( 'Real estate property field post type.', 'saber-property' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 11.66666666,
		'show_in_admin_bar'     => false,
		'show_in_rest'          => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'template'              => array(
			array( 'saber-property/property-field', [] )
		),
		'template_lock'         => true
	);

	register_post_type( 'property_field', $args );

}

add_action( 'init', 'register_post_type_property_field', 0 );
