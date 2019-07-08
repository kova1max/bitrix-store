$(function () {

	$('.select').chosen({
		disable_search_threshold: 10
	});

	if ($('div').is('.range')) {
		var item = $('.range_slider'),
		range = item[0],
		valueMax = $('.range_input_max')[0],
		valueMin = $('.range_input_min')[0],
		rangeMax = item.data('max'),
		rangeMin = item.data('min'),
		rangeStep = item.data('step'),
		rangeMiddle = ((rangeMax + rangeMin) / 2);
		noUiSlider.create(range, {
			start: [rangeMin, rangeMax],
			step: rangeStep,
			margin: 1000,
			connect: true,
			behaviour: 'tap-drag',
			range: {
				'min': rangeMin,
				'max': rangeMax
			}
		});
		range.noUiSlider.on('update', function (values, handle) {
			if (handle) {
				valueMax.value = Math.round(values[handle]);
			} else {
				valueMin.value = Math.round(values[handle]);
			}
		});
		valueMax.addEventListener('change', function () {
			range.noUiSlider.set([null, this.value]);
		});
		valueMin.addEventListener('change', function () {
			range.noUiSlider.set([this.value, null]);
		});
	}
	
	
	$('.filter_range').each(function () {
		var $this = $(this),
		item = $this.find('.range_slider'),
		range = item[0],
		valueMax = $this.find('.range_input_max')[0],
		valueMin = $this.find('.range_input_min')[0],
		rangeMax = item.data('max'),
		rangeMin = item.data('min'),
		rangeStep = item.data('step'),
		rangeMiddle = ((rangeMax + rangeMin) / 2);
		noUiSlider.create(range, {
			start: [rangeMin, rangeMax],
			step: rangeStep,
			margin: 1000,
			connect: true,
			behaviour: 'tap-drag',
			range: {
				'min': rangeMin,
				'max': rangeMax
			}
		});
		range.noUiSlider.on('update', function (values, handle) {
			if (handle) {
				valueMax.value = Math.round(values[handle]);
			} else {
				valueMin.value = Math.round(values[handle]);
			}
		});
		valueMax.addEventListener('change', function () {
			range.noUiSlider.set([null, this.value]);
		});
		valueMin.addEventListener('change', function () {
			range.noUiSlider.set([this.value, null]);
		});
	});


	$('.product_slider .swiper-container').each(function () {
		var product = new Swiper(this, {
			nextButton: $(this).parent().find('.swiper-button-next')[0],
			prevButton: $(this).parent().find('.swiper-button-prev')[0],
			spaceBetween: 20,
			slidesPerView: 4,
			breakpoints: {
				1300: {
					slidesPerView: 3
				},
				950: {
					slidesPerView: 2
				},
				620: {
					slidesPerView: 1
				}
			}
		});
	});
	
	$('input.checkbox').iCheck({
		checkboxClass: 'icheckbox'
	});


	if ($('.cart_gallery_top').is('.cart_gallery_top')) {
		console.log('2');
		var galleryTop = new Swiper('.cart_gallery_top', {
			loop: true,
			slidesPerView: 'auto',
			effect: 'fade'
		});
		var galleryThumbs = new Swiper('.cart_gallery_thumbs .swiper-container', {
			spaceBetween: 20,
			slidesPerView: 5,
			touchRatio: 0.2,
			loop: true,
			grabCursor: true,
			slideToClickedSlide: true,
			nextButton: $('.cart_gallery_thumbs .swiper-button-next'),
			prevButton: $('.cart_gallery_thumbs .swiper-button-prev'),
			breakpoints: {
				1200: {
					slidesPerView: 4
				},
				750: {
					slidesPerView: 3
				},
				500: {
					slidesPerView: 2
				}
			}
		});
		galleryTop.params.control = galleryThumbs;
		galleryThumbs.params.control = galleryTop;
	}
	
	
	var modalTop = new Swiper('.modal_gallery_top', {
		loop: true,
		slidesPerView: 'auto',
		effect: 'fade'
	});
	var modalThumbs = new Swiper('.modal_gallery_thumbs .swiper-container', {
		spaceBetween: 20,
		slidesPerView: 3,
		touchRatio: 0.2,
		loop: true,
		grabCursor: true,
		slideToClickedSlide: true,
		nextButton: $('.modal_gallery_thumbs .swiper-button-next'),
		prevButton: $('.modal_gallery_thumbs .swiper-button-prev'),
		breakpoints: {
			600: {
				spaceBetween: 10,
				slidesPerView: 2
			}
		}
	});
	modalTop.params.control = modalThumbs;
	modalThumbs.params.control = modalTop;

	var cheaperSwiper = [];
	console.log(cheaperSwiper);
	$('.cheaper_swiper .swiper-container').each(function (i) {
		cheaperSwiper[i] = new Swiper(this, {
			slidesPerView: 1,
			nextButton: $(this).closest('.cheaper').find('.swiper-button-next'),
			prevButton: $(this).closest('.cheaper').find('.swiper-button-prev'),
			spaceBetween: 30,
			pagination: $(this).closest('.cheaper').find('.swiper-pagination'),
			paginationClickable: true
		});
	});

	$(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
	
	$(".fancymodal").fancybox({
		padding: 0,
		maxWidth: 930,
		width: '99%',
		'closeBtn':false,
		autoHeight: true,
		afterShow: function (current, previous) {
			modalTop.update();
			modalThumbs.update();
			for (var i = 0; i < cheaperSwiper.length; i++) {
				cheaperSwiper[i].update();
			}
		}
	});


	$('.modal .fancybox-close').on('click', function(e){
		e.preventDefault();
		$.fancybox.close();
	});




	$('.slider_nav, .slider_more').click(function (e) {
		e.preventDefault();
		$('.slider_nav').add('.slider_form').toggleClass('active');
	})

	$('.header_item_icon').click(function () {
		$(this).add('.header_search').toggleClass('active');
		$('body').toggleClass('overflow');
	});


	var menu = 0;
	$('.toggle_btn').click(function (e) {
		$('body').addClass('overflow menu_active');
		menu = 0;
		e.preventDefault();
	})
	$(document).on('click', '.menu_active', function (e) {
		if ($(event.target).closest(".menu").length) {
			return;
		}
		if (menu == 1) {
			$('body').removeClass('overflow menu_active');
		}
		menu = 1;
	});
	
	
	$('.cart_description_more').click(function () {
		$(this).closest('.cart_description').removeClass('hide');
	});
	
	
	$('.cart_tabs_nav a').click(function (e) {
		e.preventDefault();
		var $this= $(this),
		item = $this.data('tabs'),
		container = $this.closest('.cart_tabs');
		$this.addClass('active').siblings().removeClass('active');
		container.find('.cart_tabs_item[data-tabs="' + item + '"]').addClass('active').siblings().removeClass('active');
	});
	
	$('.filter_item_more').click(function (e) {
		e.preventDefault();
		$(this).addClass('active');
	});
	
	$('.cart_tabs_more').click(function () {
		$(this).closest('.cart_tabs').removeClass('hide');
	});

	$('.filter_head').click(function () {
		$(this).toggleClass('active');
	});
	
	
	$('.basket_count_minus').click(function () {
		var $this = $(this),
		itemVal = $this.siblings('.basket_count_val'),
		count = itemVal.val();
		if(+count > 1) {
			itemVal.val(--count);
		}
	});
	
	$('.basket_count_plus').click(function () {
		var $this = $(this),
		itemVal = $this.siblings('.basket_count_val'),
		count = itemVal.val();
		itemVal.val(++count);
	});


	$( ".cart_characteristics_item" ).hover(
		function() {
			var hov1 = ($(this).index());
			$(".product_deskr").each(function() {
				var t = $(this).find("li").eq(hov1);
				t.addClass("h_color")
			})

		}, function() {
			$(".product_item").find("li").removeClass("h_color");
		}
		);



	$.fn.equivalent = function (){
		var $blocks = $(this),
		maxH = $blocks.eq(0).height(); 
		$blocks.each(function(){
			maxH = ( $(this).height() > maxH ) ? $(this).height() : maxH;
		});
		$blocks.height(maxH); 
	}


	$(".prop_hea").equivalent(); 
	$(".prop13").equivalent(); 
	$(".prop14").equivalent(); 
	$(".prop15").equivalent(); 
	$(".prop16").equivalent(); 
	$(".prop17").equivalent(); 
	$(".prop18").equivalent(); 
	$(".prop19").equivalent(); 
	$(".prop20").equivalent(); 
	$(".prop21").equivalent(); 
	$(".prop22").equivalent(); 
	$(".prop23").equivalent(); 
	$(".prop24").equivalent(); 
	$(".prop25").equivalent(); 
	$(".prop26").equivalent(); 
	$(".prop27").equivalent();
	$(".product_item_title").equivalent();


	$(".filter_item .filter_title").click(function () {
		$(this).parents(".filter_item").find(".svg-next").toggleClass("active");
		$(this).parents(".filter_item").find(".label_wrap").slideToggle();
	});


	$(".show_link").click(function () {
		$(".unlink_wrap").slideToggle();
	});


	$(".show_comments").click(function (e) {
		e.preventDefault();
		$(".show_comments__wrap").slideToggle();
	});





	$('a.video').on('click', function(event) {
		event.preventDefault();
		$.fancybox({
			'type' : 'iframe',
		// hide the related video suggestions and autoplay the video
		'href' : this.href.replace(new RegExp('watch\\?v=', 'i'), 'embed/') + '?rel=0&autoplay=1',
		'overlayShow' : true,
		'centerOnScroll' : true,
		'speedIn' : 100,
		'padding' : 0,
		'speedOut' : 50,
		'width' : 640,
		'height' : 480,
		'tpl': {

			closeBtn : '<a title="Close" class="fancybox-item fancybox-close my_close" href="javascript:;"></a>'

		}
	});


	});










});
