<?php

namespace Layerdrops\Aivons\PostTypes;

class Header
{

    /**
     * @var string
     *
     * Set post type params
     */
    private $type               = 'header';
    private $slug               = 'header';
    private $name               = 'Headers';
    private $singular_name      = 'Header';
    private $icon               = 'dashicons-lightbulb';

    /**
     * Register post type
     */
    public function register()
    {
        $slug = $this->slug;
        $labels = array(
            'name'                  => esc_html_x('Headers', 'Post Type General Name', 'aivons-addon'),
            'singular_name'         => esc_html_x('Header', 'Post Type Singular Name', 'aivons-addon'),
            'add_new'               => esc_html__('Add New', 'aivons-addon'),
            'add_new_item'          => esc_html__('Add New ', 'aivons-addon') . $this->singular_name,
            'edit_item'             => esc_html__('Edit ', 'aivons-addon') . $this->singular_name,
            'new_item'              => esc_html__('New ', 'aivons-addon') . $this->singular_name,
            'all_items'             => esc_html__('All ', 'aivons-addon')  . $this->name,
            'view_item'             => esc_html__('View ', 'aivons-addon') . $this->singular_name,
            'view_items'            => esc_html__('View ', 'aivons-addon') . $this->name,
            'search_items'          => esc_html__('Search ', 'aivons-addon') . $this->name,
            'not_found'             => esc_html__('No ', 'aivons-addon') . strtolower($this->name) . esc_html__(' found', 'aivons-addon'),
            'not_found_in_trash'    => esc_html__('No ', 'aivons-addon') . strtolower($this->name) .  esc_html__(' found in Trash', 'aivons-addon'),
            'parent_item_colon'     => '',
            'menu_name'             => $this->name,
        );

        $args = array(
            'labels'                => $labels,
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'query_var'             => true,
            'rewrite'               => array('slug' => $slug),
            'capability_type'       => 'post',
            'has_archive'           => false,
            'hierarchical'          => true,
            'menu_position'         => 8,
            'supports'              => array('title', 'thumbnail'),
            'yarpp_support'         => true,
            'menu_icon'             => $this->icon
        );

        register_post_type($this->type, $args);

        register_taxonomy($this->type . '_cat', $this->type, array(
            'public'                => true,
            'hierarchical'          => true,
            'show_admin_column'     => true,
            'show_in_nav_menus'     => false,
            'labels'                => array(
                'name'  => $this->singular_name . esc_html__(' Categories', 'aivons-addon'),
            )
        ));
    }

    /**
     * @param $columns
     * @return mixed
     *
     * Choose the columns you want in
     * the admin table for this post
     */
    public function set_columns($columns)
    {
        // Set/unset post type table columns here

        return $columns;
    }

    /**
     * @param $column
     * @param $post_id
     *
     * Edit the contents of each column in
     * the admin table for this post
     */
    public function edit_columns($column, $post_id)
    {
        // Post type table column content code here
    }

    /**
     * Portfolio constructor.
     *
     * When class is instantiated
     */
    public function __construct()
    {

        // Register the post type
        add_action('init', array($this, 'register'));

        // Admin set post columns
        add_filter('manage_edit-' . $this->type . '_columns',        array($this, 'set_columns'), 10, 1);

        // Admin edit post columns
        add_action('manage_' . $this->type . '_posts_custom_column', array($this, 'edit_columns'), 10, 2);
    }
}
