<?php
/**
 * Contact form 7
 *
 * @package Tetloose-Theme
 **/

/**
 * Remove p tags from textarea
 **/
add_filter( 'wpcf7_autop_or_not', '__return_false' );
