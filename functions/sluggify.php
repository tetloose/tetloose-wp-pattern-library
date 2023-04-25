<?php
/**
 * Slugify
 *
 * @package Tetloose-Theme
 **/

/**
 * Function to convert string into url
 *
 * @param string $url value passed is a string.
 **/
function sluggify( $url ) {
    $url = strtolower( $url );
    $url = strip_tags( $url );
    $url = stripslashes( $url );
    $url = html_entity_decode( $url );
    $url = str_replace( '\'', '', $url );
    $match = '/[^a-z0-9]+/';
    $replace = '-';
    $url = preg_replace( $match, $replace, $url );
    $url = trim( $url, '-' );
    return $url;
}
