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
function eightmedi_pro_custom_customize_register_singles( $wp_customize ) {
	
	// Settings Section
	$wp_customize->add_section('eightmedi_pro_single_setting', array(
		'priority' => 70,
		'title' => __('Single Settings', 'eightmedi-pro'),
		));

	//archive sidebar
	$wp_customize->add_setting('eightmedi_pro_single_posted_on', array(
		'default' => '1',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_pro_single_posted_on', array(
		'type' => 'radio',
		'label' => __('Posted On Date on Singles', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_single_setting',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			)
		));

}
add_action( 'customize_register', 'eightmedi_pro_custom_customize_register_singles' );