<?php
/**
 * Hero Image
 *
 * @package Tetloose-Theme
 **/

$image = get_sub_field( 'image' );
$image_styles = get_sub_field( 'image_styles' );
$figure_component = new Module(
    [
        'hero__image',
        $image_styles['image_size'],
        $image_styles['image_alignment'],
    ],
    [
        'u-bg-image',
        $image_styles['image_gradient'],
    ]
);

if ( ! empty( $image ) ) :
    get_template_part(
        'components/figure',
        null,
        array(
            'image' => $image,
            'styles' => esc_attr( $figure_component->styles() ),
            'class_names' => esc_attr( $figure_component->class_names() ),
            'animation_duration' => 400,
        )
    );
endif;
