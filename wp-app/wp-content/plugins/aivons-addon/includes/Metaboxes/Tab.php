<?php

namespace Layerdrops\Aivons\Metaboxes;


class Tab
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'aivons_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'tab_option',
            'title'        => __('Tab Options', 'aivons-addon'),
            'object_types' => array('tab'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));


        $tab_content = $general->add_field(array(
            'name' => __('Tab Meta', 'aivons-addon'),
            'id' => $prefix . 'tab_content',
            'type' => 'group',
        ));

        $general->add_group_field($tab_content, array(
            'name' => __('icon', 'aivons-addon'),
            'id' => $prefix . 'icon',
            'type' => 'pw_select',
            'default' => 'fa-facebook-f',
            'options' => aivons_get_fa_icons(),
        ));

        $general->add_group_field($tab_content, array(
            'name' => __('title', 'aivons-addon'),
            'id' => $prefix . 'title',
            'type' => 'text',
        ));

        $general->add_group_field($tab_content, array(
            'name' => __('text', 'aivons-addon'),
            'id' => $prefix . 'text',
            'type' => 'textarea',
        ));
    }
}
