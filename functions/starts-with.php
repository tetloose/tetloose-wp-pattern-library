<?php
/**
 * Starts with
 *
 * @package Tetloose-Theme
 **/

/**
 * Function to find any value at the start of a string.
 *
 * @param string $string initial string.
 * @param string $start_string filter.
 **/
function starts_with( $string, $start_string ) {
    $len = strlen( $start_string ?? '' );
    return ( substr( $string, 0, $len ) === $start_string );
}
