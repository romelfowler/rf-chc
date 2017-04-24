<?php

/**
 * @package eightmedi Pro
 */
add_action('widgets_init', 'register_stat_counter_widget');

function register_stat_counter_widget() {
    register_widget('eightmedi_pro_stat_counter');
}

class eightmedi_Pro_Stat_Counter extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'eightmedi_pro_stat_counter', 'ED : Stat Counter', array(
                'description' => __('A widget that shows Stat Counter', 'eightmedi-pro')
                )
            );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $status = array(
            'open' => 'Open', 
            'close' => 'Close',
            );
        $fields = array(
            // This widget has no title
            // Other fields
            'stat_counter_content' => array(
                'eightmedi_pro_widgets_name' => 'stat_counter_number',
                'eightmedi_pro_widgets_title' => __('Stat Counter Number', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'number',
                ),
            'stat_counter_title' => array(
                'eightmedi_pro_widgets_name' => 'stat_counter_title',
                'eightmedi_pro_widgets_title' => __('Stat Counter Title', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text',
                ),
            'stat_counter_icon' => array(
                'eightmedi_pro_widgets_name' => 'stat_counter_icon',
                'eightmedi_pro_widgets_title' => __('Stat Counter Icon', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'icon',
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

        $stat_counter_title = $instance['stat_counter_title'];
        $stat_counter_number = $instance['stat_counter_number'];
        $stat_counter_icon = $instance['stat_counter_icon'];

        echo $before_widget; ?>
        <div class="wow bounceIn ed-stat-counter">
            <?php    
            if (isset($stat_counter_icon)): ?>
            <div class="ed-stat_counter-icon">
                <i class="<?php echo $stat_counter_icon; ?>"></i>
            </div>
        <?php endif; ?>

        <?php    
        if (isset($stat_counter_number)): ?>
        <div class="ed-stat_counter-number">
            <span class="counter"><?php echo $stat_counter_number; ?></span>
        </div>
    <?php endif; ?>

    <?php    
    if (isset($stat_counter_title)): ?>
    <h5 class="ed-stat_counter-title">
        <?php echo $stat_counter_title; ?>
    </h5>
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
