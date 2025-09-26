<?php
/**
 * Hero Content
 *
 * @package Tetloose-Theme
 **/

$alignment         = get_sub_field( 'alignment' );
$spacing           = get_sub_field( 'spacing' );
$text_alignment    = get_sub_field( 'text_alignment' );
$row_component     = new Module(
    [
        'hero__row',
    ],
    [
        'l-row',
        $spacing['top'] ?? '',
        $spacing['bottom'] ?? '',
        $alignment['height'] ?? '',
        $alignment['vertical'] ?? '',
        $alignment['horizontal'] ?? '',
    ]
);
$content_component = new Module(
    [
        'hero__content',
    ],
    [
        $text_alignment ?? '',
    ]
);
$post_title        = get_sub_field( 'post_title' );
$use_post_title    = $post_title['use_post_title'];
$_title            = bold_last_string(
    ! $use_post_title
        ? $post_title['title'] ?? get_the_title()
        : get_the_title()
);
$sub_title         = get_sub_field( 'sub_title' );
$content           = '<h1 data-styles="hero__title"><span data-styles="hero__title-inside">' . $_title . '</span></h1>';
$content          .= $sub_title
    ? '<p data-styles="hero__title"><span data-styles="hero__title-inside">' . $sub_title . '</span></p>'
    : '';

if ( ! empty( $content ) ) :
    ?>
    <div
        data-styles="<?php echo esc_attr( $row_component->styles() ); ?>"
        class="<?php echo esc_attr( $row_component->class_names() ); ?>">
        <div class="l-row__col">
            <?php
            get_template_part(
                'components/partials-content',
                null,
                array(
                    'styles'      => esc_attr( $content_component->styles() ),
                    'class_names' => esc_attr( $content_component->class_names() ),
                    'content'     => $content,
                )
            );
            ?>
        </div>
    </div>
    <?php
endif;
