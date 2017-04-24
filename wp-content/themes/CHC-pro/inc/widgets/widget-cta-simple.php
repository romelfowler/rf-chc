<?php

/**
 *
 * @package eightmedi Pro
 */

add_action('widgets_init', 'register_cta_simple_widget');

function register_cta_simple_widget() {
    register_widget('eightmedi_cta_simple');
}

class eightmedi_cta_simple extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'eightmedi_cta_simple', 'ED :  Call to Action', array(
            'description' => __('A widget that shows Simple Call to Action', 'eightmedi-pro')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'cta_simple_title' => array(
                'eightmedi_pro_widgets_name' => 'cta_simple_title',
                'eightmedi_pro_widgets_title' => __('Title', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'title',
            ),
            'cta_simple_phone' => array(
                'eightmedi_pro_widgets_name' => 'cta_simple_desc',
                'eightmedi_pro_widgets_title' => __('Description', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'textarea',
                'eightmedi_pro_widgets_row' => '4'
            ),
            'cta_simple_website' => array(
                'eightmedi_pro_widgets_name' => 'cta_simple_btn_text',
                'eightmedi_pro_widgets_title' => __('Button Text', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text',
            ),
            'cta_simple_font_awesome' => array(
                'eightmedi_pro_widgets_name' => 'cta_simple_font_awsome',
                'eightmedi_pro_widgets_title' => __('Enter Fontawesome Class to show in button', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text',
            ),
            'cta_simple_address' => array(
                'eightmedi_pro_widgets_name' => 'cta_simple_btn_url',
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
        $cta_simple_title = $instance['cta_simple_title'];
        $cta_simple_desc = $instance['cta_simple_desc'];
        $cta_simple_btn_text = $instance['cta_simple_btn_text'];
        $cta_simple_btn_url = $instance['cta_simple_btn_url'];
        $cta_simple_font_class = $instance['cta_simple_font_awsome'];
        echo $before_widget; ?>
        <div class="cta-banner clearfix">
            
                <div class="banner-text wow fadeInLeft" data-wow-delay="0.5s">
                    <div class="cta-title_simple main-title"><?php echo $cta_simple_title;?></div>
                    <div class="cta-desc_simple"><?php echo $cta_simple_desc;  ?></div>
                </div>
                <div class="banner-btn wow fadeInRight" data-wow-delay="0.5s">
                    <a class="btn" href="<?php echo $cta_simple_btn_url; ?>"><i class="fa <?php echo $cta_simple_font_class; ?>"></i><?php echo $cta_simple_btn_text; ?></a>
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
