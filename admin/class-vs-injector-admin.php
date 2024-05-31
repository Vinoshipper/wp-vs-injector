<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.vinoshipper.com
 * @since      1.0.0
 *
 * @package    VinoshipperInjector
 * @subpackage VinoshipperInjector/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    VinoshipperInjector
 * @subpackage VinoshipperInjector/admin
 * @author     Vinoshipper <support@vinoshipper.com>
 */
class Vs_Injector_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The Icon for this plugin in Admin settings.
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $vs_icon    The icon of this plugin in Admin settings.
	 */
	private $vs_icon;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->vs_icon = 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="1024px" height="1024px" viewBox="0 0 1024 1024" style="enable-background:new 0 0 1024 1024;" xml:space="preserve"><path fill="black" d="M512,0C229.231,0,0,229.229,0,512c0,282.769,229.231,512,512,512s512-229.231,512-512 C1024,229.229,794.769,0,512,0z M740.1,266.664c0,0-137.513,508.57-139.139,514.585c-2.257,8.352-6.23,16.214-11.381,23.067 c-12.429,16.364-32.002,26.602-53.5,26.602h-46.985c-30.364,0-56.955-20.357-64.881-49.668L285.076,266.664 c-6.883-25.457,12.29-50.504,38.662-50.504h43.289c18.188,0,34.093,12.257,38.728,29.846l106.826,405.41l106.84-405.412 c4.635-17.588,20.539-29.843,38.728-29.843h43.291C727.81,216.16,746.983,241.207,740.1,266.664z"/></svg>');

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Vs_Injector_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vs_Injector_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vs-injector-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Vs_Injector_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vs_Injector_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vs-injector-admin.js', array( 'jquery' ), $this->version, false );
	}

	public function options_page() {
		add_menu_page(
			'Vinoshipper Injector',
			'Vinoshipper',
			'manage_options',
			'vs_injector_settings',
			array($this, 'vs_injector_settings_page_html'),
			$this->vs_icon,
		);
	}

	public function vs_injector_settings_page_html() {
		include(plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/vs-injector-admin-display.php');
	}

	public function settings_init() {

		// Section: General
		add_settings_section(
			'vs_injector_settings_section',
			'General Settings',
			array($this, 'settings_section_general_callback'),
			'vs_injector_settings_section_general'
		);
		add_settings_field(
			'vs_injector_account_id_field',
			'Vinoshipper Account ID',
			array($this, 'settings_account_id_input'),
			'vs_injector_settings_section_general',
			'vs_injector_settings_section',
			array(
				'label_for' => 'vs_injector_account_id',
			),
		);
		add_settings_field(
			'vs_injector_theme_field',
			'Theme',
			array($this, 'settings_theme_input'),
			'vs_injector_settings_section_general',
			'vs_injector_settings_section',
			array(
				'label_for' => 'vs_injector_theme',
			),
		);
		add_settings_field(
			'vs_injector_theme_dark_field',
			'Theme: Enable Dark Mode',
			array($this, 'settings_theme_dark_input'),
			'vs_injector_settings_section_general',
			'vs_injector_settings_section',
			array(
				'label_for' => 'vs_injector_theme_dark',
			),
		);

		// Section: Cart Options
		add_settings_section(
			'vs_injector_settings_section',
			'Cart Options',
			array($this, 'settings_section_cart_callback'),
			'vs_injector_settings_section_cart'
		);
		add_settings_field(
			'vs_injector_cart_position_field',
			'Cart Position',
			array($this, 'settings_cart_position_input'),
			'vs_injector_settings_section_cart',
			'vs_injector_settings_section',
			array(
				'label_for' => 'vs_injector_cart_position',
			),
		);
		add_settings_field(
			'vs_injector_cart_button_field',
			'Display Cart Button',
			array($this, 'settings_cart_button_input'),
			'vs_injector_settings_section_cart',
			'vs_injector_settings_section',
			array(
				'label_for' => 'vs_injector_cart_button',
			),
		);
	}

	/**
	 * General Settings
	 */
	public function settings_section_general_callback() {
		echo '<p>General Settings for Vinoshipper Injector.</p>';
	}

	public function settings_account_id_input() {
		echo '<input id="vs_injector_account_id" name="vs_injector_account_id" type="number" value="' . get_option('vs_injector_account_id') . '" required data-1p-ignore />';
		echo '<p><strong>Account ID is required.</strong></p>';
		echo '<p>Available on the Vinoshipper platform, located at <a href="https://vinoshipper.com/ui/producer/account" target="_blank">Account -> Profile</a>.</p>';
	}

	public function settings_theme_input() {
		$selectedOption = get_option('vs_injector_theme');
		echo '<select id="vs_injector_theme" name="vs_injector_theme">';
		foreach (VS_INJECTOR_THEMES as $key => $value) {
			if ($value === $selectedOption) {
				echo '<option value="' . $value . '" selected>' . $key . '</option>';
			} else {
				echo '<option value="' . $value . '">' . $key . '</option>';
			}
		}
		echo '</select>';
		echo '<p>The simple theme for Injector elements.</p>';
	}

	public function settings_theme_dark_input() {
		$selectedOption = get_option('vs_injector_theme_dark');
		echo '<input type="checkbox" id="vs_injector_theme_dark" name="vs_injector_theme_dark" value="1"' . checked( 1, $selectedOption, false ) . '/>';
		echo '<p>Enables dark mode for selected theme.</p>';
	}

	/**
	 * Cart Options
	 */
	public function settings_section_cart_callback() {
		echo '<p>Options for displaying the Cart.</p>';
	}

	public function settings_cart_position_input() {
		$selectedOption = get_option('vs_injector_cart_position');
		echo '<select id="vs_injector_cart_position" name="vs_injector_cart_position">';
		foreach (VS_INJECTOR_START_END as $value) {
			if ($value === $selectedOption) {
				echo '<option value="' . $value . '" selected>' . ucfirst($value) . '</option>';
			} else {
				echo '<option value="' . $value . '">' . ucfirst($value) . '</option>';
			}
		}
		echo '</select>';
	}

	public function settings_cart_button_input() {
		$selectedOption = get_option('vs_injector_cart_button');
		echo '<input type="checkbox" id="vs_injector_cart_button" name="vs_injector_cart_button" value="1"' . checked( 1, $selectedOption, false ) . '/>';
		echo '<p>Display the cart button.</p>';
		echo '<p>Note: If you disable the cart button, you will need to implement your own cart button.</p>';
	}

}
