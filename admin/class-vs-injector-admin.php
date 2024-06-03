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
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $vs_icon    The icon of this plugin in Admin settings.
	 */
	private $vs_icon;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		$this->vs_icon     = 'data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMTAyNHB4IiBoZWlnaHQ9IjEwMjRweCIgdmlld0JveD0iMCAwIDEwMjQgMTAyNCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTAyNCAxMDI0OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PHBhdGggZmlsbD0iYmxhY2siIGQ9Ik01MTIsMEMyMjkuMjMxLDAsMCwyMjkuMjI5LDAsNTEyYzAsMjgyLjc2OSwyMjkuMjMxLDUxMiw1MTIsNTEyczUxMi0yMjkuMjMxLDUxMi01MTIgQzEwMjQsMjI5LjIyOSw3OTQuNzY5LDAsNTEyLDB6IE03NDAuMSwyNjYuNjY0YzAsMC0xMzcuNTEzLDUwOC41Ny0xMzkuMTM5LDUxNC41ODVjLTIuMjU3LDguMzUyLTYuMjMsMTYuMjE0LTExLjM4MSwyMy4wNjcgYy0xMi40MjksMTYuMzY0LTMyLjAwMiwyNi42MDItNTMuNSwyNi42MDJoLTQ2Ljk4NWMtMzAuMzY0LDAtNTYuOTU1LTIwLjM1Ny02NC44ODEtNDkuNjY4TDI4NS4wNzYsMjY2LjY2NCBjLTYuODgzLTI1LjQ1NywxMi4yOS01MC41MDQsMzguNjYyLTUwLjUwNGg0My4yODljMTguMTg4LDAsMzQuMDkzLDEyLjI1NywzOC43MjgsMjkuODQ2bDEwNi44MjYsNDA1LjQxbDEwNi44NC00MDUuNDEyIGM0LjYzNS0xNy41ODgsMjAuNTM5LTI5Ljg0MywzOC43MjgtMjkuODQzaDQzLjI5MUM3MjcuODEsMjE2LjE2LDc0Ni45ODMsMjQxLjIwNyw3NDAuMSwyNjYuNjY0eiIvPjwvc3ZnPg==';
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vs-injector-admin.css', [], $this->version, 'all' );
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

		 wp_enqueue_script( $this->plugin_name, 'https://vinoshipper.com/injector/index.js', [], $this->version, false );
		 wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vs-injector-admin.js', [ 'jquery' ], $this->version, false );
	}

	/**
	 * Add the Vinoshipper Injector code and initialize functions.
	 * This forces settings that are better for admin based views.
	 */
	public function add_header_code() {
		$tempAccountId = get_option( 'vs_injector_account_id' );

		if ( is_numeric( $tempAccountId ) ) {
			$tempTheme     = get_option( 'vs_injector_theme' );
			$tempThemeDark = boolval( get_option( 'vs_injector_theme_dark' ) );
			$computedTheme = null;

			if ( $tempTheme && $tempThemeDark ) {
				$computedTheme = $tempTheme . '-dark';
			} elseif ( $tempTheme ) {
				$computedTheme = $tempTheme;
			} elseif ( $tempThemeDark ) {
				$computedTheme = 'dark';
			}

			$settings = [
				'theme'        => $computedTheme,
				'cartPosition' => get_option( 'vs_injector_cart_position', 'end' ),
				'cartButton'   => false,
			];
			echo '<script type="text/javascript">
			window.wpVsInjectorSettings = ' . wp_json_encode( $settings ) . ';
			window.document.addEventListener(\'vinoshipper:loaded\', () => {
				window.Vinoshipper.init(' . esc_html( $tempAccountId ) . ', window.wpVsInjectorSettings);
			});
			if (window.Vinoshipper) {
				window.Vinoshipper.init(' . esc_html( $tempAccountId ) . ', window.wpVsInjectorSettings);
			}
			</script>
			';
		} else {
			echo '<script type="text/javascript">console.error("Vinoshipper Injector: Account ID not defined.");</script>';
		}
	}

	/**
	 * Register Options Page
	 */
	public function options_page() {
		add_menu_page(
			'Vinoshipper Injector',
			'Vinoshipper',
			'manage_options',
			'vs_injector_settings',
			[ $this, 'vs_injector_settings_page_html' ],
			$this->vs_icon
		);
	}

	/**
	 * Include Admin Display HTML
	 */
	public function vs_injector_settings_page_html() {
		include plugin_dir_path( __DIR__ ) . 'admin/partials/vs-injector-admin-display.php';
	}

	/**
	 * Include all Setting sections and fields.
	 */
	public function settings_init() {

		// Section: General
		add_settings_section(
			'vs_injector_settings_section',
			'General Settings',
			[ $this, 'settings_section_general_callback' ],
			'vs_injector_settings_section_general'
		);
		add_settings_field(
			'vs_injector_account_id_field',
			'Vinoshipper Account ID',
			[ $this, 'settings_account_id_input' ],
			'vs_injector_settings_section_general',
			'vs_injector_settings_section',
			[
				'label_for' => 'vs_injector_account_id',
			]
		);
		add_settings_field(
			'vs_injector_theme_field',
			'Theme',
			[ $this, 'settings_theme_input' ],
			'vs_injector_settings_section_general',
			'vs_injector_settings_section',
			[
				'label_for' => 'vs_injector_theme',
			]
		);
		add_settings_field(
			'vs_injector_theme_dark_field',
			'Theme: Enable Dark Mode',
			[ $this, 'settings_theme_dark_input' ],
			'vs_injector_settings_section_general',
			'vs_injector_settings_section',
			[
				'label_for' => 'vs_injector_theme_dark',
			]
		);

		// Section: Cart Options
		add_settings_section(
			'vs_injector_settings_section',
			'Cart Options',
			[ $this, 'settings_section_cart_callback' ],
			'vs_injector_settings_section_cart'
		);
		add_settings_field(
			'vs_injector_cart_position_field',
			'Cart Position',
			[ $this, 'settings_cart_position_input' ],
			'vs_injector_settings_section_cart',
			'vs_injector_settings_section',
			[
				'label_for' => 'vs_injector_cart_position',
			]
		);
		add_settings_field(
			'vs_injector_cart_button_field',
			'Display Cart Button',
			[ $this, 'settings_cart_button_input' ],
			'vs_injector_settings_section_cart',
			'vs_injector_settings_section',
			[
				'label_for' => 'vs_injector_cart_button',
			]
		);
	}

	/**
	 * General Settings
	 */
	public function settings_section_general_callback() {
		echo '<p>General Settings for Vinoshipper Injector.</p>';
	}

	/**
	 * Account ID Setting UI
	 */
	public function settings_account_id_input() {
		echo '<input id="vs_injector_account_id" name="vs_injector_account_id" type="number" value="' . esc_attr( get_option( 'vs_injector_account_id' ) ) . '" required data-1p-ignore />';
		echo '<p><strong>Account ID is required.</strong></p>';
		echo '<p>Available on the Vinoshipper platform, located at <a href="https://vinoshipper.com/ui/producer/account" target="_blank">Account -> Profile</a>.</p>';
	}

	/**
	 * Theme Setting UI
	 */
	public function settings_theme_input() {
		$selectedOption = get_option( 'vs_injector_theme' );
		echo '<select id="vs_injector_theme" name="vs_injector_theme">';
		foreach ( VS_INJECTOR_THEMES as $key => $value ) {
			if ( $value === $selectedOption ) {
				echo '<option value="' . esc_attr( $value ) . '" selected>' . esc_html( $key ) . '</option>';
			} else {
				echo '<option value="' . esc_attr( $value ) . '">' . esc_html( $key ) . '</option>';
			}
		}
		echo '</select>';
		echo '<p>The simple theme for Injector elements.</p>';
	}

	/**
	 * Dark Theme Setting UI
	 */
	public function settings_theme_dark_input() {
		$selectedOption = get_option( 'vs_injector_theme_dark' );
		echo '<input type="checkbox" id="vs_injector_theme_dark" name="vs_injector_theme_dark" value="1"' . checked( 1, $selectedOption, false ) . '/>';
		echo '<p>Enables dark mode for selected theme.</p>';
	}

	/**
	 * Cart Options Information
	 */
	public function settings_section_cart_callback() {
		echo '<p>Options for displaying the Cart.</p>';
	}

	/**
	 * Cart Position Setting UI
	 */
	public function settings_cart_position_input() {
		$selectedOption = get_option( 'vs_injector_cart_position' );
		echo '<select id="vs_injector_cart_position" name="vs_injector_cart_position">';
		foreach ( VS_INJECTOR_START_END as $value ) {
			if ( $value === $selectedOption ) {
				echo '<option value="' . esc_attr( $value ) . '" selected>' . esc_html( ucfirst( $value ) ) . '</option>';
			} else {
				echo '<option value="' . esc_attr( $value ) . '">' . esc_html( ucfirst( $value ) ) . '</option>';
			}
		}
		echo '</select>';
	}

	/**
	 * Cart Button Display Setting UI
	 */
	public function settings_cart_button_input() {
		$selectedOption = get_option( 'vs_injector_cart_button' );
		echo '<input type="checkbox" id="vs_injector_cart_button" name="vs_injector_cart_button" value="1"' . checked( 1, $selectedOption, false ) . '/>';
		echo '<p>Display the cart button.</p>';
		echo '<p>Note: If you disable the cart button, you will need to implement your own cart button.</p>';
	}
}
