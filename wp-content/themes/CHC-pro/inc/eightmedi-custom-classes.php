<?php
//add new custom control type switch
if(class_exists( 'WP_Customize_control')):
	class eightmedi_pro_WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {
        	$dropdown = wp_dropdown_categories(
        		array(
        			'name'              => '_customize-dropdown-categories-' . $this->id,
        			'echo'              => 0,
        			'show_option_none'  => __( '&mdash; Select &mdash;','eightmedi-pro' ),
        			'option_none_value' => '0',
        			'selected'          => $this->value(),
        			)
        		);
        	
            // Hackily add in the data link parameter.
        	$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
        	
        	printf(
        		'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
        		$this->label,
        		$dropdown
        		);
        }
    }

    class WP_Customize_Demo_Control extends WP_Customize_Control{            
        public function render_content() {
          ?>
          <label>
            <?php if ( ! empty( $this->label ) ) : ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php endif; ?>
        <div class="">
          <a href="#" id="demo_import">Import Demo</a>
          <div class=""></div>
          <div class="import-message">Click on 'Import Demo' button to import demo contents.</div>
      </div>
  </label>
  <?php
}
  }//demo close
  endif;