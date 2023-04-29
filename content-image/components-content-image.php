<?php
/**
 * Full Bleed Image
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() == 'content_with_image_aside' ) :
    $half_bleed_component = new Module(
        [
            'content-image',
        ],
        [
            'u-animate-hide',
        ]
    );
    ?>
    <section
        data-module="ContentImage"
        data-animation="fade-in"
        data-styles="<?php echo esc_attr( $half_bleed_component->styles() ); ?>">
        <?php
        if ( have_rows( 'content_image_repeater' ) ) :
            $content_image_count = 0;

            while ( have_rows( 'content_image_repeater' ) ) :
                the_row();
                $content_editor = get_sub_field( 'content_editor' );
                $spacing = get_sub_field( 'spacing' );
                $bg_borders = get_sub_field( 'bg_borders' );
                $content_styles = get_sub_field( 'content_styles' );
                $btn_styles = get_sub_field( 'btn_styles' );
                $image = get_sub_field( 'image' );
                $image_styles = get_sub_field( 'image_styles' );
                $selection = get_sub_field( 'selection' );
                $image_component = new Module(
                    [
                        'content-image__figure',
                        $content_image_count > 0
                            ? 'content-image__figure--left'
                            : 'content-image__figure--right',
                    ],
                    [
                        $image_styles['image_gradiant'],
                        $image_styles['image_size'],
                        $image_styles['image_alignment'],
                    ]
                );
                $container_component = new Module(
                    [
                        'content-image__container',
                    ],
                    [
                        $bg_borders['background_color'],
                        $bg_borders['border_color']
                            ? 'u-border-t ' . $bg_borders['border_color']
                            : '',
                        $content_styles['color'],
                        $content_styles['link_color'],
                        $content_styles['link_hover_color'],
                        $content_styles['link_background_hover_color'],
                        $btn_styles['color'],
                        $btn_styles['border_color'],
                        $btn_styles['background_color'],
                        $btn_styles['hover_color'],
                        $btn_styles['border_hover_color'],
                        $btn_styles['background_hover_color'],
                        $selection['color'],
                        $selection['background_color'],
                    ]
                );
                $row_component = new Module(
                    [
                        'content-image__row',
                    ],
                    [
                        'l-row',
                        $content_image_count > 0
                            ? 'u-align-right'
                            : 'u-align-left',
                    ]
                );
                $content_component = new Module(
                    [
                        'content-image__content',
                        $content_image_count > 0
                            ? 'content-image__content--left'
                            : 'content-image__content--right',
                    ],
                    [
                        $spacing['top'],
                        $spacing['bottom'],
                    ]
                );
                ?>
                <div
                    data-styles="<?php echo esc_attr( $container_component->styles() ); ?>"
                    class="<?php echo esc_attr( $container_component->class_names() ); ?>">
                    <?php
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
                    ?>
                    <div
                        data-styles="<?php echo esc_attr( $row_component->styles() ); ?>"
                        class="<?php echo esc_attr( $row_component->class_names() ); ?>">
                        <div class="l-row__col is-lrg-half">
                            <?php
                            if ( ! empty( $content_editor ) ) :
                                get_template_part(
                                    'components/partials-content',
                                    null,
                                    array(
                                        'styles' => esc_attr( $content_component->styles() ),
                                        'class_names' => esc_attr( $content_component->class_names() ),
                                        'content' => $content_editor,
                                    )
                                );
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                $content_image_count ++;

                if ( $content_image_count > 1 ) {
                    $content_image_count = 0;
                }
            endwhile;
        endif;
        ?>
    </section>
    <?php
endif;
