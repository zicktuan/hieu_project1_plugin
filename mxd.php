<?php
/*
Plugin Name: GMO Plugin
Plugin URI: https://z.com/vn/
Description: Plugin support for theme GMO.
Version: 1.0
Author: Nguyen Anh Tuan
Author URI: https://tuanna8@runsystem.net/
License: GPLv2 or later
Text Domain: GMO
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'No direct script access allowed' );
}

define( 'GMO_FILE', __FILE__ );
define( 'GMO_FILENAME', basename( __FILE__ ) );
define( 'GMO_PLUGIN_NAME', plugin_basename( dirname( __FILE__ ) ) );
define( 'GMO_PLUGIN_DIR', trailingslashit( __DIR__ ) );
define( 'GMO_BASE_URL_PLUGIN', untrailingslashit( plugins_url( '', GMO_FILE ) ) );
define( 'GMO_VERSION','1.0' );

require_once 'inc/GMOPlugin.php';