<?php

/**
 * @package eightmedi Pro
 */

add_action('widgets_init', 'register_cta_video_widget');

function register_cta_video_widget() {
    register_widget('eightmedi_cta_video');
}

class eightmedi_cta_video extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'eightmedi_cta_video', 'ED : Call to Action with Video', array(
            'description' => __('A widget that shows Call to Action with Video', 'eightmedi-pro')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'cta_video_title' => array(
                'eightmedi_pro_widgets_name' => 'cta_video_title',
                'eightmedi_pro_widgets_title' => __('Title', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'title',
            ),
            'cta_video_desc' => array(
                'eightmedi_pro_widgets_name' => 'cta_video_desc',
                'eightmedi_pro_widgets_title' => __('Description', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'textarea',
                'eightmedi_pro_widgets_row' => '4'
            ),
            'cta_video_iframe' => array(
                'eightmedi_pro_widgets_name' => 'cta_video_iframe',
                'eightmedi_pro_widgets_title' => __('Video Iframe', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'iframe_textarea',
            ),
            'cta_video_btn_text' => array(
                'eightmedi_pro_widgets_name' => 'cta_video_btn_text',
                'eightmedi_pro_widgets_title' => __('Button Text', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text',
            ),
            'cta_video_btn_url' => array(
                'eightmedi_pro_widgets_name' => 'cta_video_btn_url',
                'eightmedi_pro_widgets_title' => __('Button Url', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                
            )
            
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
        if($instance==null){return false;}
        $allow_tag = array(
                            'iframe'=>array(
                                'height'=>array(),
                                'width'=>array(),
                                'src'=>array(),
                                'frameborder'=>array()));
        $cta_video_title = $instance['cta_video_title'];
        $cta_video_desc = $instance['cta_video_desc'];
        $cta_video_iframe = $instance['cta_video_iframe'];
        $cta_video_btn_text = $instance['cta_video_btn_text'];
        $cta_video_btn_url = $instance['cta_video_btn_url'];
        echo $before_widget; ?>
        <div class="cta-video clearfix">
            <div class="cta-wrap-left">
                <?php echo $cta_video_iframe ; ?>
            </div>
            <div class="cta-wrap-right">
                <h1 class="cta-title main-title"><?php echo $cta_video_title;?></h1>
                <div class="cta-desc"><?php echo $cta_video_desc;  ?></div>
                <a class="bttn cta-video-btn" href="<?php echo $cta_video_btn_url; ?>"><?php echo $cta_video_btn_text; ?></a>
            </div>
        </div>
        <?php 
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	eightmedi_pro_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
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
     * @param	array $instance Previously saved values from database.
     *
     * @uses	eightmedi_pro_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $eightmedi_pro_widgets_field_value = !empty($instance[$eightmedi_pro_widgets_name]) ? esc_attr($instance[$eightmedi_pro_widgets_name]) : '';
            eightmedi_pro_widgets_show_widget_field($this, $widget_field, $eightmedi_pro_widgets_field_value);
        }
    }

}
