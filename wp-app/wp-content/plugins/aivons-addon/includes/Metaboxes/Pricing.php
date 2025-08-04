<?php

namespace Layerdrops\Aivons\Metaboxes;


class Pricing
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'aivons_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'pricing_content',
            'title'        => __('Pricing Content', 'aivons-addon'),
            'object_types' => array('pricing'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $general->add_field(array(
            'name' => __('Pricing Icon', 'aivons-addon'),
            'id' => $prefix . 'pricing_icon',
            'type' => 'pw_select',
            'options' => aivons_get_fa_icons()
        ));

        $general->add_field(array(
            'name'             => 'Is FontAwesome Icon?',
            'id'               => $prefix . 'is_fontawesome',
            'type'             => 'radio',
            'show_option_none' => false,
            'options'          => array(
                'yes' => __('Yes', 'aivons-addon'),
                'no'   => __('No', 'aivons-addon'),
            ),
        ));

        $general->add_field(array(
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

        $general->add_field(array(
            'name' => __('Currency Type', 'aivons-addon'),
            'id' => $prefix . 'pricing_currency',
            'type' => 'text',
        ));

        $general->add_field(array(
            'name' => __('Renewal Fee', 'aivons-addon'),
            'id' => $prefix . 'pricing_renewal_fee',
            'type' => 'text',
        ));

        $plan_options = $general->add_field(array(
            'name' => __('Plan Options', 'aivons-addon'),
            'id' => $prefix . 'plan_options',
            'type' => 'group',
        ));

        $general->add_group_field($plan_options, array(
            'name' => __('Feature Name', 'aivons-addon'),
            'id' => $prefix . 'feature_name',
            'type' => 'text',
        ));

        $general->add_group_field($plan_options, array(
            'name' => __('Is Available?', 'aivons-addon'),
            'id' => $prefix . 'feature_status',
            'type' => 'checkbox',
        ));


        $general->add_field(array(
            'name' => __('Btn Label', 'aivons-addon'),
            'id' => $prefix . 'pricing_btn_label',
            'type' => 'text',
        ));

        $general->add_field(array(
            'name' => __('Btn URL', 'aivons-addon'),
            'id' => $prefix . 'pricing_btn_url',
            'type' => 'text',
        ));
    }
}
