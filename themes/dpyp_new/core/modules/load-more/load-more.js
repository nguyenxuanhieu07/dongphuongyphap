jQuery(document).ready(function () {
    jQuery(".loadmore-post-cat a").click(function(e){
        e.preventDefault();
        var button = jQuery(this),
            data = {
            'action': 'load_more_post',
            'query': loadmore_params.posts,
            'page' : loadmore_params.current_page
        };

        jQuery.ajax({
            url : loadmore_params.ajaxurl,
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.text('Đang tải...');
            },
            success : function( data ){
                if( data ) { 
                    button.text( 'Xem thêm' ).parent().prev().append(data);
                    loadmore_params.current_page++;

                    if ( loadmore_params.current_page == loadmore_params.max_page ) 
                        button.remove();
                } else {
                    button.remove();
                }
            }
        });
    });


    jQuery(".loadmore-bacsi a").click(function(e){
        e.preventDefault();
        var button = jQuery(this),
            data = {
            'action': 'load_more_doctor',
            'query': loadmore_params.posts,
            'page' : loadmore_params.current_page
        };

        jQuery.ajax({
            url : loadmore_params.ajaxurl,
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.text('Đang tải...');
            },
            success : function( data ){
                if( data ) { 
                    jQuery(data).insertBefore(button.text( 'Xem thêm' ).parent());
                    loadmore_params.current_page++;

                    if ( loadmore_params.current_page == loadmore_params.max_page ) 
                        button.remove();
                } else {
                    button.remove();
                }
            }
        });
    });


    jQuery(".loadmore-video a").click(function(e){
        e.preventDefault();
        var button = jQuery(this),
            data = {
            'action': 'load_more_video',
            'query': loadmore_params.posts,
            'page' : loadmore_params.current_page
        };

        jQuery.ajax({
            url : loadmore_params.ajaxurl,
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.text('Đang tải...');
            },
            success : function( data ){
                if( data ) { 
                    jQuery(data).insertBefore(button.text( 'Xem thêm' ).parent());
                    loadmore_params.current_page++;

                    if ( loadmore_params.current_page == loadmore_params.max_page ) 
                        button.remove();
                } else {
                    button.remove();
                }
            }
        });
    });


});
