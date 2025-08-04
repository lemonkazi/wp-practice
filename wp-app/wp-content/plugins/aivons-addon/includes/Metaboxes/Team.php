<?php

namespace Layerdrops\Aivons\Metaboxes;


class Team
{
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'add_metabox']);
    }

    function add_metabox()
    {
        $prefix = 'aivons_';

        $general = new_cmb2_box(array(
            'id'           => $prefix . 'team_option',
            'title'        => __('Team Options', 'aivons-addon'),
            'object_types' => array('team'),
            'context'      => 'normal',
            'priority'     => 'default',
        ));

        $general->add_field(array(
            'name' => __('Designation', 'aivons-addon'),
            'id' => $prefix . 'designation',
            'type' => 'text',
        ));

        $general->add_field(array(
            'name' => __('Contact Button Label', 'aivons-addon'),
            'id' => $prefix . 'contact_label',
            'type' => 'text',
            'default'=> __( 'Contact Me', 'aivons-addon' )
        ));

        $general->add_field(array(
            'name' => __('Contact Button Url', 'aivons-addon'),
            'id' => $prefix . 'contact',
            'type' => 'text',
        ));

        $team_social = $general->add_field(array(
            'name' => __('Social Profiles', 'aivons-addon'),
            'id' => $prefix . 'team_social',
            'type' => 'group',
        ));

        $general->add_group_field($team_social, array(
            'name' => __('icon', 'aivons-addon'),
            'id' => $prefix . 'icon',
            'type' => 'pw_select',
            'default' => 'fa-facebook-f',
            'options' => aivons_get_fa_icons(),
        ));

        $general->add_group_field($team_social, array(
            'name' => __('link', 'aivons-addon'),
            'id' => $prefix . 'link',
            'type' => 'text',
        ));
    }
}
