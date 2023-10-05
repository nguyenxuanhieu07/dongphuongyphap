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
	slider_expert: function(){
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
		if(list_slide.length>0&&item.length>3) {
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
			if(val > 1) {
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
	init: function(){
		var form_checkout=$('.form-checkout');
		if(form_checkout.length > 0){
			form_checkout.on('submit',function() {
				$('#modal-success').modal('show');
				return false;
			})
		}
	},
}
jQuery(document).ready(function() {
	//slider
	home_slider.init();
	page_slider.init();
	collpase_js.init();
	product_action.init();
	check_out.init();
});