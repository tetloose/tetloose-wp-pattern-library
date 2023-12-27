<?php
/**
 * Full Bleed Video
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() == 'full_bleed_video' ) :
    $bg_borders = get_sub_field( 'bg_borders' );
    $ratio = get_sub_field( 'ratio' );
    $content_editor = get_sub_field( 'content_editor' );
    $video_component = new Module(
        [],
        [
            'u-animate-hide',
            $bg_borders['background_color'],
            $bg_borders['border_color']
                ? 'u-border-t ' . $bg_borders['border_color']
                : '',
        ]
    );
    if ( ! empty( $content_editor ) ) :
        ?>
        <section
            style="opacity: 0"
            data-module="FullBleedVideo"
            data-animation="fade-in"
            data-duration="400"
            class="<?php echo esc_attr( $video_component->class_names() ); ?>">
            <?php
            get_template_part(
                'components/partials-video',
                null,
                array(
                    'styles' => '',
                    'class_names' => '',
                    'video' => esc_attr( $content_editor ),
                    'ratio' => esc_attr( $ratio ),
                    'animation' => 'fade-in',
                    'animation_duration' => 200,
                )
            );
            ?>
        </section>
        <?php
    endif;
endif;
