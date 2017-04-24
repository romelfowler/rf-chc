<?php
/**
 * Template part for displaying single posts.
 *
 * @package EightMedi Pro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<a href="<?php the_permalink();?>">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</a>

		<div class="entry-meta">
			<?php eightmedi_pro_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<div class="listview-img-wrap">
			<figure>
				<a href="<?php the_permalink();?>">
					<?php if (has_post_thumbnail()): 
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full');
					?>
					<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
					<?php
					else: ?>
					<img src="<?php echo esc_attr(get_template_directory_uri().'/images/fallback-person.jpg'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
					<?php
					endif;
					?>
				</a>
			</figure>
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
		</div>
		<div class="listview-desc-wrap">
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
			<?php the_excerpt(); ?>
			<?php
			$doctor_readmore = get_theme_mod('eightmedi_pro_doctor_archive_readmore_text','View Details');
			?>
			<a class="btn-doctor btn-archive" href="<?php the_permalink();?>" title="<?php echo esc_attr(get_the_title()); ?>">
				<?php echo esc_html($doctor_readmore); ?>
			</a>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eightmedi-pro' ),
				'after'  => '</div>',
				) );
				?>
			</div>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php eightmedi_pro_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->

