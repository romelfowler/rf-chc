<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package EightMedi Pro
 */

get_header(); ?>
<div class="ed-container">
	<?php
	if ((function_exists('eightmedi_pro_breadcrumbs'))) {
		eightmedi_pro_breadcrumbs();
	} ?>
	<header class="page-header">
		<?php
		echo '<h1 class="page-title">';
		post_type_archive_title();
		echo '</h1>';
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
	</header><!-- .page-header -->
	
	<?php
	$sidebar = get_theme_mod('eightmedi_pro_doctor_archive_sidebar','right-sidebar');
	if($sidebar=='both-sidebar'){
		?>
		<div class="left-sidbar-right">
			<?php
		}
		if($sidebar=='both-sidebar' || $sidebar=='left-sidebar'){
			get_sidebar('left');
		}
		?>
		<div id="primary" class="content-area <?php echo $sidebar;?>">
			<?php
			$classes[] = 'type-'.get_theme_mod('eightmedi_pro_doctor_archive_layout','grid');
			$classes[] = 'column-'.get_theme_mod('eightmedi_pro_doctor_archive_grid_column', '3');
			$classes[] = 'list-'.get_theme_mod('eightmedi_pro_doctor_archive_list_design', 'square');
			$wrap_class = implode(' ',$classes);
			?>
			<main id="main" class="site-main doctor-block-wrapper <?php echo esc_attr($wrap_class);?>" role="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'doctor' );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php 
	if($sidebar=='both-sidebar' || $sidebar=='right-sidebar'){
		get_sidebar('right');
	}
	if($sidebar=='both-sidebar'){
		?>
	</div>
	<?php
}
?>
</div>
<?php get_footer(); ?>
