<?php
/**
 * Hero
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() == 'hero' ) :
    $image = get_sub_field( 'image' );
    $image_styles = get_sub_field( 'image_styles' );
    $title_styles = get_sub_field( 'title_styles' );
    $alignment = get_sub_field( 'alignment' );
    $spacing = get_sub_field( 'spacing' );
    $bg_borders = get_sub_field( 'bg_borders' );
    $content_styles = get_sub_field( 'content_styles' );
    $btn_styles = get_sub_field( 'btn_styles' );
    $selection = get_sub_field( 'selection' );
    $text_alignment = get_sub_field( 'text_alignment' );
    $hero_component = new Module(
        [
            'hero',
        ],
        [
            'u-animate-hide',
            $bg_borders['background_color'],
            $bg_borders['border_color']
                ? 'u-border-t ' . $bg_borders['border_color']
                : '',
            $selection['color'],
            $selection['background_color'],
        ]
    );
    $image_component = new Module(
        [
            'hero__image',
        ],
        [
            $image_styles['image_gradiant'],
            $image_styles['image_size'],
            $image_styles['image_alignment'],
        ]
    );
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
    $use_post_title = is_single() || is_archive()
        ? true
        : get_sub_field( 'use_post_title' );
    $post_title = is_archive()
        ? bold_last_string( titleizeit( get_post_type() ) )
        : bold_last_string( get_the_title() );
    $_title = bold_last_string( get_sub_field( 'title' ) );
    $sub_title = get_sub_field( 'sub_title' );
    $content = $use_post_title
        ? '<h1 data-styles="hero__title"><span data-styles="hero__title-inside" class="' . esc_attr( $title_component->class_names() ) . '">' . $post_title . '</span></h1>'
        : '<h1 data-styles="hero__title"><span data-styles="hero__title-inside" class="' . esc_attr( $title_component->class_names() ) . '">' . $_title . '</span></h1>';
    $content .= $sub_title
        ? '<p data-styles="hero__title"><span data-styles="hero__title-inside" class="' . esc_attr( $title_component->class_names() ) . '">' . $sub_title . '</span></p>'
        : '';
    ?>
    <section
        data-module="Hero"
        data-animation="fade-in"
        data-styles="<?php echo esc_attr( $hero_component->styles() ); ?>"
        class="<?php echo esc_attr( $hero_component->class_names() ); ?>">
        <?php
        if ( ! empty( $image ) ) :
            get_template_part(
                'components/partials-figure',
                null,
                array(
                    'image' => $image,
                    'styles' => esc_attr( $image_component->styles() ),
                    'class_names' => esc_attr( $image_component->class_names() ),
                    'animation' => 'fade-in',
                    'animation_duration' => 200,
                    'rest' => '',
                )
            );
        endif;
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
        ?>
    </section>
    <?php
endif;
