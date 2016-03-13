function initDate()
{
	$('.js_time').each(function()
	{
		var date = $(this).html();
		var str = moment(date, 'X').fromNow();
		$(this).html(str);
	});
}
/*	$(function(){
		setInterval(function(){
			$('.display-user').load('home.phtml .display-user > ul');
			$('.display-user').animate({scrollTop: $('.display-user')[0].scrollHeight});
		}, 5000);	
	});
*/
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

