<?php
/**
 * Animated Banner Decal
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

$decal = get_sub_field( 'decal_image' );

if ( ! empty( $decal ) ) :
    get_template_part(
        'components/figure',
        null,
        array(
            'image'              => $decal,
            'styles'             => 'animated-banner__decal',
            'class_names'        => 'is-absolute is-contain is-right-bottom',
            'animation_duration' => 400,
        )
    );
        endif;
