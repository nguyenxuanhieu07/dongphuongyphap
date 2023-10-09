var home_slider={
	init: function() {
		home_slider.slider_solution();
		home_slider.slider_feedback();
		home_slider.slider_expert();
	},
	slider_solution: function() {
		var list_slide=$('.home-slide-solution .list-solution'),
			item=$('.home-slide-solution .list-solution .solution-item');
		if(list_slide.length>0&&item.length>6) {
			list_slide.slick({
				dots: false,
				arrow: true,
				speed: 1000,
				// autoplay: true,
				autoplaySpeed: 3000,
				slidesToShow: 6,
				slidesToScroll: 6,
				responsive: [
					{
						breakpoint: 575,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
							infinite: true,
							dots: true,
							centerMode: false,
							arrows: false,
						},
					},
				],
			});
		}
	},
	slider_feedback: function() {
		var list_slide=$('.home-feedback .list-feedback'),
			item=$('.home-feedback .list-feedback .feeback-item');
		if(list_slide.length>0&&item.length>3) {
			list_slide.slick({
				dots: true,
				arrow: true,
				speed: 1000,
				centerMode: true,
				centerPadding: '0',
				slidesToShow: 3,
				slidesToScroll: 1,
				responsive: [
					{
						breakpoint: 575,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
							infinite: true,
							dots: true,
							centerMode: false,
							arrows: false,
						},
					},
				],
			});
		}
	},
	slider_expert: function() {
		var list_slide=$('.home-expert .list-expert'),
			item=$('.home-expert .list-expert .item');
		if(list_slide.length>0&&item.length>4) {
			list_slide.slick({
				dots: false,
				arrow: true,
				speed: 1000,
				slidesToShow: 4,
				slidesToScroll: 4,
				responsive: [
					{
						breakpoint: 575,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
							infinite: true,
							dots: true,
							centerMode: false,
							arrows: false,
						},
					},
				],
			});
		}
	}
}
var page_slider={
	init: function() {
		page_slider.list_infrastructure();
		page_slider.list_technician();
		//page product
		page_slider.list_gallery();
		page_slider.list_product();
		page_slider.list_adive_bottom();
	},
	list_infrastructure: function() {
		var list_slide=$('.basis-infrastructure .list-infrastructure'),
			item=$('.basis-infrastructure .list-infrastructure .item');
		if(list_slide.length>0&&item.length>3) {
			list_slide.slick({
				dots: false,
				arrow: true,
				speed: 1000,
				autoplaySpeed: 3000,
				slidesToShow: 2.5,
				slidesToScroll: 1,
				responsive: [
					{
						breakpoint: 575,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
							infinite: true,
							dots: true,
							centerMode: false,
							arrows: false,
						},
					},
				],
			});
		}
	},
	list_technician: function() {
		var list_slide=$('.archive-technicians .list-technician'),
			item=$('.archive-technicians .list-technician .item');
		if(list_slide.length>0&&item.length>3) {
			list_slide.slick({
				dots: false,
				arrow: true,
				speed: 1000,
				autoplaySpeed: 3000,
				slidesToShow: 2.5,
				slidesToScroll: 1,
				responsive: [
					{
						breakpoint: 575,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
							infinite: true,
							dots: true,
							centerMode: false,
							arrows: false,
						},
					},
				],
			});
		}
	},
	list_gallery: function() {
		var list_slide=$('.product-info .list-gallery'),
			item=$('.product-info .list-gallery .item-gallery');
		if(list_slide.length>0&&item.length>3) {
			list_slide.slick({
				dots: false,
				arrow: true,
				speed: 1000,
				autoplaySpeed: 3000,
				slidesToShow: 3,
				slidesToScroll: 1,
				asNavFor: '.list-thumbnail',
				focusOnSelect: true,
				responsive: [
					{
						breakpoint: 575,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
							infinite: true,
							dots: true,
							centerMode: false,
							arrows: false,
						},
					},
				],
			});
		}
	},
	list_product: function() {
		var list_slide=$('.product-info .list-thumbnail'),
			item=$('.product-info .list-thumbnail .item-thumbnail');
		if(list_slide.length>0&&item.length>3) {
			list_slide.slick({
				dots: false,
				arrow: true,
				speed: 1000,
				autoplaySpeed: 3000,
				slidesToShow: 1,
				slidesToScroll: 1,
				asNavFor: '.list-gallery',
				focusOnSelect: true,
				responsive: [
					{
						breakpoint: 575,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
							infinite: true,
							dots: true,
							centerMode: false,
							arrows: false,
						},
					},
				],
			});
		}
	},
	list_adive_bottom: function() {
		var list_slide=$('.box-list .list-adive-bottom'),
			item=$('.box-list .list-adive-bottom .inner');
		if(list_slide.length>0&&item.length>2) {
			list_slide.slick({
				dots: false,
				arrow: true,
				speed: 1000,
				autoplaySpeed: 3000,
				slidesToShow: 2.5,
				slidesToScroll: 1,
				focusOnSelect: true,
				responsive: [
					{
						breakpoint: 575,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
							infinite: true,
							dots: true,
							centerMode: false,
							arrows: false,
						},
					},
				],
			});
		}
	},
}
var collpase_js={
	init: function() {
		var collpase=$('#accordion .card');
		if(collpase.length>0) {
			$('.card-btn-text').on('click',function() {
				$(this).toggleClass('car-btn-show');
			});
		}
	}
}
var product_action={
	init: function() {
		product_action.quantity_minus();
		product_action.quantity_plus();
	},
	quantity_minus: function() {
		var minus=$('.product-quantity .quantity-minus');
		minus.on('click',function() {
			var input=$('.product-quantity .input-quantity'),
				val=parseInt(input.val());
			if(val>1) {
				var val_new=val-1;
				input.val(val_new);
			}
		});
	},
	quantity_plus: function() {
		var plus=$('.product-quantity .quantity-plus');
		plus.on('click',function() {
			var input=$('.product-quantity .input-quantity'),
				val=parseInt(input.val());
			var val_new=val+1;
			input.val(val_new);
		});
	}
}
var check_out={
	init: function() {
		var form_checkout=$('.form-checkout');
		if(form_checkout.length>0) {
			form_checkout.on('submit',function() {
				$('#modal-success').modal('show');
				return false;
			})
		}
	},
}
var form_booking={
	init: function() {
		form_booking.input_datepicker();
		form_booking.select_date();
		form_booking.select_time();
		form_booking.send_form();
	},
	input_datepicker: function() {
		var ip_date=$('.form-booking .booking-date');
		if(ip_date.length>0) {
			ip_date.datepicker({
				showButtonPanel: true,
				dateFormat: 'dd/mm',
				changeMonth: true,
				changeYear: false
			});
			$('.form-booking .date-more').on('click',function() {
				ip_date.trigger("select");
			});
			ip_date.on('change',function() {
				$('.date-custom').remove();
				var inp_val=$(this).val();
				var newElement='<div class="date-item date-custom active" data-value='+inp_val+'><p class="item-title">'+inp_val+'</p></div>';
				$(".date-more").before(newElement);
				$('input[name="booking-date"]').val(inp_val);
			});
		}
	},
	select_date: function() {
		var item_date=$('.form-booking .list-date .date-item');
		if(item_date.length>0) {
			$(document).on('click','.form-booking .list-date .date-item',function() {
				if(!$(this).hasClass('date-more')) {
					var inp_val=$(this).attr('data-value');
					$('.form-booking .list-date .date-item').removeClass('active');
					$(this).toggleClass('active');
					$('input[name="booking-date"]').val(inp_val);
				}
			});
		}
	},
	select_time: function() {
		var item_date=$('.form-booking .list-time .date-item');
		if(item_date.length>0) {
			$(document).on('click','.form-booking .list-time .date-item',function() {
				var inp_val=$(this).attr('data-value');
				$('.form-booking .list-time .date-item').removeClass('active');
				$(this).toggleClass('active');
				$('input[name="booking-time"]').val(inp_val);
			});
		}
	},
	send_form: function() {
		var question_form=$('form.form-booking');
		if(question_form.length>0) {
			question_form.on('submit',function() {
				var container=$(this);
				form_booking.send_questions(container);
				return false;
			});
		}
	},
	send_questions: function(container) {

		var form_data=new FormData();
		var fullname=$(container).find('[name="fullname"]').val(),
			email=$(container).find('[name="email"]').val(),
			numberphone=$(container).find('[name="numberphone"]').val(),
			note=$(container).find('[name="note"]').val(),
			basis=$(container).find('[name="basis"]').val(),
			doctor=$(container).find('[name="doctor"]').val(),
			booking_date=$(container).find('[name="booking-date"]').val(),
			booking_time=$(container).find('[name="booking-time"]').val(),
			data_url=window.location.href,
			referer=document.referrer;
		form_data.append('fullname',fullname);
		form_data.append('email',email);
		form_data.append('numberphone',numberphone);
		form_data.append('note',note);
		form_data.append('basis',basis);
		form_data.append('doctor',doctor);
		form_data.append('booking_date',booking_date);
		form_data.append('booking_time',booking_time);
		form_data.append('data_url',data_url);
		form_data.append('referer',referer);
		form_data.append('action','form_dat_lich');
		//if(fullname!==""&&phone!==""&&basis!==""&&doctor!==""&&booking_date!==""&&booking_timme!=="") {
		$.ajax({
			url: vmajax.ajaxurl,
			data: form_data,
			type: "POST",
			dataType: "html",
			cache: false,
			contentType: false,
			processData: false,
			statusCode: {
				0: function(result) {
					$(container).closest('form').find("input[type=text],input[type=email], textarea").val("");
					$(container).find('button').attr('disabled','disabled');
				},
				200: function() {
					$(container).closest('form').find("input[type=text], textarea").val("");
					$(container).find('button').attr('disabled','disabled')
				}
			}
		});
		//} 
		//else {
		//	alert('Vui lòng điền đủ thông tin!');
		//}
	}
}
var add_to_cart={
	init: function() {
		add_to_cart.buy_now();
		add_to_cart.add_to_cart2();
	},
	buy_now: function() {
		var btn_buy=$('.product-action .buy-now');
		if(btn_buy.length>0) {
			btn_buy.on('click',function() {
				var data=$('.product-action');
				add_to_cart.add_to_section(data);
				return false;
			});
		}
	},
	add_to_cart2: function() {
		var btn_buy=$('.product-action .add-to-cart');
		if(btn_buy.length>0) {
			btn_buy.on('click',function() {
				var data=$('.product-action');
				return false;
			});
		}
	},
	add_to_section: function(data){
		var quantity=data.find('input.input-quantity').val(),
			product_id=data.find('input.product-id').val();
		console.log(product_id)
		console.log(quantity)
	}
}
jQuery(document).ready(function() {
	//slider
	home_slider.init();
	page_slider.init();
	collpase_js.init();
	product_action.init();
	check_out.init();
	form_booking.init();
	add_to_cart.init();

});
