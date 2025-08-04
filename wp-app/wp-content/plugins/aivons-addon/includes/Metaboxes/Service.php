<?php

namespace Layerdrops\Aivons\Metaboxes;


class Service
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'aivons_';

        $service_icon = new_cmb2_box(array(
            'id'           => $prefix . 'service_icon_option',
            'title'        => __('Icon Options', 'aivons-addon'),
            'object_types' => array('service'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $service_icon->add_field(array(
            'name' => __('Select Icon', 'aivons-addon'),
            'id' => $prefix . 'select_service_icon',
            'type' => 'pw_select',
            'options' => aivons_get_fa_icons(),
        ));


        $service_icon->add_field(array(
            'name'             => 'Is FontAwesome Icon?',
            'id'               => $prefix . 'is_fontawesome',
            'type'             => 'radio',
            'show_option_none' => false,
            'options'          => array(
                'yes' => __('Yes', 'aivons-addon'),
                'no'   => __('No', 'aivons-addon'),
            ),
        ));

        $service_icon->add_field(array(
            'name'             => 'Type of FontAwesome?',
            'id'               => $prefix . 'fontawesome_type',
            'type'             => 'radio',
            'show_option_none' => false,
            'options'          => array(
                'fas' => __('Solid', 'aivons-addon'),
                'far'   => __('Regular', 'aivons-addon'),
                'fal'   => __('Light', 'aivons-addon'),
                'fab'   => __('Brands', 'aivons-addon'),
            ),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'is_fontawesome',
                'data-conditional-value' => 'yes',
            ),
        ));

        //feature box
        $feature_box = new_cmb2_box(array(
            'id'           => $prefix . 'service_feature_box_option',
            'title'        => __('Feature Box', 'aivons-addon'),
            'object_types' => array('service'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $service_feature_box = $feature_box->add_field(array(
            'id' => $prefix . 'service_feature_box',
            'type' => 'group',
            'options'     => array(
                'group_title'    => esc_html__('Feature Box {#}', 'aivons-addon'), // {#} gets replaced by row number
                'add_button'     => esc_html__('Add Another Feature Box Item', 'aivons-addon'),
                'remove_button'  => esc_html__('Remove Feature Box Item', 'aivons-addon'),
                'sortable'       => false,
                'closed'      => true, // true to have the groups closed by default
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'aivons-addon' ), // Performs confirmation before removing group.
            ),
        ));

        
        $feature_box->add_group_field($service_feature_box, array(
            'name' => __('Feature Box Icon', 'aivons-addon'),
            'id' => $prefix . 'feature_box_icon',
            'type' => 'pw_select',
            'default'=>'icon-data-analytics',
            'options' => aivons_get_fa_icons(),
        ));
      
      
        $feature_box->add_group_field($service_feature_box, array(
            'name' => __('Is FontAwesome Icon?', 'aivons-addon'),
            'id'               => $prefix . 'feature_is_fontawesome',
            'type'             => 'radio',
            'show_option_none' => false,
            'options'          => array(
                'yes' => __('Yes', 'aivons-addon'),
                'no'   => __('No', 'aivons-addon'),
            ),
        ));
       
       
        $feature_box->add_group_field($service_feature_box, array(
            'name' => __('Type of FontAwesome?', 'aivons-addon'),
            'id'               => $prefix . 'feature_fontawesome_type',
            'type'             => 'radio',
            'show_option_none' => false,
            'options'          => array(
                'fas' => __('Solid', 'aivons-addon'),
                'far'   => __('Regular', 'aivons-addon'),
                'fal'   => __('Light', 'aivons-addon'),
                'fab'   => __('Brands', 'aivons-addon'),
            ),
            'attributes' => array(
                'data-conditional-id'    => wp_json_encode( array( $service_feature_box, 'aivons_feature_is_fontawesome' ) ),
                'data-conditional-value' => 'yes',
            ),
        ));

        

        $feature_box->add_group_field($service_feature_box, array(
            'name' => __('Feature Box Title', 'aivons-addon'),
            'id' => $prefix . 'feature_box_title',
            'type' => 'text',
        ));

        $feature_box->add_group_field($service_feature_box, array(
            'name' => __('Feature Box Content', 'aivons-addon'),
            'id' => $prefix . 'feature_box_content',
            'type' => 'textarea',
        ));



        $service_footer = new_cmb2_box(array(
            'id'           => $prefix . 'service_footer_option',
            'title'        => __('Footer Options', 'aivons-addon'),
            'object_types' => array('service'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $service_footer->add_field(array(
            'name' => __('Enable Custom Footer', 'aivons-addon'),
            'id' => $prefix . 'custom_footer_status',
            'type' => 'radio',
            'options' => array(
                'on' => __('On', 'aivons-addon'),
                'off'   => __('Off', 'aivons-addon'),
            ),
        ));


        $service_footer->add_field(array(
            'name' => __('Select Custom Footer', 'aivons-addon'),
            'id' => $prefix . 'select_custom_footer',
            'type' => 'pw_select',
            'options' => aivons_post_query('footer'),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'custom_footer_status',
                'data-conditional-value' => 'on',
            ),
        ));
    }
}
