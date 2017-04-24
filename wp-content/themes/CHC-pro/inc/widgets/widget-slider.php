<?php

/**
 * Preview post/page widget
 *
 * @package 8Store Pro
 */
add_action('widgets_init', 'register_widget_slider');

function register_widget_slider() {
	register_widget('eightmedi_pro_widget_slider');
}

class eightmedi_pro_widget_slider extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
    	parent::__construct(
    		'eightmedi_pro_widget_slider', 'ED : Posts Slider Widget', array(
    			'description' => __('A widget that shows posts of a category in a slider', 'eightmedi-pro')
    			)
    		);
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
    	$fields = array(
            // Other fields
    		'cat_title' => array(
    			'eightmedi_pro_widgets_name' => 'cat_title',
    			'eightmedi_pro_widgets_title' => __('Title', 'eightmedi-pro'),
    			'eightmedi_pro_widgets_field_type' => 'text',
    			),
    		'cat_id' => array(
    			'eightmedi_pro_widgets_name' => 'cat_id',
    			'eightmedi_pro_widgets_title' => __('Post', 'eightmedi-pro'),
    			'eightmedi_pro_widgets_field_type' => 'selectcategory',
    			),
    		'cat_num_post' => array(
    			'eightmedi_pro_widgets_name' => 'cat_num_post',
    			'eightmedi_pro_widgets_title' => __('Number of posts', 'eightmedi-pro'),
    			'eightmedi_pro_widgets_field_type' => 'number'
    			),
    		);

    	return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
    	extract($args);
    	if(!empty($instance)):
    		$editor_cat = $instance['cat_id'];
    	$editor_posts_per_page = $instance['cat_num_post'];
    	$trans_editor = $instance['cat_title'];
    	
    	echo $before_widget;
    	?>
    	<div class="sidebar-widget-slider widget-area wow fadeInUp" data-wow-delay="0.5s">
    		<div class="content-wrapper">
    			<?php 
    			if(!empty($editor_cat)):
    				?>
    			<h1 class="sidebar-title"><span><?php echo esc_attr( $trans_editor ) ;?></span></h1>
    			<?php
    			echo '<div class="sidebar-posts-wrapper wdgt-slide">';
    			$loop = new WP_Query(array(
    				'cat' => $editor_cat,
    				'posts_per_page' => $editor_posts_per_page,
    				'post_type' => 'post',
    				'post_status' => 'publish',
    				'order' => 'DESC', 
    				));
    			$e_counter = 0;
    			$total_posts_editor = $loop->found_posts;
    			if($loop->have_posts()){
    				while($loop->have_posts()){
    					$e_counter++;
    					$loop->the_post();
    					$editor_image_id = get_post_thumbnail_id();
    					$editor_big_image_path = wp_get_attachment_image_src( $editor_image_id, 'full', true );
    					$editor_image_alt = get_post_meta( $editor_image_id, '_wp_attachment_image_alt', true );
    					?>
    					<div class="single_post clearfix <?php if( $e_counter == 1 ){ echo 'first-post non-zoomin'; }?>">
    						<div class="post-image">
    							<?php if(has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink();?>">
    									<img src="<?php echo esc_url( $editor_big_image_path[0] );?>" alt="<?php echo esc_attr($editor_image_alt);?>" />
    								</a>
    							<?php endif ;?>
    							<div class="post-desc-wrapper">
    								<h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
    							</div>
    						</div>
    					</div>
    					<?php
    				}
    			}
                echo "</div>";
    			wp_reset_postdata();
    			endif;
    			?>
    		</div>
    	</div>
    	<?php
    	echo $after_widget;
    	endif;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    eightmedi_pro_widgets_updated_field_value()       defined in widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
    	$instance = $old_instance;

    	$widget_fields = $this->widget_fields();

        // Loop through fields
    	foreach ($widget_fields as $widget_field) {

    		extract($widget_field);

            // Use helper function to get updated field values
    		$instance[$eightmedi_pro_widgets_name] = eightmedi_pro_widgets_updated_field_value($widget_field, $new_instance[$eightmedi_pro_widgets_name]);
    	}

    	return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    eightmedi_pro_widgets_show_widget_field()     defined in widget-fields.php
     */
    public function form($instance) {
    	$widget_fields = $this->widget_fields();

        // Loop through fields
    	foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
    		extract($widget_field);
    		$eightmedi_pro_widgets_field_value = isset($instance[$eightmedi_pro_widgets_name]) ? esc_attr($instance[$eightmedi_pro_widgets_name]) : '';
    		eightmedi_pro_widgets_show_widget_field($this, $widget_field, $eightmedi_pro_widgets_field_value);
    	}
    }

}