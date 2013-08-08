//Infinite Scroll with Masonry
jQuery(function(){

	var $container = jQuery('#content');
    jQuery("#content .post").css({ "max-width": "100%" });
	
	$container.imagesLoaded(function(){
		$container.masonry({
			itemSelector: '.post',
			isAnimated: true,
			columnWidth: function(containerWidth) {
				if($container.width() < 519 ) {
					return containerWidth;						
				}else{
					return containerWidth / 3;
				}
			}
		});
    });

	$container.infinitescroll({
		loading: {
			img: isb_vars.loader_img,
			msgText: isb_vars.loader_text,
			finishedMsg: isb_vars.loading_finished_text
		},
		navSelector  	: "#nav-below",
		nextSelector 	: "#nav-below .nav-previous a",
		itemSelector 	: ".post"
	},
		function( newElements ) {
			var $newElems = jQuery( newElements ).css({ opacity: 0, "max-width" : "100%" });
			
			$newElems.imagesLoaded(function(){         
				$newElems.animate({ opacity: 1 });
				$container.masonry( 'appended', $newElems, true ); 
			});
		}
	);		

 });