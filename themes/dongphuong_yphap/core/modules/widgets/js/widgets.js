jQuery(document).ready(function() {
	jQuery(document).on('change','#files',function(event) {
		var fileInput=event.target,
			thumbnail=jQuery(this).parent().find('.widgets-show-images'),
			item_file=fileInput.files.length;
		// Kiểm tra xem có hình ảnh nào được chọn không
		if(item_file>0) {
			thumbnail.empty();
			for(i=0;i<item_file;i++) {
				var file=fileInput.files[i];
				html='';
				// Tạo một đối tượng FileReader để đọc hình ảnh
				var reader=new FileReader();
				// Xử lý khi đọc hoàn tất
				reader.onload=function(e) {
					html ='<img class="widgets-thumb" src="'+e.target.result+'" alt="">';
					thumbnail.append(html);
				};
				// Đọc hình ảnh dưới dạng URL dữ liệu (data URL)
				reader.readAsDataURL(file);
			}
		}
	});
});