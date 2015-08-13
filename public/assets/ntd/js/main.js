$(function () {
  	$('[data-toggle="tooltip"]').tooltip();
  	$('input.upload').change(function(event) {
		$(this).parents('.push-bottom').find('.uploadFile').val(this.value);
	});
	var open = false;
    $('.show-menu').click(function() {
        open = !open;

        if(open) {
            $('.main-menu').slideDown();
        } else {
            $('.main-menu').slideUp();
        }
    });

    $(document).on('click', '.main-menu li', function(event) {
        $('.main-menu li').removeClass('active');
        $(this).addClass('active');
        $(this).children('ul li').removeClass('active');
    });
})