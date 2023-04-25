<?php
/**
 * Navigation
 *
 * @package Tetloose-Theme
 */

if ( ! empty( $args ) ) :
    $navigation = wp_nav_menu(
        array(
            'menu' => $args['id'],
            'container' => false,
            'items_wrap' => '
                <ul
                    data-module="Navigation"
                    data-animation="fade-in"
                    class="' . esc_attr( $args['class_names'] ) . '"
                    data-styles="' . esc_attr( $args['styles'] ) . '">
                    %3$s
                </ul>
            ',
            'echo' => false,
        )
    );
    echo wp_kses_post( $navigation );
endif;
