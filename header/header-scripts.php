<?php
/**
 * Header - Scripts
 *
 * @package Tetloose-Theme
 */

$scripts = get_field( 'scripts', 'option' );
wp_head();
if ( ! empty( $scripts ) ) {
    echo esc_sql( $scripts['head'] );
}
