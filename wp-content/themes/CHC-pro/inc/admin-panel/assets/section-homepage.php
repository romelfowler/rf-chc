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
function eightmedi_pro_custom_customize_register_homepage( $wp_customize ) {
	
	//Adding the Homepage Setup Panel
	$wp_customize->add_panel('eightmedi_pro_homepage_setups',array(
		'priority' => '30',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Homepage Setups','eightmedi-pro'),		
		));
	
	//Adding the Slider Setup Panel
	$wp_customize->add_section('eightmedi_pro_slider_setups',array(
		'priority' => '10',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Slider Setups','eightmedi-pro'),
		'description' => __('Manage Slides for the site','eightmedi-pro'),
		'panel' => 'eightmedi_pro_homepage_setups'
		));

	$wp_customize->add_setting('eightmedi_pro_display_slider', array(
		'default' => '1',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer'
		));

	$wp_customize->add_control('eightmedi_pro_display_slider',array(
		'type' => 'radio',
		'label' => __('Display Slider', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			)
		));

	//Slider Type
	$wp_customize->add_setting('eightmedi_pro_slider_type', array(
		'default' => 'category',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_slidertype',
		));

	$wp_customize->add_control('eightmedi_pro_slider_type', array(
		'type' => 'radio',
		'label' => __('Select Slider Type', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		'choices' => array(
			'revolution' => __('Revolution', 'eightmedi-pro'),
			'category' => __('Category', 'eightmedi-pro'),
			)
		));

	//slider shortcode
	$wp_customize->add_setting('eightmedi_pro_slider_shortcode', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_slider_shortcode',array(
		'type' => 'text',
		'label' => __('Revolution Slider/Other Plugin Slider Shortcode','eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		'active_callback' => 'eightmedi_pro_flag_slider_type_revolution',
		));

   	//select category for slider
	$wp_customize->add_setting('eightmedi_pro_slider_category',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
		));

	$wp_customize->add_control( new eightmedi_pro_WP_Customize_Category_Control( $wp_customize,'eightmedi_pro_slider_category', array(
		'label' => __('Select a category to show in slider','eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		'active_callback' => 'eightmedi_pro_flag_slider_type_category',
		)));

	//slider pager
	$wp_customize->add_setting('eightmedi_pro_display_pager', array(
		'default' => '1',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_pro_display_pager',array(
		'type' => 'radio',
		'label' => __('Display Pager', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			),
		'active_callback' => 'eightmedi_pro_flag_slider_type_category',
		));
	//slider controls
	$wp_customize->add_setting('eightmedi_pro_display_controls', array(
		'default' => '1',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_pro_display_controls',array(
		'type' => 'radio',
		'label' => __('Display Controls', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			),
		'active_callback' => 'eightmedi_pro_flag_slider_type_category',
		));
	//slider auto transition
	$wp_customize->add_setting('eightmedi_pro_auto_transition', array(
		'default' => '1',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_pro_auto_transition',array(
		'type' => 'radio',
		'label' => __('Enable Auto Transition', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			),
		'active_callback' => 'eightmedi_pro_flag_slider_type_category',
		));
	//slider transitiontype
	$wp_customize->add_setting('eightmedi_pro_transition_type', array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_pro_transition_type',array(
		'type' => 'radio',
		'label' => __('Transition Type', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		'choices' => array(
			'1' => __('Slide','eightmedi-pro'),
			'0' => __('Fade','eightmedi-pro')
			),
		'active_callback' => 'eightmedi_pro_flag_slider_type_category',
		));
	//slider caption
	$wp_customize->add_setting('eightmedi_pro_slider_text', array(
		'default' => '1',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_pro_slider_text',array(
		'type' => 'radio',
		'label' => __('Display Text in Slider', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		'choices' => array(
			'1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')
			),
		'active_callback' => 'eightmedi_pro_flag_slider_type_category',
		));

	//slider transition speed
	$wp_customize->add_setting('eightmedi_pro_transition_speed', array(
		'default' => '2000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		));

	$wp_customize->add_control('eightmedi_pro_transition_speed',array(
		'type' => 'number',
		'label' => __('Transition Speed', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		'active_callback' => 'eightmedi_pro_flag_slider_type_category',
		));
	//slider transition pause
	$wp_customize->add_setting('eightmedi_pro_transition_pause', array(
		'default' => '5000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		));

	$wp_customize->add_control('eightmedi_pro_transition_pause',array(
		'type' => 'number',
		'label' => __('Slide Pause Time', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		'active_callback' => 'eightmedi_pro_flag_slider_type_category',
		));

	$wp_customize->add_setting('slider_add_links_on_image_title',array(
		'default' => '1',
		));
	$wp_customize->add_control('slider_add_links_on_image_title',array(
		'type' => 'radio',
		'label' => __('Add link to post on Slider Image and title', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		'choices' => array('1' => __('Yes','eightmedi-pro'),
			'0' => __('No','eightmedi-pro')),
		'active_callback' => 'eightmedi_pro_flag_slider_type_category',
		));


	//slider bottom cta button
	$wp_customize->add_setting('eightmedi_lite_slider_cta_btntext', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_lite_slider_cta_btntext',array(
		'type' => 'text',
		'label' => __('Slider CTA Button Text', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		));

	//slider bottom cta button link
	$wp_customize->add_setting('eightmedi_pro_slider_cta_btnlink', array(
		'default' => '#book-an-appointment',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_slider_cta_btnlink',array(
		'type' => 'text',
		'label' => __('Slider CTA Button Link', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		));

	$wp_customize->add_setting('eightmedi_pro_slider_cta_btn_color', array(
		'default' => '#cc444d',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize , 'eightmedi_pro_slider_cta_btn_color',array(
		'label' => __('Choose Button Background Color.','eightmedi-pro'),
		'section' => 'eightmedi_pro_slider_setups',
		)));


	//featured Section
	$wp_customize->add_section('eightmedi_pro_featured_section', array(
		'priority' => 60,
		'title' => __('Featured Section', 'eightmedi-pro'),
		'description' => __('Featured Section posts will be loaded from post type Services', 'eightmedi-pro'),
		'panel' => 'eightmedi_pro_homepage_setups',
		));

    //enable disable featured section
	$wp_customize->add_setting('eightmedi_pro_featured_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_pro_featured_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Featured Section', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_featured_section',
		'setting' => 'eightmedi_pro_featured_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-pro'),
			'disable' => __('Disable', 'eightmedi-pro'),
			)
		));

   //featured Title
	$wp_customize->add_setting('eightmedi_pro_featured_title', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_featured_title',array(
		'type' => 'text',
		'label' => __('Latest featured Title','eightmedi-pro'),
		'section' => 'eightmedi_pro_featured_section',
		'setting' => 'eightmedi_pro_featured_title'
		));

	//here goes book an appointment
	$wp_customize->add_section('eightmedi_pro_appointment_section', array(
		'priority' => 60,
		'title' => __('Book an Appointment Section', 'eightmedi-pro'),
		'panel' => 'eightmedi_pro_homepage_setups',
		));

    //enable disable Book an Appointment section
	$wp_customize->add_setting('eightmedi_pro_appointment_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_pro_appointment_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Book an Appointment', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_appointment_section',
		'setting' => 'eightmedi_pro_appointment_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-pro'),
			'disable' => __('Disable', 'eightmedi-pro'),
			)
		));


   //Book an Appointment Title
	$wp_customize->add_setting('eightmedi_pro_appointment_title', array(
		'default' => 'Book An Appointment',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_pro_appointment_title',array(
		'type' => 'text',
		'label' => __('Book an Appointment Title','eightmedi-pro'),
		'section' => 'eightmedi_pro_appointment_section',
		'setting' => 'eightmedi_pro_appointment_title'
		));

    //Book an Appointment section description
	$wp_customize->add_setting('eightmedi_pro_appointment_desc', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_appointment_desc',array(
		'type' => 'textarea',
		'label' => __('Book an Appointment Description','eightmedi-pro'),
		'section' => 'eightmedi_pro_appointment_section',
		'setting' => 'eightmedi_pro_appointment_desc'
		));

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if(is_plugin_active('ultimate-form-builder-lite/ultimate-form-builder-lite.php')){

    //Book an Appointment link
		$wp_customize->add_setting('eightmedi_pro_appointment_formid', array(
			'default' => '',
			'sanitize_callback' => 'eightmedi_pro_sanitize_text',
			));

		$wp_customize->add_control('eightmedi_pro_appointment_formid',array(
			'type' => 'text',
			'label' => __('Book an Appointment Custom Form Id','eightmedi-pro'),
			'description' => __('Enter shortcode for Custom Form Id','eightmedi-pro'),
			'section' => 'eightmedi_pro_appointment_section', 
			'setting' => 'eightmedi_pro_appointment_formid'
			));
	}

   //Book an Appointment background image
	$wp_customize->add_setting('eightmedi_pro_appointment_bkgimage', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
		));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'eightmedi_pro_appointment_bkgimage', array(
		'label' => __('Background Image for Book an Appointment', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_appointment_section',
		'setting' => 'eightmedi_pro_appointment_bkgimage'
		)));

	//homepage about us section
	$wp_customize->add_section('eightmedi_pro_about_section', array(
		'priority' => 60,
		'title' => __('About Section', 'eightmedi-pro'),
		'panel' => 'eightmedi_pro_homepage_setups',
		));

    //enable disable about us section
	$wp_customize->add_setting('eightmedi_pro_about_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_pro_about_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable About Us Section', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_about_section',
		'setting' => 'eightmedi_pro_about_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-pro'),
			'disable' => __('Disable', 'eightmedi-pro'),
			)
		));

	$options_posts = array();
	$options_posts_obj = get_posts('posts_per_page=-1');
	$options_posts[''] = 'Select a Post:';
	foreach ($options_posts_obj as $post) {
		$options_posts[$post->ID] = $post->post_title;
	}
   //select post for about us
	$wp_customize->add_setting('eightmedi_pro_about_setting_post',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
		));

	$wp_customize->add_control('eightmedi_pro_about_setting_post', array(
		'type' => 'select',
		'label' => __('Select a Post to show in About Us Section','eightmedi-pro'),
		'section' => 'eightmedi_pro_about_section',
		'setting' => 'eightmedi_pro_about_setting_option',
		'choices' => $options_posts
		));

   //about us view more text
	$wp_customize->add_setting('eightmedi_pro_aboutus_viewmore_text', array(
		'default' => 'Details',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_pro_aboutus_viewmore_text',array(
		'type' => 'text',
		'label' => __('About View More Text','eightmedi-pro'),
		'section' => 'eightmedi_pro_about_section',
		'setting' => 'eightmedi_pro_aboutus_viewmore_text'
		));

	//Team Member Section
	$wp_customize->add_section('eightmedi_pro_teammember_section', array(
		'priority' => 70,
		'title' => __('Team Member Section', 'eightmedi-pro'),
		'description' => __('Team Section posts will be loaded from post type Doctor', 'eightmedi-pro'),
		'panel' => 'eightmedi_pro_homepage_setups',
		));

    //enable disable teammember section
	$wp_customize->add_setting('eightmedi_pro_teammember_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_pro_teammember_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Team Member', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_teammember_section',
		'setting' => 'eightmedi_pro_teammember_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-pro'),
			'disable' => __('Disable', 'eightmedi-pro'),
			)
		));


   //Team member Title
	$wp_customize->add_setting('eightmedi_pro_teammember_title', array(
		'default' => 'Team Member',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_teammember_title',array(
		'type' => 'text',
		'label' => __('Team Memeber Title','eightmedi-pro'),
		'section' => 'eightmedi_pro_teammember_section',
		'setting' => 'eightmedi_pro_teammember_title'
		));

	//Team member Desc
	$wp_customize->add_setting('eightmedi_pro_teammember_desc', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_teammember_desc',array(
		'type' => 'textarea',
		'label' => __('Team Memeber Description','eightmedi-pro'),
		'section' => 'eightmedi_pro_teammember_section',
		'setting' => 'eightmedi_pro_teammember_desc'
		));

   //Team Member button enable disable
	$wp_customize->add_setting('eightmedi_pro_teammember_button_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_pro_teammember_button_option', array(
		'type' => 'radio',
		'label' => __('Display Button for Category Page', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_teammember_section',
		'setting' => 'eightmedi_pro_teammember_button_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-pro'),
			'disable' => __('Disable', 'eightmedi-pro'),
			)
		));

   //Team Member Button View more text
	$wp_customize->add_setting('eightmedi_pro_teammember_button_text', array(
		'default' => 'View More',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_pro_teammember_button_text',array(
		'type' => 'text',
		'label' => __('Button Text','eightmedi-pro'),
		'section' => 'eightmedi_pro_teammember_section',
		'setting' => 'eightmedi_pro_teammember_button_text'
		));


	//Call To Action Section

	$wp_customize->add_section('eightmedi_pro_callto_section', array(
		'priority' => 70,
		'title' => __('Call To Action Section', 'eightmedi-pro'),
		'panel' => 'eightmedi_pro_homepage_setups',
		));

    //enable disable call to action section
	$wp_customize->add_setting('eightmedi_pro_callto_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_pro_callto_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Call To Action', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_callto_section',
		'setting' => 'eightmedi_pro_callto_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-pro'),
			'disable' => __('Disable', 'eightmedi-pro'),
			)
		));


   //call to action Title
	$wp_customize->add_setting('eightmedi_pro_callto_title', array(
		'default' => 'EightMedi Pro',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_pro_callto_title',array(
		'type' => 'text',
		'label' => __('Call To Action Title','eightmedi-pro'),
		'section' => 'eightmedi_pro_callto_section',
		'setting' => 'eightmedi_pro_callto_title'
		));

    //call to section description
	$wp_customize->add_setting('eightmedi_pro_callto_desc', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_pro_callto_desc',array(
		'type' => 'textarea',
		'label' => __('Call To Description','eightmedi-pro'),
		'section' => 'eightmedi_pro_callto_section',
		'setting' => 'eightmedi_pro_callto_desc'
		));

    //call to action read more
	$wp_customize->add_setting('eightmedi_pro_callto_readmore', array(
		'default' => 'Join',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_pro_callto_readmore',array(
		'type' => 'text',
		'label' => __('Call To Action Read More Text','eightmedi-pro'),
		'section' => 'eightmedi_pro_callto_section',
		'setting' => 'eightmedi_pro_callto_readmore'
		));

   //call to action link
	$wp_customize->add_setting('eightmedi_pro_callto_link', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',

		));

	$wp_customize->add_control('eightmedi_pro_callto_link',array(
		'type' => 'text',
		'label' => __('Call To Action Link','eightmedi-pro'),
		'section' => 'eightmedi_pro_callto_section',
		'setting' => 'eightmedi_pro_callto_link'
		));
   //call to action background image
	$wp_customize->add_setting('eightmedi_pro_callto_bkgimage', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
		));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'eightmedi_pro_callto_bkgimage', array(
		'label' => __('Image for Call to Action', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_callto_section',
		'setting' => 'eightmedi_pro_callto_bkgimage'
		)));

	//latest news Section
	$wp_customize->add_section('eightmedi_pro_news_section', array(
		'priority' => 70,
		'title' => __('Latest News Section', 'eightmedi-pro'),
		'panel' => 'eightmedi_pro_homepage_setups',
		));

    //enable disable news section
	$wp_customize->add_setting('eightmedi_pro_news_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_pro_news_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable News Section', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_news_section',
		'setting' => 'eightmedi_pro_news_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-pro'),
			'disable' => __('Disable', 'eightmedi-pro'),
			)
		));


   //News Title
	$wp_customize->add_setting('eightmedi_pro_news_title', array(
		'default' => 'Our Journal',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_news_title',array(
		'type' => 'text',
		'label' => __('News Section','eightmedi-pro'),
		'section' => 'eightmedi_pro_news_section',
		'setting' => 'eightmedi_pro_news_title'
		));

	//News Desc
	$wp_customize->add_setting('eightmedi_pro_news_desc', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_news_desc',array(
		'type' => 'textarea',
		'label' => __('News Section Description','eightmedi-pro'),
		'section' => 'eightmedi_pro_news_section',
		'setting' => 'eightmedi_pro_news_desc'
		));

     //select category for news
	$wp_customize->add_setting('eightmedi_pro_news_setting_category',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
		));

	$wp_customize->add_control( new eightmedi_pro_WP_Customize_Category_Control( $wp_customize,'eightmedi_pro_news_setting_category', array(
		'label' => __('Select a Category to show in latest news Section','eightmedi-pro'),
		'section' => 'eightmedi_pro_news_section',
		'setting' => 'eightmedi_pro_news_setting_category'
		)));

	//number of posts in news section
	$wp_customize->add_setting('eightmedi_pro_news_number', array(
		'default' => '6',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_number_posts',
		));

	$wp_customize->add_control('eightmedi_pro_news_number', array(
		'type' => 'select',
		'label' => __('Number of posts in News Section', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_news_section',
		'setting' => 'eightmedi_pro_news_number',
		'choices' => array(
			'3' => __('Three', 'eightmedi-pro'),
			'6' => __('Six', 'eightmedi-pro'),
			'9' => __('Nine', 'eightmedi-pro'),
			'12' => __('Twelve', 'eightmedi-pro'),
			)
		));

   //news button enable disable
	$wp_customize->add_setting('eightmedi_pro_news_button_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_pro_news_button_option', array(
		'type' => 'radio',
		'label' => __('Display Button for Category Page', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_news_section',
		'setting' => 'eightmedi_pro_news_button_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-pro'),
			'disable' => __('Disable', 'eightmedi-pro'),
			)
		));

   //news Button View more text
	$wp_customize->add_setting('eightmedi_pro_news_button_text', array(
		'default' => 'View More',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_pro_news_button_text',array(
		'type' => 'text',
		'label' => __('Button Text','eightmedi-pro'),
		'section' => 'eightmedi_pro_news_section',
		'setting' => 'eightmedi_pro_news_button_text'
		));

	//here goes testimonial section
	//testimonial Section
	$wp_customize->add_section('eightmedi_pro_testimonial_section', array(
		'priority' => 70,
		'title' => __('Our Testimonials', 'eightmedi-pro'),
		'description' => __('Testimonial Section posts will be loaded from post type Testimonial', 'eightmedi-pro'),
		'panel' => 'eightmedi_pro_homepage_setups',
		));

    //enable disable testimonial section
	$wp_customize->add_setting('eightmedi_pro_testimonial_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_pro_testimonial_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable testimonial Section', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_testimonial_section',
		'setting' => 'eightmedi_pro_testimonial_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-pro'),
			'disable' => __('Disable', 'eightmedi-pro'),
			)
		));

   //testimonial Title
	$wp_customize->add_setting('eightmedi_pro_testimonial_title', array(
		'default' => 'Our Testimonial',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_testimonial_title',array(
		'type' => 'text',
		'label' => __('testimonial Section','eightmedi-pro'),
		'section' => 'eightmedi_pro_testimonial_section',
		'setting' => 'eightmedi_pro_testimonial_title'
		));

	//faqs Section
	$wp_customize->add_section('eightmedi_pro_faqs_section', array(
		'priority' => 70,
		'title' => __('FAQs Section', 'eightmedi-pro'),
		'description' => __('Faqs Section posts will be loaded from post type Faqs', 'eightmedi-pro'),
		'panel' => 'eightmedi_pro_homepage_setups',
		));

    //enable disable faqs section
	$wp_customize->add_setting('eightmedi_pro_faqs_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_pro_faqs_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Faqs Section', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_faqs_section',
		'setting' => 'eightmedi_pro_faqs_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-pro'),
			'disable' => __('Disable', 'eightmedi-pro'),
			)
		));

   //faqs Title
	$wp_customize->add_setting('eightmedi_pro_faqs_title', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_faqs_title',array(
		'type' => 'text',
		'label' => __('Latest faqs Title','eightmedi-pro'),
		'section' => 'eightmedi_pro_faqs_section',
		'setting' => 'eightmedi_pro_faqs_title'
		));

	//faqs number
	$wp_customize->add_setting('eightmedi_pro_faqs_number', array(
		'default' => '10',
		'sanitize_callback' => 'eightmedi_pro_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_pro_faqs_number',array(
		'type' => 'number',
		'label' => __('Faqs Number of Posts','eightmedi-pro'),
		'section' => 'eightmedi_pro_faqs_section',
		'setting' => 'eightmedi_pro_faqs_number'
		));

	//faqs read more
	$wp_customize->add_setting('eightmedi_pro_faqs_readmore', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_faqs_readmore',array(
		'type' => 'text',
		'label' => __('Faqs Read More Text','eightmedi-pro'),
		'section' => 'eightmedi_pro_faqs_section',
		'setting' => 'eightmedi_pro_faqs_readmore'
		));

	//here goes sponsors section
	//sponsors Section
	$wp_customize->add_section('eightmedi_pro_sponsors_section', array(
		'priority' => 70,
		'title' => __('Our Sponsors Section', 'eightmedi-pro'),
		'description' => __('Sponsors Section posts will be loaded from post type Sponsors', 'eightmedi-pro'),
		'panel' => 'eightmedi_pro_homepage_setups',
		));

    //enable disable sponsors section
	$wp_customize->add_setting('eightmedi_pro_sponsors_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_pro_sponsors_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Sponsors Section', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_sponsors_section',
		'setting' => 'eightmedi_pro_sponsors_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-pro'),
			'disable' => __('Disable', 'eightmedi-pro'),
			)
		));


   //sponsors Title
	$wp_customize->add_setting('eightmedi_pro_sponsors_title', array(
		'default' => 'Our Sponsors',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_sponsors_title',array(
		'type' => 'text',
		'label' => __('Sponsors Section','eightmedi-pro'),
		'section' => 'eightmedi_pro_sponsors_section',
		'setting' => 'eightmedi_pro_sponsors_title'
		));

	//Small Call To Action Section

	$wp_customize->add_section('eightmedi_pro_callto_small_section', array(
		'priority' => 140,
		'title' => __('Small Call To Action Section', 'eightmedi-pro'),
		'panel' => 'eightmedi_pro_homepage_setups',
		));

    //enable disable call to action section
	$wp_customize->add_setting('eightmedi_pro_callto_small_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_pro_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_pro_callto_small_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Small Call To Action', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_callto_small_section',
		'setting' => 'eightmedi_pro_callto_small_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-pro'),
			'disable' => __('Disable', 'eightmedi-pro'),
			)
		));


   //call to action Title
	$wp_customize->add_setting('eightmedi_pro_callto_small_title', array(
		'default' => 'Make Your Appointment Today',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_pro_callto_small_title',array(
		'type' => 'text',
		'label' => __('Small Call To Action Title','eightmedi-pro'),
		'section' => 'eightmedi_pro_callto_small_section',
		'setting' => 'eightmedi_pro_callto_small_title'
		));

    //call to action read more
	$wp_customize->add_setting('eightmedi_pro_callto_readmore_small', array(
		'default' => 'Book Now',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_pro_callto_readmore_small',array(
		'type' => 'text',
		'label' => __('Small Call To Action Read More Text','eightmedi-pro'),
		'section' => 'eightmedi_pro_callto_small_section',
		'setting' => 'eightmedi_pro_callto_readmore_small'
		));

   //call to action link
	$wp_customize->add_setting('eightmedi_pro_callto_link_small', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_pro_sanitize_text',

		));

	$wp_customize->add_control('eightmedi_pro_callto_link_small',array(
		'type' => 'text',
		'label' => __('Call To Action Link','eightmedi-pro'),
		'section' => 'eightmedi_pro_callto_small_section',
		'setting' => 'eightmedi_pro_callto_link_small'
		));
   //call to action background image
	$wp_customize->add_setting('eightmedi_pro_callto_bkgimage_small', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
		));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'eightmedi_pro_callto_bkgimage_small', array(
		'label' => __('Image for Small Call to Action', 'eightmedi-pro'),
		'section' => 'eightmedi_pro_callto_small_section',
		'setting' => 'eightmedi_pro_callto_bkgimage_small'
		)));

	//Google Map Section
	$wp_customize->add_section('eightmedi_pro_google_map_section',array(
		'title' => __( 'Google Map', 'eightmedi-pro' ),
		'priority' => 140,
		'panel' => 'eightmedi_pro_homepage_setups',
		));

	// $wp_customize->add_setting('eightmedi_pro_google_map_iframe',array(
	// 	'default' => '',
	// 	'sanitize_callback' => 'wp_kses_stripslashes',
	// 	));

	// $wp_customize->add_control( 'eightmedi_pro_google_map_iframe',array(
	// 	'label' => __( 'Google Map Iframe', 'eightmedi-pro' ),
	// 	'section' => 'eightmedi_pro_google_map_section',
	// 	'description' => __( "Enter the Google Map Iframe", 'eightmedi-pro' ),
	// 	'type' => 'textarea',
	// 	));

	$wp_customize->add_setting('eightmedi_pro_contact_address',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));

	$wp_customize->add_control( 'eightmedi_pro_contact_address',array(
		'label' => __( 'Contact Address', 'eightmedi-pro' ),
		'section' => 'eightmedi_pro_google_map_section',
		'description' => __( "Enter the Contact Address Detail, add google map from widgets section", 'eightmedi-pro' ),
		'type' => 'textarea',
		));


	//end of Homepage section
}
add_action( 'customize_register', 'eightmedi_pro_custom_customize_register_homepage' );