

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
    $("#locationMainSearch, #categoryMainSearch, #WishPlaceWork").select2({
        maximumSelectionLength: 3,
    });
    $("#ForeignLanguages,#CurrentLevel,#WishLevel,#FieldOfStudy,#Scope,#Specialized,#LatestLevel,#Diploma,#HighestDegree,#District,#Cities,#Nationality,#jobLevelMainSearch, #jobObjMainSearch,#jobExpMainSearch,#DateOfBirth,#MonthOfBirth,#YearOfBirth,#Gender,#Country,#MaritalStatus,#Category,#Province,#Level").select2({
        minimumResultsForSearch: Infinity
    });


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
    var uploadID = $('#uploadBtn').val();
    if(typeof uploadID != 'undefined') {
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
        };
    }
    
    $('.top-companies li').click(function(){
        $('.top-companies li').removeClass('active');
        $(this).addClass('active');
    });

   
    $('#specific-salary-0').change(function(){
        $('#specific-salary-input').attr('disabled', true);
    });
     $('#specific-salary').change(function(){
        $('#specific-salary-input').removeAttr('disabled');
    });


    // HIGHLIGHT MENU RIGHT
    $('.ntv-menu .menu-right a').each(function(index) {
        if(this.href.trim() == window.location)
            $(this).addClass("text-orange");
    });


    $('#DOB').datetimepicker({
        pickTime: false,
    });

    $(document).on('change','#is_publish',function(){
        var data = $(this).val();
        $('#popup_is_publish').modal('show');
        $('.is_publish').click(function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "my-resume", //Relative or absolute path to response.php file
                data: {is_publish: data},
                success : function(data){
                    $('#popup_is_publish').modal('hide');
                }
            });    
        });
    });

    $(document).on('click','#del_resume',function(){
        var data = $(this).attr('data-rs');
        $('#delete_modal').modal('show');
        $('.del-modal').click(function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "my-resume", //Relative or absolute path to response.php file
                data: {is_delete: data },
                success : function(data){
                   location.reload();
                    $('#delete_modal').modal('hide');
                }
            });    
        });
    });



    // Toggle language button functions
    function toggleLanguageButton() {
        var number_of_visible_language_boxes = $('.fr-lang.block').length;
        // Toggle the "remove language box buttons"
        if (number_of_visible_language_boxes > 1) {
            $('.remove-fr-lang').fadeIn().promise().done(function () {
                $(this).addClass('block');
            });
        } else {
            $('.remove-fr-lang').fadeOut().promise().done(function () {
                $(this).removeClass('block');
            });
        }

        // Toggle the "add language buttons"
        if (number_of_visible_language_boxes == 3) {
            $('.add-language-button-wrapper').slideUp();
        } else {
            $('.add-language-button-wrapper').slideDown();
        }
    }
        // Add 1 more language box
        $('.add-new-fr-lang').click(function () {
            $('.fr-lang').each(function () {
                if (!$(this).hasClass('block')) {
                    $(this).slideDown('fast').promise().done(function () {
                        $(this).removeClass('hidden-xs');
                        $(this).addClass('block');
                        toggleLanguageButton();
                    });
                    return false;
                }
            });
        });

    // Remove language box
    $('.remove-fr-lang').click(function (e) {
            if ($(':animated').length == 0) {
                $(this).parents('.fr-lang').slideUp('fast').promise().done(function () {
                    $(this).removeClass('block');
                    $(this).addClass('hidden-xs');
                    toggleLanguageButton();
                });
            }
    });

    // Remove has error
    $('.error-message').each(function(index ){
        if($(this).html() == ''){
            $(this).parent().removeClass('has-error');
        }else{
            $(this).parent().addClass('has-error');
        }
    });

    // Save CV 
    $('#saveBasicInfo').submit(function(e){
        e.preventDefault();
        var url= "{{URL::route('jobsserkers.edit-basic')}}";
        var date_of_birth = $('.date_of_birth').val();
        var gender = $('.gender').val();
        var marital_status = $('.marital_status').val();
        var nationality_id = $('.nationality_id').val();
        var address = $('.address').val();
        var country_id = $('.country_id').val();
        var province_id = $('.province_id').val();
        var district_id = $('.district_id').val();
        var phone_number = $('.phone_number').val();
        var hide_info_with_ntd = $('.hide_info_with_ntd').val();
        var dataString = 'date_of_birth='+date_of_birth+'&gender='+gender;
        $.ajax({
            type: "GET",
            url: url,//Relative or absolute path to response.php file
            data: dataString,
            cache: false,
            success : function(data){
                console.log(date_of_birth);
                }
            });    
    });

})(jQuery);


