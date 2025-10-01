<?php
/**
 * Animated Banner Background
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

$image_attributes = get_sub_field( 'image_attributes' );
$image            = get_sub_field( 'image' );

if ( ! empty( $image ) ) :
        $figure = new Module(
            [
                'animated-banner__image',
            ],
            [
                'is-absolute',
                $image_attributes['size'] ?? 'is-cover',
                $image_attributes['position'] ?? 'is-center',
            ]
        );
    get_template_part(
        'components/figure',
        null,
        array(
            'image'              => $image,
            'styles'             => esc_attr( $figure->styles() ),
            'class_names'        => esc_attr( $figure->class_names() ),
            'animation_duration' => 400,
        )
    );
        endif;
