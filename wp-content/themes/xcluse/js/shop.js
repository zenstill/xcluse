!function(a){a.fn.equalHeights=function(){var b=0,c=a(this);return c.each(function(){var c=a(this).innerHeight();c>b&&(b=c)}),c.css("height",b)},a("[data-equal]").each(function(){var b=a(this),c=b.data("equal");b.find(c).equalHeights()})}(jQuery);var afterResize=(function(){var t={};return function(callback,ms,uniqueId){if(!uniqueId){uniqueId="Don't call this twice without a uniqueId";}if(t[uniqueId]){clearTimeout(t[uniqueId]);}t[uniqueId]=setTimeout(callback,ms);};})();window.timber=window.timber||{};timber.cacheSelectors=function(){timber.cache={$html:$('html'),$body:$('body'),$breadcrumbs:$('.breadcrumb'),bpLarge:769,$navigation:$('#accessibleNav'),$hasDropdownItem:$('.site-nav--has-dropdown'),$menuToggle:$('.menu-toggle'),$slider:$('.flexslider'),$productImageWrap:$('#productPhoto'),$productImage:$('#productPhotoImg'),$thumbImages:$('#productThumbs').find('a.product-photo-thumb'),$shareButtons:$('.social-sharing'),$collectionFilters:$('#collectionFilters'),$toggleFilterBtn:$('#toggleFilters'),$featuredBoxes:$('.featured-box'),$featuredImages:$('.featured-box--image'),$productGridImages:$('.product-grid-image')};}
timber.init=function(){timber.cacheSelectors();timber.cache.$html.removeClass('no-js').addClass('js');if('ontouchstart'in window){timber.cache.$html.removeClass('no-touch').addClass('touch');}timber.toggleMenu();timber.sliders();timber.productImageSwitch();timber.equalHeights();timber.responsiveVideos();timber.toggleFilters();$(window).load(function(){timber.responsiveNav();});timber.productImageZoom();timber.socialSharing();};timber.accessibleNav=function(){var $nav=timber.cache.$navigation,$allLinks=$nav.find('a'),$topLevel=$nav.children('li').find('a'),$parents=$nav.find('.site-nav--has-dropdown'),$subMenuLinks=$nav.find('.site-nav--dropdown').find('a'),activeClass='nav-hover',focusClass='nav-focus';$parents.on('mouseenter touchstart',function(evt){var el=$(this);if(!el.hasClass(activeClass)){evt.preventDefault();}showDropdown($(this));});$parents.on('mouseleave',function(){hideDropdown($(this));});$subMenuLinks.on('touchstart',function(evt){evt.stopImmediatePropagation();});$allLinks.focus(function(){handleFocus($(this));});$allLinks.blur(function(){removeFocus($topLevel);});function handleFocus(el){var $subMenu=el.next('ul');hasSubMenu=$subMenu.hasClass('site-nav--dropdown')?true:false,isSubItem=$('.site-nav--dropdown').has(el).length,$newFocus=null;if(!isSubItem){removeFocus($topLevel);addFocus(el);}else{$newFocus=el.closest('.site-nav--has-dropdown').find('a');addFocus($newFocus);}}function showDropdown(el){el.addClass(activeClass);setTimeout(function(){timber.cache.$body.on('touchstart',function(){hideDropdown(el);});},250);}function hideDropdown($el){$el.removeClass(activeClass);timber.cache.$body.off('touchstart');}function addFocus($el){$el.addClass(focusClass);}function removeFocus($el){$el.removeClass(focusClass);}};timber.responsiveNav=function(){$(window).resize(function(){afterResize(function(){timber.cache.$navigation.append($('#moreMenu--list').html());$('#moreMenu').remove();timber.alignMenu();timber.accessibleNav();},200,'uniqueID');});timber.alignMenu();timber.accessibleNav();}
timber.alignMenu=function(){var $nav=timber.cache.$navigation,w=0,i=0;wrapperWidth=$nav.outerWidth()-0,menuhtml='';if(window.innerWidth<timber.cache.bpLarge){return;}$.each($nav.children(),function(){var $el=$(this);if(!$el.hasClass('large-hide')){w+=$el.outerWidth(true);}if(wrapperWidth<w){menuhtml+=$('<div>').append($el.clone()).html();$el.remove();if(!$el.hasClass('large-hide')){i++;}}});if(wrapperWidth<w){$nav.append('<li id="moreMenu" class="site-nav--has-dropdown">'+'<a href="#">More <i class="fa fa-angle-down" aria-hidden="true"></i></a>'+'<ul id="moreMenu--list" class="site-nav--dropdown">'+menuhtml+'</ul></li>');if(i<=1){timber.cache.$navigation.append($('#moreMenu--list').html());$('#moreMenu').remove();}}}
timber.toggleMenu=function(){timber.cache.$menuToggle.on('click',function(){timber.cache.$body.toggleClass('show-nav');if($('#ajaxifyModal').hasClass('is-visible')){$('#ajaxifyModal').removeClass('is-visible');timber.cache.$body.addClass('show-nav');}});timber.cache.$hasDropdownItem.on('click touchend',function(evt){if(timber.cache.$body.hasClass('show-nav')){var $el=$(this);if(!$el.hasClass('show-dropdown')){evt.preventDefault();$el.addClass('show-dropdown');}else if($el.hasClass('nav-hover')){$el.removeClass('show-dropdown');}};})};timber.sliders=function(){var $slider=timber.cache.$slider;if($slider.length){var auto=$slider.data('auto')?$slider.data('auto'):false,rate=$slider.data('rate')?$slider.data('rate'):0;$slider.flexslider({animation:'slide',animationSpeed:500,pauseOnHover:true,keyboard:false,slideshow:auto,slideshowSpeed:rate});}};timber.productImageSwitch=function(){if(timber.cache.$thumbImages.length){timber.cache.$thumbImages.on('click',function(evt){evt.preventDefault();var newImage=$(this).attr('href');timber.switchImage(newImage,null,timber.cache.$productImage);});}};timber.switchImage=function(src,imgObject,el){var $el=$(el);$el.attr('src',src);var zoomSrc=src.replace('_medium','_grande').replace('_large','_grande');$el.attr('data-zoom',zoomSrc);$(function(){timber.productImageZoom();});};timber.productImageZoom=function(){if(!timber.cache.$productImageWrap.length){return;};timber.cache.$productImageWrap.trigger('zoom.destroy');timber.cache.$productImageWrap.addClass('image-zoom').zoom({url:timber.cache.$productImage.attr('data-zoom')})};timber.socialSharing=function(){var $buttons=timber.cache.$shareButtons,$shareLinks=$buttons.find('a'),permalink=$buttons.attr('data-permalink');var $fbLink=$('.share-facebook'),$twitLink=$('.share-twitter'),$pinLink=$('.share-pinterest'),$googleLink=$('.share-google');if($fbLink.length){$.getJSON('https://graph.facebook.com/?id='+permalink+'&callback=?',function(data){if(data.shares){$fbLink.find('.share-count').text(data.shares).addClass('is-loaded');}else{$fbLink.find('.share-count').remove();}});};if($twitLink.length){$.getJSON('https://cdn.api.twitter.com/1/urls/count.json?url='+permalink+'&callback=?',function(data){if(data.count>0){$twitLink.find('.share-count').text(data.count).addClass('is-loaded');}else{$twitLink.find('.share-count').remove();}});};if($pinLink.length){$.getJSON('https://api.pinterest.com/v1/urls/count.json?url='+permalink+'&callback=?',function(data){if(data.count>0){$pinLink.find('.share-count').text(data.count).addClass('is-loaded');}else{$pinLink.find('.share-count').remove();}});};if($googleLink.length){$googleLink.find('.share-count').addClass('is-loaded');}$shareLinks.on('click',function(e){e.preventDefault();var el=$(this),popup=el.attr('class').replace('-','_'),link=el.attr('href'),w=700,h=400;switch(popup){case'share-twitter':h=300;break;case'share-fancy':w=480;h=720;break;case'share-google':w=500;break;}window.open(link,popup,'width='+w+', height='+h);});}
timber.equalHeights=function(){$(window).load(function(){resizeElements();});$(window).resize(function(){afterResize(function(){resizeElements();},250,'id');});function resizeElements(){timber.cache.$featuredImages.css('height','auto').equalHeights();timber.cache.$featuredBoxes.css('height','auto').equalHeights();timber.cache.$productGridImages.css('height','auto').equalHeights();}};timber.responsiveVideos=function(){$('iframe[src*="youtube.com/embed"]').wrap('<div class="video-wrapper"></div>');$('iframe[src*="player.vimeo"]').wrap('<div class="video-wrapper"></div>');};timber.toggleFilters=function(){if(timber.cache.$collectionFilters.length){timber.cache.$toggleFilterBtn.on('click',function(){timber.cache.$toggleFilterBtn.toggleClass('is-active');timber.cache.$collectionFilters.slideToggle(200);if($(window).scrollTop()>timber.cache.$breadcrumbs.offset().top){$('html, body').animate({scrollTop:timber.cache.$breadcrumbs.offset().top});}});}};timber.formatMoney=function(val){if(moneyFormat==='${{amount}}'){return val.replace('$','').replace('.','<sup>')+'</sup>';}else if(moneyFormat==='${{amount_with_comma_separator}}'){return val.replace('$','').replace(',','<sup>')+'</sup>';}return val;};timber.formatSaleTag=function(val){if(moneyFormat==='${{amount}}'){return val.replace('.','<sup>')+'</sup>';}else if(moneyFormat==='${{amount_with_comma_separator}}'){return val.replace(',','<sup>')+'</sup>';}return val;};$(timber.init)