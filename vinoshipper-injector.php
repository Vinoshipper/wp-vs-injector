<?php
/**
 * Plugin Name:       Vinoshipper Injector
 * Plugin URI:        https://www.vinoshipper.com
 * Description:       Add the ability to incorporate Vinoshipper's Injector with inside WordPress.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Vinoshipper
 * License:           GPL-3.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       vinoshipper-injector
 *
 * @package VinoshipperInjector
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Currently plugin version.
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'VS_INJECTOR_VERSION', '0.1.0' );

/**
 * Available VS Themes
 * List of Available themes for Vinoshipper Injector.
 */
define(
	'VS_INJECTOR_THEMES',
	[
		'Default (Blue)' => null,
		'Indigo'         => 'indigo',
		'Purple'         => 'purple',
		'Pink'           => 'pink',
		'Red'            => 'red',
		'Orange'         => 'orange',
		'Yellow'         => 'yellow',
		'Green'          => 'green',
		'Teal'           => 'teal',
		'Cyan'           => 'cyan',
		'Gray'           => 'gray',
		'Black'          => 'black',
	]
);
define( 'VS_INJECTOR_START_END', [ 'start', 'end' ] );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vs-injector-activator.php
 */
function activate_vs_injector() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vs-injector-activator.php';
	Vs_Injector_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vs-injector-deactivator.php
 */
function deactivate_vs_injector() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vs-injector-deactivator.php';
	Vs_Injector_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vs_injector' );
register_deactivation_hook( __FILE__, 'deactivate_vs_injector' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vs-injector.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_vs_injector() {

	$plugin = new Vs_Injector();
	$plugin->run();
}
run_vs_injector();

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @param   array $block_categories                         Array of categories for block types.
 * @see https://developer.wordpress.org/reference/hooks/block_categories_all/
 */
function vinoshipper_injector_block_categories_init( $block_categories ) {
	$block_categories[] = [
		'slug'  => 'vinoshipper',
		'title' => __( 'Vinoshipper Injector', 'vinoshipper-injector' ),
		'icon'  => null,
	];

	return $block_categories;
}
add_filter( 'block_categories_all', 'vinoshipper_injector_block_categories_init' );

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function vinoshipper_injector_block_init() {
	register_block_type( __DIR__ . '/build/core' );
	register_block_type( __DIR__ . '/build/product-catalog' );
	register_block_type( __DIR__ . '/build/product-item' );
	register_block_type( __DIR__ . '/build/available-in' );
}
add_action( 'init', 'vinoshipper_injector_block_init' );
