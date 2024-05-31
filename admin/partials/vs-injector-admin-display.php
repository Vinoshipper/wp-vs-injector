<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.vinoshipper.com
 * @since      1.0.0
 *
 * @package    VinoshipperInjector
 * @subpackage VinoshipperInjector/admin/partials
 */

if ( ! current_user_can( 'manage_options' ) ) {
	wp_die( __( 'Sorry, you are not allowed to manage options for this site.' ) );
}

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="options.php" method="post" data-1p-ignore>
    <?php
    settings_fields( 'vs_injector_settings' );
    do_settings_sections( 'vs_injector_settings_section_general' );
    do_settings_sections( 'vs_injector_settings_section_cart' );
    submit_button( __( 'Save Settings', 'textdomain' ) );
    ?>
    </form>
</div>
