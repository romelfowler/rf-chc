<?php
/**
 * EightMedi Pro Theme Customizer Custom
 *
 * @package EightMedi Pro
 */

/**
 * Add new options the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eightmedi_pro_custom_customize_register( $wp_customize ) {
	//Adding the Default Setup Panel
	$wp_customize->add_panel('eightmedi_pro_default_setups',array(
		'priority' => '10',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Default Setups','eightmedi-pro'),
		));	

	//Add Default Sections to General Panel
	$wp_customize->get_section('title_tagline')->panel = 'eightmedi_pro_default_setups'; //priority 20
	$wp_customize->get_section('colors')->panel = 'eightmedi_pro_default_setups'; //priority 40
	$wp_customize->get_section('header_image')->panel = 'eightmedi_pro_default_setups'; //priority 60
	$wp_customize->get_section('background_image')->panel = 'eightmedi_pro_default_setups'; //priority 80
	$wp_customize->get_section('static_front_page')->panel = 'eightmedi_pro_default_setups'; //priority 120

}
add_action( 'customize_register', 'eightmedi_pro_custom_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eightmedi_pro_custom_customize_preview_js() {
	wp_enqueue_script( 'eightmedi_pro_custom_customizer', get_template_directory_uri() . '/js/eightmedi-customizer.js', array( 'customize-preview' ), '20150715', true );
}
add_action( 'customize_preview_init', 'eightmedi_pro_custom_customize_preview_js' );

/**
 * Load other customizer sections files
 */
require get_template_directory() . '/inc/admin-panel/assets/section-general.php';
require get_template_directory() . '/inc/admin-panel/assets/section-homepage.php';
require get_template_directory() . '/inc/admin-panel/assets/section-doctor.php';
require get_template_directory() . '/inc/admin-panel/assets/section-services.php';
require get_template_directory() . '/inc/admin-panel/assets/section-social.php';
require get_template_directory() . '/inc/admin-panel/assets/section-archives.php';
require get_template_directory() . '/inc/admin-panel/assets/section-single.php';