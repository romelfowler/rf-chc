<?php
/**
 * Template Name: Doctor
 *
 * @package eightmedi Pro
 */

get_header(); 
?>

<?php
$i = 0;
while(have_posts()):
	the_post();
$i++;
?>
<div class="ed-container">
	<header id="title_bread_wrap" class="entry-header">
		<h2 class="entry-title"><b><?php the_title(); ?></b></h2><div class="title-border"></div>
	</header><!-- .entry-header -->
	<?php
	if ((function_exists('eightmedi_pro_breadcrumbs'))) {
		eightmedi_pro_breadcrumbs();
	} ?>
	<?php 
	global $post;
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
			$doctor_readmore      = get_theme_mod('eightmedi_pro_doctor_archive_readmore_text','View Details');
			$wrap_class = implode(' ',$classes);
			?>
			<main id="main" class="site-main doctor-block-wrapper <?php echo esc_attr($wrap_class);?>" role="main">
				<?php
				$doctor_args      =   array('post_type'=>'doctor', 'post_status'=>'publish', 'posts_per_page'=>-1);
				$doctor_query     =   new WP_Query($doctor_args);
				if($doctor_query->have_posts()):
					while($doctor_query->have_posts()):$doctor_query->the_post();
				get_template_part( 'template-parts/content', 'doctor' );
				endwhile;
				endif;
				wp_reset_query();
				?>
			</main>
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
<?php
endwhile;
?>
<?php get_footer(); ?>