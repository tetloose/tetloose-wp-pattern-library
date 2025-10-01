<?php
/**
 * Content
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'title' ) :
    $colors          = get_sub_field( 'colors' );
    $text_attributes = get_sub_field( 'text_attributes' );
    $spacing         = get_sub_field( 'spacing' );
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
            $_title,
            $text_attributes['tag'],
            '',
            $text_attributes['font_size']
        )
        : null;
    $_content       .= $sub_title
        ? typography(
            $sub_title,
            'p',
            'title__sub-title'
        )
        : null;

    if ( ! empty( $_content ) ) :
        $section = new Module(
            [],
            [
                $colors['text'] ?? '',
                $colors['background'] ?? '',
                $spacing['top'] ?? '',
                $spacing['bottom'] ?? '',
            ]
        );
        $row     = new Module(
            [
                'title',
            ],
            [
                'u-load-hide',
                'l-row',
            ],
            [
                'opacity: 0;',
            ],
        );
        $content = new Module(
            [],
            [
                $text_attributes['text_alignment'] ?? '',
                $text_attributes['text_transform'] ?? '',
            ]
        );
        ?>
        <section class="<?php echo esc_attr( $section->class_names() ); ?>">
            <div
                style="<?php echo esc_attr( $row->inline_styles() ); ?>"
                data-module="Title"
                data-animation="fade-in"
                data-duration="400"
                data-styles="<?php echo esc_attr( $row->styles() ); ?>"
                class="<?php echo esc_attr( $row->class_names() ); ?>"
            >
                <div class="l-row__col">
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
            </div>
        </section>
        <?php
    endif;
endif;
