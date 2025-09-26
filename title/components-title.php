<?php
/**
 * Content
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'title' ) :
    $text_alignment    = get_sub_field( 'text_alignment' );
    $spacing           = get_sub_field( 'spacing' );
    $title_component   = new Module(
        [],
        [
            'u-load-hide',
            $spacing['top'] ?? '',
            $spacing['bottom'] ?? '',
        ]
    );
    $content_component = new Module(
        [],
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
    $_tag              = $use_post_title
        ? 'h1'
        : 'h2';
    $content           = '<' . $_tag . '>' . $_title . '</' . $_tag . '>';
    $content          .= $sub_title
        ? '<p data-styles="sub-title">' . $sub_title . '</p>'
        : '';

    if ( ! empty( $content ) ) :
        ?>
        <section
            style="opacity: 0"
            data-module="Title"
            data-animation="fade-in"
            data-duration="400"
            data-styles="<?php echo esc_attr( $title_component->styles() ); ?>"
            class="<?php echo esc_attr( $title_component->class_names() ); ?>">
            <div class="l-row">
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
        </section>
        <?php
    endif;
endif;
