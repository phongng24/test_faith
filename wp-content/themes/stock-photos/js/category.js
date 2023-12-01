jQuery(function($){
    $('body').on('click', '.stock_photos_upload_image_button', function(e){
        e.preventDefault();
        stock_photos_aw_uploader = wp.media({
            title: 'Custom image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = stock_photos_aw_uploader.state().get('selection').first().toJSON();
            $('#cat-image').val(attachment.url);
        })
        .open();
    });
});