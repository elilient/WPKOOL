(function($)
{	
    "use strict";

	
	
    $(document).ready(function()
    {

		if($(document).height() > $('body').height() ){ $('#footer').css('display','block'); }

		$(window).scroll(function() {
	   
		  if ($(document).scrollTop() <= $(document).height() - $(window).height()- 500 ){
			$('#footer').css('display','none');
		  }
	   
		  if ($(document).scrollTop() >= $(document).height() - $(window).height()) {	  
			$('#footer').css('display','block');
		  }
		});
 	


		$(window).scroll(function () {
			var scroll_y = $(window).scrollTop();
			
			if (scroll_y > 50) {
				$("header.fixed").addClass('changeh');
				$("header.changeh  .header-wrap .theta-menu ul.menu li").css('height', 50);
				$("header.changeh  .header-wrap .theta-menu ul.menu li ul li").css('height','auto');

				
				$("#theta-top-search").css('paddingTop', 20);
			} else {
				$("header.fixed").removeClass('changeh');
			}		
		});


    });

})( jQuery );