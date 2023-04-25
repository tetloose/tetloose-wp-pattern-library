<?php
/**
 * Bold last word in sting
 *
 * @package Tetloose-Theme
 **/

/**
 * Function to convert last string bold
 *
 * @param string $string pass in a string.
 **/
function bold_last_string( $string ) {
    if ( $string ) {
        $word_arr = explode( ' ', $string );
        if ( count( $word_arr ) > 1 ) {
            $word_arr[ count( $word_arr ) - 1 ] = '<strong>' . ( $word_arr[ count( $word_arr ) - 1 ] ) . '</strong>';
            $string = implode( ' ', $word_arr );
            return wp_kses_post( $string );
        } else {
            return '<strong>' . wp_kses_post( $string ) . '</strong>';
        }
    }
}
