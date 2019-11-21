<?php
/**
 * WordPress Webpack Starter
 *
 * Add here your plugin description  and change al the fields.
 *
 * @link              https://marioyepes.com
 * @since             1.0.0
 * @package           Wordpress_Webpack_Starter
 *
 * @wordpress-plugin
 * Plugin Name:       wordpress-webpack-starter
 * Plugin URI:        https://marioyepes.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Mario Yepes
 * Author URI:        https://marioyepes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wordpress-plugin-starter
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Rename this, and start at version 1.0.0
 *
 * @link https://semver.org
 */
define( 'WORDPRESS_WEBPACK_STARTER_VERSION', '1.0.0' );


/**
 * Enqueue the JavaScripts in the Frontend.
 */
function webpack_enqueue_scripts() {
    wp_enqueue_script( 'webpack-script-frontend', plugins_url( 'js/frontend.js', __FILE__ ), array(), WORDPRESS_WEBPACK_STARTER_VERSION );
}
add_action( 'wp_enqueue_scripts', 'webpack_enqueue_scripts' );

/**
 * Enqueue scritps in the Dashboard.
 */
function admin_webpack_enqueue_scripts() {
    wp_enqueue_script( 'webpack-script-admin', plugins_url( 'js/admin.js', __FILE__ ), array(), WORDPRESS_WEBPACK_STARTER_VERSION );
}
add_action( 'admin_enqueue_scripts', 'admin_webpack_enqueue_scripts' );

