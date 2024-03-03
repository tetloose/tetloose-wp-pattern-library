<?php
/**
 * Header
 *
 * @package Tetloose-Theme
 */

$header_bg_borders = get_field( 'header_bg_borders', 'option' );
$header_selection = get_field( 'header_selection', 'option' );
$header_component = new Module(
    [
        'header',
    ],
    [
        'u-load-hide',
    ]
);
$inside_component = new Module(
    [
        'header__inside',
    ],
    [
        $header_bg_borders['background_color'],
        $header_bg_borders['border_color']
            ? 'u-border-b ' . $header_bg_borders['border_color']
            : '',
        $header_selection['color'],
        $header_selection['background_color'],
    ]
);
if ( ! empty( $header_logo['mobile_width'] ) && ! empty( $header_logo['desktop_width'] ) ) {
    echo '
        <style type="text/css">
            .logo {
                display: block;
                width: 100%;
            }
            @media only screen and (max-width: 767px) {
                .logo {
                    max-width: ' . wp_kses_post( $header_logo['mobile_width'] ) / 16 . 'rem;
                }
            }

            @media only screen and (min-width: 768px) {
                .logo {
                    max-width: ' . wp_kses_post( $header_logo['desktop_width'] ) / 16 . 'rem;
                }
            }
        </style>
    ';
}
?>

<header
    style="opacity: 0"
    data-module="Header"
    data-preload="true"
    data-animation="fade-in"
    data-duration="400"
    data-styles="<?php echo esc_attr( $header_component->styles() ); ?>"
    class="<?php echo esc_attr( $header_component->class_names() ); ?>">
    <div
        data-styles="<?php echo esc_attr( $inside_component->styles() ); ?>"
        class="<?php echo esc_attr( $inside_component->class_names() ); ?>">
        <?php
        get_template_part( '/components/header', 'logo' );
        get_template_part( '/components/header', 'cta' );
        ?>
    </div>
    <?php get_template_part( '/components/header', 'menu' ); ?>
</header>
