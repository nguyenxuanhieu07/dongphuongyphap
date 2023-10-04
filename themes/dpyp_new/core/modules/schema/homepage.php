<?php
function schema_front_page(){
	if( is_front_page() ){
	add_filter( 'wpseo_json_ld_output', '__return_empty_array' ); ?>
	<script type="application/ld+json">
	{
	"@context":"http://schema.org",
	"@type":"Organization",
	"url":"<?php echo home_url(); ?>",
	"sameAs":[
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
	"@id":"#organization",
	"name":"Đông Phương Y Pháp",
	"logo":"<?php echo get_bloginfo('template_url'); ?>/images/logo.png"
	}
	</script>
	<script type="application/ld+json">
	{
	"@context":"http://schema.org",
	"@type":"WebSite",
	"@id":"#website",
	"url":"<?php echo home_url(); ?>",
	"name":"Đông Phương Y Pháp",
	"alternateName":"Đông Phương Y Pháp",
	"description":"<?php $description = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true); echo str_replace( '"', "'", $description); ?>",
	"potentialAction":
		{
		"@type":"SearchAction",
		"target":"https://www.dongphuongyphap.com/?s={search_term_string}",
		"query-input":"required name=search_term_string"
		}
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
		"@context":"https://schema.org",
		"@graph":
		{
			"@context":"http://schema.org",
			"@type":"MedicalWebPage",
			"inLanguage":"vi-vn",
			"description":"<?php $description = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true); echo str_replace( '"', "'", $description); ?>",
			"datePublished":"2020-12-01",
			"dateModified":"2020-12-25",
			"lastReviewed":"2020-12-25",
			"url":"<?php echo home_url(); ?>",
			"@id":"<?php echo home_url(); ?>",
			"publisher":
			{
				"@type":"Organization",
				"name":"Đông Phương Y Pháp",
				"description":"<?php $description = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true); echo str_replace( '"', "'", $description); ?>",
				"slogan":"Chữa bệnh không dùng thuốc hàng đầu",
				"logo":"<?php echo get_bloginfo('template_url'); ?>/images/logo.png",
				"url":"<?php echo home_url(); ?>/gioi-thieu",
				"publishingPrinciples":"<?php echo home_url(); ?>/chinh-sach-dieu-khoan",
				"address":
					{"@type":"PostalAddress",
					"addressCountry":"Việt Nam",
					"addressLocality":"Thanh Xuân",
					"addressRegion":"Hà Nội",
					"postalCode":"100000",
					"streetAddress":"Tầng 1 Biệt thự, 31 Ngõ 70 Nguyễn Thị Định, Trung Hoà, Thanh Xuân, Hà Nội",
					"url":"<?php echo home_url(); ?>/lien-he"
					},
				"email":"info@dongphuongyphap.com",
				"numberOfEmployees":
					{
					"@type":"QuantitativeValue",
					"minvalue":"100",
					"maxvalue":"200",
					"value":"150"
					},
				"founder":
				{
				"@type":"Person",
				"name":"Doãn Hồng Phương",
				"givenName":"Hồng Phương",
				"familyName":"Doãn",
				"description":"Bác sĩ Phương thuộc đội ngũ chuyên gia hàng đầu Y học cổ truyền, đã có nhiều đóng góp to lớn trong việc nâng tầm và khẳng định giá trị tinh hoa YHCT Việt Nam tại bầu trời phương Tây.",
				"jobTitle":"TS.BS CK II Nguyễn Thị Hồng Phương",
				"@id":"<?php echo home_url(); ?>/bac-si/bac-si-doan-hong-phuong",
				"birthDate":"",
				"image":"<?php echo home_url(); ?>/wp-content/uploads/2020/10/bsi-doan-hong-phuong-2.jpg",
				"knowsLanguage":["Vietnamese","English"],
				"height":"",
				"email":"",
				"telephone":"",
				"worksFor":"Trung tâm Đông Phương Y Pháp",
				"mainEntityOfPage":"<?php echo home_url(); ?>/bac-si/bac-si-doan-hong-phuong",
				"url":"<?php echo home_url(); ?>/bac-si/bac-si-doan-hong-phuong",
				"sameAs":[]
				}
			},
			"author":
			{
			"@type":"Person",
			"name":"Doãn Hồng Phương",
			"givenName":"Hồng Phương",
			"familyName":"Doãn",
			"description":"Bác sĩ Phương thuộc đội ngũ chuyên gia hàng đầu Y học cổ truyền, đã có nhiều đóng góp to lớn trong việc nâng tầm và khẳng định giá trị tinh hoa YHCT Việt Nam tại bầu trời phương Tây.",
			"@id":"<?php echo home_url(); ?>/bac-si/bac-si-doan-hong-phuong",
			"birthDate":"",
			"image":"<?php echo home_url(); ?>/wp-content/uploads/2020/10/bsi-doan-hong-phuong-2.jpg",
			"knowsLanguage":["Vietnamese","English"],
			"height":"",
			"email":"",
			"worksFor":"Trung tâm Đông Phương Y Pháp",
			"mainEntityOfPage":"<?php echo home_url(); ?>/bac-si/bac-si-doan-hong-phuong",
			"url":"<?php echo home_url(); ?>/bac-si/bac-si-doan-hong-phuong",
			"sameAs":[]
			},
			"reviewedBy":
			{
				"@type":"Person",
				"name":"Doãn Hồng Phương",
				"givenName":"Hồng Phương",
				"familyName":"Doãn",
				"description":"Bác sĩ Phương thuộc đội ngũ chuyên gia hàng đầu Y học cổ truyền, đã có nhiều đóng góp to lớn trong việc nâng tầm và khẳng định giá trị tinh hoa YHCT Việt Nam tại bầu trời phương Tây.",
				"@id":"<?php echo home_url(); ?>/bac-si/bac-si-doan-hong-phuong",
				"birthDate":"",
				"image":"<?php echo home_url(); ?>/wp-content/uploads/2020/10/bsi-doan-hong-phuong-2.jpg",
				"knowsLanguage":["Vietnamese","English"],
				"height":"",
				"email":"",
				"worksFor":"Trung tâm Đông Phương Y Pháp",
				"mainEntityOfPage":"<?php echo home_url(); ?>/bac-si/bac-si-doan-hong-phuong",
				"url":"<?php echo home_url(); ?>/bac-si/bac-si-doan-hong-phuong",
				"sameAs":[]
			},
			"audience":"http://schema.org/Patient",
			"additionalType":[],
			"sameAs":
			[
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
			"isBasedOn":[]
		}
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
	  "description": "<?php $description = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true); echo str_replace( '"', "'", $description); ?>",
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
		"@id": "https://www.dongphuongyphap.com/#medicalclinic",
		"name": "Đông Phương Y Pháp",
		"alternatename": "Đông Phương Y Pháp",
		"image": {
			"@type": "ImageObject",
			"@id": "https://www.dongphuongyphap.com/#primaryimage",
			"url": "<?php echo get_bloginfo('template_url'); ?>/images/logo.png",
			"width": 134,
			"height": 134,
			"caption": "Đông Phương Y Pháp"
		},
		"url": "https://www.dongphuongyphap.com/",
		"logo": {
			"@type": "ImageObject",
			"@id": "https://www.dongphuongyphap.com/#logo",
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
add_action('wp_enqueue_scripts', 'schema_front_page');