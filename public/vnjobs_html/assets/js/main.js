

// DELETE TAGS
var $tags = {
    tagList: $('#tags-edit'),
    deleteButtonClass: '.ic-close',
    addButton: $('#btn-add-tag'),
    nameInput: $('#key-skills'),
    editMode: false,
    template: $('<span class="tag-xs tag-new"><span class="tag-name"></span><a href="#" class="ic-close"><i class="fa fa-fw fa-remove"></i></a><input class="input-tag-name" type="hidden" name="skills[]" data-tag-name=""></span>)'),
    addable: true
};


$tags.tagList.on('click', $tags.deleteButtonClass, function (e) {
    e.preventDefault();
    $(this).parents('.tag-xs').animate({width: 'toggle', opacity: 'toggle'}, 'fast').find('.input-tag-name').attr('disabled', 'disabled');
    validMaxNumberofSkill(parseInt(NoLimitSkill) + 1)
    $tags.nameInput.val("").focus();
    if ($.fn.typeahead) {
        $tags.nameInput.typeahead('val', "").focus();
    }

});

(function($) {
     $(function() {
        var jcarousel = $('.jcarousel');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var carousel = $(this),
                    width = carousel.innerWidth();

                if (width >= 600) {
                    width = width / 5;
                } else if (width >= 350) {
                    width = width / 3;
                }

                carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

       

        $('.jcarousel-control-prev')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .jcarouselPagination();
    });


    $(function() {
        var jcarousel = $('#company-info .jcarousel');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var carousel = $(this),
                    width = carousel.innerWidth();

                if (width >= 600) {
                    width = width / 4;
                } else if (width >= 350) {
                    width = width / 2;
                }

                carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

       
    });
    $(function() {
        var jcarousel = $('#customer-preview .jcarousel');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var carousel = $(this),
                    width = carousel.innerWidth();

                if (width >= 650) {
                    width = width / 1;
                } else if (width >= 350) {
                    width = width / 1;
                }

                carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

       
    });

    $(function() {
        var jcarousel = $('#news .jcarousel');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var carousel = $(this),
                    width = carousel.innerWidth();

                if (width >= 600) {
                    width = width / 4;
                } else if (width >= 350) {
                    width = width / 2;
                }

                carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

        
    });


	// PLUGIN SELECT 2
    $("#locationMainSearch, #categoryMainSearch").select2({
		maximumSelectionLength: 3,
	});
    $("#jobLevelMainSearch, #jobObjMainSearch,#jobExpMainSearch").select2();


    // COUNTDOWN TEXTEREA
    var maxLength = 5000;
    $('#myTextarea').keyup(function() {
      var length = $(this).val().length;
      var length = maxLength-length;
      $('.countdown').text(length);
    });

     $('.what-is-this-skill-section').popover({
        trigger: 'hover focus',
        html: true,
        placemennt: 'right'
    });



    // POPOVER 
    $('.what-is-this-skill-section').popover({
        trigger: 'hover focus',
        html: true,
        placemennt: 'right'
    });


    // UPLOAD INPUT
    document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("uploadFile").value = this.value;
    };
})(jQuery);


