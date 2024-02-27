<?php
/**
 * Half Bleed Image
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() == 'half_bleed_images' ) :
    $bg_borders = get_sub_field( 'bg_borders' );
    $half_bleed_component = new Module(
        [
            'half-bleed',
        ],
        [
            'u-load-hide',
            $bg_borders['background_color'],
            $bg_borders['border_color']
                ? 'u-border-t ' . $bg_borders['border_color']
                : '',
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
            <div class="l-row is-fullwidth">
                <?php
                while ( have_rows( 'image_repeater' ) ) :
                    ?>
                    <div class="l-row__col is-half no-gutter">
                        <?php
                        the_row();
                        $image = get_sub_field( 'image' );
                        $image_styles = get_sub_field( 'image_styles' );
                        $figure_component = new Module(
                            [],
                            [
                                $image_styles['image_size'],
                                $image_styles['image_alignment'],
                                $image_styles['image_ratio'],
                                $image_styles['image_gradient'],
                            ]
                        );
                        if ( ! empty( $image ) ) :
                            get_template_part(
                                'components/figure',
                                null,
                                array(
                                    'image' => $image,
                                    'styles' => esc_attr( $figure_component->styles() ),
                                    'class_names' => esc_attr( $figure_component->class_names() ),
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
