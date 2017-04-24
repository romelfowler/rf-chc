<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: HomePage without Top Header
 * @package EightMedi Pro
 */
?>
<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package EightMedi Pro
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eightmedi-pro' ); ?></a>
		<?php if(0==1): ?>
			<div class="top-header">
				<div class="ed-container-home">
					<div class="header-callto">
						<div class="callto-left">
							<?php echo wp_kses_post(get_theme_mod('eightmedi_pro_callto_text','Left CTA'));?>
						</div>
						<div class="callto-right">
							<div class="cta">
								<?php echo wp_kses_post(get_theme_mod('eightmedi_pro_callto_text_right','Right CTA'));?>
							</div>
							<?php if(get_theme_mod('eightmedi_pro_social_icons_in_header','1')==1){ ?>
							<div class="header-social social-links">
								<?php do_action('eightmedi_pro_social_links');?>
							</div>
							<?php }?>						

							<?php if(get_theme_mod('eightmedi_pro_hide_header_search')!='1'){
								?>
								<div class="header-search">
									<i class="fa fa-search"></i>
									<?php 
									get_template_part('searchform-header');
									?>
								</div>
								<?php
							}?>						
						</div>
					</div>
				</div>
			</div>
		<?php endif;?>
		<header id="masthead" class="site-header sticky-header" role="banner">
			<?php $logo_align = get_theme_mod('eightmedi_pro_logo_alignment_setting','1');
			if($logo_align == 0){ $logo_align_class='center-align'; }
			else{ $logo_align_class='left-align'; }
			?>
			<div class="ed-container-home <?php echo esc_attr($logo_align_class);?>">
				<div class="site-branding">
					<div class="site-logo">
						<?php if ( get_header_image() ) : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
							</a>
						<?php endif; // End header image check. ?>
					</div>
					<div class="site-text">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
							<p class="site-description"><?php bloginfo( 'description' ); ?></p>
						</a>
					</div>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<?php //esc_html_e( 'Primary Menu', 'eightmedi-pro' ); ?>
						<span class="menu-bar menubar-first"></span>
						<span class="menu-bar menubar-second"></span>
						<span class="menu-bar menubar-third"></span>
					</button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</header><!-- #masthead -->
		<?php 
		$no_margin = "";
		if(is_page_template( 'template-home.php' ) || is_page_template('template-boxedhome.php')){
			if(is_home() || is_front_page() || is_page_template('template-boxedhome.php')){
				$yes_slider = esc_attr(get_theme_mod('eightmedi_pro_display_slider','1'));
				if($yes_slider==1){
					$no_margin=' no-margin';
				}
			}
		}
		$no_margin=' no-margin';
		?>
		<div id="content" class="site-content<?php echo $no_margin;?>">

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		//load slider
		do_action('eightmedi_pro_homepage_slider'); 
		?>
		<?php
		//Featured Section
		if(get_theme_mod('eightmedi_pro_featured_setting_option','disable')=='enable'){
			?>
			<section class="featured clear" id="featured-content">
				<div class="ed-container-home">
					<?php
					$featured_title = esc_attr(get_theme_mod('eightmedi_pro_featured_title'));
					if(!empty($featured_title)){
						?>
						<h2 class="title home-title wow flipInX"><?php echo $featured_title; ?></h2>
						<?php
					}

					$featured_args      =   array('post_type'=>'service', 'post_status'=>'publish', 'posts_per_page'=>5,'order'=>'desc');
					$featured_query     =   new WP_Query($featured_args);
					$i=0;
					if($featured_query->have_posts()):
						while($featured_query->have_posts()):$featured_query->the_post();
					$i++;
					?>
					<div class="featured-block<?php if($i%5==0){echo " nomargin";} echo ' featured-post-'.$i;?> wow fadeInLeft"  data-wow-delay="<?php echo $i*0.3;?>s">
						<div class="featured-text">
							<a href="<?php the_permalink(); ?>">
								<figure class="featured-image">
									<?php if (has_post_thumbnail()):
									$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'thumbnail'); ?>
									<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /><?php
									endif;
									?>
								</figure>
								<div class="featured-single-title"><?php the_title(); ?></div>
							</a>
							<div class="featured-content"><?php echo eightmedi_pro_excerpt(get_the_excerpt(),'250','...',true,true);?></div>
						</div>
					</div>
					<?php 
					endwhile;
					endif;
					wp_reset_postdata();
					?>
				</div>
			</section>
			<?php
		}
		?>
		<?php
		if(get_theme_mod('eightmedi_pro_appointment_setting_option')=='enable'){
			$appointment_title = esc_attr(get_theme_mod('eightmedi_pro_appointment_title','Book An Appointment')); 
			$appointment_desc = get_theme_mod('eightmedi_pro_appointment_desc');
			$appointment_formid = get_theme_mod('eightmedi_pro_appointment_formid');
			if(!empty($appointment_title)):
				?>
			<section class="appointment clear" id="book-an-appointment">
				<div class="ed-container-home">
					<h2 class="title home-title wow fadeInUp"><?php echo $appointment_title; ?></h2>
					<div class="appointment-desc home-description wow fadeInUp"><?php echo $appointment_desc; ?></div>
				</div>
				<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
				<?php if(is_plugin_active('ultimate-form-builder-lite/ultimate-form-builder-lite.php')){ ?>
					<div class="custom-appointment-form">
						<?php echo do_shortcode($appointment_formid);?>
					</div>
					<?php } ?>
				</section>
				<?php
				endif;
			}
			?>
			<?php
			if (get_theme_mod('eightmedi_pro_about_setting_option')=='enable') {
				$eightmedi_pro_post_id = esc_attr(get_theme_mod('eightmedi_pro_about_setting_post'));
				if(!empty($eightmedi_pro_post_id)):
					?>
				<section class="about">
					<div class="about-wrap clear">
						<?php 
						$eightmedi_pro_about_args  = array('post_type'=>'post', 'page_id' => $eightmedi_pro_post_id, 'post_status' => 'publish','posts_per_page'=>1);
						$eightmedi_pro_about_query = new WP_Query($eightmedi_pro_about_args);
						if ($eightmedi_pro_about_query->have_posts()):
							while ($eightmedi_pro_about_query->have_posts()):
								$eightmedi_pro_about_query->the_post();
							?>
							<figure class="about-img wow fadeInRight" data-wow-delay="0.8s">
								<?php if (has_post_thumbnail()):
								$eightmedi_pro_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full'); ?>
								<img src="<?php echo esc_url($eightmedi_pro_image[0]); ?>" alt="<?php the_title(); ?>" /><?php
								else:
									?><img src="<?php echo get_template_directory_uri().'/images/1173x1280.png';?>" alt="<?php echo __('Placehold','eightmedi-pro');?>" /><?php
								endif;
								?>
							</figure>
							<div class="about-content">
								<h2 class="title home-title wow flipInX"><?php the_title(); ?></h2>
								<div class="about-excerpt home-description wow fadeInLeft "><?php the_content(); ?></div>
								<div class="btn-wrapper wow fadeInUp" data-wow-delay="0.5s"><a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_attr(get_theme_mod('eightmedi_pro_aboutus_viewmore_text','Details')); ?></a></div>
							</div>
							<?php
							endwhile;
							endif;

							?>
						</div>
					</section>
					<?php
					endif;
				}
				?>
				<?php
				if(get_theme_mod('eightmedi_pro_teammember_setting_option')=='enable'){
					?>
					<section class="our-team-member clear">
						<div class="ed-container-home">
							<div class="team-text-wrap">
								<h2 class="title home-title wow fadeInUp"><?php echo esc_attr(get_theme_mod('eightmedi_pro_teammember_title','Our Doctors')); ?></h2>
								<div class="home-description wow fadeInUp"><?php echo (get_theme_mod('eightmedi_pro_teammember_desc','Lorem ipsum dolor sit')); ?></div>
							</div>
							<div class="team-slider-wrap">
								<div class="team-slider">
									<?php
									$team_args      =   array('post_type'=>'doctor','post_status'=>'publish', 'posts_per_page'=>-1);
									$team_query     =   new WP_Query($team_args);
									$i=0;
									if($team_query->have_posts()):
										while($team_query->have_posts()):$team_query->the_post();
									$i++;
									?>
									<div class="team-block<?php if($i%4==0){echo " nomargin";} ?>" >
										<a href="<?php the_permalink(); ?>">
											<figure class="team-image">
												<?php if (has_post_thumbnail()):
												$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'eightmedi-pro-team-image'); ?>
												<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /><?php
												endif;
												?>
												<div class="team-hover">
													<div class="team-hover-title"> <?php echo get_the_title();?> 
														<div class="team-hover-text">
															<div class="doctor-specialization">
																<span><?php echo get_post_meta( $post->ID, 'eightmedi_pro_doctor_box_specialization', true ); ?></span>
																<br />
																<?php
																$cats = wp_get_object_terms( $id, 'doctor-category' ) ;
																foreach($cats as $cat){
																	echo '<a href="'.get_term_link($cat->slug, 'doctor-category').'">';
																	echo '<span>'.$cat->name.'</span>';
																	echo '</a>';
																}
																?>
																<span><?php echo __('Department','eightmedi-pro');?></span>
															</div>
															<div class="doctor-social">
																<?php 
																$soc_fb = get_post_meta( $post->ID, 'eightmedi_pro_doctor_box_facebook', true );
																if(!empty($soc_fb)){ echo '<a target="_blank" href="'.$soc_fb.'"><i class="fa fa-facebook"></i></a>'; }
																$soc_tw = get_post_meta( $post->ID, 'eightmedi_pro_doctor_box_twitter', true );
																if(!empty($soc_tw)){ echo '<a target="_blank" href="'.$soc_tw.'"><i class="fa fa-twitter"></i></a>'; }
																$soc_gp = get_post_meta( $post->ID, 'eightmedi_pro_doctor_box_googleplus', true );
																if(!empty($soc_gp)){ echo '<a target="_blank" href="'.$soc_gp.'"><i class="fa fa-google-plus"></i></a>'; }
																$soc_li = get_post_meta( $post->ID, 'eightmedi_pro_doctor_box_linkedin', true );
																if(!empty($soc_li)){ echo '<a target="_blank" href="'.$soc_li.'"><i class="fa fa-linkedin"></i></a>'; }
																?>
															</div>
														</div>
													</div>
												</div>
											</figure>
										</a>
									</div>
									<?php 
									endwhile;
									endif;
									wp_reset_postdata();
									?>
								</div>
							</div>
						</section>
						<?php
					}
					?>
					<?php
					if(get_theme_mod('eightmedi_pro_callto_setting_option')=='enable'){
						$call_to_action = get_theme_mod('eightmedi_pro_callto_desc');
						if(!empty($call_to_action)):
							?>
						<section class="call-to-action clear">
							<?php
							$cta_bg_v = get_theme_mod('eightmedi_pro_callto_bkgimage');
							if(!empty($cta_bg_v)){
								?>
								<figure>
									<img src="<?php echo esc_url($cta_bg_v);?>" alt="<?php echo esc_attr(get_theme_mod('eightmedi_pro_callto_title')); ?>">
								</figure>
								<?php
							}
							?>						
							<div class="cta-content-wrap <?php echo (empty($cta_bg_v))?'fullwidth':'';?>">
								<h2 class="title home-title wow fadeInDown"><?php echo (get_theme_mod('eightmedi_pro_callto_title')); ?></h2>
								<div class="call-to-action-desc clear home-description wow fadeInLeft"><?php echo $call_to_action; ?></div>
								<div class="cta-link wow fadeInRight" data-wow-delay="0.5s"><a href="<?php echo esc_url(get_theme_mod('eightmedi_pro_callto_link')); ?>"><?php echo esc_attr(get_theme_mod('eightmedi_pro_callto_readmore')); ?></a></div>
							</div>
						</section>
						<?php
						endif;
					}
					?>
					<?php
					//News Section
					if(get_theme_mod('eightmedi_pro_news_setting_option')=='enable'){
						$wl_news_cat    =   get_theme_mod('eightmedi_pro_news_setting_category');
						if($wl_news_cat!='0'):
							?>
						<section class="latest-news clear">
							<div class="ed-container-home">
								<h2 class="title home-title wow fadeInUp"><?php echo esc_attr(get_theme_mod('eightmedi_pro_news_title','Our Journal')); ?></h2>
								<div class="home-description wow fadeInUp"><?php echo (get_theme_mod('eightmedi_pro_news_desc','Lorem ipsum dolor sit')); ?></div>
								<?php
								if(get_theme_mod('eightmedi_pro_news_button_option')=='enable'){
									$wl_news_cat_url = get_category_link($wl_news_cat);
									$num_news = get_theme_mod('eightmedi_pro_news_number','6');
									?> 
									<div class="btn-wrapper wow FadeInUp" data-wow-delay="0.5s"><a href="<?php echo esc_url($wl_news_cat_url); ?>" class="btn"><?php echo esc_attr(get_theme_mod('eightmedi_pro_news_button_text')); ?></a></div> 
									<?php } ?>
									<?php

									$news_args      =   array('cat'=>$wl_news_cat, 'post_status'=>'publish', 'posts_per_page'=>$num_news);
									$news_query     =   new WP_Query($news_args);
									$i=0;
									if($news_query->have_posts()):
										while($news_query->have_posts()):$news_query->the_post();
									$i++;
									?>
									<div class="news-block <?php if($i%4==0){echo " nomargin";} ?>  wow fadeInRight"  data-wow-delay="0.8s">
										<a href="<?php the_permalink(); ?>">
											<figure class="news-image">
												<?php if (has_post_thumbnail()):
												$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'eightmedi-news');?>
												<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /><?php
												else: ?>
													<img class="no-image" src="<?php echo get_template_directory_uri().'/css/images/no-image.jpg';?>" alt="no-image" /><?php
												endif;
												?>
												<div class="news-date"><?php echo "<span>".get_the_date('d')."</span>".get_the_date('M'); ?></div>
											</figure>
										</a>
										<div class="news-text">
											<div class="news-title-comment">
												<div class="news-single-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
												<div class="news-text"><?php echo eightmedi_pro_excerpt(get_the_excerpt(), 160);?></div>
												<a href="<?php the_permalink(); ?>"><?php echo __('Read More','eightmedi-pro')?></a>
											</div>
										</div>
									</div>
									<?php 
									endwhile;
									endif;
									wp_reset_postdata();
									?>
								</div>
							</section>
							<?php
							endif;
						}
						?>
						<?php
						//testimonial Section
						if(get_theme_mod('eightmedi_pro_testimonial_setting_option')=='enable'){
							?>
							<section class="our-testimonial">
								<div class="ed-container-home">
									<h2 class="title home-title wow fadeInUp"><?php echo esc_attr(get_theme_mod('eightmedi_pro_testimonial_title','Our Testimonial')); ?></h2>
									<div class="testimonial-wrap">
										<?php
										$testimonial_args      =   array('post_type'=>'testimonial', 'post_status'=>'publish', 'posts_per_page'=>-1);
										$testimonial_query     =   new WP_Query($testimonial_args);
										$i=0;
										if($testimonial_query->have_posts()):
											while($testimonial_query->have_posts()):$testimonial_query->the_post();
										$i++;
										?>
										<div class="testimonial-block <?php if($i%4==0){echo " nomargin";} ?>  wow fadeInRight"  data-wow-delay="0.8s">
											<div class="text-wrap">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												<div class="testimonial-content">
													<?php echo eightmedi_pro_excerpt(get_the_excerpt(),'250','...',true,true);?>
												</div>
											</div>
											<a href="<?php the_permalink(); ?>">
												<figure class="testimonial-image">
													<?php if (has_post_thumbnail()):
													$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'eightmedi-pro-team-image');?>
													<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /><?php
													endif;
													?>
												</figure>
											</a>
											<?php
											$testimonial_by = get_post_meta( get_the_ID(), 'eightmedi_pro_testimonial_box_link', true );
											if($testimonial_by!=""){
												echo '<span class="testimonial-by">'.__('By','eightmedi-pro').' '.$testimonial_by.'</span>';
											}?>
										</div>
										<?php 
										endwhile;
										endif;
										wp_reset_postdata();
										?>
									</div>
								</div>
							</section>
							<?php
						}
						?>
						<?php
						//FAQ Section
						if(get_theme_mod('eightmedi_pro_faqs_setting_option','disable')=='enable'){
							?>
							<section class="faqs clear" id="faqs-content">
								<div class="ed-container-home">
									<?php
									$faqs_title = esc_attr(get_theme_mod('eightmedi_pro_faqs_title'));
									$num_faqs = esc_attr(get_theme_mod('eightmedi_pro_faqs_number',10));
									$read_more = esc_attr(get_theme_mod('eightmedi_pro_faqs_readmore'),__('Read More','eightmedi-pro'));
									if(!empty($faqs_title)){
										?>
										<h2 class="title home-title wow flipInX"><?php echo $faqs_title; ?></h2>
										<?php
									}

									$faqs_args      =   array('post_type'=>'faqs', 'post_status'=>'publish', 'posts_per_page'=>$num_faqs,'order'=>'desc');
									$faqs_query     =   new WP_Query($faqs_args);
									$i=0;
									if($faqs_query->have_posts()):
										while($faqs_query->have_posts()):$faqs_query->the_post();
									$i++;
									?>
									<div class="faqs-block">
										<div class="faqs-single-title expand"><span class="faq-symbol">+</span> <?php the_title(); ?></div>
										<div class="faqs-content">
											<?php echo eightmedi_pro_excerpt(get_the_excerpt(),'250','...',true,true);?>
											<a href="<?php the_permalink(); ?>"><?php echo $read_more;?></a>
										</div>
									</div>
									<?php 
									endwhile;
									endif;
									wp_reset_postdata();
									?>
								</div>
							</section>
							<?php
						}
						?>
						<?php
						//Homepage Fullwidth Widget Area
						if(is_active_sidebar('eightmedi-pro-home-full')){
							?>
							<section class="home-widget-area clear">
								<div class="ed-container-home">
									<?php
									dynamic_sidebar('eightmedi-pro-home-full');
									?>
								</div>
							</section>
							<?php
						}
						?>
						<?php
						//Sponsors Section
						if(get_theme_mod('eightmedi_pro_sponsors_setting_option')=='enable'){
							?>
							<section class="our-sponsors clear">
								<div class="ed-container-home">
									<h2 class="title home-title wow fadeInUp"><?php echo esc_attr(get_theme_mod('eightmedi_pro_sponsors_title','Our Sponsors')); ?></h2>
									<div class="sponsors-wrap">
										<?php
										$sponsors_args      =   array('post_type'=>'sponsors', 'post_status'=>'publish', 'posts_per_page'=>-1);
										$sponsors_query     =   new WP_Query($sponsors_args);
										$i=0;
										if($sponsors_query->have_posts()):
											while($sponsors_query->have_posts()):$sponsors_query->the_post();
										$i++;
										$link = get_post_meta( get_the_ID(), 'eightmedi_pro_sponsor_box_link', true );
										if($link==""){
											$link = get_the_permalink();
										}
										?>
										<div class="sponsors-block <?php if($i%4==0){echo " nomargin";} ?>  wow fadeInRight"  data-wow-delay="0.8s">
											<a href="<?php esc_url($link); ?>">
												<figure class="sponsors-image">
													<?php if (has_post_thumbnail()):
													$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'eightmedi-pro-sponsors-image');?>
													<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /><?php
													endif;
													?>
												</figure>
											</a>
										</div>
										<?php 
										endwhile;
										endif;
										wp_reset_postdata();
										?>
									</div>
								</div>
							</section>
							<?php
						}
						?>

						<?php
						if(get_theme_mod('eightmedi_pro_callto_small_setting_option')=='enable'){
							$call_to_action_small = get_theme_mod('eightmedi_pro_callto_small_title','Make Your Appointment Today');
							if(!empty($call_to_action_small)):
								?>
							<section class="call-to-action-small clear">
								<?php
								$cta_bg_v_small = get_theme_mod('eightmedi_pro_callto_bkgimage_small');
								if(!empty($cta_bg_v_small)){
									?>
									<figure>
										<img src="<?php echo esc_url($cta_bg_v_small);?>" alt="<?php echo esc_attr(get_theme_mod('eightmedi_pro_callto_title')); ?>">
									</figure>
									<?php
								}
								?>						
								<div class="content-wrap <?php echo (empty($cta_bg_v_small))?'fullwidth':'';?>">
									<?php  ?>
									<h2 class="title cta-small-title home-title wow fadeInDown"><?php echo $call_to_action_small; ?></h2>
									<div class="cta-link-small wow fadeInRight" data-wow-delay="0.5s"><a href="<?php echo esc_url(get_theme_mod('eightmedi_pro_callto_link_small','#')); ?>"><?php echo esc_attr(get_theme_mod('eightmedi_pro_callto_readmore_small','Book Now')); ?></a></div>
								</div>
							</section>
							<?php
							endif;
						}
						?>

						<?php
						//$eightmedi_pro_google_map_iframe = get_theme_mod('eightmedi_pro_google_map_iframe');
						$eightmedi_pro_contact_address = get_theme_mod('eightmedi_pro_contact_address');
						if(is_active_sidebar('eightmedi-pro-google-map')) { ?>           
							<section id="google-map" class="clear">
								<?php		
								if(is_active_sidebar('eightmedi-pro-google-map')){
									dynamic_sidebar('eightmedi-pro-google-map');
								}

								if(!empty($eightmedi_pro_contact_address)) { ?>
									<div class="google-section-wrap em-container">			
										<div class="em-contact-address">
											<h3><?php _e('Contact Us', 'eightmedi-pro'); ?></h3>
											<?php echo wpautop($eightmedi_pro_contact_address);?>
										</div>
									</div>
									<?php } ?>
								</section>
								<?php } ?>
							</main><!-- #main -->
						</div><!-- #primary -->

						<?php get_footer(); ?>