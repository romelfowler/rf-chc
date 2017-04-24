<?php
/**
 * Social icons widget
 *
 * @package eightmedi Pro
 */
add_action('widgets_init', create_function('', 'register_widget( "eightmedi_pro_social_icons" );'));

class eightmedi_Pro_Social_Icons extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'eightmedi_pro_social_icons', 'ED : Social Icons', array(
                'description' => __('Display links to your social network profiles, enter full profile URLs', 'eightmedi-pro')
                )
            );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            // Title
            'widget_title' => array(
                'eightmedi_pro_widgets_name' => 'widget_title',
                'eightmedi_pro_widgets_title' => __('Title', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            // Other fields
            'twitter' => array(
                'eightmedi_pro_widgets_name' => 'twitter',
                'eightmedi_pro_widgets_title' => __('Twitter', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'facebook' => array(
                'eightmedi_pro_widgets_name' => 'facebook',
                'eightmedi_pro_widgets_title' => __('Facebook', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'linkedin' => array(
                'eightmedi_pro_widgets_name' => 'linkedin',
                'eightmedi_pro_widgets_title' => __('LinkedIn', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'gplus' => array(
                'eightmedi_pro_widgets_name' => 'google-plus',
                'eightmedi_pro_widgets_title' => __('Google+', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'pinterest' => array(
                'eightmedi_pro_widgets_name' => 'pinterest',
                'eightmedi_pro_widgets_title' => __('Pinterest', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'youtube' => array(
                'eightmedi_pro_widgets_name' => 'youtube',
                'eightmedi_pro_widgets_title' => __('YouTube', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'vimeo' => array(
                'eightmedi_pro_widgets_name' => 'vimeo-square',
                'eightmedi_pro_widgets_title' => __('Vimeo', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'flickr' => array(
                'eightmedi_pro_widgets_name' => 'flickr',
                'eightmedi_pro_widgets_title' => __('Flickr', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'dribbble' => array(
                'eightmedi_pro_widgets_name' => 'dribbble',
                'eightmedi_pro_widgets_title' => __('Dribbble', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'dribbble' => array(
                'eightmedi_pro_widgets_name' => 'stumbleupon',
                'eightmedi_pro_widgets_title' => __('Stumbleupon', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'tumblr' => array(
                'eightmedi_pro_widgets_name' => 'tumblr',
                'eightmedi_pro_widgets_title' => __('Tumblr', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'instagram' => array(
                'eightmedi_pro_widgets_name' => 'instagram',
                'eightmedi_pro_widgets_title' => __('Instagram', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'lastfm' => array(
                'eightmedi_pro_widgets_name' => 'skype',
                'eightmedi_pro_widgets_title' => __('Skype', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
                ),
            'soundcloud' => array(
                'eightmedi_pro_widgets_name' => 'soundcloud',
                'eightmedi_pro_widgets_title' => __('SoundCloud', 'eightmedi-pro'),
                'eightmedi_pro_widgets_field_type' => 'text'
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

        $widget_title = apply_filters('widget_title', $instance['widget_title']);

        echo $before_widget;

        // Show title
        if (isset($widget_title)) {
            echo $before_title . $widget_title . $after_title;
        }

        echo '<ul class="clearfix widget-social-icons">';
        // Loop through fields
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            // Make array elements available as variables
            extract($widget_field);
            // Check if field has value and skip title field
            unset($eightmedi_pro_widgets_field_value);
            if (isset($instance[$eightmedi_pro_widgets_name]) && 'widget_title' != $eightmedi_pro_widgets_name) {
                $eightmedi_pro_widgets_field_value = esc_attr($instance[$eightmedi_pro_widgets_name]);
                if ('' != $eightmedi_pro_widgets_field_value) {
                    ?>
                    <li class="<?php echo $eightmedi_pro_widgets_name; ?>"><a href="<?php echo $eightmedi_pro_widgets_field_value; ?>" target="_blank"><i class="fa fa-<?php echo $eightmedi_pro_widgets_name; ?>"></i></a></li>
                    <?php
                }
            }
        }
        echo '<!-- .widget-social-icons --></ul>';

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
     * @uses	eightmedi_pro_widgets_show_widget_field()		defined in widget-fields.php
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
     * @param array $instance Previously saved values from database.
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
