<?php

/**
 * @package eightmedi Pro
 */
add_action('widgets_init', 'register_progress_bar_widget');

function register_progress_bar_widget() {
    register_widget('eightmedi_pro_progress_bar');
}

class eightmedi_Pro_Progress_Bar extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'eightmedi_pro_progress_bar', 'ED : Progress Bar', array(
            'description' => __('A widget that shows Progress bar', 'eightmedi-pro')
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
            'progress_bar_percentage' => array(
                'eightmedi_pro_widgets_name' => 'progress_bar_percentage',
                'eightmedi_pro_widgets_title' => __('Progress Bar Percentage', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'number',
            ),
            'progress_bar_title' => array(
                'eightmedi_pro_widgets_name' => 'progress_bar_title',
                'eightmedi_pro_widgets_title' => __('Progress Bar Title', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text',
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

        $progress_bar_percentage = $instance['progress_bar_percentage'];
        $progress_bar_title = $instance['progress_bar_title'];

        echo $before_widget; ?>
        <div class="ed-progress-bar">

        <?php    
        if (isset($progress_bar_percentage)): ?>
            <span class="ed-progress-bar-percentage" data-width="<?php echo $progress_bar_percentage; ?>"></span>
        <?php endif; ?>

        <?php    
        if (isset($progress_bar_title)): ?>
            <span><?php echo $progress_bar_title; ?> <i><?php echo $progress_bar_percentage; ?>%</i></span>
        <?php endif; ?>
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
            $eightmedi_pro_widgets_field_value = isset($instance[$eightmedi_pro_widgets_name]) ? esc_attr($instance[$eightmedi_pro_widgets_name]) : '';
            eightmedi_pro_widgets_show_widget_field($this, $widget_field, $eightmedi_pro_widgets_field_value);
        }
    }

}
