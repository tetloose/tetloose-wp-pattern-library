<?php
/**
 * Music
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'music' ) :
    $spacing         = get_sub_field( 'spacing' );
    $music_component = new Module(
        [
            'music',
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
        data-module="Music"
        data-animation="fade-in"
        data-duration="400"
        data-styles="<?php echo esc_attr( $music_component->styles() ); ?>"
        class="<?php echo esc_attr( $music_component->class_names() ); ?>">
        <div
            data-styles="music__row"
            class="l-row">
            <div class="l-row__col">
                <?php
                get_template_part( '/components/music', 'content' );
                get_template_part( '/components/music', 'player' );
                get_template_part( '/components/music', 'logos' );
                ?>
            </div>
        </div>
    </section>
    <?php
endif;
