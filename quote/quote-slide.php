<?php
/**
 * Quote - Slide
 *
 * @package Tetloose-Theme
 **/

$_title      = get_the_title();
$description = get_field( 'description' );
$sub_title   = get_field( 'sub_title' );
$source      = get_field( 'title' );
$image       = get_field( 'image' );

$_content  = $description
    ? typography(
        $description,
        'blockquote',
        '',
        'u-p'
    )
    : null;
$_content .= $source
    ? typography(
        '<small> ' . $source . '</small>',
        'p',
        '',
        'u-small u-bold'
    )
    : null;
$profile   = $sub_title
    ? typography(
        $sub_title,
        'span',
        '',
        ''
    )
    : null;
$profile  .= $_title
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
        <div data-styles="quote__profile">
            <?php
            if ( ! empty( $image ) ) :
                $figure = new Module(
                    [
                        'quote__profile-image',
                    ],
                    [
                        'is-contain',
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
                        'styles'      => '',
                        'class_names' => '',
                        'content'     => $profile,
                    )
                );
            endif;
            ?>
        </div>
        <?php
            get_template_part(
                'components/partials-content',
                null,
                array(
                    'styles'      => '',
                    'class_names' => 'u-spacing-t-sml',
                    'content'     => $_content,
                )
            );
        ?>
    </article>
    <?php
endif;
