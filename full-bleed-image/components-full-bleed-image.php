<?php
/**
 * Full Bleed Image
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() == 'full_bleed_image' ) :
    $image = get_sub_field( 'image' );
    $image_styles = get_sub_field( 'image_styles' );
    $bg_borders = get_sub_field( 'bg_borders' );
    $full_bleed_component = new Module(
        [
            'full-bleed',
        ],
        [
            'u-animate-hide',
            $bg_borders['background_color'],
            $bg_borders['border_color']
                ? 'u-border-t ' . $bg_borders['border_color']
                : '',
        ]
    );
    $image_component = new Module(
        [
            'full-bleed__image',
        ],
        [
            $image_styles['image_gradiant'],
            $image_styles['image_size'],
            $image_styles['image_alignment'],
        ]
    );
    if ( ! empty( $image ) ) :
        ?>
        <section
            data-module="FullBleedImage"
            data-animation="fade-in"
            data-styles="<?php echo esc_attr( $full_bleed_component->styles() ); ?>"
            class="<?php echo esc_attr( $full_bleed_component->class_names() ); ?>">
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
                )
            );
            ?>
        </section>
        <?php
    endif;
endif;
