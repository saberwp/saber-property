<?php

/**
 *
 * Plugin Name: Saber Property
 * Plugin URI: https://wordpress.org/plugins/saber-property/
 * Description: The best real estate plugin for WordPress.
 * Version: 0.0.1
 * Author: SaberWP
 * Author URI: https://saberwp.com/
 * Text Domain: saber-property
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 */

namespace SaberProperty;

define( 'SABER_PROPERTY_PLUGIN_NAME', 'Saber Property' );
define( 'SABER_PROPERTY_VERSION', '1.4.1' );
define( 'SABER_PROPERTY_PATH', plugin_dir_path(__FILE__) );
define( 'SABER_PROPERTY_URL', plugin_dir_url(__FILE__) );
define( 'SABER_PROPERTY_DEV_MODE', 0 );
define( 'SABER_PROPERTY_TEXT_DOMAIN', 'saber-property' );

class Plugin {

  function __construct() {

    // Include functional API.
    require_once( SABER_PROPERTY_PATH . 'inc/property-query.php' );

    // Property Field Support.
    require_once( SABER_PROPERTY_PATH . 'blocks/property-meta-input/property-meta-input.php' );
    require_once( SABER_PROPERTY_PATH . 'inc/property-field-cpt.php' );
    require_once( SABER_PROPERTY_PATH . 'blocks/property-field/property-field.php' );
    $this->propertyFieldSingleTemplateLoader();

    // Property Post Support.

    require_once( SABER_PROPERTY_PATH . 'inc/property-cpt.php' );
    require_once( SABER_PROPERTY_PATH . 'blocks/property-meta-bedrooms/property-meta-bedrooms.php' );

    $this->propertySingleTemplateLoader();
    $this->propertyArchiveTemplateLoader();

    // Property Taxonomy Registries.
    require_once( SABER_PROPERTY_PATH . 'inc/taxonomy/property_type_taxonomy.php' );

    // Meta register.
    register_post_meta( 'property', 'property_bedrooms', array(
      'show_in_rest'  => true,
      'single'        => true,
      'type'          => 'string',
      'auth_callback' => function() {
        return current_user_can( 'edit_posts' );
      }
    ) );

    // Enqueue front-end scripts.
    add_action( 'wp_enqueue_scripts', function() {

      wp_enqueue_style(
        'saber-property-flaticons',
        SABER_PROPERTY_URL . 'assets/flaticon/font/flaticon.css',
        array(),
        '1.0',
        'all'
      );

    });

  }

  function propertyFieldSingleTemplateLoader() {

    // Check usage notes at https://developer.wordpress.org/reference/hooks/type_template/.

    add_filter( "single_template", function( $template, $type ) {

      global $post;
      if ( 'property_field' !== $post->post_type ) {
        return $template;
      }

      // Do override.
      return SABER_PROPERTY_PATH . 'templates/single-property-field.php';

    }, 10, 2 );

  }

  function propertySingleTemplateLoader() {

    // Check usage notes at https://developer.wordpress.org/reference/hooks/type_template/.

    add_filter( "single_template", function( $template, $type ) {

      global $post;
      if ( 'property' !== $post->post_type ) {
        return $template;
      }

      // Do override.
      return SABER_PROPERTY_PATH . 'templates/single-property.php';

    }, 10, 2 );

  }

  function propertyArchiveTemplateLoader() {

    // Check usage notes at https://developer.wordpress.org/reference/hooks/type_template/.

    add_filter( "archive_template", function( $template, $type ) {

      global $post;
      if ( 'property' !== $post->post_type ) {
        return $template;
      }

      // Do override.
      return SABER_PROPERTY_PATH . 'templates/archive-property.php';

    }, 10, 2 );

  }

}

new Plugin();
