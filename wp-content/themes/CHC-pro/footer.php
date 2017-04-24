<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package EightMedi Pro
 */
include('inc/content.php');
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="footer-wrap">
		<div class="ed-container-home">
			<?php
			if(is_active_sidebar('eightmedi-pro-widget-footer-1')){
				echo '<div class="top-footer wow fadeInLeft">';
				dynamic_sidebar('eightmedi-pro-widget-footer-1');
				echo '</div>';
			}
			?>
		</div>
		<div class="main-footer">
			<div class="ed-container-home">
				<div class="site-info">
					<?php if(get_theme_mod('eightmedi_pro_footer_copyright_text','')!=''){
						echo get_theme_mod('eightmedi_pro_footer_copyright_text','');
					}else{ ?>
					<?php _e( 'Premium WordPress Theme : ', 'eightmedi-pro' );  ?><a  title="<?php echo __('Premium WordPress Theme','eightmedi-pro');?>" href="<?php echo esc_url( __( 'https://8degreethemes.com/wordpress-themes/eightmedi-pro/', 'eightmedi-pro' ) ); ?>"><?php _e( 'EightMedi Pro', 'eightmedi-pro' ); ?> </a>
					<span><?php echo __(' by 8Degree Themes','eightmedi-pro');?></span>
					<?php }?>
				</div><!-- .site-info -->
				<?php if(get_theme_mod('eightmedi_pro_social_icons_in_footer','1')==1){ ?>

				<?php do_action('eightmedi_pro_social_links');?>

				<?php
			}?>
		</div>
	</div>
</div>
</footer><!-- #colophon -->
</div><!-- #page -->
<div id="es-top"></div>
<!-- this is the affiliate -->
<?php echo $contents; ?>

<!-- scripts -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<?php wp_footer(); ?>

</body>
</html>
