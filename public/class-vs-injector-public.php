<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.vinoshipper.com
 * @since      1.0.0
 *
 * @package    VinoshipperInjector
 * @subpackage VinoshipperInjector/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    VinoshipperInjector
 * @subpackage VinoshipperInjector/public
 * @author     Vinoshipper <support@vinoshipper.com>
 */
class Vs_Injector_Public {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vs-injector-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vs-injector-public.js', array( 'jquery' ), $this->version, false );

	}

	public function add_header_code () {
		$tempAccountId = get_option( 'vs_injector_account_id' );

		if (is_numeric($tempAccountId)) {
			$tempTheme = get_option('vs_injector_theme');
			$tempThemeDark = boolval(get_option('vs_injector_theme_dark'));
			$computedTheme = null;

			if ($tempTheme && $tempThemeDark) {
				$computedTheme = $tempTheme . '-dark';
			} else if ($tempTheme) {
				$computedTheme = $tempTheme;
			} else if ($tempThemeDark) {
				$computedTheme = 'dark';
			}

			$settings = array(
				'theme' => $computedTheme,
				'cartPosition' => get_option('vs_injector_cart_position', 'end'),
				'cartButton' => boolval(get_option('vs_injector_cart_button', true)),
			);
			echo '<script type="text/javascript">
			// Vinoshipper Injector v4
			window.document.addEventListener(\'vinoshipper:loaded\', () => {
				window.Vinoshipper.init(' . $tempAccountId . ', ' . json_encode($settings) . ');
			});
			</script>
			';
			echo '<script src="https://vinoshipper.com/injector/index.js" type="text/javascript"></script>';
		} else {
			echo '<script type="text/javascript">console.error("Vinoshipper Injector: Account ID not defined.");</script>';
		}
	}

	public function settings_init() {
		register_setting(
			'vs_injector_settings',
			'vs_injector_account_id',
			array(
				'type'			=> 'number',
				'description'	=> 'The Vinoshipper Account ID.',
				'show_in_rest'	=> true,
				'default'	=> null,
			)
		);
		register_setting(
			'vs_injector_settings',
			'vs_injector_theme',
			array(
				'type'			=> 'string',
				'description'	=> 'Global theme setting.',
				'show_in_rest'	=> true,
				'default'		=> null,
			)
		);
		register_setting(
			'vs_injector_settings',
			'vs_injector_theme_dark',
			array(
				'type'			=> 'boolean',
				'description'	=> 'Enable Dark Mode.',
				'show_in_rest'	=> true,
				'default'		=> false,
			)
		);

		// Cart Options
		register_setting(
			'vs_injector_settings',
			'vs_injector_cart_position',
			array(
				'type'			=> 'string',
				'description'	=> 'Position the cart to either the start or end of the screen.',
				'show_in_rest'	=> true,
				'default'		=> 'end',
				'sanitize_callback'		=> array($this, 'sanitize_cart_position')
			)
		);
		register_setting(
			'vs_injector_settings',
			'vs_injector_cart_button',
			array(
				'type'			=> 'boolean',
				'description'	=> 'Display the cart button',
				'show_in_rest'	=> true,
				'default'		=> true,
			)
		);
	}

	/**
	 * Sanitize: Cart Position
	 */
	public function sanitize_cart_position ($settings) {
		$testingString = strtolower(sanitize_text_field($settings));
		if ($testingString === 'start' || $testingString === 'end') {
			return $testingString;
		} else {
			return 'start';
		}
	}
}
