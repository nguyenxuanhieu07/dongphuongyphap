jQuery(document).ready(function ($) {
    'use strict';

    function send_booking_doctor_to_google(container) {
        var doctor = '';
        var profile = '';
        var booking_date = '';
        var booking_hour = '';
        var fullname = $(container).find('input[name="fullname"]').val();
        var numberphone = $(container).find('input[name="numberphone"]').val();
        var email = $(container).find('input[name="email"]').val();
        var content = $(container).find('[name="content"]').val();
        if ($(container).find('input[name="doctor"]').length) {
            doctor = $(container).find('input[name="doctor"]').val();
        }
        if ($(container).find('input[name="profile"]').length) {
            profile = $(container).find('input[name="profile"]').val();
        }
        if ($(container).find('input[name="booking-date"]').length) {
            booking_date = $(container).find('input[name="booking-date"]').val();
        }
        if ($(container).find('input[name="booking-hour"]').length) {
            booking_hour = $(container).find('input[name="booking-hour"]').val();
        }
        var data_url = window.location.href;
        var referer = document.referrer;
        console.log(doctor);
        if ((fullname !== "" && numberphone !== "")) {
            $.ajax({
                url: "https://docs.google.com/forms/u/0/d/e/1FAIpQLSd3C4bCoW_zrE-16BYbn-Kuh7ROh0TGF8E_cljdGOyJvsEFNA/formResponse",
                data: {
                    "entry.554388087": fullname,
                    "entry.1675548551": numberphone,
                    "entry.276997184": email,
                    "entry.1831787997": content,
                    "entry.2002543583": doctor,
                    "entry.1964063566": profile,
                    "entry.1220798591": data_url,
                    "entry.55027957": referer,
                    "entry.1503411857": booking_date,
                    "entry.1032311434": booking_hour
                },
                type: "POST",
                dataType: "xml",
                statusCode: {
                    0: function () {
                        alert('Gửi thành công!');
                        location.reload();
                    },
                }
            });
        } else {
            alert('Kiểm tra lại thông tin bạn vừa nhập')
        }
    }
    $(window).load(function () {
        $('form.send-booking-doctor').on('submit', function (event) {
            var container = $(this);
            send_booking_doctor_to_google(container);
            return false;
        });
        $('.list-expert .expert .btn-appointment').click(function () {
            var img_doctor = $(this).parent().parent().find('.avatar img').attr('src');
            var name_doctor = $(this).parent().parent().find('.expert-title').text().trim();
            var office = $(this).parent().parent().find('.expert-info .vcard').text().trim();
            $('form.send-booking-doctor').find('[name="doctor"]').val(name_doctor);
            $('form.send-booking-doctor').find('.expert-box .expert-name strong').text(name_doctor);
            $('form.send-booking-doctor').find('.office').text(office);
            $('form.send-booking-doctor').find('.avt-box img').attr('src', img_doctor);
            $('#modal-booking-doctor').modal('show');
            return false;
        });
        $('.conlution-expert-sidebar .btn-appointment').click(function () {
            var img_doctor = $(this).parent().parent().find('.avatar img').attr('src');
            var name_doctor = $(this).parent().parent().find('.expert-title').text().trim();
            var office = $(this).parent().parent().find('.expert-info .vcard').text().trim();
            $('form.send-booking-doctor').find('[name="doctor"]').val(name_doctor);
            $('form.send-booking-doctor').find('.expert-box .expert-name strong').text(name_doctor);
            $('form.send-booking-doctor').find('.office').text(office);
            $('form.send-booking-doctor').find('.avt-box img').attr('src', img_doctor);
            $('#modal-booking-doctor').modal('show');
            return false;
        });
    });
});

jQuery(document).ready(function($){
    
    if($("div.entry-content").hasClass('entry-content-gallery')){
        $('.item-gallery > a.images').magnificPopup({
        type: 'image',
        mainClass: 'mfp-with-zoom', 
        gallery:{
            enabled:true
        },
        zoom: {
            enabled: true, 
            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out', // CSS transition easing function
            opener: function(openerElement) {
            return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        }
        });
    }

    $('.alpha-list a[href^="#"]').click(function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        $('html, body').animate({
          scrollTop: $(target).offset().top
        }, 500);
    });
});