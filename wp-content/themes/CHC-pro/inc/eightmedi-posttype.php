<?php
/**
 * @package eightmedi Pro
 */

function eightmedi_pro_create_doctor() {
	$labels = array(
		'name'               => _x( 'Doctors', 'post type general name' , 'eightmedi-pro' ),
		'singular_name'      => _x( 'Doctor', 'post type singular name' , 'eightmedi-pro' ),
		'add_new'            => _x( 'Add New', 'Doctor' , 'eightmedi-pro' ),
		'add_new_item'       => __( 'Add New Doctor' , 'eightmedi-pro' ),
		'edit_item'          => __( 'Edit Doctor' , 'eightmedi-pro' ),
		'new_item'           => __( 'New Doctor' , 'eightmedi-pro' ),
		'all_items'          => __( 'All Doctor' , 'eightmedi-pro'),
		'view_item'          => __( 'View Doctor' , 'eightmedi-pro'),
		'search_items'       => __( 'Search Doctor' , 'eightmedi-pro'),
		'not_found'          => __( 'No Doctor found' , 'eightmedi-pro'),
		'not_found_in_trash' => __( 'No Doctor found in the Trash' , 'eightmedi-pro'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Doctor'
		);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Doctors and Doctor specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail'),
		'has_archive'   => true,
		'menu_icon' => 'dashicons-businessman',
		);
	register_post_type( 'doctor', $args );
}

add_action( 'init', 'eightmedi_pro_create_doctor' );

function create_doctor_category() {
	$labels = array(
		'name'              => _x( 'Doctor Categories', 'taxonomy general name', 'eightmedi-pro' ),
		'singular_name'     => _x( 'Doctor Category', 'taxonomy singular name', 'eightmedi-pro' ),
		'search_items'      => __( 'Search Doctor Categories', 'eightmedi-pro' ),
		'all_items'         => __( 'All Doctor Categories', 'eightmedi-pro' ),
		'parent_item'       => __( 'Parent Doctor Category', 'eightmedi-pro' ),
		'parent_item_colon' => __( 'Parent Doctor Category:', 'eightmedi-pro' ),
		'edit_item'         => __( 'Edit Doctor Category', 'eightmedi-pro' ),
		'update_item'       => __( 'Update Doctor Category', 'eightmedi-pro' ),
		'add_new_item'      => __( 'Add New Doctor Category', 'eightmedi-pro' ),
		'new_item_name'     => __( 'New Doctor Category', 'eightmedi-pro' ),
		'menu_name'         => __( 'Doctor Categories', 'eightmedi-pro' ),
		);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		);
	register_taxonomy( 'doctor-category', 'doctor', $args );
}
add_action( 'init', 'create_doctor_category', 0 );


function eightmedi_pro_create_service() {

$labels = array(
		'name'               => _x( 'Services', 'post type general name' , 'eightmedi-pro' ),
		'singular_name'      => _x( 'Service', 'post type singular name' , 'eightmedi-pro' ),
		'add_new'            => _x( 'Add New', 'Service' , 'eightmedi-pro' ),
		'add_new_item'       => __( 'Add New Service' , 'eightmedi-pro' ),
		'edit_item'          => __( 'Edit Service' , 'eightmedi-pro' ),
		'new_item'           => __( 'New Service' , 'eightmedi-pro' ),
		'all_items'          => __( 'All Service' , 'eightmedi-pro'),
		'view_item'          => __( 'View Service' , 'eightmedi-pro'),
		'search_items'       => __( 'Search Service' , 'eightmedi-pro'),
		'not_found'          => __( 'No Service found' , 'eightmedi-pro'),
		'not_found_in_trash' => __( 'No Service found in the Trash' , 'eightmedi-pro'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Service'
		);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Testimonials and Service specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail','excerpt'),
		'has_archive'   => true,
		'menu_icon' => 'dashicons-universal-access-alt',
		);
	register_post_type( 'service', $args );
}

add_action( 'init', 'eightmedi_pro_create_Service' );

function create_service_category() {
	$labels = array(
		'name'              => _x( 'Service Categories', 'taxonomy general name', 'eightmedi-pro' ),
		'singular_name'     => _x( 'Service Category', 'taxonomy singular name', 'eightmedi-pro' ),
		'search_items'      => __( 'Search Service Categories', 'eightmedi-pro' ),
		'all_items'         => __( 'All Service Categories', 'eightmedi-pro' ),
		'parent_item'       => __( 'Parent Service Category', 'eightmedi-pro' ),
		'parent_item_colon' => __( 'Parent Service Category:', 'eightmedi-pro' ),
		'edit_item'         => __( 'Edit Service Category', 'eightmedi-pro' ),
		'update_item'       => __( 'Update Service Category', 'eightmedi-pro' ),
		'add_new_item'      => __( 'Add New Service Category', 'eightmedi-pro' ),
		'new_item_name'     => __( 'New Service Category', 'eightmedi-pro' ),
		'menu_name'         => __( 'Service Categories', 'eightmedi-pro' ),
		);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		);
	register_taxonomy( 'service-category', 'Service', $args );
}
add_action( 'init', 'create_service_category', 0 );


function eightmedi_pro_create_testimonial() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name' , 'eightmedi-pro' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name' , 'eightmedi-pro' ),
		'add_new'            => _x( 'Add New', 'Testimonial' , 'eightmedi-pro' ),
		'add_new_item'       => __( 'Add New Testimonial' , 'eightmedi-pro' ),
		'edit_item'          => __( 'Edit Testimonial' , 'eightmedi-pro' ),
		'new_item'           => __( 'New Testimonial' , 'eightmedi-pro' ),
		'all_items'          => __( 'All Testimonial' , 'eightmedi-pro'),
		'view_item'          => __( 'View Testimonial' , 'eightmedi-pro'),
		'search_items'       => __( 'Search Testimonial' , 'eightmedi-pro'),
		'not_found'          => __( 'No Testimonial found' , 'eightmedi-pro'),
		'not_found_in_trash' => __( 'No Testimonial found in the Trash' , 'eightmedi-pro'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonial'
		);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Testimonials and Testimonial specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail'),
		'has_archive'   => true,
		'menu_icon' => 'dashicons-testimonial',
		);
	register_post_type( 'testimonial', $args );
}

add_action( 'init', 'eightmedi_pro_create_testimonial' );

function eightmedi_pro_create_faqs() {
	$labels = array(
		'name'               => _x( 'FAQ', 'post type general name' , 'eightmedi-pro' ),
		'singular_name'      => _x( 'FAQ', 'post type singular name' , 'eightmedi-pro' ),
		'add_new'            => _x( 'Add New', 'FAQ' , 'eightmedi-pro' ),
		'add_new_item'       => __( 'Add New FAQ' , 'eightmedi-pro' ),
		'edit_item'          => __( 'Edit FAQ' , 'eightmedi-pro' ),
		'new_item'           => __( 'New FAQ' , 'eightmedi-pro' ),
		'all_items'          => __( 'All FAQ' , 'eightmedi-pro' ),
		'view_item'          => __( 'View FAQ' , 'eightmedi-pro' ),
		'search_items'       => __( 'Search FAQ' , 'eightmedi-pro' ),
		'not_found'          => __( 'No FAQ found' , 'eightmedi-pro' ),
		'not_found_in_trash' => __( 'No FAQ found in the Trash'  , 'eightmedi-pro'),
		'parent_item_colon'  => '',
		'menu_name'          => 'FAQ'
		);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our FAQs and FAQ specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor'),
		'has_archive'   => true,
		'menu_icon' => 'dashicons-megaphone'
		);
	register_post_type( 'faqs', $args );
}

add_action( 'init', 'eightmedi_pro_create_faqs' );

function eightmedi_pro_create_sponsors() {
	$labels = array(
		'name'               => _x( 'Sponsor', 'post type general name' , 'eightmedi-pro' ),
		'singular_name'      => _x( 'Sponsor', 'post type singular name' , 'eightmedi-pro' ),
		'add_new'            => _x( 'Add New', 'Sponsor' , 'eightmedi-pro' ),
		'add_new_item'       => __( 'Add New Sponsor' , 'eightmedi-pro' ),
		'edit_item'          => __( 'Edit Sponsor' , 'eightmedi-pro' ),
		'new_item'           => __( 'New Sponsor' , 'eightmedi-pro' ),
		'all_items'          => __( 'All Sponsor' , 'eightmedi-pro' ),
		'view_item'          => __( 'View Sponsor' , 'eightmedi-pro' ),
		'search_items'       => __( 'Search Sponsor' , 'eightmedi-pro' ),
		'not_found'          => __( 'No Sponsor found' , 'eightmedi-pro' ),
		'not_found_in_trash' => __( 'No Sponsor found in the Trash'  , 'eightmedi-pro'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Sponsor'
		);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Sponsors and Sponsor specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail'),
		'has_archive'   => true,
		'menu_icon' => 'dashicons-tickets'
		);
	register_post_type( 'sponsors', $args );
}

add_action( 'init', 'eightmedi_pro_create_sponsors' );
