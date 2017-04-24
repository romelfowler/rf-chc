<?php

add_action('wp_head' , 'dynamic_style');
function dynamic_style(){

    $theme_color = get_theme_mod('eightmedi_pro_theme_primary_color','#2b96cc');/*primary color*/
    $theme_color1 = get_theme_mod('eightmedi_pro_theme_primary_hover_color','#0173ac');/*hover color*/
    $theme_color2 = hex2rgba($theme_color1,0.9);

    //$light_theme_color = eightmedi_pro_get_difference_two_color($theme_color,'155,86,51,1');
    //$light_theme_color = eightmedi_pro_get_difference_two_color($theme_color,'19,174,15,1');

    $light_theme_color = hex2rgba($theme_color,0.3);;
    $dark_theme_color = hex2rgba($theme_color,0.6);;
    $btn_color = get_theme_mod('eightmedi_pro_slider_cta_btn_color', '#cc444d');

    $eightmedi_pro_css = "";

    /** Theme Color */
    $eightmedi_pro_css .= " .header-search > .fa:hover, .latest-news a:hover, .latest-news .news-single-title a:hover, .cta-wrap-right .cta-video-btn:hover, .cta-form-desc a.bttn:hover, .widget ul li a:hover, .ed_call_to_action .ed_call_to_action_button:hover, #es-top:hover::after, .callto-right .cta a:hover, .main-navigation .nav-menu li:hover a, .main-navigation .nav-menu li.current-menu-item a, .main-navigation .nav-menu li.current_page_item a {
        color : ".$theme_color1 ." ;
    }\n";
    $eightmedi_pro_css .= " .main-navigation .nav-menu > li.menu-item-has-children::before, .btn-archive:hover::after, .ed_tab_wrap.vertical .tab-title.active::after, .entry-footer .cat-links a:hover, .entry-footer .comments-link a:hover, .entry-meta a:hover {
        border-bottom-color : ".$theme_color ." ;
    }\n";
    $eightmedi_pro_css .= " .top-header, a.caption-read-more, .featured-block, .bx-wrapper .bx-pager.bx-default-pager a, .appointment .ufbl-form-wrapper form input.ufbl-form-submit, a.btn, .widget_eightmedi_pro_icon_text .ed-icon-text .ed-icon-text-readmore .bttn, .about .about-content, .team-slider-wrap .bx-wrapper a.bx-prev, .team-slider-wrap .bx-wrapper a.bx-next, .call-to-action, .latest-news .news-date, .faqs-block .faqs-single-title:hover, .faqs-block .faqs-single-title.expand, .call-to-action-small figure::before, .footer-wrap, .team-slider .team-hover, .header-search .search-submit:hover, button, input[type='button'], input[type='reset'], input[type='submit'], .doctor-block-wrapper .doctor-social > a:hover, .error-404 input.search-submit, .nav-links a, .search-no-results input.search-submit, .social-shortcode a::after, .ed_toggle .ed_toggle_title, .ed-toggle-title, .ed_call_to_action .ed_call_to_action_button {
        background-color : ".$theme_color ." ;
    }\n";
    $eightmedi_pro_css .= " a.caption-read-more:hover, .featured-block.featured-post-2, .featured-block.featured-post-4, .bx-wrapper .bx-pager.bx-default-pager a:hover, .bx-wrapper .bx-pager.bx-default-pager a.active, .appointment .ufbl-form-wrapper form input.ufbl-form-submit:hover, a.btn:hover, .widget_eightmedi_pro_icon_text .ed-icon-text .ed-icon-text-readmore .bttn:hover, .team-slider-wrap .bx-wrapper .bx-prev:hover, .team-slider-wrap .bx-wrapper .bx-next:hover, .latest-news figure.news-image:hover .news-date, .main-footer, .main-navigation .nav-menu .sub-menu li.current-menu-item a, .main-navigation .nav-menu .sub-menu li.current_page_item a, .main-navigation .nav-menu .children li.current-menu-item a, .main-navigation .nav-menu .children li.current_page_item a, button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover, .error-404 input.search-submit:hover, .nav-links a:hover, .search-no-results input.search-submit:hover, .ed_toggle.open .ed_toggle_title, .ed-toggle-title.open, .ed_toggle .ed_toggle_title:hover, .ed-toggle-title:hover, span.sub-click {
        background-color : ".$theme_color1 ." ;
    }\n";
    $eightmedi_pro_css .= " .main-navigation .nav-menu li .sub-menu li a, .main-navigation .nav-menu li .children li a, .latest-news a::after, .cta-wrap-right .cta-video-btn:hover::after, .cta-form-desc a.bttn:hover:after {
        border-bottom-color : ".$theme_color1 ." ;
    }\n";
    $eightmedi_pro_css .= " a.caption-read-more, .appointment .ufbl-form-wrapper form input.ufbl-form-submit, a.btn, .widget_eightmedi_pro_icon_text .ed-icon-text .ed-icon-text-readmore .bttn, button, input[type='button'], input[type='reset'], input[type='submit'] {
        box-shadow : 0 0 0 0 ".$theme_color1.";
    }\n";
    $eightmedi_pro_css .= " a.caption-read-more:hover, .appointment .ufbl-form-wrapper form input.ufbl-form-submit:hover, a.btn:hover, .widget_eightmedi_pro_icon_text .ed-icon-text .ed-icon-text-readmore .bttn:hover, button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover {
        box-shadow : 0 0 0 5px ".$theme_color1.";
    }\n";
    $eightmedi_pro_css .= " .home-slider-pointer .fa, .header-search .search-submit, .entry-footer .cat-links a, .entry-footer .comments-link a, .entry-header > a:hover, .btn-archive:hover, .entry-meta a, h2.error-404-title, #ed-breadcrumbs a:hover, #es-top::after {
        color : ".$theme_color." ;
    }\n ";
    $eightmedi_pro_css .= " .about .btn, .call-to-action .cta-link a, .call-to-action-small .cta-link-small a {
        background-color : ".$theme_color1.";
        box-shadow : 0 0 0 0 ".$theme_color1.";
    }\n ";
    $eightmedi_pro_css .= " .about .btn:hover, .call-to-action .cta-link a:hover, .call-to-action-small .cta-link-small a:hover {
        border-color : ".$theme_color." ;
        box-shadow : 0 0 0 5px ".$theme_color1.";
    }\n ";

    $eightmedi_pro_css .= " .our-testimonial::after {
        background : ". $theme_color2 .";
    }\n ";
    $eightmedi_pro_css .= " .header-search .search-submit:hover, .search-no-results input.search-submit, .ed_call_to_action .ed_call_to_action_button {
        border-color : ". $theme_color .";
    }\n ";

    $eightmedi_pro_css .= " .sidebar .widget-title, .sidebar .sidebar-title {
        background-color : ". $light_theme_color .";
    }\n ";

    $eightmedi_pro_css .= " .sidebar .widget-title::after, .sidebar .sidebar-title::after {
        border-bottom-color : ". $dark_theme_color .";
    }\n ";
    $eightmedi_pro_css .= " .category-news article:hover figure {
        border-color : ". $dark_theme_color .";
    }\n ";
    $eightmedi_pro_css .= " a.home-slider-pointer.cta-btn {
        background : ". $btn_color .";
    }\n ";
    $eightmedi_pro_css .= " .search-no-results input.search-submit:hover, .ed_call_to_action .ed_call_to_action_button:hover {
        border-color : ". $theme_color1 .";
    }\n ";
    $eightmedi_pro_css .= " .ed_tab_wrap.vertical .tab-title.active::before {
        border-right-color : ". $theme_color .";
    }\n ";
    $eightmedi_pro_css .= " span.sub-click:hover {
        background : ". $theme_color2 .";
    }\n ";

    $eightmedi_pro_css .= " @media screen and (max-width: 980px) {\n ";
        $eightmedi_pro_css .= " .main-navigation .nav-menu > li.menu-item-has-children:hover::after, .main-navigation .nav-menu > li.current-menu-item.menu-item-has-children::after, .main-navigation .nav-menu > li.current_page_item.menu-item-has-children::after {
            color : ". $light_theme_color .";
        }\n ";

        $eightmedi_pro_css .= " .main-navigation .nav-menu li .sub-menu, .main-navigation .nav-menu li .children {
            background : ". $theme_color1 .";
        }\n ";

        $eightmedi_pro_css .= " .main-navigation .nav-menu li .sub-menu li a:hover, .main-navigation .nav-menu li .children li a:hover {
            color : ". $theme_color .";
        }\n ";
    $eightmedi_pro_css .= " }\n ";



    /*Typography*/
    /* === <p> === */
    $p_font_family = get_theme_mod( 'p_font_family','Open Sans');
    $p_font_stylefull = get_theme_mod( 'p_font_style');
    $p_font_style_weight = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$p_font_stylefull);
    $p_font_style = "";
    $p_font_weight = "";
    if(count($p_font_style_weight)>1){
        $p_font_style = $p_font_style_weight[1];
        $p_font_weight = $p_font_style_weight[0];
    }
    $p_text_decoration = get_theme_mod( 'p_text_decoration');
    $p_text_transform = get_theme_mod( 'p_text_transform');
    $p_font_size = get_theme_mod( 'p_font_size','20px');
    $p_line_height = get_theme_mod( 'p_line_height','1.5');
    $p_color = get_theme_mod( 'p_color','#000000');

    $eightmedi_pro_css .= " body p {
        font-family : ".$p_font_family ." ;
        font-style : ".$p_font_style ." ;
        font-weight : ".$p_font_weight ." ;
        text-decoration : ".$p_text_decoration ." ;
        text-transform : ".$p_text_transform ." ;
        font-size : ".$p_font_size ."px ;
        line-height : ".$p_line_height ." ;
        color : ".$p_color ." ;
    }\n";

    /* === <h1> === */
    $h1_font_family = get_theme_mod( 'h1_font_family','Open Sans');
    $h1_font_stylefull = get_theme_mod( 'h1_font_style');
    $h1_font_style_weight = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$h1_font_stylefull);
    $h1_font_style = "";
    $h1_font_weight = "";
    if(count($h1_font_style_weight)>1){
        $h1_font_style = $h1_font_style_weight[1];
        $h1_font_weight = $h1_font_style_weight[0];
    }
    $h1_text_decoration = get_theme_mod( 'h1_text_decoration');
    $h1_text_transform = get_theme_mod( 'h1_text_transform');
    $h1_font_size = get_theme_mod( 'h1_font_size','16px');
    $h1_line_height = get_theme_mod( 'h1_line_height','1.5');
    $h1_color = get_theme_mod( 'h1_color','#2e8ecb');

    $eightmedi_pro_css .= " body h1 {
        font-family : ".$h1_font_family ." ;
        font-style : ".$h1_font_style ." ;
        font-weight : ".$h1_font_weight ." ;
        text-decoration : ".$h1_text_decoration ." ;
        text-transform : ".$h1_text_transform ." ;
        font-size : ".$h1_font_size ."px ;
        line-height : ".$h1_line_height ." ;
        color : ".$h1_color ." ;
    }\n";

    /* === <h2> === */
    $h2_font_family = get_theme_mod( 'h2_font_family','Open Sans');
    $h2_font_stylefull = get_theme_mod( 'h2_font_style');
    $h2_font_style_weight = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$h2_font_stylefull);
    $h2_font_style = "";
    $h2_font_weight = "";
    if(count($h2_font_style_weight)>1){
        $h2_font_style = $h2_font_style_weight[1];
        $h2_font_weight = $h2_font_style_weight[0];
    }
    $h2_text_decoration = get_theme_mod( 'h2_text_decoration');
    $h2_text_transform = get_theme_mod( 'h2_text_transform');
    $h2_font_size = get_theme_mod( 'h2_font_size','16px');
    $h2_line_height = get_theme_mod( 'h2_line_height','1.5');
    $h2_color = get_theme_mod( 'h2_color','#2e8ecb');

    $eightmedi_pro_css .= " body h2 {
        font-family : ".$h2_font_family ." ;
        font-style : ".$h2_font_style ." ;
        font-weight : ".$h2_font_weight ." ;
        text-decoration : ".$h2_text_decoration ." ;
        text-transform : ".$h2_text_transform ." ;
        font-size : ".$h2_font_size ."px ;
        line-height : ".$h2_line_height ." ;
        color : ".$h2_color ." ;
    }\n";

    /* === <h3> === */
    $h3_font_family = get_theme_mod( 'h3_font_family','Open Sans');
    $h3_font_stylefull = get_theme_mod( 'h3_font_style');
    $h3_font_style_weight = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$h3_font_stylefull);
    $h3_font_style = "";
    $h3_font_weight = "";
    if(count($h3_font_style_weight)>1){
        $h3_font_style = $h3_font_style_weight[1];
        $h3_font_weight = $h3_font_style_weight[0];
    }
    $h3_text_decoration = get_theme_mod( 'h3_text_decoration');
    $h3_text_transform = get_theme_mod( 'h3_text_transform');
    $h3_font_size = get_theme_mod( 'h3_font_size','16px');
    $h3_line_height = get_theme_mod( 'h3_line_height','1.5');
    $h3_color = get_theme_mod( 'h3_color','#2e8ecb');

    $eightmedi_pro_css .= " body h3 {
        font-family : ".$h3_font_family ." ;
        font-style : ".$h3_font_style ." ;
        font-weight : ".$h3_font_weight ." ;
        text-decoration : ".$h3_text_decoration ." ;
        text-transform : ".$h3_text_transform ." ;
        font-size : ".$h3_font_size ."px ;
        line-height : ".$h3_line_height ." ;
        color : ".$h3_color ." ;
    }\n";

    /* === <h4> === */
    $h4_font_family = get_theme_mod( 'h4_font_family','Open Sans');
    $h4_font_stylefull = get_theme_mod( 'h4_font_style');
    $h4_font_style_weight = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$h4_font_stylefull);
    $h4_font_style = "";
    $h4_font_weight = "";
    if(count($h4_font_style_weight)>1){
        $h4_font_style = $h4_font_style_weight[1];
        $h4_font_weight = $h4_font_style_weight[0];
    }
    $h4_text_decoration = get_theme_mod( 'h4_text_decoration');
    $h4_text_transform = get_theme_mod( 'h4_text_transform');
    $h4_font_size = get_theme_mod( 'h4_font_size','16px');
    $h4_line_height = get_theme_mod( 'h4_line_height','1.5');
    $h4_color = get_theme_mod( 'h4_color','#2e8ecb');

    $eightmedi_pro_css .= " body h4 {
        font-family : ".$h4_font_family ." ;
        font-style : ".$h4_font_style ." ;
        font-weight : ".$h4_font_weight ." ;
        text-decoration : ".$h4_text_decoration ." ;
        text-transform : ".$h4_text_transform ." ;
        font-size : ".$h4_font_size ."px ;
        line-height : ".$h4_line_height ." ;
        color : ".$h4_color ." ;
    }\n";

    /* === <h5> === */
    $h5_font_family = get_theme_mod( 'h5_font_family','Open Sans');
    $h5_font_stylefull = get_theme_mod( 'h5_font_style');
    $h5_font_style_weight = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$h5_font_stylefull);
    $h5_font_style = "";
    $h5_font_weight = "";
    if(count($h5_font_style_weight)>1){
        $h5_font_style = $h5_font_style_weight[1];
        $h5_font_weight = $h5_font_style_weight[0];
    }
    $h5_text_decoration = get_theme_mod( 'h5_text_decoration');
    $h5_text_transform = get_theme_mod( 'h5_text_transform');
    $h5_font_size = get_theme_mod( 'h5_font_size','16px');
    $h5_line_height = get_theme_mod( 'h5_line_height','1.5');
    $h5_color = get_theme_mod( 'h5_color','#2e8ecb');

    $eightmedi_pro_css .= " body h5 {
        font-family : ".$h5_font_family ." ;
        font-style : ".$h5_font_style ." ;
        font-weight : ".$h5_font_weight ." ;
        text-decoration : ".$h5_text_decoration ." ;
        text-transform : ".$h5_text_transform ." ;
        font-size : ".$h5_font_size ."px ;
        line-height : ".$h5_line_height ." ;
        color : ".$h5_color ." ;
    }\n";

    /* === <h5> === */
    $h6_font_family = get_theme_mod( 'h6_font_family','Open Sans');
    $h6_font_stylefull = get_theme_mod( 'h6_font_style');
    $h6_font_style_weight = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$h6_font_stylefull);
    $h6_font_style = "";
    $h6_font_weight = "";
    if(count($h6_font_style_weight)>1){
        $h6_font_style = $h6_font_style_weight[1];
        $h6_font_weight = $h6_font_style_weight[0];
    }
    $h6_text_decoration = get_theme_mod( 'h6_text_decoration');
    $h6_text_transform = get_theme_mod( 'h6_text_transform');
    $h6_font_size = get_theme_mod( 'h6_font_size','16px');
    $h6_line_height = get_theme_mod( 'h6_line_height','1.5');
    $h6_color = get_theme_mod( 'h6_color','#2e8ecb');

    $eightmedi_pro_css .= " body h6 {
        font-family : ".$h6_font_family ." ;
        font-style : ".$h6_font_style ." ;
        font-weight : ".$h6_font_weight ." ;
        text-decoration : ".$h6_text_decoration ." ;
        text-transform : ".$h6_text_transform ." ;
        font-size : ".$h6_font_size ."px ;
        line-height : ".$h6_line_height ." ;
        color : ".$h6_color ." ;
    }\n";


    echo '<style type="text/css" id="dynamic-styles">';
    echo $eightmedi_pro_css;
    echo '</style>';

}
?>
