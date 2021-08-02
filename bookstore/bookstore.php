<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              cedric.hounnou.com
 * @since             1.0.0
 * @package           Bookstore
 *
 * @wordpress-plugin
 * Plugin Name:       bookstore
 * Plugin URI:        bookstore.cedrichounnou.tech
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Sessi HOUNNOU
 * Author URI:        cedric.hounnou.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bookstore
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BOOKSTORE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bookstore-activator.php
 */
function activate_bookstore() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bookstore-activator.php';
	Bookstore_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bookstore-deactivator.php
 */
function deactivate_bookstore() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bookstore-deactivator.php';
	Bookstore_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bookstore' );
register_deactivation_hook( __FILE__, 'deactivate_bookstore' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bookstore.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bookstore() {

	$plugin = new Bookstore();
	$plugin->run();

}
run_bookstore();
function bookstore_Add_My_Admin_Link()
	{
	  add_menu_page(
        'Bookstor', // Title of the page
        'bookstore', // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
    	);
	}
add_action('admin_menu', 'bookstore_Add_My_Admin_Link');
function custom_post_type() {
	$labels = array(
		'name'                  => _x( 'Livres', 'Post Type General Name', 'twentytwenty' ),
		'singular_name'         => _x( 'Livre', 'Post Type Singular Name', 'twentytwenty' ),
		'menu_name'             => __( 'Livres', 'twentytwenty' ),
		'name_admin_bar'        => __( 'Livres', 'twentytwenty' ),
		'archives'              => __( 'Livres', 'twentytwenty' ),
		'attributes'            => __( 'Item Attributes', 'twentytwenty' ),
		'parent_item_colon'     => __( 'Parent Item:', 'twentytwenty' ),
		'all_items'             => __( 'Tous les livres', 'twentytwenty' ),
		'add_new_item'          => __( 'Ajouter un nouveau livre', 'twentytwenty' ),
		'add_new'               => __( 'Ajouter un nouveau', 'twentytwenty' ),
		'new_item'              => __( 'Nouveau livre', 'twentytwenty' ),
		'edit_item'             => __( 'Modifier Livre', 'twentytwenty' ),
		'update_item'           => __( 'Mettre à jour Livre', 'twentytwenty' ),
		'view_item'             => __( 'Voir livre', 'twentytwenty' ),
		'view_items'            => __( 'Voir les livres', 'twentytwenty' ),
		'search_items'          => __( 'chercher un livre', 'twentytwenty' ),
		'not_found'             => __( 'Pas retrouver', 'twentytwenty' ),
		'not_found_in_trash'    => __( 'Pas retrouver', 'twentytwenty' ),
		'featured_image'        => __( 'Image à la une', 'twentytwenty' ),
		'set_featured_image'    => __( 'Définir Image à la une', 'twentytwenty' ),
		'remove_featured_image' => __( 'Supprimé Image à la une', 'twentytwenty' ),
		'use_featured_image'    => __( 'utilisé comme Image à la une', 'twentytwenty' ),
		'insert_into_item'      => __( 'Insérer dans livre', 'twentytwenty' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'twentytwenty' ),
		'items_list'            => __( 'liste des livres', 'twentytwenty' ),
		'items_list_navigation' => __( 'Liste par navigation', 'twentytwenty' ),
		'filter_items_list'     => __( 'Filtrer les livres', 'twentytwenty' ),
	);
	$args = array(
		'label'                 => __( 'Livres', 'twentytwenty' ),
		'description'           => __( 'Nouveau livres et description', 'twentytwenty' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'Titre', 'description', 'Auteur', 'maison_d_edition' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 3,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Livres', $args );

};
add_action( 'init', 'custom_post_type', 0 );
