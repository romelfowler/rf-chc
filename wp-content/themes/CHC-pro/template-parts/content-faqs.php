<?php
/**
 * Template part for displaying single posts.
 *
 * @package EightMedi Pro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="page-header">
		<a href="<?php the_permalink();?>">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</a>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php the_excerpt(); ?>
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

