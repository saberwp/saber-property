<?php
/**
 * Property Type Taxonomy
 *
 * Snippet by GenerateWP.com
 * Generated on October 31, 2021 05:03:39
 * @link https://generatewp.com/snippet/9X45pYW/
 */


// Register Custom Taxonomy
function property_type_taxonomy_register() {

	$labels = array(
		'name'                       => _x( 'Property Types', 'Taxonomy General Name', 'saber-property' ),
		'singular_name'              => _x( 'Property Type', 'Taxonomy Singular Name', 'saber-property' ),
		'menu_name'                  => __( 'Property Type', 'saber-property' ),
		'all_items'                  => __( 'All Property Types', 'saber-property' ),
		'parent_item'                => __( 'Parent Property Type', 'saber-property' ),
		'parent_item_colon'          => __( 'Parent Property Type:', 'saber-property' ),
		'new_item_name'              => __( 'New Property Type Name', 'saber-property' ),
		'add_new_item'               => __( 'Add New Property Type', 'saber-property' ),
		'edit_item'                  => __( 'Edit Property Type', 'saber-property' ),
		'update_item'                => __( 'Update Property Type', 'saber-property' ),
		'view_item'                  => __( 'View Item', 'saber-property' ),
		'separate_items_with_commas' => __( 'Separate property types with commas', 'saber-property' ),
		'add_or_remove_items'        => __( 'Add or remove property types', 'saber-property' ),
		'choose_from_most_used'      => __( 'Choose from the most used property types', 'saber-property' ),
		'popular_items'              => __( 'Popular Items', 'saber-property' ),
		'search_items'               => __( 'Search property types', 'saber-property' ),
		'not_found'                  => __( 'Not Found', 'saber-property' ),
		'no_terms'                   => __( 'No items', 'saber-property' ),
		'items_list'                 => __( 'Items list', 'saber-property' ),
		'items_list_navigation'      => __( 'Items list navigation', 'saber-property' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);

	register_taxonomy( 'property_type', array( 'property' ), $args );

}
add_action( 'init', 'property_type_taxonomy_register', 1 );
