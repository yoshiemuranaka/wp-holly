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
		jQuery(window).bind('scroll', this.animateHeader);
		// jQuery(window).on('scroll', function(){console.log("yo")})
	},
	
	menu: function() {
		jQuery('.main-navigation').toggleClass('active');
		jQuery('html').toggleClass('overlay-active');
	},

	filter: function() {
		//removing p tags with &nbsp
		jQuery('.site-main p').each(function(){
			console.log(this)
			var p = jQuery(this);
			if(p.html() === '&nbsp;'){
				p.remove();
			}
		});
	},

	animateHeader: function() {
		var distanceY = window.pageYOffset || document.documentElement.scrollTop;
		var shrinkOn = 40;
		var header = jQuery('.site-header');

		// if(small === false) {
			if(distanceY > shrinkOn) {
				header.addClass('smaller');
			} else {
				// if(header.hasClass('smaller')) {
					header.removeClass('smaller');
				// }
			}
		// }     
	}
};

jQuery(document).ready(function($){
	Holly.Interactions.init();
	window.sr = ScrollReveal().reveal('.js-scrollreveal', {scale: 1, duration: 800, viewFactor: 0.05}, 500);
});

