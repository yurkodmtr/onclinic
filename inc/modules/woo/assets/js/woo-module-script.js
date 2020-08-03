;var Ocularis_Woo_Module;


(function ($) {
	"use strict";


	Ocularis_Woo_Module = {

		init: function () {
			this.wooHeaderCart();
			this.wooCategoriesLast();
			this.wooProductElementsPos();
		},

		wooHeaderCart: function () {
			var headerCartButton = $('.header-cart__link-wrap'),

			toggleButton = function (e){
				e.preventDefault();
				$('.header-cart__content').toggleClass('show');

				jQuery(window).on('scroll', function(e) {
					$('.header-cart__content').removeClass('show');
				});
			};

			headerCartButton.on('click', toggleButton );

		},

		wooCategoriesLast: function () {
			$('.woocommerce #main .products .product-category').last().after('<li class="product-category product category-last"></li>');
		},

		wooProductElementsPos: function () {
			if (jQuery('.single-product .product.sale').size() > 0) {
				$('.single-product .product').each(function() {
					var onsale = $(this).find('.onsale'),
						thumb = $(this).find('.summary');

					onsale.prependTo(thumb);
				});
			}
		},

	};

	Ocularis_Woo_Module.init();

}(jQuery));