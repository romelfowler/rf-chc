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
	$sidebar = get_theme_mod('eightmedi_pro_services_single_sidebar','right-sidebar');
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
						<?php $icon = get_post_meta( $post->ID, 'eightmedi_pro_service_box_icon', true );
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
						<span class="<?php echo get_post_meta( $post->ID, 'eightmedi_pro_service_box_icon', true ); ?>"></span>
						<div class="service-category">
							<?php
							$cats = wp_get_object_terms( $id, 'service-category' ) ;
							foreach($cats as $cat){
								echo '<a href="'.get_term_link($cat->slug, 'service-category').'">';
								echo '<span>'.$cat->name.'</span>';
								echo '</a>';
							}
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

						<?php

						?>

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
