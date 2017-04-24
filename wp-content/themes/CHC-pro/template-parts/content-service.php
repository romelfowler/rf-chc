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
			<?php
			$icon = get_post_meta( $post->ID, 'eightmedi_pro_service_box_icon', true );
			if($icon!=""){ echo '<i class="'.$icon.'"></i>';}
			else{
				if (has_post_thumbnail()): 
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'eightmedi-pro-team-image');
				?>
				<figure>
					<a href="<?php the_permalink();?>">
						<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
					</a>
				</figure>
				<?php
				endif;
			}
			?>
		</div>
			<div class="listview-desc-wrap">
				<?php the_excerpt(); ?>
				<?php
				$service_readmore = get_theme_mod('eightmedi_pro_services_archive_readmore_text','View Details');
				?>
				<a class="btn-service btn-archive" href="<?php the_permalink();?>" title="<?php echo esc_attr(get_the_title()); ?>">
					<?php echo esc_html($service_readmore); ?>
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

