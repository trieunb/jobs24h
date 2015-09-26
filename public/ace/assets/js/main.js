(function($) {
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
        var newskill = "<div class='form-group'><div class='col-sm-7'><input class='skill form-control' name='skills[]' type='text'></div><div class='col-sm-5'><select class='level_skill form-control' name='level_skills[]'><option value='' selected='selected'>- Vui lòng chọn -</option><option value='0'>Sơ cấp</option><option value='1'>Trung cấp</option><option value='2'>Cao cấp</option></select></div></div>";
        $('#saveSkills').append(newskill);
    });


})(jQuery);