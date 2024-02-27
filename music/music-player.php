<?php
/**
 * Music Player
 *
 * @package Tetloose-Theme
 **/

$iframe = get_sub_field( 'iframe' );

if ( ! empty( $iframe ) ) :
    ?>
    <iframe
        data-styles="music__player"
        src="<?php echo esc_attr( $iframe ); ?>"
        width="100%"
        height="352"
        frameborder="0"
        allowfullscreen=""
        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
    <?php
endif;
