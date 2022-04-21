<?php 

/**
 * Register default ACF fields
 * responsible for displaying title and description inputs (for seo)
 */
if (function_exists('acf_add_local_field_group')):
    acf_add_local_field_group(array(
        'key' => 'group_5b728f125850c',
        'title' => 'Seo',
        'fields' => array(
            array(
                'key' => 'field_5b728f2c041fc',
                'label' => 'Title',
                'name' => 'title-seo',
                'type' => 'text',
                'instructions' => 'Wpisz tytuł seo (ok. 60 znaków)'
            ) ,
            array(
                'key' => 'field_5b728f5a12993',
                'label' => 'Description',
                'name' => 'description-seo',
                'type' => 'text',
                'instructions' => 'Wpisz opis seo (ok. 170 znaków)'
            )
        ) ,
        'location' => array(
            array(
                array(
                    'param' => 'post_status',
                    'operator' => '!=',
                    'value' => 'trash'
                )
            )
        ) ,
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => 1
    ));
endif;








function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDlJVhk0I-TfVLVvfSASEIbcVsVSSnxtPE');
}

add_action('acf/init', 'my_acf_init');


?>