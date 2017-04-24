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
function eightmedi_pro_custom_customize_register_social( $wp_customize ) {
	
	//Social Settings Section
	$wp_customize->add_section('eightmedi_pro_social_setting', array(
		'priority' => 70,
		'title' => __('Social Links Section', 'eightmedi-pro'),
		));

    //socail setting in header
	$wp_customize->add_setting('eightmedi_pro_social_icons_in_header', array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_pro_social_icons_in_header', array(
		'type' => 'radio',
		'label' => __('Display Social Icons in Header', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_social_setting',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			),
		));

	$wp_customize->add_setting('eightmedi_pro_social_icons_in_footer', array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_pro_social_icons_in_footer', array(
		'type' => 'radio',
		'label' => __('Display Social Icons in Footer', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_social_setting',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			),
		));

   //social facebook link
	$wp_customize->add_setting('eightmedi_pro_social_facebook', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_pro_social_facebook',array(
		'type' => 'text',
		'label' => __('Facebook','eightmedi-pro'),
		'section' => 'eightmedi_pro_social_setting',
		));

    //social twitter link
	$wp_customize->add_setting('eightmedi_pro_social_twitter', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_pro_social_twitter',array(
		'type' => 'text',
		'label' => __('Twitter','eightmedi-pro'),
		'section' => 'eightmedi_pro_social_setting',
		));

    //social googleplus link
	$wp_customize->add_setting('eightmedi_pro_social_googleplus', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_pro_social_googleplus',array(
		'type' => 'text',
		'label' => __('Google Plus','eightmedi-pro'),
		'section' => 'eightmedi_pro_social_setting',
		));

     //social youtube link
	$wp_customize->add_setting('eightmedi_pro_social_youtube', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_pro_social_youtube',array(
		'type' => 'text',
		'label' => __('YouTube','eightmedi-pro'),
		'section' => 'eightmedi_pro_social_setting',
		));

     //social pinterest link
	$wp_customize->add_setting('eightmedi_pro_social_pinterest', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_pro_social_pinterest',array(
		'type' => 'text',
		'label' => __('Pinterest','eightmedi-pro'),
		'section' => 'eightmedi_pro_social_setting',
		));

    //social linkedin link
	$wp_customize->add_setting('eightmedi_pro_social_linkedin', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_pro_social_linkedin',array(
		'type' => 'text',
		'label' => __('Linkedin','eightmedi-pro'),
		'section' => 'eightmedi_pro_social_setting',
		));

    //social vimeo link
	$wp_customize->add_setting('eightmedi_pro_social_vimeo', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_pro_social_vimeo',array(
		'type' => 'text',
		'label' => __('Vimeo','eightmedi-pro'),
		'section' => 'eightmedi_pro_social_setting',
		));

    //social instagram link
	$wp_customize->add_setting('eightmedi_pro_social_instagram', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_pro_social_instagram',array(
		'type' => 'text',
		'label' => __('Instagram','eightmedi-pro'),
		'section' => 'eightmedi_pro_social_setting',
		));

    //social skype link
	$wp_customize->add_setting('eightmedi_pro_social_skype', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_pro_social_skype',array(
		'type' => 'text',
		'label' => __('Skype','eightmedi-pro'),
		'section' => 'eightmedi_pro_social_setting',
		));
}
add_action( 'customize_register', 'eightmedi_pro_custom_customize_register_social' );