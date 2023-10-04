var countDown = {
	init: function () {
		var second = 1000,
			minute = second * 60,
			hour = minute * 60,
			day = hour * 24;
	
		var endtime = "November 20 2020 16:44:30",
		countDown = new Date(endtime).getTime(),
		x = setInterval(function() {

			var now = new Date().getTime(),
				distance =  parseInt(countDown) - now;
	
			var days = Math.floor(distance / (day));
			var hours = Math.floor((distance % (day)) / (hour));
			var minutes = Math.floor((distance % (hour)) / (minute));
			var seconds = Math.floor((distance % (minute)) / second);
				
			if (days < 10) { days = "0" + days; }
			if (hours < 10) { hours = "0" + hours; }
			if (minutes < 10) { minutes = "0" + minutes; }
			if (seconds < 10) { seconds = "0" + seconds; }
	
			jQuery("#days").text(days),
			jQuery("#hours").text(hours),
			jQuery("#minutes").text(minutes),
			jQuery("#seconds").text(seconds);
	
			if (distance < 0) {	
				jQuery("#days").text(0),
				jQuery("#hours").text(0),
				jQuery("#minutes").text(0),
				jQuery("#seconds").text(0);
				clearInterval(x);
			}
		}, 0)
	}
}
var slide = {
	banner: function () {
		var slide_banner = jQuery(".list-banner-ss2");
		if( slide_banner.length ){
			slide_banner.slick({
                lazyLoad: 'ondemand',
                dots: false,
                infinite: true,
                arrows: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay:true,
                autoplaySpeed:3000
            });
		}
	},
	album: function () {
		var slide_album = jQuery(".home-ss-6 .list-item-62");
		if( slide_album.length ){
			slide_album.slick({
                lazyLoad: 'ondemand',
                dots: true,
                infinite: true,
                arrows: false,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay:true,
                autoplaySpeed:3000,
                responsive: [
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    }
                ]
            });
		}
	},
	doctor: function () {
		var slide_doctor = jQuery(".list-doctor");
		if( slide_doctor.length ){
			slide_doctor.slick({
                lazyLoad: 'ondemand',
                dots: false,
                infinite: true,
                arrows: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay:true,
                autoplaySpeed:3000,
                responsive: [
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: true,
                        }
                    }
                ]
            });
		}
	},
	slide_6: function () {
		var slide_6 = jQuery(".list-item-61");
		if( slide_6.length ){
			slide_6.slick({
                lazyLoad: 'ondemand',
                dots: false,
                infinite: true,
                arrows: true,
                speed: 300,
                slidesToShow: 5,
                slidesToScroll: 5,
                autoplay:true,
                autoplaySpeed:3000,
                responsive: [
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 5,
                        }
                    },
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
							dots: true,
							arrows: false,
                            centerMode:true,
                            centerPadding: '80px',
                        }
                    }
                ]
            });
		}
	},
	gallery: function () {
		var slide_gallery = jQuery(".list-gallery");
		if( slide_gallery.length ){
			slide_gallery.slick({
                lazyLoad: 'ondemand',
                dots: false,
                infinite: true,
                arrows: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay:true,
                autoplaySpeed:3000,
                responsive: [
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
							arrows: false,
							dots:true,
                        }
                    }
                ]
            });
		}
	},
	customer: function () {
		var slide_customer = jQuery(".list-customer");
		if( slide_customer.length ){
			slide_customer.slick({
                lazyLoad: 'ondemand',
                dots: false,
                infinite: true,
                arrows: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay:true,
                autoplaySpeed:3000
            });
		}
	},
	newspaper: function () {
		var slide_newspaper = jQuery(".list-newspaper");
		if( slide_newspaper.length ){
			slide_newspaper.slick({
                lazyLoad: 'ondemand',
                dots: false,
                infinite: true,
                arrows: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay:true,
                autoplaySpeed:3000,
                responsive: [
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            centerMode:true,
                            centerPadding: '80px',
                        }
                    }
                ]
            });
		}
	},
}
var common_settings = {
    init: function () {
        jQuery('.btn-to-top').on('click', function (e) {
            e.preventDefault();
            jQuery('html,body').animate({
                scrollTop: 0
            }, 700);
        });

        var comment_textarea = jQuery('.comment-form [name="comment"]');
        if (comment_textarea.length > 0) {
            comment_textarea.focus(function () {
                jQuery('.comment-form .comment-form-author').addClass('show');
                jQuery('.comment-form .comment-form-email').addClass('show');
            })
        };

        // click video modal
        var video_item = jQuery("a.thumbnail-video");
        video_item.click(function () {
            var videoSrc = jQuery(this).data('src');

            console.log(videoSrc);

            jQuery("#image-show-video").attr("src", "https://www.youtube.com/embed/" + videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0;rel=0");
        });

        jQuery(".video-popup .close,#video-popup").click(function () {
            jQuery("#image-show-video").attr("src", "");
        });
    },
};

var wheel = {
    init: function () {

        setTimeout(function(){
            jQuery('#wheel-popup').modal('show');
        }, 6000);

        let theWheel = new Winwheel({
            'numSegments'       : 6,
            'outerRadius'       : 150,
            'drawMode'          : 'image',
            'drawText'          : false,
            'textFontSize'      : 12,
            'textOrientation'   : 'curved',
            'textDirection'     : 'reversed',
            'textAlignment'     : 'outer',
            'textMargin'        : 5,
            'textFontFamily'    : 'monospace',
            'textStrokeStyle'   : 'black',
            'textLineWidth'     : 2,
            'textFillStyle'     : 'white',
            'segments'     :
            [
               {'text' : 'trượt mất rồi'},
               {'text' : 'voucher giảm giá 500k'},
               {'text' : 'buổi massage thư giãn'},
               {'text' : 'trà giảm cân'},
               {'text' : 'Voucher giảm giá 100k'},
               {'text' : 'liệu trình'}
            ],
            'animation' :
            {
                'type'     : 'spinToStop',
                'duration' : 5,
                'spins'    : 8,
                'callbackFinished' : alertPrize
            }
        });
        let loadedImg = new Image();
        loadedImg.onload = function()
        {
            theWheel.wheelImage = loadedImg;
            theWheel.draw();
        }
        loadedImg.src = document.location.origin + "/wp-content/themes/dpyp/landingpage/cay-chi/images/planes.png";
        let wheelSpinning = false;

        jQuery("#spin_button").click(function(){
            if (wheelSpinning == false) {
                let stopAt = [getRndInteger(121,239), getRndInteger(1,59)];
                
                const random = Math.floor(Math.random() * stopAt.length);
                theWheel.animation.stopAngle = stopAt[random];
                theWheel.startAnimation();
                wheelSpinning = true;
            }
        });
        
        // jQuery("#resetwheel").click(function(){
        //     theWheel.stopAnimation(false);
        //     theWheel.rotationAngle = 0;
        //     theWheel.draw();
        //     wheelSpinning = false;
        // });

        function getRndInteger(min, max) {
            return Math.floor(Math.random() * (max - min)) + min;
        }

        function alertPrize(indicatedSegment){
            if( indicatedSegment.text === 'trượt mất rồi' ){
                jQuery("#form-contact").find('[name="voucher"]').val(indicatedSegment.text);
                jQuery(".header-congra .note-form").text('Gửi thông tin để nhận ưu đãi khác từ chúng tôi');
                jQuery(".header-congra .title-congra-1").text('Tiếc quá');
                jQuery("#voucher-result").text( indicatedSegment.text);
            }else{
                jQuery("#form-contact").find('[name="voucher"]').val(indicatedSegment.text);
                jQuery("#voucher-result").text( '01 ' + indicatedSegment.text);
            }
            jQuery('#form-contact').modal('show');
            jQuery('#wheel-popup').modal('hide');
        }
    }
};

var google_form = {
    init: function () {
        var send_question_form = jQuery('.content-form');
        if (send_question_form.length > 0) {
            send_question_form.on('submit', function (event) {
                var container = jQuery(this);
                google_form.send_contact(container, 'Gửi thông tin thành công, xin cảm ơn !!!')
                return false;
            });
        }
    },
    send_contact: function(container, message) {
        var fullname = jQuery(container).find('[name="fullname"]').val();
        var phone = jQuery(container).find('[name="numberphone"]').val();
        var voucher = jQuery(container).find('[name="voucher"]').val();
        if( voucher != '' && voucher != undefined ){
            var voucher = jQuery(container).find('[name="voucher"]').val();
        }else{
            var voucher = '';
        }

        var content = jQuery(container).find('[name="content"]').val();
        if( content != '' && content != undefined ){
            var content = jQuery(container).find('[name="content"]').val();
        }else{
            var content = '';
        }
        
        var data_url = window.location.href;
        var referer_url = document.referrer;
        var success_message = '<div class="alert alert-info mt-2 message-text" role="alert">';
        success_message += '<p class="text-center">' + message + '</p>'
        success_message += '</div>';


        if( fullname !== "" && phone !== "" ) {
            jQuery.ajax({
                url: "https://docs.google.com/forms/u/0/d/e/1FAIpQLSeuBsbI5Z2ylFbOT66PIHr4AtkcGyVVYn9rsIk5DYtajOhS9A/formResponse",
                data: {
                    "entry.1528698805": fullname,
                    "entry.1340238730": phone,
                    "entry.1259626153": voucher,
                    "entry.1701263537": content,

                    "entry.1243529540": data_url,
                    "entry.2045552034": referer_url,
                },
                type: "POST",
                dataType: "html",
                statusCode: {
                    0: function () {
                        jQuery(container).next('.result-form').append(success_message)
                        jQuery(container).closest('form').find("[type=text], textarea").val("");
                        jQuery(container).find('button').attr('disabled', 'disabled');
                        setTimeout(function () {
                            jQuery(container).next('.result-form').empty()
                        }, 10000);
                    },
                    200: function () {
                        jQuery(container).next('.result-form').append(success_message);
                        jQuery(container).closest('form').find("[type=text], textarea").val("");
                        jQuery(container).find('button').attr('disabled', 'disabled');
                        setTimeout(function () {
                            jQuery(container).next('.result-form').empty();
                        }, 10000);
                    }
                },
            });
        } else {
            alert("Kiểm tra lại các thông vừa nhập");
        }
    }
}

jQuery(document).ready(function() {
    countDown.init();
    
	slide.banner();
	slide.album();
	slide.doctor();
	slide.gallery();
	slide.slide_6();
	slide.customer();
	slide.newspaper();

    common_settings.init();
    
    wheel.init();
    
    google_form.init();
});