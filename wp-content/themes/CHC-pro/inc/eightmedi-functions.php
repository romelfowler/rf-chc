<?php
/**
 * EightMedi Pro functions and definitions
 *
 * @package EightMedi Pro
 */
/**
 * My Functions
 */


//load js to control function of switch
function eightmedi_pro_inc_custom_admin_style() {
	wp_enqueue_style( 'custom-control-admin-css', get_template_directory_uri() . '/inc/admin-panel/css/admin.css');
	wp_enqueue_script( 'custom-control-admin-js', get_template_directory_uri().'/inc/admin-panel/js/admin.js', array( 'jquery' ), '20150905', true );
}
add_action( 'admin_enqueue_scripts', 'eightmedi_pro_inc_custom_admin_style' );

//adding custom scripts and styles in header for favicon and other
function eightmedi_pro_header_scripts(){
	$appointment_bg_v = get_theme_mod('eightmedi_pro_appointment_bkgimage');
	echo "<style type='text/css' media='all'>";
	if(!empty($appointment_bg_v)){
		$appointment_bg_v =   '.custom-appointment-form { background: url("'.esc_url($appointment_bg_v).'") no-repeat scroll right bottom rgba(0, 0, 0, 0); }';
		echo $appointment_bg_v;
		echo "\n";
	}
	echo "</style>\n";
}
add_action('wp_head','eightmedi_pro_header_scripts');

function eightmedi_pro_web_layout($classes){
	$web_layout = get_theme_mod('eightmedi_pro_webpage_layout','fullwidth');
	if($web_layout == 'boxed'){
		$classes[]= 'boxed-layout';
	}
	elseif($web_layout == 'fullwidth'){
		$classes[]='fullwidth';
	}
	
	return $classes;
}
add_filter( 'body_class', 'eightmedi_pro_web_layout' );

add_action('eightmedi_pro_homepage_slider_config','eightmedi_pro_homepage_slider_config');
//homepage slider configuration settings
function eightmedi_pro_homepage_slider_config(){
	$display_slider = (get_theme_mod('eightmedi_pro_display_slider'))?get_theme_mod('eightmedi_pro_display_slider'):"1";
	
	$display_pager = absint( get_theme_mod('eightmedi_pro_display_pager','0') );
	($display_pager=='1')?$display_pager='true':$display_pager='false';
	
	$display_controls = absint ( get_theme_mod('eightmedi_pro_display_controls','0'));
	($display_controls=='1')?$display_controls='true':$display_controls='false';
	
	$auto_transition = absint ( get_theme_mod('eightmedi_pro_auto_transition','0'));
	($auto_transition=='1')?$auto_transition='true':$auto_transition='false';
	
	$transition_type = absint ( get_theme_mod('eightmedi_pro_transition_type','0'));
	($transition_type=='1')?$transition_type='horizontal':$transition_type='fade';

	$transition_speed = absint( get_theme_mod( 'eightmedi_pro_transition_speed', 2000 ) );	

	$transition_pause = absint( get_theme_mod( 'eightmedi_pro_transition_pause', 5000 ) );	

	// Send data to client
	wp_localize_script('eightmedi-pro-custom-scripts', 'SliderData', array(
		'mode' => $transition_type,
		'controls' => $display_controls,
		'speed' => $transition_speed,
		'pause' => $transition_pause,
		'pager' => $display_pager,
		'auto' => $auto_transition
		));
}


add_action('eightmedi_pro_homepage_slider','eightmedi_pro_homepage_slider_content', 10);
//homepage slider content
function eightmedi_pro_homepage_slider_content(){
	$display_slider = absint ( get_theme_mod('eightmedi_pro_display_slider','1') );

	$display_captions = absint ( get_theme_mod('eightmedi_pro_slider_text', '1') );
	
	if( $display_slider == "1"){
		$slider_type = get_theme_mod('eightmedi_pro_slider_type');
		$slider_sc = get_theme_mod('eightmedi_pro_slider_shortcode');
		?>
		<div id="home-slider">
			<?php
			if($slider_type == 'revolution')
			{
				echo do_shortcode($slider_sc);
				echo '<a href="javascript:void(0);" class="home-slider-pointer"><i class="fa fa-angle-double-down"></i></a>';
			}
			else
			{
				$slider_category = get_theme_mod('eightmedi_pro_slider_category');
				if( !empty($slider_category)) {
					$loop = new WP_Query(
						array(
							'cat' => $slider_category,
							'posts_per_page' => -1    
							)
						);
						?>
						<div class="em-slider">
							<?php
							if($loop->have_posts()) {
								while($loop->have_posts()) {
									$loop->the_post();
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false );
									$enable_link = get_theme_mod('slider_add_links_on_image_title','1');

									$read_link_text = get_post_meta(get_the_ID(), 'eightmedi_pro_post_slider_link_text', true );
									$read_link = get_post_meta( get_the_ID(), 'eightmedi_pro_post_slider_link', true );
									?>
									<div class="slides">
										
										<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title_attribute(); ?>" />
										
										<?php
										if($display_captions == '1'){
											?>
											<div class="caption-wrapper">  
												<div class="em-container">
													<div class="slider-caption">
														<div class="mid-content">
															<div class="slider-title"> 
																<?php if($enable_link=='1'){ ?>
																<a href="<?php echo ($read_link!="")?$read_link:get_the_permalink();?>">
																	<?php } ?>
																	<?php the_title(); ?>
																	<?php if($enable_link=='1'){ ?>
																</a>
																<?php } ?>
															</div>
															<div class="slider-content"> 
																<?php echo eightmedi_pro_excerpt(get_the_content(),100); ?>
															</div>
															<?php if($read_link_text!=""){ ?>
															<a href="<?php echo ($read_link!="")?$read_link:"#";?>" class="caption-read-more">
																<?php echo $read_link_text;?>
															</a>
															<?php } ?>
														</div>
													</div>
												</div>
											</div>
											<?php
										}
										?>
									</div>
									<?php 
								}
							}
							?>
						</div>
						<a href="javascript:void(0);" class="home-slider-pointer"><i class="fa fa-angle-double-down"></i></a>
						<?php $btntext = get_theme_mod('eightmedi_lite_slider_cta_btntext','');
						if(!empty($btntext)){
							?>
							<a class="home-slider-pointer cta-btn" href="<?php echo get_theme_mod('eightmedi_pro_slider_cta_btnlink','#book-an-appointment');?>"><?php echo $btntext;?></a>
							<?php
						}
					}
				}
				?>
			</div>
			<?php
		}
	}

	//Social Icons Settings
	add_action('eightmedi_pro_social_links','eightmedi_pro_social_links', 10);
	function eightmedi_pro_social_links(){
		$facebooklink = esc_url( get_theme_mod('eightmedi_pro_social_facebook') );
		$twitterlink = esc_url( get_theme_mod('eightmedi_pro_social_twitter') );
		$google_pluslink = esc_url( get_theme_mod('eightmedi_pro_social_googleplus') );
		$youtubelink = esc_url( get_theme_mod('eightmedi_pro_social_youtube') );
		$pinterestlink = esc_url( get_theme_mod('eightmedi_pro_social_pinterest') );
		$linkedinlink = esc_url( get_theme_mod('eightmedi_pro_social_linkedin') );
		$vimeolink = esc_url( get_theme_mod('eightmedi_pro_social_vimeo') );
		$instagramlink = esc_url( get_theme_mod('eightmedi_pro_social_instagram') );
		$skypelink = esc_url( get_theme_mod('eightmedi_pro_social_skype') );
		if(!empty($facebooklink) || !empty($twitterlink) || !empty($google_pluslink) || !empty($youtubelink) || !empty($pinterestlink) || !empty($linkedinlink) || !empty($vimeolink) || !empty($instagramlink) || !empty($skypelink)){
			?>
			<div class="footer-social social-links">
				<div class="social-icons">
					<?php 
					if(!empty($facebooklink)){ ?>
					<a href="<?php echo $facebooklink; ?>" class="facebook" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
					<?php 
				}
				if(!empty($twitterlink)){ ?>
				<a href="<?php echo $twitterlink; ?>" class="twitter" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
				<?php 
			}
			if(!empty($google_pluslink)){ ?>
			<a href="<?php echo $google_pluslink; ?>" class="gplus" data-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php 
		}
		if(!empty($youtubelink)){ ?>
		<a href="<?php echo $youtubelink; ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>
		<?php 
	}
	if(!empty($pinterestlink)){ ?>
	<a href="<?php echo $pinterestlink; ?>" class="pinterest" data-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
	<?php 
}
if(!empty($linkedinlink)){ ?>
<a href="<?php echo $linkedinlink; ?>" class="linkedin" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
<?php 
}
if(!empty($vimeolink)){ ?>
<a href="<?php echo $vimeolink; ?>" class="vimeo" data-title="Vimeo" target="_blank"><i class="fa fa-vimeo-square"></i></a>
<?php 
}
if(!empty($instagramlink)){ ?>
<a href="<?php echo $instagramlink; ?>" class="instagram" data-title="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
<?php 
}
if(!empty($skypelink)){ ?>
<a href="<?php echo __('skype:','eightmedi-pro').$skypelink; ?>" class="skype" data-title="Skype"><i class="fa fa-skype"></i></a>
<?php
} ?>
</div>
</div>
<?php
}
}

	/** 
	 * Truncates text without breaking HTML Code
	 */
	function eightmedi_pro_excerpt($eightmedi_pro_text, $eightmedi_pro_length = 100, $eightmedi_pro_ending = '...', $eightmedi_pro_exact = true, $eightmedi_pro_considerHtml = true) {
		if ($eightmedi_pro_considerHtml) {
  // if the plain text is shorter than the maximum length, return the whole text
			if (strlen(preg_replace('/<.*?>/', '', $eightmedi_pro_text)) <= $eightmedi_pro_length) {
				return $eightmedi_pro_text;
			}

  // splits all html-tags to scanable lines
			preg_match_all('/(<.+?>)?([^<>]*)/s', $eightmedi_pro_text, $eightmedi_pro_lines, PREG_SET_ORDER);

			$eightmedi_pro_total_length = strlen($eightmedi_pro_ending);
			$eightmedi_pro_open_tags = array();
			$eightmedi_pro_truncate = '';

			foreach ($eightmedi_pro_lines as $eightmedi_pro_line_matchings) {
   // if there is any html-tag in this line, handle it and add it (uncounted) to the output
				if (!empty($eightmedi_pro_line_matchings[1])) {
    // if it’s an “empty element” with or without xhtml-conform closing slash (f.e.)
					if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $eightmedi_pro_line_matchings[1])) {
    // do nothing
    // if tag is a closing tag (f.e.)
					} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $eightmedi_pro_line_matchings[1], $eightmedi_pro_tag_matchings)) {
     // delete tag from $open_tags list
						$eightmedi_pro_pos = array_search($eightmedi_pro_tag_matchings[1], $eightmedi_pro_open_tags);
						if ($eightmedi_pro_pos !== false) {
							unset($eightmedi_pro_open_tags[$eightmedi_pro_pos]);
						}
     // if tag is an opening tag (f.e. )
					} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $eightmedi_pro_line_matchings[1], $eightmedi_pro_tag_matchings)) {
     // add tag to the beginning of $open_tags list
						array_unshift($eightmedi_pro_open_tags, strtolower($eightmedi_pro_tag_matchings[1]));
					}
    // add html-tag to $truncate’d text
					$eightmedi_pro_truncate .= $eightmedi_pro_line_matchings[1];
				}

   // calculate the length of the plain text part of the line; handle entities as one character
				$eightmedi_pro_content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $eightmedi_pro_line_matchings[2]));
				if ($eightmedi_pro_total_length+$eightmedi_pro_content_length > $eightmedi_pro_length) {
    // the number of characters which are left
					$eightmedi_pro_left = $eightmedi_pro_length - $eightmedi_pro_total_length;
					$eightmedi_pro_entities_length = 0;
    // search for html entities
					if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $eightmedi_pro_line_matchings[2], $eightmedi_pro_entities, PREG_OFFSET_CAPTURE)) {
     // calculate the real length of all entities in the legal range
						foreach ($eightmedi_pro_entities[0] as $eightmedi_pro_entity) {
							if ($eightmedi_pro_entity[1]+1-$eightmedi_pro_entities_length <= $eightmedi_pro_left) {
								$eightmedi_pro_left--;
								$eightmedi_pro_entities_length += strlen($eightmedi_pro_entity[0]);
							} else {
       // no more characters left
								break;
							}
						}
					}
					$eightmedi_pro_truncate .= substr($eightmedi_pro_line_matchings[2], 0, $eightmedi_pro_left+$eightmedi_pro_entities_length);
    // maximum lenght is reached, so get off the loop
					break;
				} else {
					$eightmedi_pro_truncate .= $eightmedi_pro_line_matchings[2];
					$eightmedi_pro_total_length += $eightmedi_pro_content_length;
				}

   // if the maximum length is reached, get off the loop
				if($eightmedi_pro_total_length >= $eightmedi_pro_length) {
					break;
				}
			}
		} else {
			if (strlen($eightmedi_pro_text) <= $eightmedi_pro_length) {
				return $eightmedi_pro_text;
			} else {
				$eightmedi_pro_truncate = substr($eightmedi_pro_text, 0, $eightmedi_pro_length - strlen($eightmedi_pro_ending));
			}
		}

 // if the words shouldn't be cut in the middle...
		if (!$eightmedi_pro_exact) {
  // ...search the last occurance of a space...
			$eightmedi_pro_spacepos = strrpos($eightmedi_pro_truncate, ' ');
			if (isset($eightmedi_pro_spacepos)) {
   // ...and cut the text in this position
				$eightmedi_pro_truncate = substr($eightmedi_pro_truncate, 0, $eightmedi_pro_spacepos);
			}
		}

 // add the defined ending to the text
		$eightmedi_pro_truncate .= $eightmedi_pro_ending;

		if($eightmedi_pro_considerHtml) {
  // close all unclosed html-tags
			foreach ($eightmedi_pro_open_tags as $eightmedi_pro_tag) {
				$eightmedi_pro_truncate .= '';
			}
		}

		return $eightmedi_pro_truncate;

	}



	/** Plugin Install ***/
	function eightmedi_pro_required_plugins() {

/**
* Array of plugin arrays. Required keys are name and slug.
* If the source is NOT from the .org repo, then source is also required.
*/
$plugins = array(
	array(
		'name'      => 'Ultimate Form Builder Lite',
		'slug'      => 'ultimate-form-builder-lite',
		'required'  => true,		
		'force_activation'   => false,
		'force_deactivation' => false,
		),
	array(
		'name'      => '8 Degree Coming Soon Page',
		'slug'      => '8-degree-coming-soon-page',
		'required'  => false,
		'force_activation'   => false,
		'force_deactivation' => true,
		)
	);

	/**
	* Array of configuration settings. Amend each line as needed.
	* If you want the default strings to be available under your own theme domain,
	* leave the strings uncommented.
	* Some of the strings are added into a sprintf, so see the comments at the
	* end of each line for what each argument will be.
	*/
	$config = array(
		'default_path' => '',
		'menu'         => 'eightmedi-pro-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'eightmedi-pro' ),
			'menu_title'                      => __( 'Install Plugins', 'eightmedi-pro' ),
			'installing'                      => __( 'Installing Plugin: %s', 'eightmedi-pro' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'eightmedi-pro' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','eightmedi-pro' ),
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','eightmedi-pro' ),
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','eightmedi-pro' ),
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','eightmedi-pro' ),
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','eightmedi-pro' ),
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','eightmedi-pro' ),
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','eightmedi-pro' ),
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','eightmedi-pro' ),
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','eightmedi-pro' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','eightmedi-pro' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'eightmedi-pro' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'eightmedi-pro' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'eightmedi-pro' ),
			'nag_type'                        => 'updated'
			)
		);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'eightmedi_pro_required_plugins' );


/*BreadCrumb*/
function eightmedi_pro_breadcrumbs()
{
	$eightmedi_pro_show_breadcrumb = get_theme_mod('eightmedi_pro_breadcrumb_setting_option','1');
	if($eightmedi_pro_show_breadcrumb=='1')
	{
		$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter =get_theme_mod('eightmedi_pro_bc_delimiter','&raquo;');
		$home =get_theme_mod('eightmedi_pro_home_text',__('Home','eightmedi-pro')); 
		global $post;   
		
		$showCurrent = get_theme_mod('eightmedi_pro_singlepost_title_option','1'); // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before = '<span class="current">'; // tag before the current crumb
		$after = '</span>'; // tag after the current crumb

		$homeLink = home_url();

		if (is_home() || is_front_page())
		{
			if ($showOnHome == 1) echo '<div id="ed-breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
		} 
		else
		{
			echo '<div id="ed-breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

			if ( is_category() ) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
				echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

			} elseif ( is_search() ) {
				echo $before . 'Search results for "' . get_search_query() . '"' . $after;

			} elseif ( is_day() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				echo $before . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
					if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
					echo $cats;
					if ($showCurrent == 1) echo $before . get_the_title() . $after;
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
				if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) echo $before . get_the_title() . $after;

			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
				}
				if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo $before . 'Articles posted by ' . $userdata->display_name . $after;

			} elseif ( is_404() ) {
				echo $before . 'Error 404' . $after;
			}

			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
					echo ' ('.__('Page' , 'eightmedi-pro') . ' ' . get_query_var('paged').')';
				}
			}
			echo '</div>';
		}
	}
}


/** rgb from hex color code */
/* Convert hexdec color string to rgb(a) string */ 
function hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

     //Return default if no color provided
	if(empty($color))
		return $default; 

            //Sanitize $color if "#" is provided 
	if ($color[0] == '#' ) {
		$color = substr( $color, 1 );
	}

            //Check if color has 6 or 3 characters and get values
	if (strlen($color) == 6) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

            //Convert hexadec to rgb
	$rgb =  array_map('hexdec', $hex);

            //Check if opacity is set(rgba or rgb)
	if($opacity){
		if(abs($opacity) > 1)
			$opacity = 1.0;
		$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	} else {
		$output = 'rgb('.implode(",",$rgb).')';
	}

            //Return rgb(a) color string
	return $output;
}

/*****************************************/ 

function colourCreator($colour, $per) 
{  
        $colour = substr( $colour, 1 ); // Removes first character of hex string (#) 
        $rgb = ''; // Empty variable 
        $per = $per/100*255; // Creates a percentage to work with. Change the middle figure to control colour temperature

        if  ($per < 0 ) // Check to see if the percentage is a negative number 
        { 
            // DARKER 
            $per =  abs($per); // Turns Neg Number to Pos Number 
            for ($x=0;$x<3;$x++) 
            { 
            	$c = hexdec(substr($colour,(2*$x),2)) - $per; 
            	$c = ($c < 0) ? 0 : dechex($c); 
            	$rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
            }   
        }  
        else 
        { 
            // LIGHTER         
        	for ($x=0;$x<3;$x++) 
        	{             
        		$c = hexdec(substr($colour,(2*$x),2)) + $per; 
        		$c = ($c > 255) ? 'ff' : dechex($c); 
        		$rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
        	}    
        } 
        return '#'.$rgb; 
    } 

/**
 * Single post format
 */
add_action( 'eightmedi_pro_post_format_icon', 'eightmedi_pro_post_format_icon_hook' );

if( !function_exists( 'eightmedi_pro_post_format_icon_hook' ) ):
	function eightmedi_pro_post_format_icon_hook() {
		global $post;
		$post_id = $post->ID;
		$eightmedi_pro_post_format = get_post_format( $post_id );
		switch ( $eightmedi_pro_post_format ) {
			case 'video':
			$post_format_icon = '<i class="fa fa-video-camera"></i>';
			break;
			case 'audio':
			$post_format_icon = '<i class="fa fa-music"></i>';
			break;            
			default:
			$post_format_icon = '';
			break;
		}
		if( $post_format_icon ) {
			echo '<span class="format-icon">'. $post_format_icon .'</span>';
		}
	}
	endif;

	/*----------------------Meta post on -----------------------------------*/
	function eightmedi_pro_post_meta_cb(){
		global $post;
		$show_comment_count = get_theme_mod('post_option_comment','1');
		if($show_comment_count==1){
			$post_comment_count = get_comments_number( $post->ID );
			echo '<span class="comment_count"><i class="fa fa-comments"></i>'.esc_attr( $post_comment_count )." ".__('Comments','eightmedi-pro').'</span>';
		}
	}
	add_action( 'eightmedi_pro_post_meta', 'eightmedi_pro_post_meta_cb', 10 );

	function eightmedi_pro_home_posted_on_cb(){
		global $post;
		$show_comment_count = get_theme_mod('post_option_comment','1');
		$show_post_date = get_theme_mod('post_option_date','1');
		
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string_human = human_time_diff(get_the_modified_time( 'U' ),current_time('timestamp')).' '.__('ago','eightmedi-pro');
			$time_string = '<time class="entry-date published" datetime="%1$s">'.$time_string_human.'</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date('M d, Y') ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date('M d, Y') )
			);

		if($show_post_date==1){
			$posted_on = sprintf(
				_x( '%s', 'post date', 'eightmedi-pro' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
				);	   
		} else {
			$posted_on = '';
		}
		echo '<span class="posted-on">' . $posted_on . '</span>';
		if($show_comment_count==1){
			$post_comment_count = get_comments_number( $post->ID );
			echo '<span class="comment_count"><i class="fa fa-comments"></i>'.esc_attr( $post_comment_count )." ".__('Comments','eightmedi-pro').'</span>';
		}
	}
	add_action( 'eightmedi_pro_home_posted_on', 'eightmedi_pro_home_posted_on_cb', 10 );

	add_filter('get_the_archive_title','eightmedi_pro_archive', 10, 3);
	function eightmedi_pro_archive($title)
	{
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>' ;
		}
		return $title;
	}


	function eightmedi_pro_get_difference_two_color($color1,$color2)
	{
		echo $rgb_color1 = str_replace(array('rgba','(',')'),'',hex2rgba($color1,1));
		$arr1 = explode(',',$rgb_color1);
		$arr2 = explode(',',$color2);
		$r = $arr1[0] + $arr2[0];
		$g = $arr1[1] + $arr2[1];
		$b = $arr1[2] + $arr2[2];
		return $diff = 'rgba('.$r.','.$g.','.$b.',1)';
	}