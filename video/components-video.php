<?php
/**
 * Video
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'video' ) :
    $video_attributes = get_sub_field( 'video_attributes' );
    $content_editor   = get_sub_field( 'content_editor' );
    $width            = get_sub_field( 'width' );
    $spacing          = get_sub_field( 'spacing' );
    $full_width       = get_sub_field( 'full_width' );

    if ( ! empty( $content_editor ) ) :
        $section = new Module(
            [],
            [
                $spacing['top'] ?? '',
                $spacing['bottom'] ?? '',
            ]
        );
        $row     = new Module(
            [],
            [
                'u-load-hide',
                'l-row',
                $video_attributes['full_width'] ? 'full-width' : '',
            ],
            [
                'opacity: 0;',
            ]
        );
        $video   = new Module(
            [],
            [
                $video_attributes['height'] ? $video_attributes['height'] : 'u-ratio-16x9',
            ]
        );
        ?>
        <section class="<?php echo esc_attr( $section->class_names() ); ?>">
            <div
                style="<?php echo esc_attr( $row->inline_styles() ); ?>"
                data-module="Video"
                data-animation="fade-in"
                data-duration="400"
                class="<?php echo esc_attr( $row->class_names() ); ?>"
            >
                <div class="l-row__col">
                    <?php
                    get_template_part(
                        'components/iframe',
                        null,
                        array(
                            'element'            => esc_attr( $content_editor ),
                            'styles'             => esc_attr( $video->styles() ),
                            'class_names'        => esc_attr( $video->class_names() ),
                            'animation_duration' => 400,
                        )
                    );
                    ?>
                </div>
            </div>
        </section>
        <?php
    endif;
endif;
