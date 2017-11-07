<?php
 header("Content-type: text/javascript");
?>

jQuery(document).ready(function(){

		jQuery('#tabs div').hide();
		jQuery('#tabs div:first').show();
		jQuery('#tabs ul li:first').addClass('active');
		 
		jQuery('#tabs ul li a').click(function(){
			jQuery('#tabs ul li').removeClass('active');
			jQuery(this).parent().addClass('active');
			var currentTab = jQuery(this).attr('href');
			jQuery('#tabs div').hide();
			jQuery(currentTab).show();
			return false;
		});


});
