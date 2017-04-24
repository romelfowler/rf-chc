 function td_updateMetaboxes() {
    var cur_selection = jQuery('#reviewSelector option:selected').text();

    if(cur_selection.indexOf("No") !== -1) {
            //alert('ra');
            jQuery('.rating_type').hide();
            jQuery('.review_desc').hide();

        } else {
            jQuery('.rating_type').hide();
            jQuery('.rate_' + cur_selection).show();
            jQuery('.review_desc').show();
            //alert(cur_selection);
        }
    }

    function postVideoFormat(){
        var cur_format = jQuery("input[type='radio'].post-format:checked").val();

        if(cur_format == 'video') {
            jQuery('#eightmedi_pro_post_video').show();
        } else {
            jQuery('#eightmedi_pro_post_video').hide();
        }    
    }

    function postAudioFormat(){
        var cur_format = jQuery("input[type='radio'].post-format:checked").val();

        if(cur_format == 'audio') {
            jQuery('#eightmedi_pro_post_audio').show();
        } else {
            jQuery('#eightmedi_pro_post_audio').hide();
        }    
    }

    function postGalleryFormat(){
        var cur_format = jQuery("input[type='radio'].post-format:checked").val();

        if(cur_format == 'gallery') {
            jQuery('#eightmedi_pro_post_gallery').show();
        } else {
            jQuery('#eightmedi_pro_post_gallery').hide();
        }    
    }

    function postQuoteFormat(){
        var cur_format = jQuery("input[type='radio'].post-format:checked").val();

        if(cur_format == 'quote') {
            jQuery('#eightmedi_pro_post_quote').show();
        } else {
            jQuery('#eightmedi_pro_post_quote').hide();
        }    
    } 
    jQuery(document).ready(function($) {
        td_updateMetaboxes();
        $('#reviewSelector').change(function() {
            td_updateMetaboxes();
        });
        
        /*-------------Toogle for slider posts option ----------------------*/
        if( $(".slider_type input[type='radio']:checked").val() !== 'by_category' ){
            $('#section-homepage_slider_category').hide();
        }
        $(".slider_type input[type='radio']").on('change',function(){
            if( $(this).val() !== 'by_category' ){
                $('#section-homepage_slider_category').hide('slow');
            } else{
                $('#section-homepage_slider_category').show('slow');
            }
            //$('#section-homepage_slider_category').fadeToggle('slow');
        });
        
        
        $(".section h4.group-heading").click(function() {
            $(this).next('.group-content').toggle();
            var attr_arrow = $(this).find('.heading-arrow').hasClass('side');
            if(attr_arrow==true){
                $(this).find('.heading-arrow').removeClass('side');
                $(this).find('.heading-arrow').addClass('down');
                $(this).find('.fa').removeClass('fa-angle-right');
                $(this).find('.fa').addClass('fa-angle-down');
            }
            else if(attr_arrow==false)
            {
                $(this).find('.heading-arrow').removeClass('down');
                $(this).find('.heading-arrow').addClass('side');                    
                $(this).find('.fa').removeClass('fa-angle-down');
                $(this).find('.fa').addClass('fa-angle-right');
            }                
        });
        
        /*--------------------------------Star review for post-----------------------------------------*/

        var count = $('#post_star_review_count').val();
        $('.docopy-revirew-stars').click(function(){
            count++;
            $('.product_reivew_section').append('<div class="review_section_group">'+
                '<span class="apmag_custom_label">Featured Name: </span>'+
                '<input style="width: 200px;" type="text" name="star_ratings['+count+'][feature_name]" value="" />'+
                '<select name="star_ratings['+count+'][feature_star]">'+
                '<option value="">Select rating</option>'+
                '<option value="5">5 stars</option>'+
                '<option value="4.5">4.5 stars</option>'+
                '<option value="4">4 stars</option>'+
                '<option value="3.5">3.5 stars</option>'+
                '<option value="3">3 stars</option>'+
                '<option value="2.5">2.5 stars</option>'+
                '<option value="2">2 stars</option>'+
                '<option value="1.5">1.5 stars</option>'+
                '<option value="1">1 stars</option>'+
                '<option value="0.5">0.5 stars</option>'+
                '</select>'+
                '<a href="javascript:void(0)" class="delete-review-stars button">Delete</a>'+
                '</div></div>'
                );
        });

        $(document).on('click', '.delete-review-stars', function(){
            $(this).parent('.review_section_group').remove();
        });

        /*------------------------------------Percent Review for post---------------------------------------------*/
        var pCount = $('#post_precent_review_count').val();
        $('.docopy-review_percents').click(function(){
            pCount++;
            $('.precent_review_section').append('<div class="reivew_percent_group"><span class="apmag_custom_label">Featured Name: </span>'+
                '<input style="width: 200px;" type="text" name="percent_ratings['+pCount+'][feature_name]" value="" />'+
                '- Percent:'+
                '<input style="width: 100px;" type="number" min="1" max="100" name="percent_ratings['+pCount+'][feature_percent]" value="" step="1" />'+
                '<a href="javascript:void(0)" class="delete-review-percents button">Delete</a>'+
                '</div>'
                );

        });
        $(document).on('click', '.delete-review-percents', function(){
           $(this).parent('.reivew_percent_group').remove();
       });
        /*------------------------------------Point Review for post---------------------------------------------*/
        var pointCount = $('#post_points_review_count').val();
        $('.docopy-review_points').click(function(){
            pointCount++;
            $('.point_review_section').append(' <div class="reivew_point_group"><span class="td_custom_label">Featured Name: </span>'+
                '<input style="width: 200px;" type="text" name="points_ratings['+pointCount+'][feature_name]" value=""/>'+
                '- Points: '+
                '<input style="width: 100px;" type="number" min="0.2" max="10" name="points_ratings['+pointCount+'][feature_points]" value="" step="0.1"/>'+
                '<a href="javascript:void(0)" class="delete-review-points button">Delete</a>'+
                '</div>'
                );
        });
        $(document).on('click', '.delete-review-points', function(){
           $(this).parent('.reivew_point_group').remove();
       });

        /*--------------------------Post format-----------------------------------*/

        //Display option for video section in meta box
        postVideoFormat();    
        $('input[name="post_format"]').change(function(){
           postVideoFormat();
       });

        $('#reset-post-embedurl').click(function(){
           $('input[name="post_embed_videourl"]').val(''); 
       });

    //Display option for audio section in meta box
    postAudioFormat();    
    $('input[name="post_format"]').change(function(){
       postAudioFormat();
   });
    
    //Display option for Gallery section in meta box
    postGalleryFormat();    
    $('input[name="post_format"]').change(function(){
       postGalleryFormat();
   });
    
    //Display option for Quote section in meta box
    postQuoteFormat();    
    $('input[name="post_format"]').change(function(){
       postQuoteFormat();
   });
    
    $('#post_audio_upload_button').on('click' , function(e) {
        e.preventDefault();
        var $this = $(this);
        var audio = wp.media({ 
            title: 'Upload Audio',
				// mutiple: true if you want to upload multiple files at once
				multiple: false
            }).open()
        .on('select', function(e){
				// This will return the selected audio from the Media Uploader, the result is an object
				var uploaded_audio = audio.state().get('selection').first();
				// We convert uploaded_audio to a JSON object to make accessing it easier
				// Output to the console uploaded_audio
				var audio_url = uploaded_audio.toJSON().url;
				// Let's assign the url value to the input field
				$this.prev('input').val(audio_url);
				//$this.next('#post_media_image_preview').show();
				//$this.next('#post_media_image_preview').find('img').attr('src', audio_url);
            });
        $('#audiourl_remove').show();
    });
    
    $('#audiourl_remove').click(function(){
       $('input[name="post_embed_audiourl"]').val(''); 
   });
    
    /*----------------------Post format for gallery------------------*/
    // Media Gallery Home
    $(document).on('click','.docopy-post_image', function(e) {
        counter_gallery = $('#post_image_count').val();   
        var dis = $(this);
        var send_attachment_bkp = wp.media.editor.send.attachment;
        _custom_media = true;
        wp.media.editor.send.attachment = function(props, attachment){
          if ( _custom_media ) {
            console.log(attachment.url);
            img = attachment.url;
            $('.post_image_section').append('<div class="gal-img-block"><div class="gal-img"><img src="'+img+'" height="150px" width="150px"/><span class="fig-remove">Remove</span></div><input type="hidden" name="post_images['+counter_gallery+']" class="hidden-media-gallery" value="'+attachment.url+'" /></div>');
            counter_gallery++;
            $('#post_image_count').val(counter_gallery);                
        } else {
            return _orig_send_attachment.apply( this, [props, attachment] );
        };
    }

    wp.media.editor.open($(this));
    return false;
    });

    // Remove Media Gallery Image
    $(document).on('click','.fig-remove',function() {   
        $(this).parent().parent().remove();
    });
}); //doc close


 jQuery(document).ready(function($) {

 $(document).on('click', '.ed-font-group li', function(){
   $('.ed-font-group li').removeClass();
   $(this).addClass('selected');
   var aa = $(this).parents('#ed-font-awesome-list').find('.ed-font-group li.selected').children('i').attr('class');
   $(this).parents('#ed-font-awesome-list').siblings('p').find('.hidden-icon-input').val(aa);
   $(this).parents('#ed-font-awesome-list').siblings('p').find('.icon-receiver').html('<i class="'+aa+'"></i>');
   return false;
});
 $('#upload-btn').click(function(){
  $('#optionsframework form').attr('action','');
});

 $("select#body_typography_face, select#h1_typography_face, select#h2_typography_face, select#h3_typography_face, select#h4_typography_face, select#h5_typography_face, select#h6_typography_face").change(function() {
    var val2 = $("select#body_typography_face").val();
    var val3 = $("select#h1_typography_face").val();
    var val4 = $("select#h2_typography_face").val();
    var val5 = $("select#h3_typography_face").val();
    var val6 = $("select#h4_typography_face").val();
    var val7 = $("select#h5_typography_face").val();
    var val8 = $("select#h6_typography_face").val();


        //$("#fontstyle1").text('#menu_typography { font-size: 16px; font-family: "' + val1 + '" !important; }');
        $("#fontstyle2").text('#body_typography { font-size: 16px; font-family: "' + val2 + '" !important; }');
        $("#fontstyle3").text('#h1_typography { font-size: 16px; font-family: "' + val3 + '" !important; }');
        $("#fontstyle4").text('#h2_typography { font-size: 16px; font-family: "' + val4 + '" !important; }');
        $("#fontstyle5").text('#h3_typography { font-size: 16px; font-family: "' + val5 + '" !important; }');
        $("#fontstyle6").text('#h4_typography { font-size: 16px; font-family: "' + val6 + '" !important; }');
        $("#fontstyle7").text('#h5_typography { font-size: 16px; font-family: "' + val7 + '" !important; }');
        $("#fontstyle8").text('#h6_typography { font-size: 16px; font-family: "' + val8 + '" !important; }');
        //$("#fontstyle9").text('#footertitle_typography { font-size: 16px; font-family: "' + val9 + '" !important; }');
//        $("#fontstyle10").text('#widgettitle_typography { font-size: 16px; font-family: "' + val10 + '" !important; }');

WebFont.load({
    google: {
        families: [ val2, val3, val4, val5, val6, val7, val8]
    }
});
});

$(document).on('click', '.ed-font-group li', function() {
    $('.ed-font-group li').removeClass();
    $(this).addClass('selected');
    var aa = $(this).parents('#ed-font-awesome-list').find('.ed-font-group li.selected').children('i').attr('class');
    $(this).parents('#ed-font-awesome-list').siblings('p').find('.hidden-icon-input').val(aa);
    $(this).parents('#ed-font-awesome-list').siblings('p').find('.icon-receiver').html('<i class="' + aa + '"></i>');
    return false;
});

$("#demo_import").click(function (){
    $import_true = confirm('Are you sure to import dummy content ? It will overwrite the existing data.');
    if($import_true == false) return;
    var imp = $(this).next('div');
    imp.addClass('demo-loading');

    $(".import-message").html("The Demo Contents are Loading. It might take a while. Please keep patience.");
    $("#demo_import").fadeOut();
    $.ajax({
     url: ajaxurl,
     data: ({
        'action': 'eightmedi_pro_demo_import',            
    }),
     success: function(response){
        imp.removeClass('demo-loading');
        alert("Demo Contents Successfully Imported");
        location.reload();
    }
});
});//demo close

});//doc close


function media_upload(button_class) {

    jQuery('body').on('click', button_class, function(e) {
        var button_id ='#'+jQuery(this).attr('id');
        var display_field = jQuery(this).parent().children('input:text');
        var _custom_media = true;

        wp.media.editor.send.attachment = function(props, attachment){

            if ( _custom_media  ) {
                if(typeof display_field != 'undefined'){
                    switch(props.size){
                        case 'full':
                        display_field.val(attachment.sizes.full.url);
                        display_field.trigger('change');
                        break;
                        case 'medium':
                        display_field.val(attachment.sizes.medium.url);
                        display_field.trigger('change');
                        break;
                        case 'thumbnail':
                        display_field.val(attachment.sizes.thumbnail.url);
                        display_field.trigger('change');
                        break;
                        case 'eightmedi_pro_team':
                        console.log(attachment.sizes);
                        display_field.val(attachment.sizes.eightmedi_pro_team.url);
                        display_field.trigger('change');
                        break
                        case 'eightmedi_pro_services':
                        display_field.val(attachment.sizes.eightmedi_pro_services.url);
                        display_field.trigger('change');
                        break
                        case 'eightmedi_pro_customers':
                        display_field.val(attachment.sizes.eightmedi_pro_customers.url);
                        display_field.trigger('change');
                        break;
                        default:
                        display_field.val(attachment.url);
                        display_field.trigger('change');
                    }
                }
                _custom_media = false;
            } else {
                return wp.media.editor.send.attachment( button_id, [props, attachment] );
            }
        }
        wp.media.editor.open(button_class);
        window.send_to_editor = function(html) {

        }
        return false;
    });
}