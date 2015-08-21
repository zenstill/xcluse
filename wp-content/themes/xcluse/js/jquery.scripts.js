/**
 * @copyright   Copyright (c) 2015 AccessShop Themes (http://www.accessshopthemes.com)
 */

// This is important!
jQuery.noConflict();
function toggleMenu(el, over)
{
    if (over) {
        Element.addClassName(el, 'over');
    }
    else {
        Element.removeClassName(el, 'over');
    }
}
function scrollToAnchor(aid){
    var aTag = jQuery("a[name='"+ aid +"']");
    jQuery('html,body').animate({scrollTop: aTag.offset().top},1200);
}
(function($){
    $(document).ready(function() {
        
    //For Dropdown mEnu
    $('.nav-bar').find('.parent').hover(function(){
        $(this).children('div').addClass('showmenu');
    },function() {
        $(this).children('div').removeClass('showmenu');
    });
    /*$('.nav-bar').find('.parent.default').hover(function(){
        $(this).find('div').addClass('showmenu');
    },function() {
        $(this).find('div').removeClass('showmenu');
    });*/
    
    /*$('.nav-bar a.level-top').addClass('dropdown-toggle');
    $('.nav-bar li.parent ul').addClass('dropdown-menu');
    $('.nav-bar li.level1 ul').wrap('<li class="dropdown-submenu"/>');
    $('.nav-bar ul.nav li.level0.dropdown').hover(function() {
        $(this).find('.level0.dropdown-menu').stop(true, true).fadeIn();
    }, function() {
        $(this).find('.level0.dropdown-menu').stop(true, true).fadeOut();
    });
    $('.nav-bar ul.nav li.level1.dropdown').hover(function() {
        $(this).find('.level1.dropdown-menu').stop(true, true).fadeIn();
    }, function() {
        $(this).find('.level1.dropdown-menu').stop(true, true).fadeOut();
    });*/
    $('.language-sub').hide();
    $('.current-language, .language-sub').hover(function() {
        $(this).find('.language-sub').stop(true, true).slideDown();
    }, function() {
        $(this).find('.language-sub').stop(true, true).slideUp();
    });
    
    //Main Banner Slider
    var options = {
        nextButton: true,
        prevButton: true,
        pagination: true,
        animateStartingFrameIn: true,
        autoPlay: true,
        autoPlayDelay: 3000
    };
    
    var mySequence = $("#sequence").sequence(options).data("sequence");
        
    $('.carousel').each(function(i,el){
        var wid = $('.col-main').width();
        //console.log(wid);
        if(wid>=1200){var minslides = 5;}else if(wid>850 && wid<1200){var minslides = 4;}else{var minslides = 1;}
        $(el).carouFredSel({
            auto:false,
            responsive: true,
            width: '100%',
            height: 380,
            scroll: {
                items: 1,
                fx: 'scroll',
                easing: 'cubic'
            },
            prev: $(el).data('carouselPrev'),
            next: $(el).data('carouselNext'),
            items: {
                //  width: 400,
                //  height: '30%',  //  optionally resize item-height
                visible: {
                    min: minslides,
                    max: 5
                }
            },
            swipe: {
                onTouch: true,
                onMouse: true
              }
        });
    });
    
    
    $('.brands .carousel').each(function(i,el){
        $(el).carouFredSel({
            auto:false,
            responsive: true,
            width: '100%',
            scroll: 1,
            prev: $(el).data('carouselPrev'),
            next: $(el).data('carouselNext'),
            items: {
                //  width: 400,
                //  height: '30%',  //  optionally resize item-height
                visible: {
                    min: 1,
                    max: 5
                }
            }
        });
    });

    $('.upsell-items .carousel').each(function(i,el){
        var wid = $('.col-main').width();
        //console.log(wid);
        if(wid>=1200){var minslides = 4;}else if(wid>850 && wid<1200){var minslides = 3;}else{var minslides = 1;}
        
        $(el).carouFredSel({
            auto:false,
            responsive: true,
            width: '100%',
            height: 380,
            scroll: 1,
            prev: $(el).data('carouselPrev'),
            next: $(el).data('carouselNext'),
            items: {
                //  width: 400,
                //  height: '30%',  //  optionally resize item-height
                visible: {
                    min: minslides,
                    max: 4
                }
            }
        });
    });
    
    $('.crosssell-items .carousel').each(function(i,el){
        $(el).carouFredSel({
            auto:false,
            responsive: true,
            width: '90%',
            height: 380,
            scroll: 1,
            prev: $(el).data('carouselPrev'),
            next: $(el).data('carouselNext'),
            items: {
                //  width: 400,
                //  height: '30%',  //  optionally resize item-height
                visible: {
                    min: 1,
                    max: 1
                }
            }
        });
    });
    
    $('.related-items .carousel').each(function(i,el){
        $(el).carouFredSel({
            auto:false,
            responsive: true,
            width: '100%',
            height: 380,
            scroll: 1,
            prev: $(el).data('carouselPrev'),
            next: $(el).data('carouselNext'),
            items: {
                //  width: 400,
                //  height: '30%',  //  optionally resize item-height
                visible: {
                    min: 1,
                    max: 1
                }
            }
        });
    });
    
    $('#goto-reviews, #goto-reviews-form').click(function(){
       scrollToAnchor('reviews-tab');
       $('.nav-tabs li').removeClass('active');
       $('.tab-content div').removeClass('active');
       $('.nav-tabs li a.reviews').parent().addClass('active');
       $('.tab-content div#reviews').addClass('active');
    });

    
    $('.topcart, .topcart-content').hover(function() {
        $('.topcart-content').show();
        $('.top-shopping-cart').addClass('open');
    },function(){
        $('.topcart-content').hide();   
        $('.top-shopping-cart').removeClass('open');
    });
    $('#close-topcart').click(function() {
        $('.topcart-content').hide();
    });

    new WOW().init();

    $('.services').hover(function(){
        $(this).children('.service-img').addClass('flipInY animated');
    },function(){
        $(this).children('.service-img').removeClass('flipInY animated');
    });
    
    //sidebar gallery images hover
    $("a.gallery-hover").fancybox({
        'titleShow' : true,
        gallery : true
    });
    
    //$('.menu').slicknav();
    
    $(window).scroll(function() {
        if($(this).scrollTop() > 300) {
            $('#back_top').fadeIn(1000);    
        } else {
            $('#back_top').fadeOut(1000);
        }
    });
    
    
    $('#back_top').click(function() {
        $('body,html').animate({scrollTop:0},500);
    });


    $('.searchbtn.toggle-search').click(function(){
        $('.search-pop').toggle(0, function(){
           if($('.searchbtn.toggle-search').hasClass('open')){
            $('.searchbtn.toggle-search').removeClass('open');
            }else{
                $('.searchbtn.toggle-search').addClass('open');
            } 
        });        
    });
    $('.navbartoggle').click(function(){
        $('.navigation-wrapper').toggle(0, function(){
           if($('.navbartoggle').hasClass('open')){
            $('.navbartoggle').removeClass('open');
            }else{
                $('.navbartoggle').addClass('open');
            } 
        });        
    });
    //jQuery('.nav-bar').stickyfloat({ duration: 400 });
    $(".layout1 .stickymenu.nav-bar").sticky({ topSpacing: 0 });
    $(".layout3 .stickymenu.nav-bar").sticky({ topSpacing: 0 });
    $(".layout2.stickymenu").sticky({ topSpacing: 0 });
    
    $('.display-onhover .availability.out-of-stock').html('<span><i class="fa fa-shopping-cart"></i><div class="disable-img"></div></span>');
    
});//document ready close
}
(jQuery));
