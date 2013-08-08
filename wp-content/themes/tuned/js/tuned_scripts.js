jQuery(window).load(function(){

	jQuery('.menu-toggle').click(function($){
		jQuery('.menu').slideToggle('slow', function(){
			jQuery('.menu-toggle').toggleClass('menu-toggled');
		});
	});
	
	// Flex slider
	jQuery('.flexslider').flexslider({
		animation: "fade"
	});
	
	
	//Add equal height for floated elements
	var maxHeight = 0;
	function setHeight(column) {	
	
		jQuery(column).each(function(){
			if(jQuery(this).height() > maxHeight) {
				maxHeight = jQuery(this).height();
			}
		});
	
		jQuery(column).height(maxHeight);
	
	}
	
	setHeight('#grid3 .grid-3');	

});