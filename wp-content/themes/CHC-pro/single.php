<?php
/**
 * The template for displaying all single posts.
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
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-meta">
		<?php eightmedi_pro_posted_on(); ?>
	</div><!-- .entry-meta -->
	<?php 
	global $post;
	$post_type = get_post_type();
	if($post_type=='faqs'){
		$sidebar = get_theme_mod('eightmedi_pro_faqs_archive_sidebar','right-sidebar');
	}elseif($post_type=='testimonial'){
		$sidebar = get_theme_mod('eightmedi_pro_testimonial_archive_sidebar','right-sidebar');
	}elseif($post_type=='sponsors'){
		$sidebar = get_theme_mod('eightmedi_pro_sponsors_archive_sidebar','right-sidebar');
	}else{
		$sidebar = get_post_meta($post->ID, 'eightmedi_pro_sidebar_layout', true);
	}
	if($sidebar=='both-sidebar' || $sidebar=='left-sidebar'){
		get_sidebar('left');
	}
	?>
	<div id="primary" class="content-area <?php echo $sidebar;?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

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
