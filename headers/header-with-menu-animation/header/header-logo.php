<?php
/**
 * Header
 *
 * @package Tetloose-Theme
 */

$header_logo = get_field( 'header_logo', 'option' );

if ( ! empty( $header_logo['width'] ) ) {
    $vw_context = 1520 * .01 * 1;

    echo '
        <style type="text/css">
            .logo {
                display: block;
                width: 100%;
            }
            @media only screen and (max-width: 767px) {
                .logo {
                    max-width: ' . wp_kses_post( $header_logo['width'] ) / $vw_context * 3 . 'vw;
                }
            }

            @media only screen and (min-width: 768px) {
                .logo {
                    max-width: ' . wp_kses_post( $header_logo['width'] ) / $vw_context * 1 . 'vw;
                }
            }
        </style>
    ';
}

if ( isset( $header_logo['image'] ) ) :
    ?>
    <a
        data-styles="header__logo"
        class="logo"
        href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php
        get_template_part(
            'components/figure',
            null,
            array(
                'image' => $header_logo['image'],
                'styles' => '',
                'class_names' => 'logo',
                'animation_duration' => 400,
            )
        );
        ?>
    </a>
    <?php
endif;
