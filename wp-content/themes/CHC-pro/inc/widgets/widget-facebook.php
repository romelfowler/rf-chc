<?php

/**
 *
 * @package eightmedi Pro
 */

add_action('widgets_init', 'register_facebook_like_widgets');

function register_facebook_like_widgets()
{
    register_widget('facebook_like_widget');
}

class Facebook_Like_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'facebook_like_widget', 'ED : Facebook Like', array(
            'description' => __('A widget that shows Facebook Like Box', 'eightmedi-pro')
            )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            // This widget has no title
            // Other fields
            'facebook_like_title' => array(
                'eightmedi_pro_widgets_name' => 'facebook_like_title',
                'eightmedi_pro_widgets_title' => __('Title', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text',
            ),
            'facebook_like_page_url' => array(
                'eightmedi_pro_widgets_name' => 'facebook_like_page_url',
                'eightmedi_pro_widgets_title' => __('Facebook Page URL', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'url',
            ),
            'facebook_like_width' => array(
                'eightmedi_pro_widgets_name' => 'facebook_like_width',
                'eightmedi_pro_widgets_title' => __('Width', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'number',
            ),
            'facebook_like_height' => array(
                'eightmedi_pro_widgets_name' => 'facebook_like_height',
                'eightmedi_pro_widgets_title' => __('Height', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'number',
            ),
            'facebook_like_color_scheme' => array(
                'eightmedi_pro_widgets_name' => 'facebook_like_color_scheme',
                'eightmedi_pro_widgets_title' => __('Color Scheme', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'select',
                'eightmedi_pro_widgets_field_options' => array(
                    'light' => 'Light',
                    'dark'  => 'Dark'
                    )
            ),
            'facebook_like_show_faces' => array(
                'eightmedi_pro_widgets_name' => 'facebook_like_show_faces',
                'eightmedi_pro_widgets_title' => __('Show faces', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'checkbox',
            ),
            'facebook_like_show_stream' => array(
                'eightmedi_pro_widgets_name' => 'facebook_like_show_stream',
                'eightmedi_pro_widgets_title' => __('Show stream', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'checkbox'
            ),
            'facebook_like_show_header' => array(
                'eightmedi_pro_widgets_name' => 'facebook_like_show_header',
                'eightmedi_pro_widgets_title' => __('Show facebook header', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'checkbox'
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
        if($instance==null){return false;}
        $facebook_like_title = $instance['facebook_like_title'];
        $facebook_like_page_url = $instance['facebook_like_page_url'];
        $facebook_like_width = $instance['facebook_like_width'];
        $facebook_like_height = $instance['facebook_like_height'];
        $facebook_like_color_scheme = $instance['facebook_like_color_scheme'];
        $facebook_like_show_faces = $instance['facebook_like_show_faces'];
        $facebook_like_show_stream = $instance['facebook_like_show_stream'];
        $facebook_like_show_header = $instance['facebook_like_show_header'];

        echo $before_widget; ?>
        <div class="ed-<?php echo $facebook_like_color_scheme; ?> ed-facebook-like-box">
        <?php    
        if (isset($facebook_like_title)): ?>
            <h5 class="widget-title">
            <?php echo $facebook_like_title; ?>
            </h5>
        <?php endif; ?>
        <iframe src="http<?php echo (is_ssl())? 's' : ''; ?>://www.facebook.com/plugins/likebox.php?href=<?php echo urlencode($facebook_like_page_url); ?>&amp;width=<?php echo $facebook_like_width; ?>&amp;colorscheme=<?php echo $facebook_like_color_scheme; ?>&amp;show_faces=<?php echo $facebook_like_show_faces; ?>&amp;stream=<?php echo $facebook_like_show_stream; ?>&amp;header=<?php echo $facebook_like_show_header; ?>&amp;height=<?php echo $facebook_like_height; ?>&amp;force_wall=true<?php if($facebook_like_show_faces == 'true'): ?>&amp;connections=8<?php endif; ?>" style="border:none; overflow:hidden; width:<?php echo $facebook_like_width; ?>px; height: <?php echo $facebook_like_height; ?>px;"></iframe>
        </div>
        <?php 
        echo $after_widget;
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
            $eightmedi_pro_widgets_field_value = !empty($instance[$eightmedi_pro_widgets_name]) ? esc_attr($instance[$eightmedi_pro_widgets_name]) : '';
            eightmedi_pro_widgets_show_widget_field($this, $widget_field, $eightmedi_pro_widgets_field_value);
        }
    }

}
