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
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php
		if (has_post_thumbnail()): 
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full');
		?>
		<figure>
			<a href="<?php the_permalink();?>">
				<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
			</a>
		</figure>
		<?php
		endif;
		?>
		<?php the_excerpt(); ?>
		<?php
		$testimonial_by = get_post_meta( get_the_ID(), 'eightmedi_pro_testimonial_box_link', true );
		if($testimonial_by!=""){
			echo '<span class="testimonial-by">'.__('By','eightmedi-pro').' '.$testimonial_by.'</span>';
		}?>
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
