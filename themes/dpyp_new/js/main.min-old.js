var slider_home={slide_primary:function(){var e=jQuery(".home-slide");0<e.length&&e.slick({lazyLoad:"ondemand",dots:!1,arrows:!0,infinite:!0,speed:300,autoplay:!0,autoplaySpeed:5e3,slidesToShow:1,slidesToScroll:1})},list_remedial:function(){var e=jQuery(".list-remedial");0<e.length&&e.slick({lazyLoad:"ondemand",dots:!0,arrows:!1,infinite:!0,speed:300,slidesToShow:5,slidesToScroll:5,centerPadding:"0px",responsive:[{breakpoint:1024,settings:{slidesToShow:4,slidesToScroll:4}},{breakpoint:769,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:576,settings:{slidesToShow:2,slidesToScroll:2}}]})},target_link:function(){var e=jQuery(".list-target-link");0<e.length&&e.slick({lazyLoad:"ondemand",dots:!0,arrows:!1,infinite:!0,speed:300,slidesToShow:3,slidesToScroll:3,centerPadding:"0px",responsive:[{breakpoint:1024,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:769,settings:{slidesToShow:2,slidesToScroll:2,centerMode:!0,centerPadding:"80px"}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,centerPadding:"50px"}},{breakpoint:415,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:376,settings:{slidesToShow:1,slidesToScroll:1}}]})},slide_video:function(){var e=jQuery(".slide-video-home");2<jQuery(".slide-video-home .post").length&&e.slick({lazyLoad:"ondemand",dots:!1,arrows:!0,infinite:!0,speed:300,slidesToShow:4,slidesToScroll:4,centerPadding:"0px",responsive:[{breakpoint:1024,settings:{slidesToShow:4,slidesToScroll:4}},{breakpoint:769,settings:{slidesToShow:2,slidesToScroll:2,centerMode:!0,centerPadding:"80px"}},{breakpoint:575,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,centerPadding:"80px"}},{breakpoint:375,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,centerPadding:"50px"}}]})},doctor:function(){var e=jQuery(".list-doctor");2<jQuery(".home-doctor .doctor-item").length&&e.slick({lazyLoad:"ondemand",dots:!1,arrows:!0,infinite:!0,speed:300,slidesToShow:4,slidesToScroll:4,centerPadding:"0px",responsive:[{breakpoint:1024,settings:{slidesToShow:4,slidesToScroll:4}},{breakpoint:769,settings:{slidesToShow:2,slidesToScroll:2,centerMode:!0,centerPadding:"80px"}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,centerPadding:"80px"}},{breakpoint:376,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,centerPadding:"30px"}}]})},testimonial:function(){var e=jQuery(".list-testimonial");2<jQuery(".list-testimonial .testimonial-item").length&&e.slick({lazyLoad:"ondemand",dots:!0,arrows:!1,infinite:!0,speed:300,slidesToShow:3,slidesToScroll:3,responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:3,infinite:!0,dots:!0}},{breakpoint:575,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,arrows:!1}},{breakpoint:375,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,arrows:!1}}]})},gallery:function(){var e=jQuery(".list-gallery");3<jQuery(".list-gallery .col-6").length&&e.slick({lazyLoad:"ondemand",dots:!0,arrows:!0,infinite:!0,speed:300,slidesToShow:3,slidesToScroll:3,responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:3,infinite:!0,dots:!0}},{breakpoint:575,settings:{slidesToShow:2,slidesToScroll:2,centerMode:!0,dots:!1,arrows:!0}},{breakpoint:416,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,dots:!1,arrows:!0}}]})},newspaper:function(){var e=jQuery(".list-newspaper");2<jQuery(".list-newspaper .inner-item").length&&e.slick({lazyLoad:"ondemand",dots:!1,arrows:!0,infinite:!0,speed:300,slidesToShow:4,slidesToScroll:4,responsive:[{breakpoint:1024,settings:{slidesToShow:4,slidesToScroll:4,infinite:!0,dots:!0}},{breakpoint:575,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,arrows:!1}},{breakpoint:375,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,arrows:!1}}]})},partner:function(){var e=jQuery(".list-partner");0<e.length&&e.slick({lazyLoad:"ondemand",dots:!1,arrows:!0,infinite:!0,speed:300,slidesToShow:6,slidesToScroll:6,responsive:[{breakpoint:1024,settings:{slidesToShow:6,slidesToScroll:6,infinite:!0,dots:!0}},{breakpoint:575,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:415,settings:{slidesToShow:2,slidesToScroll:2}}]})}},slider_video={video:function(){var e=jQuery("#section-1 .video-slider");e.length&&e.slick({dots:!1,infinite:!0,speed:500,arrows:!1,slidesToShow:5,slidesToScroll:1,autoplay:!1,autoplaySpeed:2e3,responsive:[{breakpoint:1400,settings:{slidesToShow:4,slidesToScroll:1}},{breakpoint:769,settings:{slidesToShow:3,slidesToScroll:1}},{breakpoint:576,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,arrows:!1}},{breakpoint:375,settings:{slidesToShow:1,slidesToScroll:1,centerMode:!0,arrows:!1}}]})}},menu_mobile={init:function(){var e=jQuery("#btn-mobile-menu");e.length&&(e.click(function(){jQuery("#primary-nav-collapse,.close-menu-mb").toggleClass("open")}),jQuery(".close-menu-mb").click(function(){jQuery(e).trigger("click")}),jQuery(document).click(function(e){jQuery(e.target).closest("#btn-mobile-menu, #primary-nav-collapse, .close-menu-mb").length||jQuery("#primary-nav-collapse, .close-menu-mb").removeClass("open")}))}},common_settings={init:function(){jQuery(".btn-to-top,.action-desktop .btn-top").on("click",function(e){e.preventDefault(),jQuery("html,body").animate({scrollTop:0},700)}),jQuery(".form-label").find("input,textarea,select").change(function(e){null!=jQuery(this).val()&&""!=jQuery(this).val()?jQuery(this).parent().addClass("hasval"):jQuery(this).parent().removeClass("hasval")}),jQuery(".form-label input,.form-label textarea,.form-label select").each(function(){null!=jQuery(this).val()&&""!=jQuery(this).val()?jQuery(this).parent().addClass("hasval"):jQuery(this).parent().removeClass("hasval")}),jQuery("#date-trigger").change(function(){var e=jQuery(this).val();jQuery(this).siblings("#date-form").val(e)});var e=jQuery(".btn-icon-phone");e.length&&(e.click(function(){jQuery(".modal-hotline-mobile").toggleClass("show"),jQuery("#txt-numberphone-input").focus()}),jQuery(".modal-hotline-mobile .close-modal").click(function(){jQuery(".modal-hotline-mobile").removeClass("show")})),jQuery(".navbar .dropdown > a").click(function(){location.href=this.href});var o=jQuery(".btn-menu-mb");o.length&&o.click(function(){jQuery("#primary-nav-collapse").toggleClass("active"),jQuery(this).toggleClass("active")});var n=jQuery(".full-tabs-care ul li");n.length&&n.click(function(){var e=jQuery(this).data("id");jQuery('.home-care [id*="tabs-content-"]').removeClass("active"),jQuery("#"+e).addClass("active"),jQuery(".full-tabs-care ul li").removeClass("active"),jQuery(this).addClass("active")}),jQuery(".entry iframe").addClass("embed-responsive-item"),jQuery(".entry iframe").wrap("<div class='embed-responsive embed-responsive-16by9'></div>");var t=jQuery('.comment-form [name="comment"]');0<t.length&&t.focus(function(){jQuery(".comment-form .comment-form-author").addClass("show"),jQuery(".comment-form .comment-form-email").addClass("show")});var i=jQuery(".action-mobile .item-share");0<i.length&&(i.click(function(e){e.preventDefault(),jQuery(".action-share,.bg-action-share").toggleClass("show-share")}),jQuery(".bg-action-share,.action-share .close-share").click(function(){i.trigger("click")}));var r=1;jQuery(".comment_loadmore").click(function(){var o=jQuery(this);return r++,console.log(r),jQuery.ajax({url:ajaxurl,data:{action:"cloadmore",post_id:parent_post_id,cpage:r},type:"POST",beforeSend:function(e){o.text("Đang tải...")},success:function(e){console.log(cpage),e?(jQuery("ol.comment-list").append(e),o.text("Xem thêm"),cpage==r&&o.remove()):o.remove()}}),!1}),0<jQuery("#comments").length&&(jQuery(".action-mobile .btn-comment-mb").on("click",function(e){e.preventDefault(),jQuery("#comments #comment").focus()}),jQuery(".action-desktop .sc-comments,.action-mobile .item-comment").on("click",function(e){e.preventDefault();var o=jQuery("#comments").position().top;jQuery("html,body").animate({scrollTop:o},700)}));var a=jQuery(".action-share li.copy-link a");a.length&&a.click(function(e){e.preventDefault();var o=jQuery(this).attr("href"),n=jQuery("<input>");jQuery("body").append(n),n.val(o).select(),document.execCommand("copy"),n.remove(),jQuery(".alert-copy").fadeIn(500).fadeOut(4e3)}),jQuery(".list-video-kol .post a").click(function(){var e=jQuery(this).data("src");jQuery("#image-show-video").attr("src","https://www.youtube.com/embed/"+e+"?autoplay=1&amp;modestbranding=1&amp;showinfo=0;rel=0")}),jQuery(".s-activate .video-activate .close,#video-popup").click(function(){jQuery("#image-show-video").attr("src","")})},light_gallery:function(){var e=jQuery("#lightgallery .item-gallery");e.length&&e.magnificPopup({type:"image",gallery:{enabled:!0}})}},google_form={apointment:function(){var e=jQuery("form.form-apointment");0<e.length&&e.on("submit",function(e){var o=jQuery(this);return google_form.send_apointment(o),!1})},send_apointment:function(e){var o=new FormData,n=jQuery(e).find('[name="fullname"]').val(),t=jQuery(e).find('[name="numberphone"]').val(),i=jQuery(e).find('[name="email"]').val(),r=jQuery(e).find('[name="service"]').val(),a=jQuery(e).find('[name="office"]').val(),s=jQuery(e).find('[name="date"]').val(),l=jQuery(e).find('[name="content"]').val(),d=window.location.href,c=document.referrer;o.append("fullname",n),o.append("phone",t),o.append("office",a),o.append("email",i),o.append("service",r),o.append("date",s),o.append("content",l),o.append("data_url",d),o.append("data_url_refer",c),o.append("action","form_dat_lich"),""!==n&&""!==t?jQuery.ajax({type:"POST",url:vmajax.ajaxurl,cache:!1,contentType:!1,processData:!1,data:o,dataType:"html",success:function(){window.location.replace(window.location.origin+"/thanks/?action=success")}}):alert("Lỗi!!! Kiểm tra thông tin vừa nhập")},contact:function(){var e=jQuery("form.form-contact");0<e.length&&e.on("submit",function(e){var o=jQuery(this);return google_form.send_question_contact(o),!1})},send_question_contact:function(e){var o=new FormData,n=jQuery(e).find('[name="fullname"]').val(),t=jQuery(e).find('[name="numberphone"]').val(),i=jQuery(e).find('[name="email"]').val(),r=jQuery(e).find('[name="subject"]').val(),a=jQuery(e).find('[name="content"]').val(),s=window.location.href,l=document.referrer;o.append("fullname",n),o.append("phone",t),o.append("email",i),o.append("subject",r),o.append("content",a),o.append("data_url",s),o.append("data_url_refer",l),o.append("action","form_send_contact"),""!==n&&""!==t?jQuery.ajax({type:"POST",url:vmajax.ajaxurl,cache:!1,contentType:!1,processData:!1,data:o,dataType:"html",success:function(){window.location.replace(window.location.origin+"/thanks/?action=success")}}):alert("Lỗi!!! Kiểm tra thông tin vừa nhập")},form_sidebar:function(){var e=jQuery("form.form-sidebar");0<e.length&&e.on("submit",function(e){var o=jQuery(this);return google_form.send_question_sidebar(o),!1})},send_question_sidebar:function(e){var o=new FormData,n=jQuery(e).find('[name="fullname"]').val(),t=jQuery(e).find('[name="numberphone"]').val(),i=jQuery(e).find('[name="email"]').val(),r=jQuery(e).find('[name="category"]').val(),a=jQuery(e).find('[name="content"]').val(),s=window.location.href,l=document.referrer;o.append("fullname",n),o.append("phone",t),o.append("email",i),o.append("category",r),o.append("content",a),o.append("data_url",s),o.append("data_url_refer",l),o.append("action","form_send_sidebar"),""!==n&&""!==t?jQuery.ajax({type:"POST",url:vmajax.ajaxurl,cache:!1,contentType:!1,processData:!1,data:o,dataType:"html",success:function(){window.location.replace(window.location.origin+"/thanks/?action=success")}}):alert("Lỗi!!! Kiểm tra thông tin vừa nhập")},form_footer:function(){var e=jQuery("form.dat-lich-footer");0<e.length&&e.on("submit",function(e){var o=jQuery(this);return google_form.send_question_footer(o),!1})},send_question_footer:function(e){var o=new FormData,n=jQuery(e).find('[name="fullname"]').val(),t=jQuery(e).find('[name="numberphone"]').val(),i=window.location.href,r=document.referrer;o.append("fullname",n),o.append("phone",t),o.append("data_url",i),o.append("data_url_refer",r),o.append("action","form_send_footer"),""!==n&&""!==t?jQuery.ajax({type:"POST",url:vmajax.ajaxurl,cache:!1,contentType:!1,processData:!1,data:o,dataType:"html",success:function(){jQuery(e).closest("form").find("input[type=text],input[type=email], textarea").val(""),jQuery(e).find("button").attr("disabled","disabled"),alert("Đặt lịch thành công. Chuyên gia sẽ sớm liên hệ với bạn! Xin cảm ơn")}}):alert("Lỗi!!! Kiểm tra thông tin vừa nhập")}};jQuery(document).ready(function(){slider_home.slide_primary(),slider_home.list_remedial(),slider_home.target_link(),slider_home.slide_video(),slider_home.doctor(),slider_home.testimonial(),slider_home.gallery(),slider_home.newspaper(),slider_home.partner(),slider_video.video(),menu_mobile.init(),common_settings.init(),common_settings.light_gallery(),google_form.apointment(),google_form.contact(),google_form.form_sidebar(),google_form.form_footer()});