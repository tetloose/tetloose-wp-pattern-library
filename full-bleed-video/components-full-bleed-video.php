<?php
/**
 * Full Bleed Video
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'full_bleed_video' ) :
    $ratio          = get_sub_field( 'ratio' );
    $spacing        = get_sub_field( 'spacing' );
    $content_editor = get_sub_field( 'content_editor' );
    $section        = new Module(
        [],
        [
            'u-load-hide',
            $spacing['top'] ?? '',
            $spacing['bottom'] ?? '',
        ]
    );

    $video = new Module(
        [],
        [
            $ratio ?? '',
        ]
    );
    if ( ! empty( $content_editor ) ) :
        ?>
        <section
            style="opacity: 0"
            data-module="FullBleedVideo"
            data-animation="fade-in"
            data-duration="400"
            class="<?php echo esc_attr( $section->class_names() ); ?>"
        >
            <div class="l-row">
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
