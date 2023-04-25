<?php
/**
 * Post Type
 *
 * @package Tetloose-Theme
 **/

/**
 * Function test if post type exists
 *
 * @param string $type value passed is a string.
 **/
function is_post_type( $type ) {
    global $wp_query;
    if ( $type == get_post_type( $wp_query->post->ID ) ) {
        return true;
    }

    return false;
}

/**
 * Function if page id == post type add class
 *
 * @param array  $classes array of strings.
 * @param object $menu_item check if true or false.
 **/
function post_type_active_class( $classes = array(), $menu_item = false ) {
    global $post;
    $id = ( isset( $post->ID ) ? get_the_ID() : null );

    if ( isset( $id ) ) {
        $classes[] = ( $menu_item->url == get_post_type_archive_link( $post->post_type ) ) ? 'current-menu-item' : '';
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'post_type_active_class', 10, 2 );
