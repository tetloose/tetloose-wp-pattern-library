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
        [],
        [
            'u-load-hide',
            $bg_borders['background_color'],
            $bg_borders['border_color']
                ? 'u-border-t ' . $bg_borders['border_color']
                : '',
        ]
    );
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
        ?>
        <section
            style="opacity: 0"
            data-module="FullBleedImage"
            data-animation="fade-in"
            data-duration="400"
            data-styles="<?php echo esc_attr( $full_bleed_component->styles() ); ?>"
            class="<?php echo esc_attr( $full_bleed_component->class_names() ); ?>">
            <?php
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
            ?>
        </section>
        <?php
    endif;
endif;
