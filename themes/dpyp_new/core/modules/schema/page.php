<?php
function schema_page(){
	if( is_page() && !is_front_page() ){
	add_filter( 'wpseo_json_ld_output', '__return_empty_array' );
	?>
	<script type="application/ld+json">
		{
			"@context":"https://schema.org",
			"@type":"BreadcrumbList",
			"itemListElement":
			[
			{
				"@type":"ListItem",
				"position":1,
				"item":{
				"@id":"<?php echo home_url(); ?>",
				"name":"Home"
			}
		},
		{
			"@type":"ListItem",
			"position":2,
			"item":
			{
				"@id":"<?php echo get_the_permalink( get_the_ID() ); ?>",
				"name":"<?php echo get_the_title(); ?>"
			}
		}
		]	
	}
	</script>
	<script type="application/ld+json">
		{
			"@context":"https://schema.org",
			"@type":"AboutPage",
			"mainEntityOfPage":
			{
				"@type":"WebPage",
				"@id":"<?php echo get_the_permalink( get_the_ID() ); ?>"
			},
			"headline":"<?php echo get_the_title(); ?>",
			"description":"<?php $description = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true); echo str_replace( '"', "'", $description); ?>",
			"publisher":
			{
				"@type":"organization",
				"name":"Đông Phương Y Pháp",
				"url":"<?php echo home_url(); ?>",
				"logo":
				{
					"@type":"ImageObject",
					"url":"<?php echo get_bloginfo('template_url'); ?>/images/logo.png",
					"width":492,
					"height":492
				}
			}
		}
	</script>
	<script type="application/ld+json">
		{
			"@context":"https://schema.org",
			"@type":"MedicalBusiness",
			"name":"Cấy Chỉ Đông Phương Y Pháp",
			"image":["<?php echo get_bloginfo('template_url'); ?>/images/logo.png"],
			"telephone":"02466873434",
			"url":"<?php echo home_url(); ?>",
			"address":
			{
				"@type":"PostalAddress",
				"streetAddress":"Tầng 2 Biệt thự, 31 Ngõ 70 Nguyễn Thị Định, Trung Hoà, Thanh Xuân, Hà Nội",
				"addressLocality":"Thanh Xuân",
				"addressRegion":"Hà Nội",
				"addressCountry":"Việt Nam",
				"postalCode":"100000"
			},
			"aggregateRating":
			{
				"@type":"AggregateRating",
				"ratingValue":"4",
				"reviewCount":"168"
			},
			"priceRange":"VNĐ",
			"openingHoursSpecification":
			[
			{
				"@type":"OpeningHoursSpecification",
				"dayOfWeek":
				[
				"Monday",
				"Tuesday",
				"Wednesday",
				"Thursday",
				"Friday",
				"Saturday",
				"Sunday"
				],
				"opens":"08:00","closes":"17:30"
			}
			]
		}
	</script>
	<script type="application/ld+json">
		{
			"@context":"https://schema.org",
			"@type":"Person",
			"name":"<?php echo get_the_author_meta( 'display_name', $author_id); ?>",
			"url":"<?php echo get_author_posts_url($author_id); ?>",
			"address":
			{
				"@type":"PostalAddress",
				"addressLocality":"Hà Nội",
				"postalCode":"100000",
				"streetAddress":"Hà Nội - Việt Nam"
			},
			<?php
			$list_presentation = array('facebook','instagram','linkedin','myspace','pinterest','soundcloud','tumblr','twitter','youtube','wikipedia');
			$list_value = array();
			foreach ($list_presentation as $key_value) {
				if( get_the_author_meta( $key_value , $author_id ) != null )
					$list_value[$key_value] = get_the_author_meta( $key_value , $author_id );
			}
			?>
			"sameAs":
			<?php echo json_encode(array_values ($list_value)); ?>
		}
	</script>
	<script type="application/ld+json">
		<?php $list_ID = get_terms('category', array( 'hide_empty' => false ));
		$count = count($list_ID);
		?>
		{
			"@context":"https://schema.org",
			"@graph":
			[
			<?php
			$i = 0;
			foreach ($list_ID as $key_value) { $i ++;
				echo('{
					"@context":"https://schema.org",
					"@type":"SiteNavigationElement",
					"id":"site-navigation",
					"name":"'.$key_value->name.'",
					"url":"'.get_term_link($key_value->term_id ).'"
				}');
				if( $i < $count && $i >= 1 && $count >=2 ) echo ',';
			} ?>
			]
		}
	</script>
	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "LocalBusiness",
			"address": {
			"@type": "PostalAddress",
			"addressLocality": "Hà Nội",
			"addressRegion": "Việt Nam",
			"streetAddress": "Tầng 1 Biệt thự, 31 Ngõ 70 Nguyễn Thị Định, Trung Hoà, Thanh Xuân"
		},
		"description": "<?php $desc = get_post_meta( get_option( 'page_on_front' ), '_yoast_wpseo_metadesc', true); echo str_replace( '"', "'", $desc); ?>",
		"name": "Đông Phương Y Pháp",
		"telephone": "02466873434",
		"image":"<?php echo get_bloginfo('template_url'); ?>/images/logo.png",
		"priceRange":"VNĐ",
		"hasMap":"https://g.page/dongphuongyphap?share",
		"openingHours": "Mo-Sun 08:00-17:30"
	}
	</script>
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
	    "@type": "MedicalClinic",
			"@id": "<?php echo home_url(); ?>/#medicalclinic",
		"name": "Đông Phương Y Pháp",
		"alternatename": "Đông Phương Y Pháp",
		"image": {
			"@type": "ImageObject",
			"@id": "<?php echo home_url(); ?>/#primaryimage",
			"url": "<?php echo get_bloginfo('template_url'); ?>/images/logo.png",
			"width": 134,
			"height": 134,
			"caption": "Đông Phương Y Pháp"
		},
			"url": "<?php echo home_url(); ?>",
		"logo": {
			"@type": "ImageObject",
			"@id": "<?php echo home_url(); ?>/#logo",
			"url": "<?php echo get_bloginfo('template_url'); ?>/images/logo.png",
			"width": 134,
			"height": 134,
			"caption": "Đông Phương Y Pháp"
		},
		"description": "Địa chỉ chữa bệnh không dùng thuốc hàng đầu. Chuyên nghiên cứu các phương pháp mới và cải thiện chất lượng dịch vụ, một địa chỉ tin cậy của hàng nghìn người bệnh.",
		"email": "info@dongphuongyphap.com",
	        "address": {
	        "@type": "PostalAddress",
	        "addressLocality": "Hà Nội",
	        "addressRegion": "Việt Nam",
	        "streetAddress": "Tầng 1 Biệt thự, 31 Ngõ 70 Nguyễn Thị Định, Trung Hoà, Thanh Xuân"
	  		},
	    "telephone": "02466873434",
	    "priceRange":"VNĐ",
		"sameAs": [
			"https://www.facebook.com/dongphuongyphap.tdt/",
			"https://www.instagram.com/dongphuongyphap/",
			"https://www.youtube.com/channel/UCCnCLlqetqVXapd2-xN-1nQ/",
			"https://twitter.com/dongphuongyphap",
			"https://www.pinterest.com/dongphuongyphap/",
	        "https://dongphuongyphap.webflow.io/",
	        "https://dongphuongyphap.weebly.com/",
	        "https://dongphuongyphap.tumblr.com/",
	        "https://dongphuongyphap.blogspot.com/",
	        "https://about.me/dongphuongyphap/",
	        "https://dongphuongyphapcom.wordpress.com/"
			],
	    "subOrganization": 
		{
	    "type": "MedicalClinic",
	    "name": "Cấy Chỉ Đông Phương",
	    "alternatename": "Cấy Chỉ Đông Phương",
	    "url": "https://caychidongphuong.org/",
	    "image": {
	        "@type": "ImageObject",
	        "@id": "https://caychidongphuong.org/#primaryimage",
	        "url": "https://caychidongphuong.org/wp-content/themes/caychi/images/logo.png",
	        "width": 398,
	        "height": 88,
	        "caption": "Trung Tâm Cấy Chỉ Đông Phương là đơn vị trực thuộc Trung Tâm Ứng Dụng Đông Phương Y Pháp - Chuỗi hệ thống phòng Vật Lý Trị Liệu hàng đầu Việt Nam"
	    },
	    "address": {
	        "@type": "PostalAddress",
	        "addressLocality": "Hà Nội",
	        "addressRegion": "Việt Nam",
	        "streetAddress": "Tầng 2 Biệt thự, 31 Ngõ 70 Nguyễn Thị Định, Trung Hoà, Thanh Xuân"
	  		},
	    "telephone": "02466873434",
	    "priceRange":"VNĐ"
		}
	}
	</script>
<?php }
}
add_action('wp_enqueue_scripts', 'schema_page');