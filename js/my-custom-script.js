(function($) {
	$(document).ready(function() {
		$("#commentform").submit(function() {
			if ($('#comment').val() === '' || $('#author').val() === '' || $('#email').val() === '')
			{
				alert($('#comment').val());
				$("#required").removeClass("hidden");
				return false;
			}
			else {
				$("#required").addClass("hidden");
				return true;
			}
		});
		$('#menu-icon').on('click', function(){
			if( $('#slideout-menu').css('opacity') == 0 )  { 
				slideoutMenu.style.opacity = '1';
			} 
			else { 
				slideoutMenu.style.opacity = '0';
			}
		});
	})
})(jQuery);