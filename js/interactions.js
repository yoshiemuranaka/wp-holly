var Holly = Holly || {};

Holly.Interactions = {
	init: function(){
		this.events();
		this.filter();
	}, 
	
	events: function() {
		jQuery('.hamburger-menu').bind('click', this.menu);
		jQuery('.menu-icon.close').bind('click', this.menu);
		jQuery('.main-navigation .overlay').bind('click', this.menu);
		jQuery('window').bind('scroll', this.animateHeader);
	},
	
	menu: function() {
		jQuery('.main-navigation').toggleClass('active');
	},

	filter: function() {
		//removing empty p and br tags
		jQuery('.site-main p:empty').remove();
		jQuery('.site-main br').remove();		
	},

	animateHeader: function() {
		console.log('yo');
		var distanceY = window.pageYOffset || document.documentElement.scrollTop;
		var shrinkOn = 150;
		var header = jQuery('.site-header');

		if(small === false) {
			if(distanceY > shrinkOn) {
				header.addClass('smaller');
			} else {
				if(header.hasClass('smaller')) {
					header.removeClass('smaller');
				}
			}
		}     
	}
};

jQuery(document).ready(function($){
	Holly.Interactions.init();
	window.sr = ScrollReveal().reveal('.js-scrollreveal', {scale: 1, duration: 800, viewFactor: 0.05}, 500);
});

