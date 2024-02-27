<?php
/**
 * Music
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() == 'music' ) :
    $spacing = get_sub_field( 'spacing' );
    $bg_borders = get_sub_field( 'bg_borders' );
    $content_styles = get_sub_field( 'content_styles' );
    $btn_styles = get_sub_field( 'btn_styles' );
    $selection = get_sub_field( 'selection' );
    $music_component = new Module(
        [
            'music',
        ],
        [
            'u-load-hide',
            $spacing['top'],
            $spacing['bottom'],
            $bg_borders['background_color'],
            $bg_borders['border_color']
                ? 'u-border-t ' . $bg_borders['border_color']
                : '',
            $content_styles['color'],
            $content_styles['link_color'],
            $content_styles['link_hover_color'],
            $content_styles['link_background_hover_color'],
            $btn_styles['color'],
            $btn_styles['border_color'],
            $btn_styles['background_color'],
            $btn_styles['hover_color'],
            $btn_styles['border_hover_color'],
            $btn_styles['background_hover_color'],
            $selection['color'],
            $selection['background_color'],
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
            <div class="l-row__col is-med-2-third is-centered">
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
