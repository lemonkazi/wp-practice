<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package aivons
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function aivons_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }


    $get_boxed_wrapper_status = get_theme_mod('aivons_boxed_layout', false);
    $dynamic_boxed_wrapper_status = isset($_GET['boxed_status']) ? $_GET['boxed_status'] : $get_boxed_wrapper_status;


    if (true == $dynamic_boxed_wrapper_status) {
        $classes[] = 'boxed-wrapper';
    }

    $get_dark_mode_status = get_theme_mod('aivons_dark_mode', false);
    $dynamic_dark_mode_status = isset($_GET['dark_mode']) ? $_GET['dark_mode'] : $get_dark_mode_status;


    if (true == $dynamic_dark_mode_status) {
        $classes[] = 'body-dark';
    }


    $get_rtl_mode_status = get_theme_mod('aivons_rtl_mode', false);
    $dynamic_rtl_mode_status = isset($_GET['rtl_mode']) ? $_GET['rtl_mode'] : $get_rtl_mode_status;


    if (true == $dynamic_rtl_mode_status || true == is_rtl()) {
        $classes[] = 'translated-rtl';
    }

    return $classes;
}
add_filter('body_class', 'aivons_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function aivons_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'aivons_pingback_header');


if (!function_exists('aivons_menu_fallback_callback')) {
    function aivons_menu_fallback_callback()
    {
        return false;
    }
}


if (!function_exists('aivons_page_title')) :

    // Page Title
    function aivons_page_title()
    {
        if (is_home()) {
            echo esc_html__('Our Blog', 'aivons');
        } elseif (is_archive()) {
            esc_html(the_archive_title());
        } elseif (is_page()) {
            esc_html(the_title());
        } elseif (is_single()) {
            esc_html(the_title());
        } elseif (is_category()) {
            esc_html(single_cat_title());
        } elseif (is_search()) {
            echo esc_html__('Search result for: “', 'aivons') . esc_html(get_search_query()) . '”';
        } elseif (is_404()) {
            echo esc_html__('Page Not Found', 'aivons');
        } else {
            esc_html(the_title());
        }
    }

endif;


/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function aivons_search_form($form)
{

    $form = '<form action="' . esc_url(home_url('/')) . '" class="sidebar__search-form" method="get">
        <input type="search" placeholder="' . esc_attr__('Search here', 'aivons') . '" value="' . esc_attr(get_search_query()) . '" name="s">
        <button type="submit"><i class="icon-magnifying-glass"></i></button>
    </form>';

    return $form;
}
add_filter('get_search_form', 'aivons_search_form');




/**
 * making array of custom icon classes
 * which is saved in transient
 * @return array
 */
if (!function_exists('aivons_get_fa_icons')) :

    function aivons_get_fa_icons()
    {
        $data = get_transient('aivons_fa_icons');

        if (empty($data)) {
            global $wp_filesystem;
            require_once(ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();

            $fontAwesome_file =   get_parent_theme_file_path('/assets/vendors/fontawesome/css/all.min.css');
            $template_icon_file = get_parent_theme_file_path('/assets/vendors/aivons-icons/style.css');
            $content = '';

            if ($wp_filesystem->exists($fontAwesome_file)) {
                $content = $wp_filesystem->get_contents($fontAwesome_file);
            } // End If Statement

            if ($wp_filesystem->exists($template_icon_file)) {
                $content .= $wp_filesystem->get_contents($template_icon_file);
            } // End If Statement

            $pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s*{\s*content/';
            $pattern_two = '/\.(icon-(?:\w+(?:-)?)+):before\s*{\s*content/';

            $subject = $content;

            preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
            preg_match_all($pattern_two, $subject, $matches_two, PREG_SET_ORDER);

            $all_matches = array_merge($matches, $matches_two);

            $icons = array();

            foreach ($all_matches as $match) {
                // $icons[] = array('value' => $match[1], 'label' => $match[1]);
                $icons[] = $match[1];
            }


            $data = $icons;
            set_transient('aivons_fa_icons', $data, 10080); // saved for one week

        }



        return array_combine($data, $data); // combined for key = value
    }


endif;

// custom kses allowed html
if (!function_exists('aivons_kses_allowed_html')) :
    function aivons_kses_allowed_html($tags, $context)
    {
        switch ($context) {
            case 'aivons_allowed_tags':
                $tags = array(
                    'a' => array('href' => array(), 'class' => array()),
                    'b' => array(),
                    'br' => array(),
                    'span' => array('class' => array()),
                    'img' => array('class' => array()),
                    'i' => array('class' => array()),
                    'p' => array('class' => array()),
                    'ul' => array('class' => array()),
                    'li' => array('class' => array()),
                    'div' => array('class' => array()),
                    'strong' => array()
                );
                return $tags;
            default:
                return $tags;
        }
    }

    add_filter('wp_kses_allowed_html', 'aivons_kses_allowed_html', 10, 2);

endif;

if (!function_exists('aivons_excerpt')) :

    // Post's excerpt text
    function aivons_excerpt($get_limit_value, $echo = true)
    {
        $opt = $get_limit_value;
        $excerpt_limit = !empty($opt) ? $opt : 40;
        $excerpt = wp_trim_words(get_the_content(), $excerpt_limit, '');
        if ($echo == true) {
            echo esc_html($excerpt);
        } else {
            return esc_html($excerpt);
        }
    }

endif;

if (!function_exists('aivons_comment_count')) {
    function aivons_comment_count()
    {
        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link"><i class="far fa-comments"></i>';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        esc_html__('Leave a Comment', 'aivons') . '<span class="screen-reader-text">' . esc_html__('on', 'aivons') . ' %s</span>',
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                )
            );
            echo '</span>';
        }
    }
}

if (!function_exists('aivons_post_query')) {
    function aivons_post_query($post_type)
    {
        $post_list = get_posts(array(
            'post_type' => $post_type,
            'showposts' => -1,
        ));
        $posts = array();

        if (!empty($post_list) && !is_wp_error($post_list)) {
            foreach ($post_list as $post) {
                $options[$post->ID] = $post->post_title;
            }
            return $options;
        }
    }
}

if (!function_exists('aivons_custom_query_pagination')) :
    /**
     * Prints HTML with post pagination links.
     */
    function aivons_custom_query_pagination($paged = '', $max_page = '')
    {
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        if (!$paged)
            $paged = get_query_var('paged');
        if (!$max_page)
            $max_page = $wp_query->max_num_pages;

        $links = paginate_links(array(
            'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'     => '?paged=%#%',
            'current'    => max(1, $paged),
            'total'      => $max_page,
            'mid_size'   => 1,
            'prev_text' => '<i class="fa fa-angle-left"></i>',
            'next_text' => '<i class="fa fa-angle-right"></i>',
        ));

        echo wp_kses($links, 'aivons_allowed_tags');
    }
endif;

if (!function_exists('aivons_get_nav_menu')) :
    function aivons_get_nav_menu()
    {
        $menu_list = get_terms(array(
            'taxonomy' => 'nav_menu',
            'hide_empty' => true,
        ));
        $options = [];
        if (!empty($menu_list) && !is_wp_error($menu_list)) {
            foreach ($menu_list as $menu) {
                $options[$menu->term_id] = $menu->name;
            }
            return $options;
        }
    }
endif;

if (!function_exists('aivons_get_taxonoy')) :
    function aivons_get_taxonoy($taxonoy)
    {
        $taxonomy_list = get_terms(array(
            'taxonomy' => $taxonoy,
            'hide_empty' => true,
        ));
        $options = [];
        if (!empty($taxonomy_list) && !is_wp_error($taxonomy_list)) {
            foreach ($taxonomy_list as $taxonomy) {
                $options[$taxonomy->term_id] = $taxonomy->name;
            }
            return $options;
        }
    }
endif;


if (!function_exists('aivons_comment_form_fields')) :

    function aivons_comment_form_fields($fields)
    {
        if (!is_singular('product')) :
            $comment_field = $fields['comment'];
            unset($fields['comment']);
            $fields['comment'] = $comment_field;
        endif;
        unset($fields['cookies']);
        return $fields;
    }

endif;

add_filter('comment_form_fields', 'aivons_comment_form_fields');


/**
 * render footer from default or page builder
 * hooked into aivons_footer
 * location: footer.php
 *
 */

function aivons_render_footer()
{
    get_template_part('template-parts/layout/default-footer');
}

add_action('aivons_footer', 'aivons_render_footer');

/**
 * render header from default or page builder
 * hooked into aivons_header
 * location: header.php
 *
 */

function aivons_render_header()
{
    get_template_part('template-parts/layout/default-header');
}

add_action('aivons_header', 'aivons_render_header');
