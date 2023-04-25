<?php
/**
 *  The Title
 * Remove protected and private from the_title()
 *
 * @package Tetloose-Theme
 **/

add_filter(
    'private_title_format',
    function () {
        return preg_replace( '/(Protected:|Private:)/', '', '%s' );
    }
);

add_filter(
    'protected_title_format',
    function () {
        return preg_replace( '/(Protected:|Private:)/', '', '%s' );
    }
);
