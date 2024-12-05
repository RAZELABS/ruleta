// Commom Plugins
(function($) {

	'use strict';



	// Validations
	if ( $.isFunction($.validator) && typeof theme.PluginValidation !== 'undefined') {
		theme.PluginValidation.initialize();
	}

	// Animate
	if ($.isFunction($.fn['themePluginAnimate']) && $('[data-appear-animation]').length) {
		theme.fn.dynIntObsInit( '[data-appear-animation], [data-appear-animation-svg]', 'themePluginAnimate', theme.PluginAnimate.defaults );
	}

	// Animated Content
	if ($.isFunction($.fn['themePluginAnimatedContent'])) {
		theme.fn.intObsInit( '[data-plugin-animated-letters]:not(.manual), .animated-letters', 'themePluginAnimatedContent' );
		theme.fn.intObsInit( '[data-plugin-animated-words]:not(.manual), .animated-words', 'themePluginAnimatedContent' );
	}

	// Before / After
	if ($.isFunction($.fn['themePluginBeforeAfter']) && $('[data-plugin-before-after]').length) {
		theme.fn.intObsInit( '[data-plugin-before-after]:not(.manual)', 'themePluginBeforeAfter' );
	}

	// Carousel Light
	if ($.isFunction($.fn['themePluginCarouselLight']) && $('.owl-carousel-light').length) {
		theme.fn.intObsInit( '.owl-carousel-light', 'themePluginCarouselLight' );
	}

	// Carousel
	if ($.isFunction($.fn['themePluginCarousel']) && $('[data-plugin-carousel]:not(.manual), .owl-carousel:not(.manual)').length) {
		theme.fn.intObsInit( '[data-plugin-carousel]:not(.manual), .owl-carousel:not(.manual)', 'themePluginCarousel' );
	}


	// Cursor Effect
	if ($.isFunction($.fn['themePluginCursorEffect']) && $('[data-plugin-cursor-effect]').length ) {
		theme.fn.intObsInit( '[data-plugin-cursor-effect]:not(.manual)', 'themePluginCursorEffect' );
	}

	// Float Element
	if ($.isFunction($.fn['themePluginFloatElement']) && $('[data-plugin-float-element]').length) {
		theme.fn.intObsInit( '[data-plugin-float-element], [data-plugin-float-element-svg]', 'themePluginFloatElement' );
	}



	// Hover Effect
	if ($.isFunction($.fn['themePluginHoverEffect']) && $('[data-plugin-hover-effect], .hover-effect-3d').length) {
		theme.fn.intObsInit( '[data-plugin-hover-effect]:not(.manual), .hover-effect-3d:not(.manual)', 'themePluginHoverEffect' );
	}

	// Animated Icon
	if ($.isFunction($.fn['themePluginIcon']) && $('[data-icon]').length) {
		theme.fn.dynIntObsInit( '[data-icon]:not(.svg-inline--fa)', 'themePluginIcon', theme.PluginIcon.defaults );
	}

	// In Viewport Style
	if ($.isFunction($.fn['themePluginInViewportStyle']) && $('[data-inviewport-style]').length) {

		$(function() {
			$('[data-inviewport-style]:not(.manual)').each(function() {
				var $this = $(this),
					opts;

				var pluginOptions = theme.fn.getOptions($this.data('plugin-options'));
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginInViewportStyle(opts);
			});
		});

	}

	// Lightbox
	if ($.isFunction($.fn['themePluginLightbox']) && ( $('[data-plugin-lightbox]').length || $('.lightbox').length )) {
		theme.fn.execOnceTroughEvent( '[data-plugin-lightbox]:not(.manual), .lightbox:not(.manual)', 'mouseover.trigger.lightbox', function(){
			var $this = $(this),
				opts;

			var pluginOptions = theme.fn.getOptions($this.data('plugin-options'));
			if (pluginOptions)
				opts = pluginOptions;

			$this.themePluginLightbox(opts);
		});
	}

	// Masonry
	if ($.isFunction($.fn['themePluginMasonry']) && $('[data-plugin-masonry]').length) {

		$(function() {
			$('[data-plugin-masonry]:not(.manual)').each(function() {
				var $this = $(this),
					opts;

				var pluginOptions = theme.fn.getOptions($this.data('plugin-options'));
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginMasonry(opts);
			});
		});

	}



	// Scroll Spy
	if ($.isFunction($.fn['themePluginScrollSpy']) && $('[data-plugin-scroll-spy]').length) {

		$(function() {
			$('[data-plugin-scroll-spy]:not(.manual)').each(function() {
				var $this = $(this),
					opts;

				var pluginOptions = theme.fn.getOptions($this.data('plugin-options'));
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginScrollSpy(opts);
			});
		});

	}

	// Scrollable
	if ( $.isFunction($.fn[ 'nanoScroller' ]) && $('[data-plugin-scrollable]').length ) {
		theme.fn.intObsInit( '[data-plugin-scrollable]', 'themePluginScrollable' );
	}

	// Section Scroll
	if ($.isFunction($.fn['themePluginSectionScroll']) && $('[data-plugin-section-scroll]').length) {

		$(function() {
			$('[data-plugin-section-scroll]:not(.manual)').each(function() {
				var $this = $(this),
					opts;

				var pluginOptions = theme.fn.getOptions($this.data('plugin-options'));
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginSectionScroll(opts);
			});
		});

	}

	// Sort
	if ($.isFunction($.fn['themePluginSort']) && ( $('[data-plugin-sort]').length || $('.sort-source').length )) {
		theme.fn.intObsInit( '[data-plugin-sort]:not(.manual), .sort-source:not(.manual)', 'themePluginSort' );
	}

	// Star Rating
	if ($.isFunction($.fn['themePluginStarRating']) && $('[data-plugin-star-rating]').length) {
		theme.fn.intObsInit( '[data-plugin-star-rating]:not(.manual)', 'themePluginStarRating' );
	}

	// Sticky
	if ($.isFunction($.fn['themePluginSticky']) && $('[data-plugin-sticky]').length) {
		theme.fn.execOnceTroughWindowEvent( window, 'scroll.trigger.sticky', function(){
			$('[data-plugin-sticky]:not(.manual)').each(function() {
				var $this = $(this),
					opts;

				var pluginOptions = theme.fn.getOptions($this.data('plugin-options'));
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginSticky(opts);
			});
		});
	}

	// Toggle
	if ($.isFunction($.fn['themePluginToggle']) && $('[data-plugin-toggle]').length) {
		theme.fn.intObsInit( '[data-plugin-toggle]:not(.manual)', 'themePluginToggle' );
	}



}).apply(this, [jQuery]);
