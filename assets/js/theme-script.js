;var Onclinic_Theme_JS;

(function($) {
	'use strict';

	Onclinic_Theme_JS = {

		$document: $( document ),

		init: function() {
			this.page_preloader_init();
			this.toTopInit();
			this.responsiveMenuInit();
			this.magnificPopupInit();
			this.swiperInit();
			this.stackMenu();
			this.stickyMenuFunc();
			this.stickyMenuInit();

			// Document ready event check
			this.$document.on( 'ready', this.documentReadyRender.bind( this ) );
		},

		documentReadyRender: function() {


			// Events
			this.$document
				.on( 'click.' + this.eventID, '.header-search-toggle', this.searchToggleHandler.bind( this ) )
				.on( 'click.' + this.eventID, '.header-search-popup-close',  this.searchToggleHandler.bind( this ) )

				.on( 'click.' + this.eventID, '#newsletter_popup', this.newsletterToggleHandler.bind( this ) )
				.on( 'click.' + this.eventID, '.footer-newsletter-popup-close',  this.newsletterToggleHandler.bind( this ) )

				//	Mobile Menu
				.on( 'click.' + this.eventID, '.main-menu-mobile__close', this.closeMenu.bind( this ) )
				.on( 'click.' + this.eventID, '.menu_toggle_btn',  this.openMenu.bind( this ) )

			// Customize Selective Refresh
			if ( undefined !== window.wp.customize && wp.customize.selectiveRefresh ) {

				var self = this;

				wp.customize.selectiveRefresh.bind( 'partial-content-rendered', function( placement ) {
					if ( 'header_bar' === placement.partial.id ) {
						self.verticalMenuPrepare( self );
					}
				} );
			}

		},

		page_preloader_init: function(self) {

			if ($('.page-preloader-cover')[0]) {
				$('.page-preloader-cover').delay(500).fadeTo(500, 0, function() {
					$(this).remove();
				});
			}
		},

		toTopInit: function() {
			if ($.isFunction(jQuery.fn.UItoTop)) {
				$().UItoTop({
					text: '',
					scrollSpeed: 600
				});
			}
		},

		searchToggleHandler: function( event ) {
			$('body').toggleClass( 'header-search-active' );
			$('.header-search-popup .header-search-form__field').focus();
		},

		newsletterToggleHandler: function( event ) {
			$('body').toggleClass( 'footer-newsletter-active' );
		},

		menuVerticalToggleHandler: function( event ) {
			$('body').toggleClass( 'vertical-menu-active' );
		},

		closeMenu: function(event) {
			$('.main-menu-mobile').removeClass('act');
		},

		openMenu: function(event) {
			$('.main-menu-mobile').addClass('act');
		},


		responsiveMenuInit: function() {
			if (typeof onclinicResponsiveMenu !== 'undefined') {
				onclinicResponsiveMenu();
			}
		},

		magnificPopupInit: function() {

			if (typeof $.magnificPopup !== 'undefined') {

				//MagnificPopup init
				$('[data-popup="magnificPopup"]').magnificPopup({
					type: 'image'
				});

				$(".gallery > .gallery-item a").filter("[href$='.png'],[href$='.jpg']").magnificPopup({
					type: 'image',
					gallery: {
						enabled: true,
						navigateByImgClick: true,
					},
				});

			}
		},

		swiperInit: function() {
			if (typeof Swiper !== 'undefined') {

				//Swiper carousel init
				var mySwiper = new Swiper('.swiper-container', {
					// Optional parameters
					loop: true,
					spaceBetween: 10,
					autoHeight: true,

					// Navigation arrows
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev'
					}
				})

			}
		},

		stackMenu: function() {
			$('.stack-menu').stackMenu();
		},

		stickyMenuFunc: function(){
			var startPosition;

			if ( $('.reheader__desktop:visible').length > 0 ) {
				startPosition = $('.reheader__desktop__top').outerHeight();
			}

			if ( $('.reheader__mobile:visible').length > 0 ) {
				startPosition = $('.reheader__mobile__top').outerHeight();
			}

			var currentPosition = $(window).scrollTop();

			if ( currentPosition >= startPosition) {
				$('.reheader').addClass('is_sticky');
			} else {
				$('.reheader').removeClass('is_sticky');
			}
		},

		stickyMenuInit: function(){
			if ( $('.reheader__sticky').length <= 0 ) {
				return false;
			}
			var self = this;
			self.stickyMenuFunc();

			$(window).scroll(function(){
				self.stickyMenuFunc();
			});
		}
	};

	Onclinic_Theme_JS.init();

}(jQuery));