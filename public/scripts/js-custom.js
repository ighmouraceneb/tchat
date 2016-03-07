// $(document).ready(function(){

// $(function(){
 
//     $(document).on( 'scroll', function(){
 
//     	if ($(window).scrollTop() > 100) {
// 			$('.scroll-top-wrapper').addClass('show');
// 		} else {
// 			$('.scroll-top-wrapper').removeClass('show');
// 		}
// 	});
 
// 	$('.scroll-top-wrapper').on('click', scrollToTop);
// });
 
// function scrollToTop() {
// 	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
// 	element = $('body');
// 	offset = element.offset();
// 	offsetTop = offset.top;
// 	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
// }

// });


 $(document).ready(function(){ 
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });



        // $.bootstrapGrowl('mon message', {
        //       ele: 'body', // which element to append to
        //       type: 'success', // (null, 'info', 'danger', 'success')
        //       offset: {from: 'top', amount: 80}, // 'top', or 'bottom'
        //       align: 'center', // ('left', 'right', or 'center')
        //       width: 250, // (integer, or 'auto')
        //       delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
        //       allow_dismiss: true, // If true then will display a cross to close the popup.
        //       stackup_spacing: 10 // spacing between consecutively stacked growls.
        //     });

       
          $(function() {
    $( "#valid" ).dialog();
  });



 
    });