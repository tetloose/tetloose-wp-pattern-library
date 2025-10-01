<?php
/**
 * Quote - Slide
 *
 * @package Tetloose-Theme
 **/

$_title      = get_field( 'title' );
$description = get_field( 'description' );
$sub_title   = get_field( 'sub_title' );
$image       = get_field( 'image' );
$_content    = $description
    ? typography(
        $description,
        'blockquote',
        '',
        'h-h4 u-bold'
    )
    : null;
$profile     = $sub_title
    ? typography(
        $sub_title,
        'span',
        '',
        'u-caption u-bold'
    )
    : null;
$profile    .= $_title
    ? typography(
        $_title,
        'span',
        '',
        'u-small'
    )
    : null;

if ( ! empty( $_content ) ) :
    ?>
    <article
        data-styles="quote__slide"
        class="swiper-slide"
    >
        <?php
            get_template_part(
                'components/partials-content',
                null,
                array(
                    'styles'      => '',
                    'class_names' => '',
                    'content'     => $_content,
                )
            );
        ?>
        <div
            data-styles="quote__profile"
            class="u-spacing-t-sml"
        >
            <?php
            if ( ! empty( $image ) ) :
                $figure = new Module(
                    [
                        'quote__profile-image',
                    ],
                    [
                        'is-cover',
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
            if ( ! empty( $profile ) ) :
                get_template_part(
                    'components/partials-content',
                    null,
                    array(
                        'styles'      => 'quote__profile-content',
                        'class_names' => '',
                        'content'     => $profile,
                    )
                );
            endif;
            ?>
        </div>
    </article>
    <?php
endif;
