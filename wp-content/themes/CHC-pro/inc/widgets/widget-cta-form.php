<?php

/**
 * @package eightmedi Pro
 */
add_action('widgets_init', 'register_cta_form_widget');

function register_cta_form_widget() {
    register_widget('eightmedi_cta_form');
}

class eightmedi_cta_form extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'eightmedi_cta_form', 'ED : Call to Action with Form', array(
                'description' => __('A widget that shows Call to Action with Form', 'eightmedi-pro')
                )
            );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'cta_form_title' => array(
                'eightmedi_pro_widgets_name' => 'cta_form_title',
                'eightmedi_pro_widgets_title' => __('Title', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'title',
                ),
            'cta_form_desc' => array(
                'eightmedi_pro_widgets_name' => 'cta_form_desc',
                'eightmedi_pro_widgets_title' => __('Description', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'textarea',
                'eightmedi_pro_widgets_row' => '4'
                ),
            'cta_form_sc' => array(
                'eightmedi_pro_widgets_name' => 'cta_form_sc',
                'eightmedi_pro_widgets_title' => __('Contact Form Shortcode', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'textarea',
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
        if($instance==null){
            return false;
        }
        $cta_form_title = wp_kses_post($instance['cta_form_title']);
        $cta_form_desc = $instance['cta_form_desc'];
        $cta_form_sc = $instance['cta_form_sc'];
        //$cta_form_btn_text = $instance['cta_form_btn_text'];
        //$cta_form_btn_url = $instance['cta_form_btn_url'];
        echo $before_widget; ?>
        <div class="cta-form-wrap clearfix">
            <div class="cta-wrap-right">
                <h2 class="cta-form-title home-title wow fadeInUp" data-wow-delay="0.5s"><?php echo $cta_form_title;?></h2>
                <div class="cta-content-wrap">
                    <div class="cta-desc wow fadeInUp" data-wow-delay="0.8s"><?php echo $cta_form_desc;  ?></div>
                    <!-- <a class="bttn" href="<?php echo $cta_form_btn_url; ?>"><?php echo $cta_form_btn_text; ?></a> -->
                </div>
                <div class="cta-form wow fadeInUp" data-wow-delay="1s"><?php echo do_shortcode($cta_form_sc) ; ?></div>
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
