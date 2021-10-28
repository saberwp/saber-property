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

    require_once( SABER_PROPERTY_PATH . 'inc/cpt.php' );

  }




}

new Plugin();
