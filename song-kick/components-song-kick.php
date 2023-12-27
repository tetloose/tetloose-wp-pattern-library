<?php
/**
 * Song Kick
 * Connect to Song Kick API Pull latest events
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() == 'song_kick' ) :
    $artist_id = get_sub_field( 'artist_id' );
    $city = get_sub_field( 'city' );
    $venue = get_sub_field( 'venue' );
    $button_text = get_sub_field( 'button_text' );
    $content_editor = get_sub_field( 'content_editor' );
    $spacing = get_sub_field( 'spacing' );
    $bg_borders = get_sub_field( 'bg_borders' );
    $content_styles = get_sub_field( 'content_styles' );
    $btn_styles = get_sub_field( 'btn_styles' );
    $artist_styles_border_color = get_sub_field( 'artist_styles_border_color' );
    $selection = get_sub_field( 'selection' );
    $song_kick_component = new Module(
        [
            'song-kick',
        ],
        [
            'u-animate-hide',
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
    $artist_component = new Module(
        [],
        [
            $artist_styles_border_color
                ? 'u-border ' . $artist_styles_border_color
                : '',
        ]
    );
    if ( ! empty( $artist_id ) && ! empty( $content_editor ) ) :
        ?>
        <section
            style="opacity: 0"
            data-module="SongKick"
            data-animation="fade-in"
            data-duration="400"
            data-styles="<?php echo esc_attr( $song_kick_component->styles() ); ?>"
            class="<?php echo esc_attr( $song_kick_component->class_names() ); ?>"
            data-artist-id="<?php echo esc_sql( $artist_id ); ?>"
            data-fallback="<?php echo esc_attr( $content_editor ); ?>"
            data-artist-classnames="<?php echo esc_attr( $artist_component->class_names() ); ?>"
            data-city="<?php echo esc_attr( $city ); ?>"
            data-venue="<?php echo esc_attr( $venue ); ?>"
            data-button-text="<?php echo esc_attr( $button_text ); ?>">
        </section>
        <?php
    endif;
endif;
