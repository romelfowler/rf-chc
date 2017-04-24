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
function eightmedi_pro_custom_customize_register_archives( $wp_customize ) {
	
	// Settings Section
	$wp_customize->add_section('eightmedi_pro_archive_setting', array(
		'priority' => 70,
		'title' => __('Archive Settings', 'eightmedi-pro'),
		));

	//archive sidebar
	$wp_customize->add_setting('eightmedi_pro_archive_posted_on', array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_pro_archive_posted_on', array(
		'type' => 'radio',
		'label' => __('Posted On Date on Archives', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_archive_setting',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			)
		));

    //archive sidebar
	$wp_customize->add_setting('eightmedi_pro_testimonial_archive_sidebar', array(
		'default' => 'right-sidebar',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_sidebar_layouts',
		));

	$wp_customize->add_control('eightmedi_pro_testimonial_archive_sidebar', array(
		'type' => 'radio',
		'label' => __('Testimonials Archive Page Sidebar', 'eightmedi-pro'),
		'description' => __('Create a custom menu with link <br/> '. site_url('testimonial'), 'eightmedi-pro'),
		'section' => 'eightmedi_pro_archive_setting',
		'choices' => array(
			'left-sidebar' => 'Left Sidebar',  
			'right-sidebar' => 'Right Sidebar', 
			'both-sidebar' => 'Both Sidebar',
			'no-sidebar' => 'No Sidebar',
			)
		));

	 //archive sidebar
	$wp_customize->add_setting('eightmedi_pro_faqs_archive_sidebar', array(
		'default' => 'right-sidebar',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_sidebar_layouts',
		));

	$wp_customize->add_control('eightmedi_pro_faqs_archive_sidebar', array(
		'type' => 'radio',
		'label' => __('FAQs Archive Page Sidebar', 'eightmedi-pro'),
		'description' => __('Create a custom menu with link <br/> '. site_url('faqs'), 'eightmedi-pro'),
		'section' => 'eightmedi_pro_archive_setting',
		'choices' => array(
			'left-sidebar' => 'Left Sidebar',  
			'right-sidebar' => 'Right Sidebar', 
			'both-sidebar' => 'Both Sidebar',
			'no-sidebar' => 'No Sidebar',
			)
		));

	//archive sidebar
	$wp_customize->add_setting('eightmedi_pro_sponsors_archive_sidebar', array(
		'default' => 'right-sidebar',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_sidebar_layouts',
		));

	$wp_customize->add_control('eightmedi_pro_sponsors_archive_sidebar', array(
		'type' => 'radio',
		'label' => __('Sponsors Archive Page Sidebar', 'eightmedi-pro'),
		'description' => __('Create a custom menu with link <br/> '. site_url('sponsors'), 'eightmedi-pro'),
		'section' => 'eightmedi_pro_archive_setting',
		'choices' => array(
			'left-sidebar' => 'Left Sidebar',  
			'right-sidebar' => 'Right Sidebar', 
			'both-sidebar' => 'Both Sidebar',
			'no-sidebar' => 'No Sidebar',
			)
		));

}
add_action( 'customize_register', 'eightmedi_pro_custom_customize_register_archives' );