<?php

namespace Layerdrops\Aivons\Metaboxes;


class Portfolio
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'aivons_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'portfolio_option',
            'title'        => __('Portfolio Options', 'aivons-addon'),
            'object_types' => array('portfolio'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));


        $general->add_field(array(
            'name' => __('Sub Title', 'aivons-addon'),
            'id' => $prefix . 'portfolio_sub_title',
            'type' => 'text',
        ));

        $general->add_field(array(
            'name' => __('Client Name', 'aivons-addon'),
            'id' => $prefix . 'portfolio_client',
            'type' => 'text',
        ));
        $general->add_field(array(
            'name' => __('Complete Date', 'aivons-addon'),
            'id' => $prefix . 'portfolio_date',
            'type' => 'text',
        ));
        $general->add_field(array(
            'name' => __('Preview Link', 'aivons-addon'),
            'id' => $prefix . 'portfolio_preview_link',
            'type' => 'text',
            'attributes' => array(
                'data-conditional-id' => $prefix . 'portfolio_single_layout',
                'data-conditional-value' => 'layout_three',
            ),

        ));


        $general->add_field(array(
            'name' => __('Enable Custom Footer', 'aivons-addon'),
            'id' => $prefix . 'custom_footer_status',
            'type' => 'radio',
            'options' => array(
                'on' => __('On', 'aivons-addon'),
                'off'   => __('Off', 'aivons-addon'),
            ),
        ));

        $portfolio_icon = new_cmb2_box(array(
            'id'           => $prefix . 'portfolio_icon_option',
            'title'        => __('Icon Options', 'aivons-addon'),
            'object_types' => array('portfolio'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $portfolio_icon->add_field(array(
            'name' => __('Select Icon', 'aivons-addon'),
            'id' => $prefix . 'select_portfolio_icon',
            'type' => 'pw_select',
            'options' => aivons_get_fa_icons(),
        ));


        $portfolio_icon->add_field(array(
            'name'             => 'Is FontAwesome Icon?',
            'id'               => $prefix . 'portfolio_is_fontawesome',
            'type'             => 'radio',
            'show_option_none' => false,
            'options'          => array(
                'yes' => __('Yes', 'aivons-addon'),
                'no'   => __('No', 'aivons-addon'),
            ),
        ));

        $portfolio_icon->add_field(array(
            'name'             => 'Type of FontAwesome?',
            'id'               => $prefix . 'portfolio_fontawesome_type',
            'type'             => 'radio',
            'show_option_none' => false,
            'options'          => array(
                'fas' => __('Solid', 'aivons-addon'),
                'far'   => __('Regular', 'aivons-addon'),
                'fal'   => __('Light', 'aivons-addon'),
                'fab'   => __('Brands', 'aivons-addon'),
            ),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'portfolio_is_fontawesome',
                'data-conditional-value' => 'yes',
            ),
        ));


        $general->add_field(array(
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
