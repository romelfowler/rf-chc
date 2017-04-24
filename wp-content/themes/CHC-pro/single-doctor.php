<?php
/**
 * The template for displaying all single posts.
 *
 * @package EightMedi Pro
 */

get_header(); ?>
<div class="ed-container">
	<?php 
	global $post;
	$sidebar = get_theme_mod('eightmedi_pro_doctor_single_sidebar','right-sidebar');
	if($sidebar=='both-sidebar' || $sidebar=='left-sidebar'){
		get_sidebar('left');
	}
	?>
	<div id="primary" class="content-area <?php echo $sidebar;?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<header class="page-header">
						<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>

						<div class="entry-meta">
							<?php eightmedi_pro_posted_on(); ?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
					
					<div class="entry-content">
						<?php if (has_post_thumbnail()): 
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full');
						?>
						<figure>
							<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
						</figure>
						<?php
						endif;
						?>
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
						<?php the_content(); ?>
						<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eightmedi-pro' ),
							'after'  => '</div>',
							) );
							?>
						</div><!-- .entry-content -->

						<footer class="entry-footer">
							<?php eightmedi_pro_entry_footer(); ?>
						</footer><!-- .entry-footer -->
					</article><!-- #post-## -->

					<?php the_post_navigation(); ?>

					<?php
				// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php 
		if($sidebar=='both-sidebar' || $sidebar=='right-sidebar' ){
			get_sidebar('right');
		}
		?>
	</div>
	<?php get_footer(); ?>
