
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

                if (width < 1024 && width >= 600) {
                    width = width / 3;
                } else if (width <= 480) {
                    width = width / 1;
                }else{
                    width = width / 5;
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
        var number_img = $('#company-info .jcarousel li').length;
        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var carousel = $(this),
                    width = carousel.innerWidth();

                if (width < 1024 && width >= 600) {
                    width = width / number_img;
                } else if (width <= 480) {
                    width = width / 1;
                }else{
                    width = width / 5;
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

                if (width < 1024 && width >= 600) {
                    width = width / 3;
                } else if (width <= 480) {
                    width = width / 1;
                }else{
                    width = width / 5;
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


                if (width < 1024 && width >= 600) {
                    width = width / 2;
                } else if (width <= 480) {
                    width = width / 1;
                }else{
                    width = width / 4;
                }

                carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

        
    });
    $(function() {
        var jcarousel = $('#top-employer .jcarousel');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var carousel = $(this),
                    width = carousel.innerWidth();

                if (width < 1024 && width >= 600) {
                    width = width / 3;
                } else if (width <= 480) {
                    width = width / 1;
                }else{
                    width = width / 6;
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
        language: "vi",
    });
    $("#jobLevelMainSearch,#ForeignLanguages,#CurrentLevel,#WishLevel,#FieldOfStudy,#Scope,#LatestLevel,#Diploma,#HighestDegree,#District,#Cities,#Nationality, #jobObjMainSearch,#jobExpMainSearch,#DateOfBirth,#MonthOfBirth,#YearOfBirth,#Gender,#Country,#MaritalStatus,#Category,#Province,#Level,#AverageGrade,#choose_cv,.up_time").select2({
        minimumResultsForSearch: Infinity,

    });

    $("#From_date,#To_date,#DOB,#Study_to,#Study_from").datetimepicker({
        pickTime: false,
    });



    // COUNTDOWN TEXTEREA
    var maxLength = 5000;
    $(document).on('keyup', '.keyup', function(event) {
        $(this).attr('maxLength', '5000');
      var length = $(this).val().length;
      var length = maxLength-length;
      var aclass = $(this).attr('class').replace('form-control keyup','');
      if(length < 0){
        $('em.'+aclass).html('<span style="color:red">Tối đa 5000 ký tự</span>');  
      }else{
        $('em.'+aclass).html(''+length+' ký tự có thể nhập thêm');  
      }
      
    });




    // POPOVER 
    $('.share-to-friends, .feedback-to-emp, .add-note').popover({
        html: true,
    });
    $('#searchJobPrenium').popover({
        html: true,
        trigger: 'hover',
        container: 'body'
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

    // Add new languages
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

    // select all
    $('#a_selectall,#a_selectall_u').click(function(event) {
        event.preventDefault();
        $('#selectall').prop('checked', true);
        $('.checkbox').each(function() { //loop through each checkbox
            this.checked = true;  //select all checkboxes with class "checkbox1"               
        });
    });
    $('#a_deselectall,#a_deselectall_u').click(function(event) {
        $('#selectall').prop('checked', false);
        $('.checkbox').each(function() { //loop through each checkbox
            this.checked = false;  //select all checkboxes with class "checkbox1"               
        });
    });
    $('#selectall').click(function(event) {  //on click 
            if(this.checked) { // check select status
                $('.checkbox').each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"               
                });
            }else{
                $('.checkbox').each(function() { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                });         
            }
        });

    // Nộp đơn
    if($('#choose_cv').val() == null){
        $('.is_file').prop('checked', true);
        $("#choose_cv").prop("disabled", true);
    }
    
    $('.is_file').click(function(event) {
        if(this.checked){
            $("#choose_cv").prop("disabled", true);       
        }else{
            $("#choose_cv").prop("disabled", false);
        }
    });

    // sort category hompage
    $('.search-by-categories .sort-by-categories ul li a').click(function(event) {
        event.preventDefault();
        $('.search-by-categories .sort-by-categories ul li a').removeClass('active');
        $(this).addClass('active');
        $('.search-by-categories .sort-name').text($(this).text());
        $('.search-by-categories .categories-list ul').addClass('hidden-xs');
        var cate_show = $(this).parent('li').attr('class');
        $('.search-by-categories .categories-list .'+cate_show).removeClass('hidden-xs');
    }); 

    // show more jobs top jobs on homepage
    $(document).on('click', '.top-job .load-more-ajax', function(event) {    
        event.preventDefault();
        $('.loading-icon').show();
        $('.top-job li').each(function(index, el) {
            if($(this).hasClass('hidden')){
                $(this).addClass('block');
            }
            $(this).removeClass('hidden', 1000);
            $('.loading-icon').hide();
        });
        $(this).removeClass('load-more-ajax').addClass('collapse-jobs');
        $(this).children('img').css({
            transform: 'rotateZ(180deg)'
        });
    });

    $(document).on('click', '.top-job .collapse-jobs', function(event) {
        event.preventDefault();
        $('.top-job li').each(function(index, el) {
            if($(this).hasClass('block')){
                $(this).addClass('hidden' , 1000);
            }
            $(this).removeClass('block');
        });
        $(this).removeClass('collapse-jobs').addClass('load-more-ajax');
        $(this).children('img').css({
            transform: 'rotateZ(0deg)'
        });
    });

    //scroll to div in edit cv
    function goToByScroll(id){
          // Scroll
        $('html,body').animate({
            scrollTop: $("#"+id).offset().top},
            'slow');
    }

    $(".card-item").click(function(e) { 
        // Prevent a page reload when a link is pressed
        e.preventDefault(); 
        var id = $(this).attr("id");
        id = id.replace("link-", "");
        // Call the scroll function
        $('#'+id).removeClass('hidden-xs');
        $('#'+id).removeAttr('style');
        goToByScroll(id);           
    });

    $('.top-category ul h4 span i, .top-province ul h4 span i').click(function(event) {
        event.preventDefault();
        $(this).closest('ul').addClass('hidden-xs');
    });

    $('.top-category, .top-province').mouseup(function() {
        $('.bottom-search li ul').addClass('hidden-xs');
        $(this).children('ul').removeClass('hidden-xs');
    });

    // FLOAT FIXED HEADER
    /*function fixDiv() {
        var $header = $('#header');
        if ($(window).scrollTop() > 200){
            $('#header').css({
                top: "-150px"
            });
        }
        else{
            $('#header').css({
                top: "0"
            });
        }
    }
    $(window).scroll(fixDiv);
    fixDiv();*/



    // BACK TO TOP
    if ( ($(window).height() + 900) < $(document).height() ) {
        $('#top-link-block').removeClass('hidden').affix({
        // how far to scroll down before link "slides" into view
        offset: {top:900}
        });
    }



    // FLOAT FIXED 
    $(function() {        
        $(".add-modules").floatingFixed({ padding: 150 });
        if($( "#Country option:selected" ).text() != 'Việt Nam'){
            $('#Cities').attr('disabled', 'disabled');
            $('#District').attr('disabled', 'disabled');
        }

        var height_emp = $('.top-employer .jcarousel li').outerWidth();
        $('.top-employer .jcarousel li').css('height', height_emp);
    });


    $(document).on('blur', '#specific-salary-input, .salary', function(event) {
        $(this).formatCurrency({digitGroupSymbol:','});
    });

    $('#Country').change(function(event) {
        $( "#Country option:selected" ).each(function() {
            if($(this).text() != 'Việt Nam'){
                $('#Cities').attr('disabled', 'disabled');
                $('#District').attr('disabled', 'disabled');
                $('#Cities option:selected').removeAttr('selected');
                $('#Cities option[value="65"]').attr('selected','selected').trigger( "change" );
            }else{
                $('#Cities').removeAttr('disabled', 'disabled');
                $('#District').removeAttr('disabled', 'disabled');
            }
        });
    });

    $('.featured-items .header-page a').click(function(event) {
        event.preventDefault();
        $('.featured-items .header-page a').removeClass('active');
        $(this).addClass('active');
        $('.top-job ul').addClass('hidden');
        $('.top-job ul.'+$(this).attr('id')).removeClass('hidden');
    });
    $('body').on('click', function (e) {
        $('[data-toggle="popover"]').each(function () {
            //the 'is' for buttons that trigger popups
            //the 'has' for icons within a button that triggers a popup
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });

    $(document).on('click', '#popup .close', function(event) {
        $('#fadein, #popup').fadeOut();
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


})(jQuery);



