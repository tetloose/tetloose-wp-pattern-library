<?php
/**
 * Animated Banner Content
 *
 * @package Tetloose-Theme
 **/

$row_attributes  = get_sub_field( 'row_attributes' );
$text_attributes = get_sub_field( 'text_attributes' );
$post_title      = get_sub_field( 'post_title' );
$_title          = post_title(
    $post_title['use_post_title'],
    $post_title['title'],
    get_the_title(),
    get_post_type()
);
$sub_title       = get_sub_field( 'sub_title' );
$_content        = $_title
    ? typography(
        typography(
            $_title,
            'span',
            'animated-banner__title-inside'
        ),
        $text_attributes['tag'],
        'animated-banner__title',
        $text_attributes['font_size']
    )
    : null;
$_content       .= $sub_title
    ? typography(
        typography(
            $sub_title,
            'span',
            'animated-banner__title-inside'
        ),
        'p',
        'animated-banner__title'
    )
    : null;

if ( ! empty( $_content ) ) :
    $col     = new Module(
        [
            'animated-banner__col',
        ],
        [
            'l-row__col',
            $row_attributes['horizontal'] ? 'width-auto' : '',
        ]
    );
    $content = new Module(
        [],
        [
            $text_attributes['text_alignment'] ?? '',
            $text_attributes['text_transform'] ?? '',
        ]
    );
    ?>
        <div
            data-styles="<?php echo esc_attr( $col->styles() ); ?>"
            class="<?php echo esc_attr( $col->class_names() ); ?>"
        >
            <?php
            get_template_part(
                'components/partials-content',
                null,
                array(
                    'styles'      => esc_attr( $content->styles() ),
                    'class_names' => esc_attr( $content->class_names() ),
                    'content'     => $_content,
                )
            );
            ?>
        </div>
    <?php
endif;
