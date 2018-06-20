$(document).ready(function () {

    var $window_width = $(window).width();

    //if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
    var $L = 992,
        $menu_navigation = $('#main-nav'),
        $hamburger_icon = $('#hamburger-menu'),
        $shadow_layer = $('#shadow-layer');

    //open lateral menu on mobile
    $hamburger_icon.on('click', function (event) {
        event.preventDefault();
        $(this).toggleClass("is-active");
        toggle_panel_visibility($menu_navigation, $shadow_layer, $('body'));
    });

    //close lateral cart or lateral menu
    $shadow_layer.on('click', function () {
        $shadow_layer.removeClass('is-visible');
        $hamburger_icon.removeClass("is-active");
        $menu_navigation.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
            $('body').removeClass('overflow-hidden');
        });
    });

    //move #main-navigation inside header on laptop
    //insert #main-navigation after header on mobile
    move_navigation($menu_navigation, $L);
    blocks_arrange($window_width);

    $(window).on('resize', function () {
        move_navigation($menu_navigation, $L);
        if ($(window).width() >= $L && $menu_navigation.hasClass('speed-in')) {
            $menu_navigation.removeClass('speed-in');
            $shadow_layer.removeClass('is-visible');
            $('body').removeClass('overflow-hidden');
        }
        $window_width = $(window).width();
        blocks_arrange($window_width);
    });

    function blocks_arrange($window_width) {
        if ($window_width > 992) {
            $('.block').each(function () {
                $(this).height($(this).width());
            });
            $('.block-half').each(function () {
                $(this).height($(this).width() / 2 - 5);
            });
            $('.block-quarter').each(function () {
                $(this).height($(this).width() - 5);
            });
        } else {
            $('.block').each(function () {
                $(this).height($(this).width());
            });
        }
    }

    function toggle_panel_visibility($lateral_panel, $background_layer, $body) {
        if ($lateral_panel.hasClass('speed-in')) {
            // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
            $lateral_panel.removeClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $body.removeClass('overflow-hidden');
            });
            $background_layer.removeClass('is-visible');

        } else {
            $lateral_panel.addClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $body.addClass('overflow-hidden');
            });
            $background_layer.addClass('is-visible');
        }
    }

    function move_navigation($navigation, $MQ) {
        if ($(window).width() >= $MQ) {
            // $navigation.detach();
            // $navigation.appendTo('header .main-header');
        } else {
            $navigation.detach();
            $navigation.insertAfter('header');
        }
    }

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    $('#stepbystep').smartWizard({
        theme: 'custom',
        lang: {
            next: "Продолжить",
            previous: 'Назад'
        },
        toolbarSettings: {
            toolbarPosition: 'bottom',
            toolbarExtraButtons: [
                $('<button type="submit"></button>').text('Сохранить')
                    .addClass('btn sw-btn-finish display-none')
                    .on('click', function () {
                        // alert('Finsih button click');
                    })
            ]
        },
        anchorSettings: {
            markDoneStep: true, // add done css
            markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
            removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
            enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
        }
    });

    $("#stepbystep").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
        var elmForm = $("#form-step-" + stepNumber);
        console.log(elmForm);
        console.log(stepNumber);

        // stepDirection === 'forward' :- this condition allows to do the form validation
        // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
        if (stepDirection === 'forward' && elmForm == elmForm) {
            elmForm.validator('validate');
            var elmErr = elmForm.children('.has-error');
            if (elmErr && elmErr.length > 0) {
                // Form validation failed                    
                return false;
            }
        }
        return true;
    });

    $("#stepbystep").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
        if (stepNumber != '3') {
            $('.sw-btn-finish').hide();
        } else {
            $('.sw-btn-finish').show();
        }
    });

    var skillsInput = document.querySelector('input[id=skills]'),
        skills = new Tagify(skillsInput, {
            whitelist: []
        })
    skills.on('remove', onRemoveTag);

    function onRemoveTag(e) {
        console.log(e, e.detail);
    }

    function onAddTag(e) {
        console.log(e, e.detail);
    }

    var url = "//free.test/js/data.json";
    jQuery.getJSON(url).done(
        function (data) {
            jQuery('.sphera-multi').select2({
                placeholder: 'Выберите ваши сферы',
                allowClear: true,
                minimumInputLength: 0,
                multiple: true,
                data: data,
                theme: "bootstrap4",
                width: '100%',
                maximumSelectionLength: 7
            });
        }
    );
});
