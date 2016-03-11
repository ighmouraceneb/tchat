function refresh() 
{ 
	$.get('index.php?page=displayMessage&ajax', function(html)
 { 
 	$('.js_list').html(html); 
 }); 
} 
$(function() 
{ 
	$('.js_form').submit(function(info)
	 { 
	 	info.preventDefault(); 
	 	var message = $('.js_input').val(); 
	 	$.post('message', {content:message,action:"edit"}, function() 
	 	{ 
	 	$('.js_input').val('').focus(); 
	 	refresh(); 
	 }); 
	 	return false; 
	 }); 
	setInterval(function() 
		{ 
			refresh(); 
		}, 1000); 
});

