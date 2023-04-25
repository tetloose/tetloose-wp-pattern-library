<?php
/**
 * Titleizeit
 *
 * @package Tetloose-Theme
 **/

/**
 * Function to convert string to title case
 *
 * @param string $string value passed is a string.
 **/
function titleizeit( $string ) {
    $string = strtolower( $string );
    $string = strip_tags( $string );
    $string = stripslashes( $string );
    $string = html_entity_decode( $string );
    $string = str_replace( '\'', '', $string );
    $match = '/[^a-z0-9]+/';
    $replace = ' ';
    $string = preg_replace( $match, $replace, $string );
    $string = trim( $string, '-' );
    $string = ucfirst( $string );
    return $string;
}
