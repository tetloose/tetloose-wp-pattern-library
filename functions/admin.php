<?php
/**
 * Wordpress Admin functions
 *
 * @package Tetloose-Theme
 **/

/**
 * Replaces Wordpress with link to Tetloose.com
 **/
function admin_replace_wp_footer() {
    remove_filter( 'update_footer', 'core_update_footer' );
    echo '<p>Built by <a href="https://www.tetloose.com" target="_blank">Theme by Tetloose</a></p>';
}

add_filter( 'admin_footer_text', 'admin_replace_wp_footer' );

/**
 * Hide admin items from none developers.
 **/
function admin_backend_styles() {
    echo '
        <style>
            #wp-admin-bar-my-account .display-name,
            #wp-admin-bar-wp-logo,
            #wp-admin-bar-new-post,
            #wp-admin-bar-updates,
            #toplevel_page_aiowpsec,
            #wp-admin-bar-new-user,
            #wp-admin-bar-comments,
            #toplevel_page_edit-post_type-acf-field-group {
                display: none !important;
            }
        </style>
    ';
}

/**
 * Hide frontend items from none developers.
 **/
function admin_frontend_styles() {
    echo '
        <style>
            #wp-admin-bar-dashboard,
            #wp-admin-bar-themes,
            #wp-admin-bar-my-account .display-name,
            #wp-admin-bar-search,
            #wp-admin-bar-wp-logo,
            #wp-admin-bar-new-content #wp-admin-bar-new-post,
            #wp-admin-bar-comments {
                display: none !important;
            }

            .menupop.hover .ab-sub-wrapper {
                bottom: 100%;
            }

            #wpadminbar {
                position: fixed !important;
                top: auto;
                bottom: 0;
            }

            html.is-admin {
                margin-top: 0 !important;
            }
        </style>
    ';
}

/**
 * Remove admin items for none developers
 **/
function admin_remove_items() {
    $user_name = wp_get_current_user();
    $user_name = $user_name->user_login;

    if ( ! preg_match( '/-dev/i', $user_name ) ) {
        remove_menu_page( 'index.php' );
        remove_menu_page( 'edit-comments.php' );
        remove_menu_page( 'edit.php' );
        remove_submenu_page( 'edit.php', 'edit.php' );
        remove_submenu_page( 'edit.php', 'post-new.php' );
        remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
        remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
        add_action( 'admin_head', 'admin_backend_styles' );
    }
}

if ( is_user_logged_in() ) {
    add_action( 'wp_head', 'admin_frontend_styles' );
    add_action( 'admin_init', 'admin_remove_items' );
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
}

// De register core block support.
add_action(
    'wp_footer',
    function () {
        wp_dequeue_style( 'core-block-supports' );
    }
);

// Cleanup Wordpress head.
if ( ! is_admin() ) {
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'index_rel_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    add_filter( 'embed_oembed_discover', '__return_false' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    add_filter( 'use_default_gallery_style', '__return_false' );
}

/**
 * Redirect user to theme settings.
 **/
function admin_redirect_theme_settings() {
    wp_redirect( admin_url( 'admin.php?page=theme-settings' ) );
}

add_action( 'load-index.php', 'admin_redirect_theme_settings' );

/**
 * Redirect user to theme settings if wp-admin in url.
 **/
function admin_login_redirect_theme_settings() {
    return admin_url( 'admin.php?page=theme-settings' );
}

add_filter( 'login_redirect', 'admin_login_redirect_theme_settings', 10, 3 );
