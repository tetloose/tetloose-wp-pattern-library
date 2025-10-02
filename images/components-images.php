<?php
/**
 * Images
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'images' ) :
    $row_attributes = get_sub_field( 'row_attributes' );
    $spacing        = get_sub_field( 'spacing' );

    if ( have_rows( 'images' ) ) :
        $section = new Module(
            [],
            [
                $spacing['top'] ?? '',
                $spacing['bottom'] ?? '',
            ]
        );
        $row     = new Module(
            [
                'image',
            ],
            [
                'u-load-hide',
                'l-row',
                $row_attributes['full_width'] ? 'full-width' : '',
                $row_attributes['vertical'] ?? '',
                $row_attributes['horizontal'] ?? '',
                $row_attributes['direction'] ?? '',
            ],
            [
                'opacity: 0;',
            ]
        );
        ?>
        <section class="<?php echo esc_attr( $section->class_names() ); ?>">
            <div
                styles="<?php echo esc_attr( $row->inline_styles() ); ?>"
                data-module="Images"
                data-animation="fade-in"
                data-duration="400"
                data-styles="<?php echo esc_attr( $row->styles() ); ?>"
                class="<?php echo esc_attr( $row->class_names() ); ?>"
            >
                <?php
                while ( have_rows( 'images' ) ) :
                    the_row();
                    $image             = get_sub_field( 'image' );
                    $column_attributes = get_sub_field( 'column_attributes' );
                    $image_attributes  = get_sub_field( 'image_attributes' );
                    $width             = get_sub_field( 'width' );

                    if ( ! empty( $image ) ) :
                        $col    = new Module(
                            [],
                            [
                                'l-row__col',
                                $column_attributes['width'] ? 'width-' . $column_attributes['width'] : '',
                            ]
                        );
                        $figure = new Module(
                            [
                                'image__figure',
                            ],
                            [
                                $image_attributes['size'] ?? 'is-cover',
                                $image_attributes['position'] ?? 'is-center',
                                $image_attributes['height'] ? $image_attributes['height'] : 'u-ratio-1x1',
                            ]
                        );
                        ?>
                        <div
                            data-styles="<?php echo esc_attr( $col->styles() ); ?>"
                            class="<?php echo esc_attr( $col->class_names() ); ?>"
                        >
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
                        </div>
                        <?php
                    endif;
                endwhile;
                ?>
            </div>
        </section>
        <?php
    endif;
endif;
