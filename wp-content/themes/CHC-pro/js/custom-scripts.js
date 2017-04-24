/**
 * Custom Javascript codes
 */

 ( function( $ ) {

 	//alert(SliderData.speed);
 	$('#home-slider .em-slider').bxSlider({
 		mode: SliderData.mode,
 		controls: SliderData.controls,
 		speed: SliderData.speed,
 		pause: SliderData.pause,
 		pager: SliderData.pager,
 		auto : SliderData.auto
 	});

 	$('.header-search > .fa-search').click(function(){
 		$('.header-search .search-form').slideToggle();
 	});

    //if($("body").hasClass("sticky-header")){
        var toppos = $(".top-header").height();
        $(window).scroll(function(){
            if($(window).scrollTop() > toppos+16){
                $('.sticky-header').addClass('fixed');
                //$('.site_construction').css({'height': '100px'});
            }else{
                $('.sticky-header').removeClass('fixed');
                //$('.site_construction').css({'height': '0'});
            }
        }).scroll();
    //}
    //Construction header information
    $('i.construction_icon').on('click', function() {
      $('.site_construction').animate({'height': '0'});
      $(this).css({
        'transform' : 'rotate(45deg)',
        '-webkit-transform' : 'rotate(45deg)',
        '-ms-transform' : 'rotate(45deg)'
      })
    });


    var winwidth = $(window).width();
    if(winwidth >= 1097){var mslide = 2; slidew = 500;}
    else if(winwidth <= 1096 && winwidth >= 801){var mslide = 2; slidew = 300;}
    else if(winwidth <= 800 && winwidth >= 641){var mslide = 2; slidew = 400;}
    else if(winwidth <= 640 && winwidth >=320){var mslide = 1; slidew = 500;}

    $('.team-slider').bxSlider({
       pager:false,
       auto:true,
       moveSlides:1,
       minSlides: mslide,
       maxSlides: mslide,
       slideWidth: slidew,
       slideMargin: 29
   });

    $('#type-date input').attr('type','date');
    var winwidth = $(window).width();
    if(winwidth >= 641){var mslide = 2; slidew = 590;}
 	//else if(winwidth <= 768 && winwidth > 640){var mslide = 2; slidew = 350;}
 	else if(winwidth <= 640){var mslide = 1; slidew = 580;}

 	$('.testimonial-wrap').bxSlider({
 		pager:false,
 		auto:true,
 		moveSlides:1,
 		minSlides: mslide,
 		maxSlides: mslide,
 		slideWidth: slidew,
 		slideMargin: 29
 	});


 	if(winwidth >= 981){var mslide = 5; slidew = 240;}
 	else if(winwidth <= 980 && winwidth >= 801){var mslide = 3; slidew = 500;}
 	else if(winwidth <= 800 && winwidth >= 641){var mslide = 2; slidew = 240;}
 	else if(winwidth <= 640 && winwidth >=320){var mslide = 1; slidew = 300;}

 	$('.sponsors-wrap').bxSlider({
 		pager:false,
 		auto:true,
 		moveSlides:1,
 		minSlides: 1,
 		maxSlides: mslide,
 		slideWidth: slidew,
 		slideMargin: 29
 	});

    if(winwidth <= 980){
        $('.menu-item-has-children, .page_item_has_children').append('<span class="sub-click"><i class="fa fa-caret-down"></i></span>');
    }
    $('body').on('click','.toggled .menu-item-has-children .sub-click, .toggled .page_item_has_children .sub-click',function(){
        $(this).siblings('ul').slideToggle('slow');
    });

    $('#es-top').css('right', -65);
    $(window).scroll(function () {
       if ($(this).scrollTop() > 300) {
        $('#es-top').css('right', 20);
    } else {
        $('#es-top').css('right', -65);
    }
});

    $("#es-top").click(function () {
       $('html,body').animate({scrollTop: 0}, 600);
   });

    $(document).on('click', 'a.home-slider-pointer', function(event){
 		//console.log($.attr(this, 'href').indexOf('#'));
 		if($.attr(this, 'href').indexOf('#')==0){
 			event.preventDefault();

 			$('html, body').animate({
 				scrollTop: $( $.attr(this, 'href') ).offset().top
 			}, 600);
 		}
 	});

    $(".gallery-item a").fancybox();
    new WOW().init();

    $('.faqs-single-title').click(function(){
       $(this).siblings().slideToggle();
       if($(this).hasClass('collapse')){
        $(this).find('.faq-symbol').html('+');
        $(this).removeClass('collapse').addClass('expand');
    }else{
        $(this).find('.faq-symbol').html('-');
        $(this).removeClass('expand').addClass('collapse');
    }
});


 	//Added for widgets
 	//new added
 	$('.ed-toggle-title.open span i').text('-');
 	$('.ed-toggle-title.close span i').text('+');
 	$('.ed-toggle-title.close').next('.ed-toggle-content').hide();
 	$('.ed-toggle-title').click(function(){
 		$(this).next('.ed-toggle-content').slideToggle();
 		if($(this).hasClass('open')){
 			$(this).find('span i').text('+');
 			$(this).removeClass('open').addClass('close');
 		}else{
 			$(this).find('span i').text('-');
 			$(this).removeClass('close').addClass('open');
 		}
 	});

 	/** js for to hide and show faq */
 	$('.faqs .faq-answer').hide();
 	$('.faq-question').click(function(){
 		$(this).next('.faq-answer').slideToggle();
 		$(this).toggleClass('active');
 	})  ;

 	/** Widgets Progress Bar **/
 	$('.ed-progress-bar').each(function(){
 		$(this).waypoint(function() {
 			var progressWidth = $(this).find('.ed-progress-bar-percentage').data('width')+'%';
 			$(this).find('.ed-progress-bar-percentage').animate({width:progressWidth},2000);
 		}, { offset: '80%' });
 	});

 	/** Short Codes Js */
    //slider shortcode
    $('.shortcode-slider .slider_wrap').bxSlider();

    $('.ed_toggle.close .ed_toggle_content').hide();
    $('.ed_toggle_title').click(function(){
    	if($(this).parent('div').hasClass('close')){
    		$(this).parent('div').removeClass('close').addClass('open');
    	}else{
    		$(this).parent('div').removeClass('open').addClass('close');
    	}
    	$(this).next('.ed_toggle_content').slideToggle();
    });


    $('.ed_tab_wrap').prepend('<div class="ed_tab_group clearfix"></div>');

    $('.ed_tab_wrap').each(function(){
    	$(this).children('.ed_tab').find('.tab-title').prependTo($(this).find('.ed_tab_group'));
    	$(this).children('.ed_tab').wrapAll( "<div class='ed_tab_content' />");
    });

    $('#page').each(function(){
    	$(this).find('.ed_tab:first-child').show();
    	$(this).find('.tab-title:first-child').addClass('active')
    });


    $('.ed_tab_group .tab-title').click(function(){
    	$(this).siblings().removeClass('active');
    	$(this).addClass('active');
    	$(this).parent('.ed_tab_group ').next('.ed_tab_content').find('.ed_tab').hide();
    	var ed_id = $(this).attr('id');
    	$(this).parent('.ed_tab_group ').next('.ed_tab_content').find('.'+ed_id).show();
    });

    //Счиаем наши загаловки
    var head_col_count =  $('table.plans-wrap thead tr th').size();
    //alert(head_col_count);
    //Считаем наши th элементы в таблице
    for ( j=0; j <= head_col_count; j++ )  {
        // Работа с текстом
        var head_col_price = $('table.plans-wrap thead tr th:nth-child('+ j +') .plan-price').text();
        var head_col_title = $('table.plans-wrap thead tr th:nth-child('+ j +') .plan-title').text();
        //Каждому td присваиваем data-title, который потом выводим через css

        if(j==1){
        	$('table.plans-wrap tbody tr td:nth-child('+ j +')').replaceWith(function(){
        		return $('<td class="column-'+j+'" data-title="Plan Feature">').append($(this).contents());
        	});
        }else{
        	$('table.plans-wrap tbody tr td:nth-child('+ j +')').replaceWith(
        		function(){
        			return $('<td class="column-'+j+'" data-title="'+ head_col_title + " " + head_col_price +'">').append($(this).contents());
        		}
        		);
        }
    }

    if($("body").hasClass('sticky-header')){
    	var topPoss = $(".logo-ad-wrapper").height();
    	var topPosss = $("body.sticky-header").offset().top;
    	var topPos = parseInt(topPoss) + parseInt(topPosss);
    	$(window).scroll(function(){
    		if($(window).scrollTop() > topPos){
    			$('.sticky-menu').addClass('fixed');
    		}else{
    			$('.sticky-menu').removeClass('fixed');
    		}
    	}).scroll();
    }

    $(".wdgt-slide").bxSlider({
    	controls:true,
    	pager:true,
    	auto:true
    });


    // Widget tabbed
    $('.eightmedi-pro-cat-tabs').each(function(){
    	$(this).find('.cat-tab:first').addClass('active');
    });

    $('.eightmedi-pro-tabbed-wrapper').each(function(){
    	$(this).find('.eightmedi-pro-tabbed-section:first').show();
    });

    $('#eightmedi-pro-widget-tabbed li a').click(function(event) {
    	var tabId = $(this).attr('id');
    	$('.eightmedi-pro-tabbed-section').hide();
    	$('#section-'+tabId).show();
    	$('.cat-tab').removeClass('active');
    	$(this).parent('li').addClass('active');
    });

} )( jQuery );


jQuery('document').ready(function(){
    jQuery('.menu-menu-1-container').show();




});
