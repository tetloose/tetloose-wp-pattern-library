<?php
/**
 * Full Bleed Image
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'content_with_image_aside' ) :
    $spacing = get_sub_field( 'spacing' );
    $section = new Module(
        [
            'content-image',
        ],
        [
            'u-load-hide',
            $spacing['top'] ?? '',
            $spacing['bottom'] ?? '',
        ]
    );
    ?>
    <section
        style="opacity: 0"
        data-module="ContentImage"
        data-animation="fade-in"
        data-duration="400"
        data-styles="<?php echo esc_attr( $section->styles() ); ?>"
        class="<?php echo esc_attr( $section->class_names() ); ?>">
        <?php
        if ( have_rows( 'content_image_repeater' ) ) :
            $content_image_count = 0;

            while ( have_rows( 'content_image_repeater' ) ) :
                the_row();
                $content_editor     = get_sub_field( 'content_editor' );
                $image              = get_sub_field( 'image' );
                $basic_image_styles = get_sub_field( 'basic_image_styles' );
                $figure             = new Module(
                    [
                        'content-image__figure',
                        $content_image_count > 0
                            ? 'is-left'
                            : 'is-right',
                    ],
                    [
                        $basic_image_styles['image_size'] ?? '',
                        $basic_image_styles['image_position'] ?? '',
                        'u-ratio-1x1',
                    ]
                );
                $row                = new Module(
                    [
                        'content-image__row',
                    ],
                    [
                        'l-row align-center full-width',
                        $content_image_count > 0
                            ? 'justify-flex-end'
                            : 'justify-flex-start',
                    ]
                );
                $content            = new Module(
                    [
                        'content-image__content',
                    ],
                    []
                );

                ?>
                <div data-styles="content-image__container">
                    <?php
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
                    ?>
                    <div
                        data-styles="<?php echo esc_attr( $row->styles() ); ?>"
                        class="<?php echo esc_attr( $row->class_names() ); ?>">
                        <div class="l-row__col med-width-6">
                            <?php
                            if ( ! empty( $content_editor ) ) :
                                get_template_part(
                                    'components/partials-content',
                                    null,
                                    array(
                                        'styles'      => esc_attr( $content->styles() ),
                                        'class_names' => esc_attr( $content->class_names() ),
                                        'content'     => $content_editor,
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
