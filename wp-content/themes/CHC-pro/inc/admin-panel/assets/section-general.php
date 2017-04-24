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
function eightmedi_pro_custom_customize_register_general( $wp_customize ) {
	//New Options By Sadip
	$wp_customize->add_panel( 
		'demo_data_setting',
		array(
			'priority'         =>      '2',
			'capability'       =>      'edit_theme_options',
			'theme_supports'   =>      '',
			'title'            =>      __( 'Demo Data Settings', 'eightmedi-pro' ),
			'description'      =>      __( 'This allows to edit the header', 'eightmedi-pro' ),
			) );

	$wp_customize->add_section(
		'demo_data_import_setting',
		array(
			'title'           =>      __('Import Demo Data', 'eightmedi-pro'),
			'priority'        =>      '2',
			'panel' => 'demo_data_setting', )
		);

	$wp_customize->add_setting(
		'demo_data_import',
		array(
			'default' =>  '1',
			)
		);
	$wp_customize->add_control(new WP_Customize_Demo_Control(
		$wp_customize,
		'demo_data_import',
		array(
			'section'       =>      'demo_data_import_setting',
			'label'         =>      __('Import Demo Data', 'eightmedi-pro'),
			))
	);

  //Theme Color Setups
	$wp_customize->add_section('eightmedi_pro_color_setups',array(
		'priority' => '20',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Theme Color Setups','eightmedi-pro'),
		'description' => __('Manage Theme Colors Setups for the site','eightmedi-pro')
		));

	$wp_customize->add_setting('eightmedi_pro_theme_primary_color', array(
		'default' => '#2b96cc',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 'eightmedi_pro_theme_primary_color',array(
		'label' => __('Choose Theme Primary Color.','eightmedi-pro'),
		'description' => __('This will replace the default primary theme color of blue(#2b96cc).','eightmedi-pro'),
		'section' => 'eightmedi_pro_color_setups',
		)));

	$wp_customize->add_setting('eightmedi_pro_theme_primary_hover_color', array(
		'default' => '#0173ac',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 'eightmedi_pro_theme_primary_hover_color',array(
		'label' => __('Choose Theme Primary Hover Color.','eightmedi-pro'),
		'description' => __('This will replace the default primary theme color of dark blue(#0173ac).','eightmedi-pro'),
		'section' => 'eightmedi_pro_color_setups',
		)));

	//Adding the General Setup Panel
	$wp_customize->add_panel('eightmedi_pro_general_setups',array(
		'priority' => '20',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('General Setups','eightmedi-pro'),
		'description' => __('Manage General Setups for the site','eightmedi-pro')
		));

	//Webpage layout
	$wp_customize->add_section('eightmedi_pro_webpage_layout', array(
		'priority' => 10,
		'title' => __('Webpage Layout', 'eightmedi-pro'),
		'panel' => 'eightmedi_pro_general_setups'
		));
	$wp_customize->add_setting('eightmedi_pro_webpage_layout', array(
		'default' => 'fullwidth',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_webpagelayout',
		));

	$wp_customize->add_control('eightmedi_pro_webpage_layout', array(
		'type' => 'radio',
		'label' => __('Choose the layout that you want', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_webpage_layout',
		'setting' => 'eightmedi_pro_webpage_layout',
		'choices' => array(
			'fullwidth' => __('Full Width', 'eightmedi-pro'),
			'boxed' => __('Boxed', 'eightmedi-pro')
			)
		));

	$wp_customize->add_section('eightmedi_pro_top_header_callto',array(
		'title' => __('Top Header Call-To','eightmedi-pro'),
		'priority' => '20',
		'panel' => 'eightmedi_pro_general_setups'
		));

	$wp_customize->add_setting('eightmedi_pro_top_header_setting',array(
		'default' => '1',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));
	$wp_customize->add_control('eightmedi_pro_top_header_setting',array(
		'type' => 'radio',
		'label' => __('Enable Top Header','eightmedi-pro'),
		'description' => __('Selecting No will Hide Top Header','eightmedi-pro'),
		'section' => 'eightmedi_pro_top_header_callto',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			)
		));

	$wp_customize->add_setting('eightmedi_pro_callto_text',array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		'transport' => 'postMessage'
		));
	$wp_customize->add_control('eightmedi_pro_callto_text',array(
		'type' => 'textarea',
		'label' => __('Call To Content  - Left','eightmedi-pro'),
		'description' => __('Enter text or HTML for call to action','eightmedi-pro'),
		'section' => 'eightmedi_pro_top_header_callto'
		));

	$wp_customize->add_setting('eightmedi_pro_callto_text_right',array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		'transport' => 'postMessage'
		));
	$wp_customize->add_control('eightmedi_pro_callto_text_right',array(
		'type' => 'textarea',
		'label' => __('Call To Content  - Right','eightmedi-pro'),
		'description' => __('Enter text or HTML for call to action','eightmedi-pro'),
		'section' => 'eightmedi_pro_top_header_callto'
		));

	$wp_customize->add_section('eightmedi_pro_header_search',array(
		'title' => __('Header Search Setting','eightmedi-pro'),
		'priority' => '30',
		'panel' => 'eightmedi_pro_general_setups'
		));
	$wp_customize->add_setting('eightmedi_pro_hide_header_search',array(
		'default' => '0',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));
	$wp_customize->add_control('eightmedi_pro_hide_header_search',array(
		'type' => 'radio',
		'label' => __('Hide Search From Header','eightmedi-pro'),
		'description' => __('Selecting Yes will Hide Search Bar From Header','eightmedi-pro'),
		'section' => 'eightmedi_pro_header_search',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			)
		));

	$wp_customize->add_section('eightmedi_pro_logo_alignment',array(
		'title' => __('Header Logo Alignment Setting','eightmedi-pro'),
		'priority' => '40',
		'panel' => 'eightmedi_pro_general_setups'
		));

	$wp_customize->add_setting('eightmedi_pro_logo_alignment_setting',array(
		'default' => '1',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));
	$wp_customize->add_control('eightmedi_pro_logo_alignment_setting',array(
		'type' => 'radio',
		'label' => __('Logo Alignment','eightmedi-pro'),
		'section' => 'eightmedi_pro_logo_alignment',
		'choices' => array(
			'1' => __('Default (Left Align)','eightmedi-pro'),
			'0' => __('Center Align','eightmedi-pro')
			)
		));

	$wp_customize->add_section('eightmedi_pro_header_sticky',array(
		'title' => __('Sticky Header Setting','eightmedi-pro'),
		'priority' => '60',
		'panel' => 'eightmedi_pro_general_setups'
		));
	$wp_customize->add_setting('eightmedi_pro_hide_header_sticky',array(
		'default' => '1',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));
	$wp_customize->add_control('eightmedi_pro_hide_header_sticky',array(
		'type' => 'radio',
		'label' => __('Enable Sticky Header?','eightmedi-pro'),
		'description' => __('Selecting Yes will make header sticky','eightmedi-pro'),
		'section' => 'eightmedi_pro_header_sticky',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			)
		));

	//Breadcrumbs options............
	$wp_customize->add_section(
		'eightmedi_pro_breadcrumbs_section',
		array(
			'title' => 'Breadcrumbs',
			'panel' => 'eightmedi_pro_general_setups',            
			)
		);

	$wp_customize->add_setting(
		'eightmedi_pro_breadcrumb_setting_option',
		array(
			'default' => '1',
			'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
			)
		);

	$wp_customize->add_control('eightmedi_pro_breadcrumb_setting_option',array(
		'type' => 'radio',
		'label' => __('Show Breadcrumb','eightmedi-pro'),
		'section' => 'eightmedi_pro_breadcrumbs_section',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			)
		));

	$wp_customize->add_setting(
		'eightmedi_pro_home_text',
		array(
			'default' => __('Home','eightmedi-pro'),
			'sanitize_callback' => 'eightmedi_pro_sanitize_text',
			)
		);

	$wp_customize->add_control('eightmedi_pro_home_text',array(
		'type' => 'text',
		'label' => __( 'Home Text', 'eightmedi-pro' ),
		'section' => 'eightmedi_pro_breadcrumbs_section',
		)
	);

	$wp_customize->add_setting(
		'eightmedi_pro_bc_delimiter',
		array(
			'default' => '&raquo;',
			'sanitize_callback' => 'eightmedi_pro_sanitize_text',
			)
		);

	$wp_customize->add_control('eightmedi_pro_bc_delimiter',array(
		'type' => 'text',
		'label' => __( 'Breadcrumb Separator/Delimiter', 'eightmedi-pro' ),
		'section' => 'eightmedi_pro_breadcrumbs_section',
		)
	);


	$wp_customize->add_setting(
		'eightmedi_pro_singlepost_title_option',
		array(
			'default' => '1',
			'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
			)
		);

	$wp_customize->add_control('eightmedi_pro_singlepost_title_option',array(
		'type' => 'radio',
		'label' => __( 'Enable Title on Single post', 'eightmedi-pro' ),
		'description' => __( 'Show or hide article title on single post.', 'eightmedi-pro' ),
		'section' => 'eightmedi_pro_breadcrumbs_section',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			)
		));

	$wp_customize->add_section('eightmedi_pro_footer_settings',array(
		'title' => __('Footer Settings','eightmedi-pro'),
		'priority' => '60',
		'panel' => 'eightmedi_pro_general_setups'
		));

	$wp_customize->add_setting(
		'eightmedi_pro_footer_copyright_text',
		array(
			'default' => '',
			'sanitize_callback' => 'eightmedi_pro_sanitize_text',
			)
		);

	$wp_customize->add_control(
		'eightmedi_pro_footer_copyright_text',
		array(
			'label' => __( 'Footer Copyright Text' , 'eightmedi-pro' ),
			'section' => 'eightmedi_pro_footer_settings',
			'type' => 'textarea',
			)
		);

}
add_action( 'customize_register', 'eightmedi_pro_custom_customize_register_general' );