jQuery(function(){
	
	// clickable rows
	jQuery('body').on('click', '.clickable', function () {  
		window.document.location = jQuery(this).attr('data-href');
	});
	
	jQuery('.datepicker').datepicker({ dateFormat : 'd M yy' });
	
});