<?php
/**
 * Music
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

$content_editor = get_sub_field( 'content_editor' );

if ( ! empty( $content_editor ) ) :
    get_template_part(
        'components/partials-content',
        null,
        array(
            'styles' => '',
            'class_names' => '',
            'content' => $content_editor,
        )
    );
endif;
