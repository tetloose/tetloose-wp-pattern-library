<?php
/**
 *  ACF
 *
 * @package Tetloose-Theme
 **/

/**
 * ACF json Export.
 **/
add_filter(
    'acf/settings/save_json',
    function () {
        return esc_url( str_replace( 'web/wp/', '', ABSPATH ) . 'src/acf' );
    }
);

/**
 * ACF json Import.
 */
add_filter(
    'acf/settings/load_json',
    function ( $paths ) {
        unset( $paths[0] );
        $paths[] = esc_url( str_replace( 'web/wp/', '', ABSPATH ) . 'src/acf' );

        return $paths;
    }
);

/**
 * ACF options page.
 */
if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page(
        array(
            'icon_url' => 'dashicons-admin-home',
            'position' => 1,
            'page_title' => 'Theme Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
            'autoload' => true,
        )
    );

    acf_add_options_page(
        array(
            'icon_url' => 'dashicons-media-text',
            'position' => 1,
            'page_title' => 'Static Content',
            'menu_title' => 'Static Content',
            'menu_slug' => 'static-content',
            'capability' => 'edit_posts',
            'redirect' => false,
            'autoload' => true,
        )
    );

    acf_add_options_page(
        array(
            'icon_url' => 'dashicons-welcome-write-blog',
            'position' => 84,
            'page_title' => 'News Landing',
            'menu_title' => 'News Landing',
            'menu_slug' => 'news-landing',
            'parent_slug' => 'edit.php?post_type=news',
            'capability' => 'edit_posts',
            'redirect' => false,
            'autoload' => true,
        )
    );
}
