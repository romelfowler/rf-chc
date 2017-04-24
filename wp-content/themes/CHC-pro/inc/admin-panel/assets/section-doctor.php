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
function eightmedi_pro_custom_customize_register_doctor( $wp_customize ) {
	
	//Doctor Settings Section
	$wp_customize->add_section('eightmedi_pro_doctor_archive_setting', array(
		'priority' => 70,
		'title' => __('Doctor Settings', 'eightmedi-pro'),
		'description' => __('Create a custom menu with link <br/> '. site_url('doctor'), 'eightmedi-pro'),
		));

    //archive layout
	$wp_customize->add_setting('eightmedi_pro_doctor_archive_layout', array(
		'default' => 'grid',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_listgrid',
		));

	$wp_customize->add_control('eightmedi_pro_doctor_archive_layout', array(
		'type' => 'radio',
		'label' => __('Display Doctor in?', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_doctor_archive_setting',
		'choices' => array(
			'list' => __('List','eightmedi-pro'),
			'grid' => __('Grid','eightmedi-pro')
			),
		));

	//archive layout
	$wp_customize->add_setting('eightmedi_pro_doctor_archive_grid_column', array(
		'default' => '3',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_gridcolumn',
		));

	$wp_customize->add_control('eightmedi_pro_doctor_archive_grid_column', array(
		'type' => 'radio',
		'label' => __('Grid Columns', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_doctor_archive_setting',
		'choices' => array(
			'1' => __('1','eightmedi-pro'),
			'2' => __('2','eightmedi-pro'),
			'3' => __('3','eightmedi-pro'),
			'4' => __('4','eightmedi-pro')
			),
		'active_callback' => 'eightmedi_pro_flag_archive_grid'
		));

	//archive layout
	$wp_customize->add_setting('eightmedi_pro_doctor_archive_list_design', array(
		'default' => 'square',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_listdesign',
		));

	$wp_customize->add_control('eightmedi_pro_doctor_archive_list_design', array(
		'type' => 'radio',
		'label' => __('List Design', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_doctor_archive_setting',
		'choices' => array(
			'square' => __('Square Medium Image','eightmedi-pro'),
			'square-alt' => __('Square Alternate Medium Image','eightmedi-pro'),
			'circle' => __('Circle Medium Image','eightmedi-pro'),
			'circle-alt' => __('Circle Alternate Medium Image','eightmedi-pro')
			),
		'active_callback' => 'eightmedi_pro_flag_archive_list'
		));

	//archive sidebar
	$wp_customize->add_setting('eightmedi_pro_doctor_archive_sidebar', array(
		'default' => 'right-sidebar',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_sidebar_layouts',
		));

	$wp_customize->add_control('eightmedi_pro_doctor_archive_sidebar', array(
		'type' => 'radio',
		'label' => __('Archive Page Sidebar', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_doctor_archive_setting',
		'choices' => array(
			'left-sidebar' => 'Left Sidebar',  
			'right-sidebar' => 'Right Sidebar', 
			'both-sidebar' => 'Both Sidebar',
			'no-sidebar' => 'No Sidebar',
			)
		));

	//single sidebar
	$wp_customize->add_setting('eightmedi_pro_doctor_single_sidebar', array(
		'default' => 'right-sidebar',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_sidebar_layouts',
		));

	$wp_customize->add_control('eightmedi_pro_doctor_single_sidebar', array(
		'type' => 'radio',
		'label' => __('Single Page Sidebar', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_doctor_archive_setting',
		'choices' => array(
			'left-sidebar' => 'Left Sidebar',  
			'right-sidebar' => 'Right Sidebar', 
			'both-sidebar' => 'Both Sidebar',
			'no-sidebar' => 'No Sidebar',
			)
		));

	//doctor readmore text
	$wp_customize->add_setting('eightmedi_pro_doctor_archive_readmore_text', array(
		'default' => 'View Details',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_doctor_archive_readmore_text',array(
		'type' => 'text',
		'label' => __('Read More Text','eightmedi-pro'),
		'section' => 'eightmedi_pro_doctor_archive_setting',
		));
}
add_action( 'customize_register', 'eightmedi_pro_custom_customize_register_doctor' );