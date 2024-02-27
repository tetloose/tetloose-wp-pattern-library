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
            'u-load-hide',
            $bg_borders['background_color'],
            $bg_borders['border_color']
                ? 'u-border-t ' . $bg_borders['border_color']
                : '',
        ]
    );

    $video_partial = new Module(
        [],
        [
            $ratio,
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
                'components/iframe',
                null,
                array(
                    'element' => esc_attr( $content_editor ),
                    'styles' => esc_attr( $video_partial->styles() ),
                    'class_names' => esc_attr( $video_partial->class_names() ),
                    'animation_duration' => 400,
                )
            );
            ?>
        </section>
        <?php
    endif;
endif;
