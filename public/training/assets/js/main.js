$(function(){
	var open = false;
    $('.show-menu').click(function() {
        open = !open;

        if(open) {
            $('.navigation').slideDown();
        } else {
            $('.navigation').slideUp();
        }
    });
});