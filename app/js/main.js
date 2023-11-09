
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
		} else {
			list_slide.slick({
				slidesToShow: 2.3,
				slidesToScroll: 2,
				mobileFirst: true,
				arrows: false,
				dots: false,
				responsive: [
					{
						breakpoint: 575,
						settings: "unslick",
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
							slidesToShow: 1.3,
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
		$(document).on('click','.product-quantity .quantity-minus',function() {
			var input=$(this).parent().find('.input-quantity'),
				val=parseInt(input.val());
			if(val>1) {
				var val_new=val-1;
				input.val(val_new);
			}
		});
	},
	quantity_plus: function() {
		$(document).on('click','.product-quantity .quantity-plus',function() {
			var input=$(this).parent().find('.input-quantity'),
				val=parseInt(input.val());
			var val_new=val+1;
			input.val(val_new);
		});
	}
}
var form_check_out={
	init: function() {
		form_check_out.check_out();
	},
	check_out: function() {
		var form_checkout=$('.form-checkout');
		if(form_checkout.length>0) {
			form_checkout.on('submit',function() {
				var container=$(this);
				form_check_out.send_form_checkout(container);
				return false;
			})
		}
	},
	send_form_checkout: function(container) {
		var form_data=new FormData();
		var fullname=$(container).find('[name="fullname"]').val(),
			numberphone=$(container).find('[name="numberphone"]').val(),
			address=$(container).find('[name="address"]').val(),
			email=$(container).find('[name="email"]').val(),
			content=$(container).find('[name="content"]').val(),
			pay=$(container).find('[name="pay"]').val(),
			product_name=$(container).find('[name="product_name"]').val(),
			total_price=$(container).find('[name="total_price"]').val();
		form_data.append('fullname',fullname);
		form_data.append('numberphone',numberphone);
		form_data.append('email',email);
		form_data.append('content',content);
		form_data.append('address',address);
		form_data.append('pay',pay);
		form_data.append('product_name',product_name);
		form_data.append('total_price',total_price);
		form_data.append('action','form_thanh_toan');
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
					$('#modal-success').modal('show');
				},
				200: function() {
					$('#modal-success').modal('show');
				}
			}
		});
	},
}
var form_booking_customer={
	init: function() {
		form_booking_customer.input_datepicker();
		form_booking_customer.select_date();
		form_booking_customer.select_time();
		form_booking_customer.send_form();
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
				$('.form-booking .list-date .date-item').removeClass('active');
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
				form_booking_customer.send_questions(container);
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
	},
	booking_register: function() {
		var btn_booking=$('.post-action .link-book');
		if(btn_booking.length>0) {

		}
	}
}
var add_to_cart={
	init: function() {
		add_to_cart.buy_now();
		add_to_cart.add_to_cart2();
		add_to_cart.update_cart();
		add_to_cart.remove_cart_item();
	},
	buy_now: function() {
		var btn_buy=$('.product-action .buy-now');
		if(btn_buy.length>0) {
			btn_buy.on('click',function() {
				var data=$('.product-action');
				add_to_cart.add_to_section(data,'checkout');
				return false;
			});
		}
	},
	add_to_cart2: function() {
		var btn_buy=$('.product-action .add-to-cart');
		if(btn_buy.length>0) {
			btn_buy.on('click',function() {
				var data=$('.product-action');
				add_to_cart.add_to_section(data,'cart');
				return false;
			});
		}
	},
	add_to_section: function(data,type) {
		var quantity=data.find('input.input-quantity').val(),
			product_id=data.find('input.product-id').val();
		var form_data=new FormData();
		form_data.append('quantity',quantity);
		form_data.append('product_id',product_id);
		form_data.append('action','add_to_cart_section');
		$('.product-info .loader').show();
		$('.product-container').addClass('dpyp-hide');
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
					$('.product-info .loader').hide();
					$('.product-container').removeClass('dpyp-hide');
				},
				200: function(result) {
					var data=JSON.parse(result);
					$('.product-info .loader').hide();
					$('.product-container').removeClass('dpyp-hide');
					if(data.success&&type=='checkout') {
						window.location.href=checkout.url;
					}
					if(data.success&&type=='cart') {
						$('.notification').css('display','flex');
					}
				}
			}
		});
	},
	update_cart: function() {

		$(document).on('submit','.cart .form-cart',function() {
			var container=$(this);
			add_to_cart.ajax_update_cart(container);
			return false;
		});
	},
	ajax_update_cart: function(container) {
		var form_data=new FormData();
		var input_quantity=container.find('.input-quantity'),
			product_id=container.find('.product-id');
		var data=[];
		input_quantity.each(function(index) {
			var val_quantity=$(this).val();
			var id=product_id[index].value;
			data.push({'product_id': id,'quantity': val_quantity});
		});
		form_data.append('data',JSON.stringify(data));
		form_data.append('action','update_cart');
		$('.cart .loader').show();
		$('.cart .cart-product').addClass('dpyp-hide');
		$('.cart .cart-collaterals').addClass('dpyp-hide');
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
					$('.cart .loader').hide();
					$('.cart .cart-product').removeClass('dpyp-hide');
					$('.cart .cart-collaterals').removeClass('dpyp-hide');
				},
				200: function(result) {
					$('.cart .loader').hide();
					$('.cart .cart-product').removeClass('dpyp-hide');
					$('.cart .cart-collaterals').removeClass('dpyp-hide');
					$('.cart .page-content .container').empty();
					$('.cart .page-content .container').append(result);
				}
			}
		});
	},
	remove_cart_item: function() {
		$(document).on('click','.cart-item .remove',function() {
			var cart_item=$(this).parents('.cart-item'),
				product_id=cart_item.find('.product-id').val();
			var form_data=new FormData();
			form_data.append('product_id',product_id);
			form_data.append('action','delete_cart_item');
			$('.cart .loader').show();
			$('.cart .cart-product').addClass('dpyp-hide');
			$('.cart .cart-collaterals').addClass('dpyp-hide');
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
						$('.cart .loader').hide();
						$('.cart .cart-product').removeClass('dpyp-hide');
						$('.cart .cart-collaterals').removeClass('dpyp-hide');
					},
					200: function(result) {
						$('.cart .loader').hide();
						$('.cart .cart-product').removeClass('dpyp-hide');
						$('.cart .cart-collaterals').removeClass('dpyp-hide');
						cart_item.remove();
						$('.table-collaterals').empty();
						$('.table-collaterals').append(result);
					}
				}
			});
			return false;
		});
	}

}
var show_popup_video={
	init: function() {
		var videoSrc;
		var btn_video=$('.show-video');
		if(btn_video.length>0) {
			$(document).on('click','.show-video',function() {
				videoSrc=$(this).data('src');
				$("#video").attr('src',videoSrc+"?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
			});
			$('#video-popup').on('hide.bs.modal',function(e) {
				$("#video").attr('src',videoSrc);
			});

		}
	}
}
var acupoint_function={
	init: function() {
		acupoint_function.ajax_list_part();
	},
	ajax_list_part: function() {
		var list=$('.list-part');
		if(list.length>0) {
			$(document).on('click','.list-part .item a',function() {
				$('.list-part .item').removeClass('active');
				$(this).parent().addClass('active');
				$('.acument-result .loader').show();
				$('.list-part').addClass('show-loader');
				$('.list-result').addClass('show-loader');
				var form_data=new FormData();
				form_data.append('term_id',$(this).data('id'));
				form_data.append('action','get_post_acupoint');
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
							$('.acument-result .loader').hide();
							$('.list-part').removeClass('show-loader');
							$('.list-result').removeClass('show-loader');
						},
						200: function(result) {
							$('.list-result').empty();
							$('.acument-result .loader').hide();
							$('.list-part').removeClass('show-loader');
							$('.list-result').removeClass('show-loader');
							$('.list-result').append(result);
						}
					}
				});
				return false;
			});
		}
	}
}
var ajax_author={
	init: function() {
		var btn_load=$('.list-post-author .list-cta .btn-more');
		if(btn_load.length>0) {
			$(document).on('click','.list-cta .btn-more',function() {
				$('.list-post-author').addClass('show-loader');
				var number_item=$('.list-post-author .post').length;
				var user_id=$(this).data('id');
				var form_data=new FormData();
				form_data.append('number_item',number_item);
				form_data.append('user_id',user_id);
				form_data.append('action','get_post_author');
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
							$('.list-post-author').removeClass('show-loader');
						},
						200: function(result) {
							$('.list-post-author').empty();
							$('.list-post-author').removeClass('show-loader');
							$('.list-post-author').append(result);
						}
					}
				});
				return false;
			});
		}
	}
}
var home_action={
	init: function() {
		var btn_loadmore=$('.home-list-disease .list-cta .btn-more');
		if(btn_loadmore.length>0) {
			btn_loadmore.on('click',function() {
				$('.home-list-disease .disease-item').removeClass('item-hide');
				$('.home-list-disease .list-cta').hide();
				return false;
			});
		}
	}
}
jQuery(document).ready(function() {
	//slider
	home_slider.init();
	page_slider.init();
	collpase_js.init();
	product_action.init();
	form_check_out.init();
	form_booking_customer.init();
	add_to_cart.init();
	show_popup_video.init();
	acupoint_function.init();
	ajax_author.init();
	home_action.init();
});
