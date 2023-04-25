<?php
/**
 * Gutenberg Block Library
 *
 * @package Tetloose-Theme
 **/

/**
 * Function remove gutenberg block library css from loading on frontend
 **/
function remove_wp_block_library_css() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // remove woocommerce block css.
    wp_dequeue_style( 'global-styles' ); // remove theme.json.
}

add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );
