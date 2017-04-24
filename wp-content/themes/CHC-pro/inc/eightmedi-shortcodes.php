<?php
/**
 * eightmedi Pro Custom Shortcodes
 *
 * @package eightmedi Pro
 */
// Allow shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// Enable font size & font family selects in the editor
if ( ! function_exists( 'eightmedi_pro_mce_buttons' ) ) {
    function eightmedi_pro_mce_buttons( $buttons ) {
        array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
        return $buttons;
    }
}
add_filter( 'mce_buttons_2', 'eightmedi_pro_mce_buttons' );

// Customize mce editor font sizes
if ( ! function_exists( 'eightmedi_pro_mce_text_sizes' ) ) {
    function eightmedi_pro_mce_text_sizes( $initArray ){
        $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
        return $initArray;
    }
}
add_filter( 'tiny_mce_before_init', 'eightmedi_pro_mce_text_sizes' );

// Add Formats Dropdown Menu To MCE
if ( ! function_exists( 'eightmedi_pro_style_select' ) ) {
    function eightmedi_pro_style_select( $buttons ) {
        array_push( $buttons, 'styleselect' );
        return $buttons;
    }
}
add_filter( 'mce_buttons', 'eightmedi_pro_style_select' );
add_filter( 'mce_external_plugins', 'eightmedi_pro_add_tinymce_plugin' );
add_filter( 'mce_buttons', 'eightmedi_pro_register_mce_button' );


// Declare script for new button
function eightmedi_pro_add_tinymce_plugin( $plugin_array ) {
    $plugin_array['eightmedi_pro_mce_button'] = get_template_directory_uri() .'/js/shortcodes.js';
    return $plugin_array;
}

// Register new button in the editor
function eightmedi_pro_register_mce_button( $buttons ) {
    array_push( $buttons, 'eightmedi_pro_mce_button' );
    return $buttons;
}


if ( ! function_exists( 'ed_paragraph_br_fix' ) ){
    function ed_paragraph_br_fix($content,$paragraph_tag=false,$br_tag=false){
        $content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);

        $content = preg_replace('#<br \/>#', '', $content);

        if ( $paragraph_tag ) $content = preg_replace('#<p>|</p>#', '', $content);

        return trim($content);
    }
}

if ( ! function_exists( 'ed_content_helper' ) ){
    function ed_content_helper($content,$paragraph_tag=false,$br_tag=false){
        return ed_paragraph_br_fix( do_shortcode(shortcode_unautop($content)), $paragraph_tag, $br_tag );
    }
}

function ed_testimonial_shortcode($atts, $content=null) { 
    extract(shortcode_atts( 
        array(
            'image' => '',
            'image_shape' => 'round',
            'client' => '',
            'designation' => ''
            ), $atts, 'ed_testimonial'));


    $testimonial = '<div class="shortcode-testimonial-block clearfix"><div class="testimonial-img-wrap">'; 
    if($image):
        $testimonial .= '<div class="testimonial-image'.' '.$image_shape.'"><img src="'.$image.'"/></div>';
    endif;
    $testimonial .= '<div class="client-detail">';
    if($client):
        $testimonial .= '<div class="client-name">'.$client.'</div>';
    endif;
    if($designation):
        $testimonial .= '<div class="client-designation">'.$designation.'</div>';
    endif;
    $testimonial .= '</div></div>';

    if($content):
        $testimonial .= '<div class="testimonial-content">'.ed_content_helper($content).'</div>';
    endif;
    
    $testimonial .= '</div>';
return $testimonial; //Return the HTML.
}
add_shortcode('ed_testimonial', 'ed_testimonial_shortcode');

function ed_team_shortcode($atts, $content=null) { 
    extract(shortcode_atts( 
        array(
            'name' => '',
            'designation' => '',
            'image' => '',
            'image_shape' => ''
            ), $atts, 'ed_team'));


    $team = '<div class="shortcode-team-block"><div class="team-image-wrap">'; 
    if($image):
        $image_array = explode('/',$image);
    $image_name = end($image_array);
    $image_name_array = explode('.',$image_name);
    $image_ext = end($image_name_array);
    $image_alt = str_replace('.'.$image_ext, '', $image_name);
    $team .= '<div class="team-image'.' '.$image_shape.'"><img alt="'.$image_alt.'" src="'.$image.'"/></div>';
    endif;
    $team .= '<div class="member-name">'.$name.'</div>';
    if($designation):
        $team .= '<div class="designation">'.$designation.'</div>';
    endif;
    $team .= '</div>';
    $team .= '<div class="team-content">'.ed_content_helper($content).'</div>';
    
    $team .= '</div>';
return $team; //Return the HTML.
}
add_shortcode('ed_team', 'ed_team_shortcode');

function ed_social_shortcodes($atts){
    extract(shortcode_atts( 
        array(
            'facebook' => '',
            'twitter' => '',
            'gplus' => '',
            'linkedin' => '',
            'youtube' => '',
            'dribble' => ''
            ), $atts, 'ed_social'));

    $social = '<div class="social-shortcode">';
    if($facebook){
        $social .= '<a href="'.esc_url($facebook).'" target="_blank"><i class="fa fa-facebook"></i></a>';
    }
    if($twitter){
        $social .= '<a href="'.esc_url($twitter).'" target="_blank"><i class="fa fa-twitter"></i></a>';
    }
    if($gplus){
        $social .= '<a href="'.esc_url($gplus).'" target="_blank"><i class="fa fa-google"></i></a>';
    }
    if($linkedin){
        $social .= '<a href="'.esc_url($linkedin).'" target="_blank"><i class="fa fa-linkedin"></i></a>';
    }
    if($youtube){
        $social .= '<a href="'.esc_url($youtube).'" target="_blank"><i class="fa fa-youtube-play"></i></a>';
    }
    if($dribble){
        $social .= '<a href="'.esc_url($dribble).'" target="_blank"><i class="fa fa-dribbble"></i></a>';
    }
    $social .='</div>';
    return $social;
}
add_shortcode('ed_social', 'ed_social_shortcodes');

function ed_divider_shortcode($atts) { 
    extract(shortcode_atts( 
        array(
            'color' => '#CCCCCC',
            'style' => 'solid',
            'width' => '100%',
            'thickness' => '1px',
            'mar_top'=>'20px',
            'mar_bot'=>'20px',
            ), $atts, 'ed_divider'));
    $divider = '<div class="divider" style="margin-top:'.$mar_top.'; margin-bottom:'.$mar_bot.'; border-top:'.$thickness.' '.$style.' '.$color.';width:'.$width.'"/></div>';
    return $divider;
}
add_shortcode('ed_divider', 'ed_divider_shortcode');

function ed_spacing_shortcode($atts) { 
    extract(shortcode_atts( 
        array(
            'spacing_height' => '10px',
            ), $atts, 'ed_spacing'));
    $ed_spacing = '<hr class="ed-spacing" style="height:'.$spacing_height.'"/>';
    return $ed_spacing;
}
add_shortcode('ed_spacing', 'ed_spacing_shortcode');

function ed_accordian_shortcode($atts, $content=null){
    extract(shortcode_atts( 
        array(
            'title' => '',
            'icon' => '',
            ), $atts, 'ed_accordian'));

    if($icon){
        $icon = '<i class="fa '.$icon.'"></i>';
    }
    $accordion = '<div class="ed_accordian">';
    $accordion .='<div class="ed_accordian_title">'.$icon.' '.$title.'</div>';
    $accordion .='<div class="ed_accordian_content">'.ed_content_helper($content).'</div>';
    $accordion .='</div>';
    return $accordion;
}

add_shortcode('ed_accordian', 'ed_accordian_shortcode');

function ed_accordian_shortcode_wrap($atts, $content=null){
    extract(shortcode_atts( 
        array(
            'class' => '',
            ), $atts, 'ed_accordian_wrap'));
    return '<div class="accordion-wrap '.$class.'">'.ed_content_helper($content).'</div>';
}
add_shortcode('ed_accordian_wrap', 'ed_accordian_shortcode_wrap');

function ed_toggle_shortcode($atts, $content=null){
    extract(shortcode_atts( 
        array(
            'title' => '',
            'status' => 'close'
            ), $atts, 'ed_toggle'));

    $accordion = '<div class="ed_toggle '.$status.'">';
    $accordion .='<div class="ed_toggle_title">'.$title.'</div>';
    $accordion .='<div class="ed_toggle_content clearfix">'.ed_content_helper($content).'</div>';
    $accordion .='</div>';
    return $accordion;
}

add_shortcode('ed_toggle', 'ed_toggle_shortcode');

function ed_call_to_action_shortcode($atts, $content=null){
    extract(shortcode_atts( 
        array(
            'button_text' => 'View',
            'button_url' => '#',
            'button_align' => 'center'
            ), $atts, 'ed_call_to_action'));

    $call_to_action = '<div class="ed_call_to_action clearfix '.$button_align.'">';
    $call_to_action .='<div class="ed_call_to_action_content">'.ed_content_helper($content).'</div>';
    $call_to_action .='<a href="'.esc_url($button_url).'" class="ed_call_to_action_button">'.$button_text.'</a>';
    $call_to_action .='</div>';
    return $call_to_action;
}

add_shortcode('ed_call_to_action', 'ed_call_to_action_shortcode');

function ed_drop_cap_shortcode($atts, $content=null){
    extract(shortcode_atts( 
        array(
            'font_size' => '26',
            ), $atts, 'ed_drop_cap'));

    $drop_cap = '<span class="ed_drop_cap" style="font-size:'.$font_size.'px">';
    $drop_cap .= $content;
    $drop_cap .='</span>';
    return $drop_cap;
}

add_shortcode('ed_drop_cap', 'ed_drop_cap_shortcode');

function ed_slide_shortcode($atts, $content=null){
    extract(shortcode_atts( 
        array(
            'caption' => '',
            'link' => '#',
            'target' => '_self'
            ), $atts, 'ed_slide'));
    $image_array = explode('/',$content);
    $image_name = end($image_array);
    $image_name_array = explode('.',$image_name);
    $image_ext = end($image_name_array);
    $image_alt = str_replace('.'.$image_ext, '', $image_name);
    $ed_slide = '<div class="ed-slide">';
    if($link):
        $ed_slide .= '<a href="'.$link.'" target="'.$target.'">';
    endif;
    $ed_slide .= '<img alt="'.$image_alt.'" title="'.$caption.'" src="'.$content.'">';
    if($link):
        $ed_slide .= '</a>';
    endif;
    $ed_slide .= '</div>';
    return $ed_slide;
}

add_shortcode('ed_slide', 'ed_slide_shortcode');

function ed_slider_shortcode($atts, $content=null){
    $ed_slider = '<div class="shortcode-slider"><div class="slider_wrap">';
    $ed_slider .= ed_content_helper($content);
    $ed_slider .= '</div></div>';
    return $ed_slider;
}

add_shortcode('ed_slider', 'ed_slider_shortcode');

function ed_tab_shortcode($atts, $content=null){
    extract(shortcode_atts( 
        array(
            'title' => '',
            ), $atts, 'ed_tab'));

    $ed_tab ='<div class="ed_tab '.sanitize_title($title).'">';
    $ed_tab .='<div class="tab-title" id="'.sanitize_title($title).'">'.$title.'</div>';
    $ed_tab .= ed_content_helper($content);
    $ed_tab .='</div>';
    return $ed_tab;
}

add_shortcode('ed_tab', 'ed_tab_shortcode');

function ed_tab_wrap_shortcode($atts, $content=null){
    extract(shortcode_atts( 
        array(
            'type' => 'horizontal',
            ), $atts, 'ed_tab_group'));
    $ed_tab_wrap = '<div class="clearfix ed_tab_wrap '.$type.'">';
    $ed_tab_wrap .= ed_content_helper($content);
    $ed_tab_wrap .= '</div>';
    return $ed_tab_wrap;
}

add_shortcode('ed_tab_group', 'ed_tab_wrap_shortcode');

function ed_column_shortcode($atts, $content=null){
    extract(shortcode_atts( 
        array(
            'span' => '6',
            ), $atts, 'ed_column'));
    $ed_column = '<div class="ed_column ed-span'.$span.'">';
    $ed_column .= ed_content_helper($content);
    $ed_column .= '</div>';
    return $ed_column;
}

add_shortcode('ed_column', 'ed_column_shortcode');

function ed_column_wrap_shortcode($atts, $content=null){
    $ed_column_wrap = '<div class="clearfix ed-row">';
    $ed_column_wrap .= ed_content_helper($content);
    $ed_column_wrap .= '</div>';
    return $ed_column_wrap;
}

add_shortcode('ed_column_wrap', 'ed_column_wrap_shortcode');

function ed_list_shortcode($atts, $content=null){
    extract(shortcode_atts( 
        array(
            'list_type' => 'ed-list1',
            ), $atts, 'ed_list'));
    $ed_list = '<ul class="ed-list '.$list_type.'">';
    $ed_list .= ed_content_helper($content);
    $ed_list .= '</ul>';
    return $ed_list;
}

add_shortcode('ed_list', 'ed_list_shortcode');

function ed_li_shortcode($atts, $content=null){
    $ed_li = '<li>';
    $ed_li .= ed_content_helper($content);
    $ed_li .= '</li>';
    return $ed_li;
}

add_shortcode('ed_li', 'ed_li_shortcode');

function ed_call_to_action_with_video_sc($atts, $content = null){
    extract(shortcode_atts(
        array(
            'video_title'=>'',
            'video'=>'',
            'button_text'=>'',
            'button_url'=>'',
            ), $atts, 'ed_cta_video'));
    $cta_video_sc = '<div class="shortcode-cta-video clearfix">';
    $cta_video_sc .= '<div class="cta-wrap-left">';
    $cta_video_sc .= $video;
    $cta_video_sc .= '</div>';
    $cta_video_sc .= '<div class="cta-wrap-right">';
    $cta_video_sc .= '<div class="cta-title main-title">'.$video_title.'</div>';
    $cta_video_sc .= '<div class="cta-desc">'.ed_content_helper($content).'</div>';
    $cta_video_sc .= '<a class="bttn cta-video-btn" href="'.$button_url.'">'.$button_text.'</a>';
    $cta_video_sc .= '</div>';
    return $cta_video_sc;
    
}
add_shortcode('ed_cta_video', 'ed_call_to_action_with_video_sc');

function ed_call_to_action_with_form_sc($atts, $content = null){
    extract(shortcode_atts(
        array(
            'form_title'=>'',
            'form_desc'=>'',
            'button_text'=>'',
            'button_url'=>'',
            ), $atts, 'ed_cta_form'));
    $cta_form_sc = '<div class="shortcode-cta-form clearfix">';
    $cta_form_sc .= '<div class="cta-wrap">';
    $cta_form_sc .= '<div class="cta-form-title main-title wow fadeInUp" data-wow-delay="0.5s">'.$form_title.'</div>';
    $cta_form_sc .= '<div class="cta-form-desc wow fadeInUp" data-wow-delay="0.8s">'.$form_desc;
    $cta_form_sc .= '<a class="bttn" href="'.$button_url.'">'.$button_text.'</a>';
    $cta_form_sc .= '</div>';
    $cta_form_sc .= '<div class="cta-form wow fadeInUp" data-wow-delay="1s">'.ed_content_helper($content).'</div>';
    $cta_form_sc .= '</div>';
    $cta_form_sc .= '</div>';
    return $cta_form_sc;
    
}
add_shortcode('ed_cta_form', 'ed_call_to_action_with_form_sc');