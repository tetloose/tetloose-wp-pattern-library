<?php
/**
 * Content
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() == 'title' ) :
    $use_post_title = is_single() || is_archive()
        ? true
        : get_sub_field( 'use_post_title' );
    $post_title = is_archive()
        ? bold_last_string( titleizeit( get_post_type() ) )
        : bold_last_string( get_the_title() );
    $_title = bold_last_string( get_sub_field( 'title' ) );
    $sub_title = get_sub_field( 'sub_title' );
    $content = get_sub_field( 'use_post_title' )
        ? '<h1>' . $post_title . '</h1>'
        : '<h2>' . bold_last_string( $_title ) . '</h2>';
    $content .= $sub_title
        ? '<p data-styles="sub-title">' . $sub_title . '</p>'
        : '';
    $text_alignment = get_sub_field( 'text_alignment' );
    $spacing = get_sub_field( 'spacing' );
    $bg_borders = get_sub_field( 'bg_borders' );
    $content_styles = get_sub_field( 'content_styles' );
    $selection = get_sub_field( 'selection' );
    $title_component = new Module(
        [],
        [
            'u-animate-hide',
            $spacing['top'],
            $spacing['bottom'],
            $bg_borders['background_color'],
            $bg_borders['border_color']
                ? 'u-border-t ' . $bg_borders['border_color']
                : '',
            $content_styles['color'],
            $content_styles['link_color'],
            $content_styles['link_hover_color'],
            $content_styles['link_background_hover_color'],
            $selection['color'],
            $selection['background_color'],
        ]
    );
    $content_component = new Module(
        [],
        [
            $text_alignment,
        ]
    );
    if ( ! empty( $content ) ) :
        ?>
        <section
            data-module="Title"
            data-animation="fade-in"
            data-styles="<?php echo esc_attr( $title_component->styles() ); ?>"
            class="<?php echo esc_attr( $title_component->class_names() ); ?>">
            <div class="l-row">
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
        </section>
        <?php
    endif;
endif;
