import './bootstrap';
(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    //$('[data-toggle="counter-up"]').counterUp({
       // delay: 10,
       // time: 2000
    //});


    // Courses carousel
    $(document).ready(function () {
        $(".courses-carousel").owlCarousel({
            autoplay: true,
            smartSpeed: 1500,
            loop: true,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                }
            }
        });
    });

    //Speakers
    let i= 0;
    $('#add_speaker').click(function () {
        ++i;
        $('#table1').append(
            '<tr>' +
            '<td><input type="text" name="inputs['+i+'][\'name\']" class="form-control"></td>'+
            '<td><input type="text" name="inputs['+i+'][\'position\']" class="form-control"></td>'+
            '<td><input type="file" name="inputs['+i+'][\'speaker_photo\']" class="form-control"></td>'+
            '<td><button type="button" class="btn btn-danger remove-table-row">Remove</button></td>' +
            '</tr>'
        );
    })
    $(document).on('click', '.remove-table-row', function () {
        $(this).parents('tr').remove();
    });

//Programme
    let x= 0;
    $('#add_event').click(function () {
        ++x;
        $('#table2').append(
            '<tr>' +
            '<td><input type="time" name="inputs['+x+'[\'time\']" class="form-control"></td>'+
            '<td><input type="text" name="inputs['+x+'[\'event\']" class="form-control"></td>'+
            '<td><button type="button" class="btn btn-danger remove-table-row-2">Remove</button></td>' +
            '</tr>'
        );
    })
    $(document).on('click', '.remove-table-row-2', function () {
        $(this).parents('tr').remove();
    });



    // Team carousel
    $(".team-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1,
                loop:( $('.item').length > 1 )
            },
            576:{
                items:1,
                loop:( $('.item').length > 1 )
            },
            768:{
                items:2,
                loop:( $('.item').length > 2 )
            },
            992:{
                items:3,
                loop:( $('.item').length > 3 ),
            }
        }
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
    });


    // Related carousel
    $(".related-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            }
        }
    });

})(jQuery);



