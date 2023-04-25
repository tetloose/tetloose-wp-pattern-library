<?php
/**
 * Console Log
 *
 * @package Tetloose-Theme
 **/

/**
 * Function to log php errors to console
 *
 * @param string $log value passed is a string.
 **/
function console_log( $log ) {
    echo "<script>console.log('" . esc_attr( $log ) . "');</script>";
}
