<?php
/**
 * Half Bleed Image
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'half_bleed_images' ) :
    $spacing              = get_sub_field( 'spacing' );
    $half_bleed_component = new Module(
        [
            'half-bleed',
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
        data-module="HalfBleedImages"
        data-animation="fade-in"
        data-duration="400"
        data-styles="<?php echo esc_attr( $half_bleed_component->styles() ); ?>"
        class="<?php echo esc_attr( $half_bleed_component->class_names() ); ?>">
        <?php
        if ( have_rows( 'image_repeater' ) ) :
            ?>
            <div class="l-row full-width">
                <?php
                while ( have_rows( 'image_repeater' ) ) :
                    ?>
                    <div class="l-row__col width-6 no-gutter">
                        <?php
                        the_row();
                        $image              = get_sub_field( 'image' );
                        $basic_image_styles = get_sub_field( 'basic_image_styles' );
                        $figure_component   = new Module(
                            [],
                            [
                                $basic_image_styles['image_size'] ?? '',
                                $basic_image_styles['image_position'] ?? '',
                                'u-ratio-1x1',
                            ]
                        );
                        if ( ! empty( $image ) ) :
                            get_template_part(
                                'components/figure',
                                null,
                                array(
                                    'image'              => $image,
                                    'styles'             => esc_attr( $figure_component->styles() ),
                                    'class_names'        => esc_attr( $figure_component->class_names() ),
                                    'animation_duration' => 400,
                                )
                            );
                        endif;
                        ?>
                    </div>
                    <?php
                endwhile;
                ?>
            </div>
            <?php
        endif;
        ?>
    </section>
    <?php
endif;
