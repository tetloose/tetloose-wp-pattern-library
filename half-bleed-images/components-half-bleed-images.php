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
            'u-animate-hide',
            $bg_borders['background_color'],
            $bg_borders['border_color']
                ? 'u-border-t ' . $bg_borders['border_color']
                : '',
        ]
    );
    ?>
    <section
        data-module="HalfBleedImages"
        data-animation="fade-in"
        data-styles="<?php echo esc_attr( $half_bleed_component->styles() ); ?>"
        class="<?php echo esc_attr( $half_bleed_component->class_names() ); ?>">
        <?php
        if ( have_rows( 'image_repeater' ) ) :
            while ( have_rows( 'image_repeater' ) ) :
                the_row();
                $image = get_sub_field( 'image' );
                $image_styles = get_sub_field( 'image_styles' );
                $image_component = new Module(
                    [
                        'half-bleed__figure',
                    ],
                    [
                        $image_styles['image_gradiant'],
                        $image_styles['image_size'],
                        $image_styles['image_alignment'],
                    ]
                );
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
                        )
                    );
                endif;
            endwhile;
        endif;
        ?>
    </section>
    <?php
endif;
