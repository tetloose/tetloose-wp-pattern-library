<?php
/**
 *  Tinymce
 *
 * @package Tetloose-Theme
 **/

/**
 *  Add tinymce styles
 **/
add_editor_style( 'assets/css/tinymce.css' );

/**
 *  Remove h1 from styles dropdown
 */
add_filter(
    'tiny_mce_before_init',
    function ( $mce_before_remove_h1 ) {
        $mce_before_remove_h1['block_formats'] = 'Title=h2;Heading=h3;Sub Heading=h4;Paragraph=p;';
        return $mce_before_remove_h1;
    }
);

/**
 *  Second-row list of buttons.
 */
add_filter(
    'mce_buttons_2',
    function ( $mce_editor_buttons ) {
        array_unshift( $mce_editor_buttons, 'styleselect' );
        return $mce_editor_buttons;
    }
);

/**
 *  Add Items to Format.
 */
add_filter(
    'tiny_mce_before_init',
    function ( $mce_before_init ) {
        $mce_formats = array(
            array(
                'title'    => 'Button',
                'selector' => 'a',
                'classes'  => 'u-btn is-inline',
            ),
            array(
                'title'    => 'Small Text',
                'selector' => 'p',
                'classes'  => 'u-small',
            ),
        );

        $mce_before_init['style_formats'] = json_encode( $mce_formats );

        return $mce_before_init;
    }
);
