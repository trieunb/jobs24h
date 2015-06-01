

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
    $("#locationMainSearch, #categoryMainSearch, #WishPlaceWork, #Fields,#Specialized").select2({
        maximumSelectionLength: 3,
    });
    $("#ForeignLanguages,#CurrentLevel,#WishLevel,#FieldOfStudy,#Scope,#LatestLevel,#Diploma,#HighestDegree,#District,#Cities,#Nationality,#jobLevelMainSearch, #jobObjMainSearch,#jobExpMainSearch,#DateOfBirth,#MonthOfBirth,#YearOfBirth,#Gender,#Country,#MaritalStatus,#Category,#Province,#Level,#AverageGrade,#choose_cv").select2({
        minimumResultsForSearch: Infinity
    });
    $("#From_date,#To_date,#DOB,#Study_to,#Study_from").datetimepicker({
        pickTime: false,
        locale: 'ru'
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

   
    if($('#specific-salary').is(':checked')){
        $('#specific-salary-input').removeAttr('disabled');
    };
    $('#specific-salary-0').change(function(){
        $('#specific-salary-input').attr('disabled', true);
        $('#specific-salary-input').val('');
    });
     $('#specific-salary').change(function(){
        $('#specific-salary-input').removeAttr('disabled');
    });


    // HIGHLIGHT MENU RIGHT
    $('.ntv-menu .menu-right a').each(function(index) {
        if(this.href.trim() == window.location)
            $(this).addClass("text-orange");
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


    $('.fr-lang').each(function () {
        if($(this).find('select[class^="foreign_languages"]').val() != 0){
            $(this).removeClass('hidden-xs');
            $(this).addClass('block');
            if ( $('.fr-lang.block').length == 3) {
            $('.add-language-button-wrapper').slideUp();
            } else {
                $('.add-language-button-wrapper').slideDown();
            }
        }else{
            $(this).find('select[class^="level_languages"]').prop("disabled", true);
        }
        $(this).find('select[class^="foreign_languages"]').change(function(event) {
            event.preventDefault();
            if($(this).val() == 0){
                $(this).closest('.fr-lang').find('select[class^="level_languages"]').prop("disabled", true);
                $(this).closest('.fr-lang').find('select[class^="level_languages"] option[value=0]').attr('selected','selected');
                $(this).closest('.fr-lang').find('#select2-Level-container').text('- Vui lòng chọn -')
            }
            else{
                $(this).closest('.fr-lang').find('select[class^="level_languages"]').prop("disabled", false);   
            }
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

    $('.add-new-skill').click(function(){
        var skill = $('#saveSkills .form-group').last().find('.skill').attr('name');
        var i = skill.split('skill-').pop();
        i++;
            $("<div class='form-group'><div class='col-sm-8'><input class='skill form-control' name='skill-"+i+"' type='text'></div><div class='col-sm-4'><select class='level_skill form-control' name='level_skill"+i+"'><option value='' selected='selected'>- Vui lòng chọn -</option><option value='0'>Sơ cấp</option><option value='1'>Trung cấp</option><option value='2'>Cao cấp</option></select></div></div>").insertBefore('#saveSkills .form-submit');
    });

    if($('.specific_salary').val() != 0) {
        $('.specific_salary').prop('disabled', false);
        $('#specific-salary-0').prop('checked', false);
        $('#specific-salary').prop('checked', true);
        
    };
    if($('.info_years_of_exp').val() != 0){
        $('.info_years_of_exp').prop('disabled', false);
        $('.default_years_of_exp').prop('checked', false);
    };
    $('.default_years_of_exp').change(function(event) {
        event.preventDefault();
        if (this.checked) {
            $('.info_years_of_exp').attr('disabled', 'disabled');
            $('.info_years_of_exp').val('');
        }else{
            $('.info_years_of_exp').removeAttr('disabled');
        }

    });

})(jQuery);


