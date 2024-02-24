<?php
/**
 * Hero Content
 *
 * @package Tetloose-Theme
 **/

$title_styles = get_sub_field( 'title_styles' );
$alignment = get_sub_field( 'alignment' );
$spacing = get_sub_field( 'spacing' );
$content_styles = get_sub_field( 'content_styles' );
$btn_styles = get_sub_field( 'btn_styles' );
$text_alignment = get_sub_field( 'text_alignment' );

$row_component = new Module(
    [
        'hero__row',
    ],
    [
        'l-row',
        $spacing['top'],
        $spacing['bottom'],
        $alignment['height'],
        $alignment['vertical'],
        $alignment['horizontal'],
    ]
);
$title_component = new Module(
    [],
    [
        $title_styles['color'],
        $title_styles['background_color'],
    ]
);
$content_component = new Module(
    [
        'hero__content',
    ],
    [
        $content_styles['link_color'],
        $content_styles['link_hover_color'],
        $content_styles['link_background_hover_color'],
        $btn_styles['color'],
        $btn_styles['border_color'],
        $btn_styles['background_color'],
        $btn_styles['hover_color'],
        $btn_styles['border_hover_color'],
        $btn_styles['background_hover_color'],
        $text_alignment,
    ]
);


$use_post_title = get_sub_field( 'use_post_title' );
$post_title = is_archive()
    ? bold_last_string( titleizeit( get_post_type() ) )
    : bold_last_string( get_the_title() );
$_title = get_sub_field( 'title' ) ? bold_last_string( get_sub_field( 'title' ) ) : bold_last_string( get_the_title() );
$sub_title = get_sub_field( 'sub_title' );
$content = $use_post_title
    ? '<h1 data-styles="hero__title"><span data-styles="hero__title-inside" class="' . esc_attr( $title_component->class_names() ) . '">' . $post_title . '</span></h1>'
    : '<h1 data-styles="hero__title"><span data-styles="hero__title-inside" class="' . esc_attr( $title_component->class_names() ) . '">' . $_title . '</span></h1>';
$content .= $sub_title
    ? '<p data-styles="hero__title"><span data-styles="hero__title-inside" class="' . esc_attr( $title_component->class_names() ) . '">' . $sub_title . '</span></p>'
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
                    'styles' => esc_attr( $content_component->styles() ),
                    'class_names' => esc_attr( $content_component->class_names() ),
                    'content' => $content,
                )
            );
            ?>
        </div>
    </div>
    <?php
endif;
