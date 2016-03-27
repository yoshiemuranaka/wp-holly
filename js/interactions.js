var Holly = Holly || {};

Holly.Interactions = {
	init: function(){
		this.events();
		this.filter();
	}, 
	
	events: function() {
		jQuery('.hamburger-menu').bind('click', this.menu);
		jQuery('.menu-icon.close').bind('click', this.menu);
	},
	
	menu: function() {
		jQuery('.main-navigation').toggleClass('active');
	},

	filter: function() {
		//removing empty p and br tags
		jQuery('.site-main p:empty').remove();
		jQuery('.site-main br').remove();		
	}
};

jQuery(document).ready(function($){
	Holly.Interactions.init();
});

