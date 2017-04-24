<?php
/**
* Custom Sanitizer Function 
*/

function eightmedi_pro_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function eightmedi_pro_sanitize_radio_integer( $input){
	$valid_keys = array(
		'1' => __('Yes','eightmedi-pro'),
		'0' => __('No','eightmedi-pro')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function eightmedi_pro_sanitize_page_layouts($input) {
	$imagepath =  get_template_directory_uri() . '/inc/images/';
	$valid_keys = array(
		'sidebar-left' => $imagepath.'sidebar-left.png',  
		'sidebar-right' => $imagepath.'sidebar-right.png', 
		'sidebar-both' => $imagepath.'sidebar-both.png',
		'sidebar-no' => $imagepath.'sidebar-no.png',
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}
function eightmedi_pro_radio_sanitize_enabledisable($input) {
	$valid_keys = array(
		'enable'=>__('Enable', 'eightmedi-pro'),
		'disable'=>__('Disable', 'eightmedi-pro')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function eightmedi_pro_radio_sanitize_yesno($input) {
	$valid_keys = array(
		'yes'=>__('Yes', 'eightmedi-pro'),
		'no'=>__('No', 'eightmedi-pro')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function eightmedi_pro_radio_sanitize_webpagelayout($input) {
	$valid_keys = array(
		'fullwidth' => __('Full Width', 'eightmedi-pro'),
		'boxed' => __('Boxed', 'eightmedi-pro')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function eightmedi_pro_radio_sanitize_slidertype($input) {
	$valid_keys = array(
		'revolution' => __('Revolution', 'eightmedi-pro'),
		'category' => __('Category', 'eightmedi-pro'),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}
function eightmedi_pro_flag_slider_type_revolution(){
	$eightmedislider_options = get_theme_mod( 'eightmedi_pro_slider_type');
	if( $eightmedislider_options == 'revolution') {
		return true;
	}
	return false;
}
function eightmedi_pro_flag_slider_type_category(){
	$eightmedislider_options = get_theme_mod( 'eightmedi_pro_slider_type');
	if( $eightmedislider_options == 'category') {
		return true;
	}
	return false;
}

function eightmedi_pro_radio_sanitize_listgrid($input) {
	$valid_keys = array(
		'list' => __('List','eightmedi-pro'),
		'grid' => __('Grid','eightmedi-pro')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function eightmedi_pro_flag_archive_grid(){
	$edal = get_theme_mod( 'eightmedi_pro_doctor_archive_layout','grid');
	if( $edal == 'grid') {
		return true;
	}
	return false;
}
function eightmedi_pro_flag_archive_list(){
	$edal = get_theme_mod( 'eightmedi_pro_doctor_archive_layout','grid');
	if( $edal == 'list') {
		return true;
	}
	return false;
}
function eightmedi_pro_flag_archive_grid_services(){
	$edal = get_theme_mod( 'eightmedi_pro_services_archive_layout','grid');
	if( $edal == 'grid') {
		return true;
	}
	return false;
}
function eightmedi_pro_flag_archive_list_services(){
	$edal = get_theme_mod( 'eightmedi_pro_services_archive_layout','grid');
	if( $edal == 'list') {
		return true;
	}
	return false;
}

function eightmedi_pro_radio_sanitize_gridcolumn($input) {
	$valid_keys = array(
		'1' => __('1','eightmedi-pro'),
		'2' => __('2','eightmedi-pro'),
		'3' => __('3','eightmedi-pro'),
		'4' => __('4','eightmedi-pro')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function eightmedi_pro_radio_sanitize_listdesign($input) {
	$valid_keys = array(
		'square' => __('Square Medium Image','eightmedi-pro'),
		'square-alt' => __('Square Alternate Medium Image','eightmedi-pro'),
		'circle' => __('Circle Medium Image','eightmedi-pro'),
		'circle-alt' => __('Circle Alternate Medium Image','eightmedi-pro')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}
function eightmedi_pro_sanitize_sidebar_layouts($input) {
	$valid_keys = array(
		'left-sidebar' => 'Left Sidebar',  
		'right-sidebar' => 'Right Sidebar', 
		'both-sidebar' => 'Both Sidebar',
		'no-sidebar' => 'No Sidebar',
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function eightmedi_pro_number_posts($input) {
	$valid_keys = array(
		'3' => __('Three', 'eightmedi-pro'),
		'6' => __('Six', 'eightmedi-pro'),
		'9' => __('Nine', 'eightmedi-pro'),
		'12' => __('Twelve', 'eightmedi-pro'),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}	
}