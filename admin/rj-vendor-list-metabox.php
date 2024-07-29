<?php
function rj_employee_portal_vendor_list_metabox() {
    add_meta_box(
        'vendor_details',
        'Vendor Details',
        'rj_employee_portal_render_vendor_list_metabox',
        'vendor_list',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'rj_employee_portal_vendor_list_metabox');

function rj_employee_portal_render_vendor_list_metabox($post) {
    wp_nonce_field(basename(__FILE__), 'rj_employee_portal_vendor_list_metabox_nonce');
    $fields = array('Phone', 'Contact No', 'Email', 'Address', 'City', 'State', 'Zip Code');
    foreach ($fields as $field) {
        $field_name = strtolower(str_replace(' ', '_', $field));
        ?>
        <p>
            <label for="<?php echo esc_attr($field_name); ?>"><?php echo esc_html($field); ?>:</label>
            <input
                type="text"
                name="<?php echo esc_attr($field_name); ?>"
                id="<?php echo esc_attr($field_name); ?>"
                value="<?php echo esc_attr(get_post_meta($post->ID, $field_name, true)); ?>"
                class="widefat"
            />
        </p>
        <?php
    }
    $aspire_vendor = get_post_meta($post->ID, 'aspire_vendor', true);
    ?>
    <p>
        <label for="aspire_vendor">Aspire Vendor:</label>
        <select name="aspire_vendor" id="aspire_vendor" class="widefat">
            <option value="">--</option>
            <option value="yes" <?php selected($aspire_vendor, 'yes'); ?>>Yes</option>
            <option value="no" <?php selected($aspire_vendor, 'no'); ?>>No</option>
        </select>
    </p>
    <?php
}

function save_rj_employee_portal_vendor_list_metabox($post_id) {
    if (!isset($_POST['rj_employee_portal_vendor_list_metabox_nonce']) || 
        !wp_verify_nonce($_POST['rj_employee_portal_vendor_list_metabox_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    $fields = array('Phone', 'Contact No', 'Email', 'Address', 'City', 'State', 'Zip Code');
    foreach ($fields as $field) {
        $field_name = strtolower(str_replace(' ', '_', $field));
        if (isset($_POST[$field_name])) {
            update_post_meta($post_id, $field_name, sanitize_text_field($_POST[$field_name]));
        }
    }

    if (isset($_POST['aspire_vendor'])) {
        update_post_meta($post_id, 'aspire_vendor', sanitize_text_field($_POST['aspire_vendor']));
    }

}
add_action('save_post', 'save_rj_employee_portal_vendor_list_metabox');