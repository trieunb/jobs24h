$(function () {
  	$('#carousel-custom').carousel();
  	var open = false;
    $('.show-menu').click(function() {
        open = !open;

        if(open) {
            $('.main-menu').slideDown();
        } else {
            $('.main-menu').slideUp();
        }
    });
})