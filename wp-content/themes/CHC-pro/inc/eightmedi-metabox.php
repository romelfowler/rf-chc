<?php
/**
 * EightMedi Pro Theme Metabox Options
 *
 * @package EightMedi Pro
 */

add_action('add_meta_boxes', 'eightmedi_pro_add_sidebar_layout_box');

function eightmedi_pro_add_sidebar_layout_box()
{
	add_meta_box(
                 'eightmedi_pro_sidebar_layout', // $id
                 'Sidebar Layout', // $title
                 'eightmedi_pro_sidebar_layout_callback', // $callback
                 'post', // $page
                 'normal', // $context
                 'high'); // $priority

	add_meta_box(
                 'eightmedi_pro_sidebar_layout', // $id
                 'Sidebar Layout', // $title
                 'eightmedi_pro_sidebar_layout_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority
	add_meta_box(
                 'eightmedi_pro_post_slider_link', // $id
                 'Button custom link and text for Slider Posts', // $title
                 'eightmedi_pro_post_slider_link_callback', // $callback
                 'post', // $page
                 'normal', // $context
                 'high' // $priority
                 );

}


$eightmedi_pro_sidebar_layout = array(
	'left-sidebar' => array(
		'value'     => 'left-sidebar',
		'label'     => __( 'Left sidebar', 'eightmedi-pro' ),
		'thumbnail' => get_template_directory_uri() . '/inc/admin-panel/images/left-sidebar.png'
		), 
	'right-sidebar' => array(
		'value' => 'right-sidebar',
		'label' => __( 'Right sidebar<br/>(default)', 'eightmedi-pro' ),
		'thumbnail' => get_template_directory_uri() . '/inc/admin-panel/images/right-sidebar.png'
		),
	'both-sidebar' => array(
		'value'     => 'both-sidebar',
		'label'     => __( 'Both Sidebar', 'eightmedi-pro' ),
		'thumbnail' => get_template_directory_uri() . '/inc/admin-panel/images/both-sidebar.png'
		),

	'no-sidebar' => array(
		'value'     => 'no-sidebar',
		'label'     => __( 'No sidebar', 'eightmedi-pro' ),
		'thumbnail' => get_template_directory_uri() . '/inc/admin-panel/images/no-sidebar.png'
		)   

	);

function eightmedi_pro_sidebar_layout_callback()
{
	global $post , $eightmedi_pro_sidebar_layout;
	wp_nonce_field( basename( __FILE__ ), 'eightmedi_pro_sidebar_layout_nonce' ); 
	?>

	<table class="form-table">
		<tr>
			<td colspan="4"><em class="f13"><?php _e('Choose Sidebar Template','eightmedi-pro'); ?></em></td>
		</tr>

		<tr>
			<td>
				<?php  
				foreach ($eightmedi_pro_sidebar_layout as $field) {  
					$eightmedi_pro_sidebar_metalayout = get_post_meta( $post->ID, 'eightmedi_pro_sidebar_layout', true ); ?>

					<div class="radio-image-wrapper" style="float:left; margin-right:30px;">
						<label class="description">
							<span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
							<input type="radio" name="eightmedi_pro_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $eightmedi_pro_sidebar_metalayout ); if(empty($eightmedi_pro_sidebar_metalayout) && $field['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
						</label>
					</div>
                <?php } // end foreach 
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>

    <?php 
}

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function eightmedi_pro_save_sidebar_layout( $post_id ) 
{
	global $eightmedi_pro_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
	if ( !isset( $_POST[ 'eightmedi_pro_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'eightmedi_pro_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
		return;

    // Stop WP from clearing custom fields on autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
		return;

	if ('page' == $_POST['post_type']) {  
		if (!current_user_can( 'edit_page', $post_id ) )  
			return $post_id;  
	} elseif (!current_user_can( 'edit_post', $post_id ) ) {  
		return $post_id;  
	}  


	foreach ($eightmedi_pro_sidebar_layout as $field) {  
        //Execute this saving function
		$old = get_post_meta( $post_id, 'eightmedi_pro_sidebar_layout', true); 
		$new = sanitize_text_field($_POST['eightmedi_pro_sidebar_layout']);
		if ($new && $new != $old) {  
			update_post_meta($post_id, 'eightmedi_pro_sidebar_layout', $new);  
		} elseif ('' == $new && $old) {  
			delete_post_meta($post_id,'eightmedi_pro_sidebar_layout', $old);  
		} 
     } // end foreach   
     
 }
 add_action('save_post', 'eightmedi_pro_save_sidebar_layout'); 


 /** ******************* Meta box for Doctor Post Type ******************************* **/
 add_action('add_meta_boxes', 'eightmedi_pro_add_doctor_box');

 function eightmedi_pro_add_doctor_box()
 {
 	add_meta_box(
                 'eightmedi_pro_doctor_box', // $id
                 'Doctor Details', // $title
                 'eightmedi_pro_doctor_box_callback', // $callback
                 'doctor', // $page
                 'normal', // $context
                 'high'); // $priority
 }


 $eightmedi_pro_doctor_box = array(
 	'specialization' => array(
 		'value'     => '',
 		'label'     => __( 'Specialization Subject', 'eightmedi-pro' ),
 		'placeholder' => 'Cardiologist',
 		'name' => 'specialization'
 		), 
 	'facebook' => array(
 		'value' => '',
 		'label' => __( 'Facebook Profile Link', 'eightmedi-pro' ),
 		'placeholder' => 'https://facebook.com/8DegreeThemes',
 		'name' => 'facebook'
 		),
 	'twitter' => array(
 		'value'     => '',
 		'label'     => __( 'Twitter Profile Link', 'eightmedi-pro' ),
 		'placeholder' => 'https://twitter.com/8degreethemes',
 		'name' => 'twitter'
 		),
 	'googleplus' => array(
 		'value'     => '',
 		'label'     => __( 'Google Plus Profile Link', 'eightmedi-pro' ),
 		'placeholder' => 'https://plus.google.com/+8degreethemes',
 		'name' => 'googleplus'
 		),
 	'linkedin' => array(
 		'value'     => '',
 		'label'     => __( 'LinkedIn Profile Link', 'eightmedi-pro' ),
 		'placeholder' => 'https://www.linkedin.com/in/8degreethemes',
 		'name' => 'linkedin'
 		)
 	);

 function eightmedi_pro_doctor_box_callback()
 {
 	global $post , $eightmedi_pro_doctor_box;
 	wp_nonce_field( basename( __FILE__ ), 'eightmedi_pro_doctor_box_nonce' ); 
 	?>

 	<table class="form-table doctor-details">
 		<tr>
 			<th colspan="4"><em class="f13"><?php _e('Enter Docotr Details','eightmedi-pro'); ?></em></th>
 		</tr>
 		<?php  
 		foreach ($eightmedi_pro_doctor_box as $field) {  
 			$eightmedi_pro_doctor_box_meta = get_post_meta( $post->ID, 'eightmedi_pro_doctor_box_'.$field['name'], true ); ?>
 			<tr>
 				<td><?php echo $field['label']; ?></td>
 				<td>
 					<input type="text" name="eightmedi_pro_doctor_box_<?php echo $field['name'];?>" value="<?php echo esc_attr( $eightmedi_pro_doctor_box_meta ); ?>" placeholder="<?php echo $field['placeholder'];?>" />
 				</td>
 			</tr>
 			<?php 
 		}
 		?>
 	</table>

 	<?php 
 }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function eightmedi_pro_save_doctor_box( $post_id ) 
{
	global $eightmedi_pro_doctor_box, $post; 

    // Verify the nonce before proceeding.
	if ( !isset( $_POST[ 'eightmedi_pro_doctor_box_nonce' ] ) || !wp_verify_nonce( $_POST[ 'eightmedi_pro_doctor_box_nonce' ], basename( __FILE__ ) ) )
		return;

    // Stop WP from clearing custom fields on autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
		return;

	if ('page' == $_POST['post_type']) {  
		if (!current_user_can( 'edit_page', $post_id ) )  
			return $post_id;  
	} elseif (!current_user_can( 'edit_post', $post_id ) ) {  
		return $post_id;  
	}  


	foreach ($eightmedi_pro_doctor_box as $field) {  
        //Execute this saving function
		$old = get_post_meta( $post_id, 'eightmedi_pro_doctor_box_'.$field['name'], true);
		if( $field['name'] != 'specialization' ) {
			$new = esc_url_raw ( sanitize_text_field($_POST['eightmedi_pro_doctor_box_'.$field['name']] ) );
		} else {
			$new = sanitize_text_field($_POST['eightmedi_pro_doctor_box_'.$field['name']] );
		}		
		if ($new && $new != $old) {  
			update_post_meta($post_id, 'eightmedi_pro_doctor_box_'.$field['name'], $new);  
		} elseif ('' == $new && $old) {  
			delete_post_meta($post_id,'eightmedi_pro_doctor_box_'.$field['name'], $old);  
		} 
     } // end foreach   
     
 }
 add_action('save_post', 'eightmedi_pro_save_doctor_box');

 /** ******************* Meta box for Services Post Type ******************************* **/
 add_action('add_meta_boxes', 'eightmedi_pro_add_service_box');

 function eightmedi_pro_add_service_box()
 {
 	add_meta_box(
                 'eightmedi_pro_service_box', // $id
                 'Service Details', // $title
                 'eightmedi_pro_service_box_callback', // $callback
                 'service', // $page
                 'normal', // $context
                 'high'); // $priority
 }


 $eightmedi_pro_service_box = array(
 	'icon' => array(
 		'value'     => '',
 		'label'     => __( 'Font Awesome Icon Class', 'eightmedi-pro' ),
 		'placeholder' => 'fa fa-trophy',
 		'name' => 'icon'
 		)
 	);

 function eightmedi_pro_service_box_callback()
 {
 	global $post , $eightmedi_pro_service_box;
 	wp_nonce_field( basename( __FILE__ ), 'eightmedi_pro_service_box_nonce' ); 
 	?>

 	<table class="form-table service-details">
 		<tr>
 			<th colspan="4"><em class="f13"><?php _e('Enter Icon Code for Service','eightmedi-pro'); ?></em></th>
 		</tr>
 		<?php  
 		foreach ($eightmedi_pro_service_box as $field) {  
 			$eightmedi_pro_service_box_meta = get_post_meta( $post->ID, 'eightmedi_pro_service_box_'.$field['name'], true ); ?>
 			<tr>
 				<td><?php echo $field['label']; ?></td>
 				<td>
 					<input type="text" name="eightmedi_pro_service_box_<?php echo $field['name'];?>" value="<?php echo esc_attr( $eightmedi_pro_service_box_meta ); ?>" placeholder="<?php echo $field['placeholder'];?>" />
 				</td>
 			</tr>
 			<?php 
 		}
 		?>
 	</table>

 	<?php 
 }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function eightmedi_pro_save_service_box( $post_id ) 
{
	global $eightmedi_pro_service_box, $post; 

    // Verify the nonce before proceeding.
	if ( !isset( $_POST[ 'eightmedi_pro_service_box_nonce' ] ) || !wp_verify_nonce( $_POST[ 'eightmedi_pro_service_box_nonce' ], basename( __FILE__ ) ) )
		return;

    // Stop WP from clearing custom fields on autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
		return;

	if ('page' == $_POST['post_type']) {  
		if (!current_user_can( 'edit_page', $post_id ) )  
			return $post_id;  
	} elseif (!current_user_can( 'edit_post', $post_id ) ) {  
		return $post_id;  
	}  


	foreach ($eightmedi_pro_service_box as $field) {  
        //Execute this saving function
		$old = get_post_meta( $post_id, 'eightmedi_pro_service_box_'.$field['name'], true);
		$new = sanitize_text_field($_POST['eightmedi_pro_service_box_'.$field['name']] );		
		if ($new && $new != $old) {  
			update_post_meta($post_id, 'eightmedi_pro_service_box_'.$field['name'], $new);  
		} elseif ('' == $new && $old) {  
			delete_post_meta($post_id,'eightmedi_pro_service_box_'.$field['name'], $old);  
		} 
     } // end foreach   
     
 }
 add_action('save_post', 'eightmedi_pro_save_service_box');

 /** ******************* Meta box for sponsors Post Type ******************************* **/
 add_action('add_meta_boxes', 'eightmedi_pro_add_sponsor_box');

 function eightmedi_pro_add_sponsor_box()
 {
 	add_meta_box(
                 'eightmedi_pro_sponsor_box', // $id
                 'Sponsor Details', // $title
                 'eightmedi_pro_sponsor_box_callback', // $callback
                 'sponsors', // $page
                 'normal', // $context
                 'high'); // $priority
 }


 $eightmedi_pro_sponsor_box = array(
 	'link' => array(
 		'value'     => '',
 		'label'     => __( 'Sponsor Website Link', 'eightmedi-pro' ),
 		'placeholder' => '',
 		'name' => 'link'
 		)
 	);

 function eightmedi_pro_sponsor_box_callback()
 {
 	global $post , $eightmedi_pro_sponsor_box;
 	wp_nonce_field( basename( __FILE__ ), 'eightmedi_pro_sponsor_box_nonce' ); 
 	?>

 	<table class="form-table sponsor-details">
 		<tr>
 			<th colspan="4"><em class="f13"><?php _e('Enter Url of Sponsor','eightmedi-pro'); ?></em></th>
 		</tr>
 		<?php  
 		foreach ($eightmedi_pro_sponsor_box as $field) {  
 			$eightmedi_pro_sponsor_box_meta = get_post_meta( $post->ID, 'eightmedi_pro_sponsor_box_'.$field['name'], true ); ?>
 			<tr>
 				<td><?php echo $field['label']; ?></td>
 				<td>
 					<input type="text" name="eightmedi_pro_sponsor_box_<?php echo $field['name'];?>" value="<?php echo esc_attr( $eightmedi_pro_sponsor_box_meta ); ?>" placeholder="<?php echo $field['placeholder'];?>" />
 				</td>
 			</tr>
 			<?php 
 		}
 		?>
 	</table>

 	<?php 
 }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function eightmedi_pro_save_sponsor_box( $post_id ) 
{
	global $eightmedi_pro_sponsor_box, $post; 

    // Verify the nonce before proceeding.
	if ( !isset( $_POST[ 'eightmedi_pro_sponsor_box_nonce' ] ) || !wp_verify_nonce( $_POST[ 'eightmedi_pro_sponsor_box_nonce' ], basename( __FILE__ ) ) )
		return;

    // Stop WP from clearing custom fields on autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
		return;

	if ('page' == $_POST['post_type']) {  
		if (!current_user_can( 'edit_page', $post_id ) )  
			return $post_id;  
	} elseif (!current_user_can( 'edit_post', $post_id ) ) {  
		return $post_id;  
	}  


	foreach ($eightmedi_pro_sponsor_box as $field) {  
        //Execute this saving function
		$old = get_post_meta( $post_id, 'eightmedi_pro_sponsor_box_'.$field['name'], true);
		$new = esc_url_raw($_POST['eightmedi_pro_sponsor_box_'.$field['name']] );		
		if ($new && $new != $old) {  
			update_post_meta($post_id, 'eightmedi_pro_sponsor_box_'.$field['name'], $new);  
		} elseif ('' == $new && $old) {  
			delete_post_meta($post_id,'eightmedi_pro_sponsor_box_'.$field['name'], $old);  
		} 
     } // end foreach   
     
 }
 add_action('save_post', 'eightmedi_pro_save_sponsor_box');

 /** ******************* Meta box for testimonials Post Type ******************************* **/
 add_action('add_meta_boxes', 'eightmedi_pro_add_testimonial_box');

 function eightmedi_pro_add_testimonial_box()
 {
 	add_meta_box(
                 'eightmedi_pro_testimonial_box', // $id
                 'Testimonial Details', // $title
                 'eightmedi_pro_testimonial_box_callback', // $callback
                 'testimonial', // $page
                 'normal', // $context
                 'high'); // $priority
 }


 $eightmedi_pro_testimonial_box = array(
 	'link' => array(
 		'value'     => '',
 		'label'     => __( 'Testimonial By', 'eightmedi-pro' ),
 		'placeholder' => '',
 		'name' => 'link'
 		)
 	);

 function eightmedi_pro_testimonial_box_callback()
 {
 	global $post , $eightmedi_pro_testimonial_box;
 	wp_nonce_field( basename( __FILE__ ), 'eightmedi_pro_testimonial_box_nonce' ); 
 	?>

 	<table class="form-table testimonial-details">
 		<tr>
 			<th colspan="4"><em class="f13"><?php _e('Enter Testimonial Provider Name','eightmedi-pro'); ?></em></th>
 		</tr>
 		<?php  
 		foreach ($eightmedi_pro_testimonial_box as $field) {  
 			$eightmedi_pro_testimonial_box_meta = get_post_meta( $post->ID, 'eightmedi_pro_testimonial_box_'.$field['name'], true ); ?>
 			<tr>
 				<td><?php echo $field['label']; ?></td>
 				<td>
 					<input type="text" name="eightmedi_pro_testimonial_box_<?php echo $field['name'];?>" value="<?php echo esc_attr( $eightmedi_pro_testimonial_box_meta ); ?>" placeholder="<?php echo $field['placeholder'];?>" />
 				</td>
 			</tr>
 			<?php 
 		}
 		?>
 	</table>

 	<?php 
 }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function eightmedi_pro_save_testimonial_box( $post_id ) 
{
	global $eightmedi_pro_testimonial_box, $post; 

    // Verify the nonce before proceeding.
	if ( !isset( $_POST[ 'eightmedi_pro_testimonial_box_nonce' ] ) || !wp_verify_nonce( $_POST[ 'eightmedi_pro_testimonial_box_nonce' ], basename( __FILE__ ) ) )
		return;

    // Stop WP from clearing custom fields on autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
		return;

	if ('page' == $_POST['post_type']) {  
		if (!current_user_can( 'edit_page', $post_id ) )  
			return $post_id;  
	} elseif (!current_user_can( 'edit_post', $post_id ) ) {  
		return $post_id;  
	}  


	foreach ($eightmedi_pro_testimonial_box as $field) {  
        //Execute this saving function
		$old = get_post_meta( $post_id, 'eightmedi_pro_testimonial_box_'.$field['name'], true);
		$new = sanitize_text_field($_POST['eightmedi_pro_testimonial_box_'.$field['name']] );		
		if ($new && $new != $old) {  
			update_post_meta($post_id, 'eightmedi_pro_testimonial_box_'.$field['name'], $new);  
		} elseif ('' == $new && $old) {  
			delete_post_meta($post_id,'eightmedi_pro_testimonial_box_'.$field['name'], $old);  
		} 
     } // end foreach   
     
 }
 add_action('save_post', 'eightmedi_pro_save_testimonial_box');

 //slider link callback
    function eightmedi_pro_post_slider_link_callback()
    {
        ?>
        <?php 
        global $post;
        wp_nonce_field( basename( __FILE__ ), 'eightmedi_pro_post_slider_link_nonce' ); 
        $read_link_text = get_post_meta( $post->ID, 'eightmedi_pro_post_slider_link_text', true );
        $read_link = get_post_meta( $post->ID, 'eightmedi_pro_post_slider_link', true );
        ?>
        <label for="read_link_text"><?php echo __('Slider Link Button Text','eightmedi-pro');?></label>
        <input class="input-link" type="text" name="eightmedi_pro_post_slider_link_text" id="read_link_text" value="<?php echo $read_link_text; ?>" />
        <br />
        <label for="read_link"><?php echo __('Slider Button Custom Link','eightmedi-pro');?></label>
        <input class="input-link" type="text" name="eightmedi_pro_post_slider_link" id="read_link" value="<?php echo $read_link; ?>" />
        <?php    
    }

    add_action( 'save_post', 'eightmedi_lite_save_post_slider_link' );
    function eightmedi_lite_save_post_slider_link( $post_id )
    {
        // Verify the nonce before proceeding.
        if ( !isset( $_POST[ 'eightmedi_pro_post_slider_link_nonce' ] ) || !wp_verify_nonce( $_POST[ 'eightmedi_pro_post_slider_link_nonce' ], basename( __FILE__ ) ) )
            return;
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if( isset( $_POST['eightmedi_pro_post_slider_link_text'] ) )
            update_post_meta( $post_id, 'eightmedi_pro_post_slider_link_text', $_POST['eightmedi_pro_post_slider_link_text'] );
        if( isset( $_POST['eightmedi_pro_post_slider_link'] ) )
            update_post_meta( $post_id, 'eightmedi_pro_post_slider_link', $_POST['eightmedi_pro_post_slider_link'] );
    }