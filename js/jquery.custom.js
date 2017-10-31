( function( $ ) {

	'use strict';

	function removeNoJsClass() {
		$( 'html:first' ).removeClass( 'no-js' );
	}

	function slideMenu() {
		if ( $('#wrapper').find('.menu-toggle').length ) {
			var slideout = new Slideout({
				'panel': document.getElementById('wrapper'),
				'menu': document.getElementById('slide-menu'),
				'padding': 256,
				'tolerance': 70,
				'side': 'right'
			});
			$('.menu-toggle').on('click', function() {
				slideout.toggle();
			});
		}
	}

	/* Flexslider ---------------------*/
	function flexSliderSetup() {
		if( ($).flexslider) {
			var slider = $('.flexslider');
			slider.flexslider({
				slideshowSpeed		: 12000,
				animationDuration	: 800,
				animation			: 'fade',
				video				: false,
				useCSS				: false,
				prevText			: '<i class="fa fa-angle-left"></i>',
				nextText			: '<i class="fa fa-angle-right"></i>',
				touch				: false,
				controlNav			: false,
				animationLoop		: true,
				smoothHeight		: false,
				pauseOnAction		: true,
				pauseOnHover		: true,
				controlsContainer: $('.custom-controls'),
				customDirectionNav: $('.flex-direction-nav a'),

				start: function(slider) {
					slider.removeClass('loading');
					$('.preloader').hide();
					$('.total-slides').text(slider.count);
					$('.slides li .feature-img').click(function(event){
						event.preventDefault();
						slider.flexAnimate(slider.getTarget("next"));
					});
				},
				after: function(slider) {
					$('.current-slide').text(slider.currentSlide+1);
				}
			});
		}
	}

	function modifyPosts() {

		/* Toggle Mobile Menu Icon ---------------------*/
		$('.menu-toggle').click(function() {
			$('.icon-menu-open').toggle();
			$('.icon-menu-close').toggle();
		});

		/* Animate Page Scroll ---------------------*/
		$('.scroll').click(function(event){
			event.preventDefault();
			$('html, body').animate({scrollTop:$(this.hash).offset().top}, 500);
		});

		/* Fit Vids ---------------------*/
		$('.content').fitVids();

		/* Check Element BG Color ---------------------*/
		$('body').colourBrightness();

	}

	$( document )
	.ready( removeNoJsClass )
	.ready( slideMenu )
	.ready( modifyPosts )
	.on( 'post-load', modifyPosts );

	$( window )
	.load( flexSliderSetup );

})( jQuery );
