<?php

/*
 * Plugin Name: Reach Me
 * Plugin URI: https://github.com/leanderiversen/reach-me
 * Description: Reach Me is a simple, yet powerful plugin that allows you to display your contact information anywhere on your website.
 * Author: Iversen - Carpe Noctem
 * Version: 1.0
 * Author URI: https://github.com/leanderiversen
 * GitHub Plugin URI: leanderiversen/reach-me
 * Domain Path: /languages
 * Text Domain: reach-me
 * License: MIT License
 */	

// Block direct requests
if ( !defined('ABSPATH') ) {
	exit();
}

// Initiate the plugin
function reme_init() {

	// Plugin setup
	$version = '1.0';
	$pathinfo = pathinfo( dirname( plugin_basename( __FILE__ ) ) );
	if ( !defined( 'REME_PATH' ) ) define( 'REME_PATH', plugin_dir_path( __FILE__ ) );
	if ( !defined( 'REME_NAME' ) ) define( 'REME_NAME', $pathinfo['filename'] );
	if ( !defined( 'REME_URL' ) ) define( 'REME_URL', plugins_url(REME_NAME) . '/' ); 

	// Load translation
	load_plugin_textdomain( 'reach-me', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	
	// Include the includes
	include( REME_PATH . 'inc/links.php' );
	include( REME_PATH . 'inc/how-to-use.php' );

}
add_action( 'plugins_loaded', 'reme_init' );

if ( is_admin() && reme_check() ) {
	add_action( 'admin_enqueue_scripts', 'reme_admin_enqueue_scripts' );
}

function reme_check() {
	if ( isset( $_GET['page'] ) && ( $_GET['page'] == 'reach-me/reach-me.php' || $_GET['page'] == 'reme_how_to_use' ) ) {
		return true;
	} else {
		return false;
	}
}


// Add settings link on plugin page
function reme_plugin_settings_link( $links ) { 
	$title = __( 'Settings', 'reach-me' );
	$settings_link = '<a href="admin.php?page=reach-me/reach-me.php">' . $title . '</a>'; 
	array_unshift( $links, $settings_link ); 

	return $links; 
}
add_filter( 'plugin_action_links_reach-me/links.php', 'reme_plugin_settings_link' );


// Add css and js for plugin
function reme_admin_enqueue_scripts() {
	wp_enqueue_style( 'reach-me-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), null );
}

// Add menu page for admin menu
function reme_add_menu_pages() {

	add_menu_page( $title = __( 'Reach Me', 'reach-me' ), $title, 'edit_others_posts', __FILE__, 'reme_links_admin', 'dashicons-phone' );
	add_submenu_page( __FILE__, $title = __( 'How to use', 'reach-me' ), $title, 'edit_others_posts', 'reme_how_to_use', 'reme_how_to_use' );
}
add_action( 'admin_menu', 'reme_add_menu_pages' );

// Uninstall the plugin
function reme_plugin_uninstall() {
	// Remove all options
	global $wpdb;
	$customOptions = $wpdb->get_results( "SELECT `option_name` FROM $wpdb->options WHERE `option_name` LIKE 'reme_%'" );

	if ( !empty( $customOptions ) ) {
		foreach ( $customOptions as $key => $value ) {
			delete_option( $value->option_name );
		}
	}
}
register_uninstall_hook( __FILE__, 'reme_plugin_uninstall' );

// ------------- Functions ------------- 

function reme_updated_notice( $msg, $error = false ) { ?>
	<?php if ( $error ) { ?>
		<div class="error">
			<p><?php _e( $msg ); ?></p>
		</div>	
	<?php } else { ?>
		<div class="updated">
			<p><?php _e( $msg ); ?></p>
		</div>
	<?php } ?>
<?php }