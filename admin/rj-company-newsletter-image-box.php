<?php 
// Register the meta box
function add_multiple_image_uploader_meta_box() {
    add_meta_box(
        'multiple_image_uploader_meta_box',
        'Multiple Image Uploader',
        'render_multiple_image_uploader_meta_box',
        'company_newsletter', // Change this to your post type
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_multiple_image_uploader_meta_box');

// Render the meta box content
function render_multiple_image_uploader_meta_box($post) {
    wp_nonce_field(basename(__FILE__), 'multiple_image_uploader_nonce');
    $image_ids = get_post_meta($post->ID, '_custom_image_ids', true);
    $image_ids = $image_ids ? explode(',', $image_ids) : array();
    ?>
    <div class="custom-multiple-image-uploader">
        <div id="image-preview-container">
            <?php foreach ($image_ids as $image_id) : ?>
                <div class="image-preview">
                    <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                    <button class="remove-image" data-id="<?php echo $image_id; ?>">X</button>
                </div>
            <?php endforeach; ?>
        </div>
        <input id="upload_images_button" type="button" class="button" value="Upload Images" />
        <input type="hidden" name="custom_image_ids" id="custom_image_ids" value="<?php echo esc_attr(implode(',', $image_ids)); ?>" />
    </div>
    <script>
   jQuery(document).ready(function($){
    var mediaUploader;
    $('#upload_images_button').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Images',
            button: {
                text: 'Choose Images'
            },
            multiple: true
        });
        mediaUploader.on('select', function() {
            var attachments = mediaUploader.state().get('selection').toJSON();
            var imageIds = $('#custom_image_ids').val() ? $('#custom_image_ids').val().split(',') : [];
            attachments.forEach(function(attachment) {
                if (!imageIds.includes(attachment.id.toString())) {
                    imageIds.push(attachment.id);
                    // Get the best available size
                    var imageUrl = attachment.sizes && attachment.sizes.thumbnail ? 
                                   attachment.sizes.thumbnail.url : 
                                   attachment.sizes && attachment.sizes.full ? 
                                   attachment.sizes.full.url : 
                                   attachment.url;
                    $('#image-preview-container').append(
                        '<div class="image-preview">' +
                        '<img src="' + imageUrl + '" />' +
                        '<button class="remove-image" data-id="' + attachment.id + '">X</button>' +
                        '</div>'
                    );
                }
            });
            $('#custom_image_ids').val(imageIds.join(','));
        });
        mediaUploader.open();
    });

    $(document).on('click', '.remove-image', function() {
        var imageId = $(this).data('id');
        var imageIds = $('#custom_image_ids').val().split(',');
        imageIds = imageIds.filter(function(id) { return id != imageId; });
        $('#custom_image_ids').val(imageIds.join(','));
        $(this).parent('.image-preview').remove();
    });
});
    </script>
    <style>
    .image-preview { 
        display: inline-block; 
        margin: 10px; 
        text-align: center; 
        position: relative;
    }
    .remove-image{
        position: absolute;
        top: 5px;
        right: 5px;

    }

    .image-preview img { max-width: 150px; max-height: 150px; }
    
    </style>
    <?php
}

// Save the image IDs
function save_multiple_image_uploader_meta_box($post_id) {
    if (!isset($_POST['multiple_image_uploader_nonce']) || !wp_verify_nonce($_POST['multiple_image_uploader_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    if (isset($_POST['custom_image_ids'])) {
        update_post_meta($post_id, '_custom_image_ids', sanitize_text_field($_POST['custom_image_ids']));
    }
}
add_action('save_post', 'save_multiple_image_uploader_meta_box');



// pdf metabox

/*
function add_pdf_upload_meta_box() {
    add_meta_box(
        'pdf_upload_meta_box',
        'PDF Upload',
        'render_pdf_upload_meta_box',
        'dte_policy', // Change this to the post type you want to add the meta box to
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_pdf_upload_meta_box');

function render_pdf_upload_meta_box($post) {
    wp_nonce_field(basename(__FILE__), 'pdf_upload_nonce');
    $pdf_url = get_post_meta($post->ID, 'pdf_upload', true);
    ?>
    <p>
        <label for="pdf_upload">Upload PDF:</label><br>
        <input type="text" name="pdf_upload" id="pdf_upload" value="<?php echo esc_attr($pdf_url); ?>" size="60">
        <input type="button" class="button" value="Upload PDF" id="pdf_upload_button">
    </p>
    <div id="pdf_upload_preview">
        <?php if ($pdf_url): ?>
            <p>Current PDF: <a href="<?php echo esc_url($pdf_url); ?>" target="_blank"><?php echo basename($pdf_url); ?></a></p>
        <?php endif; ?>
    </div>
    <script>
    jQuery(document).ready(function($) {
        $('#pdf_upload_button').click(function(e) {
            e.preventDefault();
            var custom_uploader = wp.media({
                title: 'Upload PDF',
                button: {
                    text: 'Use this PDF'
                },
                multiple: false,
                library: {
                    type: 'application/pdf'
                }
            }).on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('#pdf_upload').val(attachment.url);
                $('#pdf_upload_preview').html('<p>Current PDF: <a href="' + attachment.url + '" target="_blank">' + attachment.filename + '</a></p>');
            }).open();
        });
    });
    </script>
    <?php
}


function save_pdf_upload_meta($post_id) {
    if (!isset($_POST['pdf_upload_nonce']) || !wp_verify_nonce($_POST['pdf_upload_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    if (isset($_POST['pdf_upload'])) {
        update_post_meta($post_id, 'pdf_upload', sanitize_text_field($_POST['pdf_upload']));
    } else {
        delete_post_meta($post_id, 'pdf_upload');
    }
}
add_action('save_post', 'save_pdf_upload_meta'); */