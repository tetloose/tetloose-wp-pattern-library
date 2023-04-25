<?php
/**
 * Enqueue function
 *
 * @package Tetloose-Theme
 **/

/**
 * Function Pull in scf global styles
 **/
function global_styles() {
    $fonts = get_field( 'fonts', 'option' );
    $colours = get_field( 'colours', 'option' );

    return '
        :root {
            --f-body: ' . wp_kses_post( $fonts['body_font']['font_family'] ) . ';
            --f-body-light: ' . wp_kses_post( $fonts['body_font']['font_weight_light'] ) . ';
            --f-body-regular: ' . wp_kses_post( $fonts['body_font']['font_weight_regular'] ) . ';
            --f-body-medium: ' . wp_kses_post( $fonts['body_font']['font_weight_medium'] ) . ';
            --f-body-bold: ' . wp_kses_post( $fonts['body_font']['font_weight_bold'] ) . ';
            --f-heading: ' . wp_kses_post( $fonts['heading_font']['font_family'] ) . ';
            --f-heading-light: ' . wp_kses_post( $fonts['heading_font']['font_weight_light'] ) . ';
            --f-heading-regular: ' . wp_kses_post( $fonts['heading_font']['font_weight_regular'] ) . ';
            --f-heading-medium: ' . wp_kses_post( $fonts['heading_font']['font_weight_medium'] ) . ';
            --f-heading-bold: ' . wp_kses_post( $fonts['heading_font']['font_weight_bold'] ) . ';
            --light: ' . wp_kses_post( $colours['light'] ) . ';
            --dark: ' . wp_kses_post( $colours['dark'] ) . ';
            --color-1: ' . wp_kses_post( $colours['color1'] ) . ';
            --color-2: ' . wp_kses_post( $colours['color2'] ) . ';
            --color-3: ' . wp_kses_post( $colours['color3'] ) . ';
            --color-4: ' . wp_kses_post( $colours['color4'] ) . ';
        }
    ';
}

// Define vars from env.
define( 'USE_JQUERY', getenv( 'USE_JQUERY' ) );
define( 'JQUERY_VERSION', getenv( 'JQUERY_VERSION' ) );

add_action( 'wp_enqueue_scripts', 'scripts', 2 );
add_action( 'wp_enqueue_scripts', 'styles', 20 );

if ( USE_JQUERY !== 'yes' ) {
    add_action( 'wp_enqueue_scripts', 'remove_jquery', 1 );
} else {
    add_action( 'wp_enqueue_scripts', 'add_jquery', 1 );
}

/**
 * Function remove jquery if env is set to yes
 **/
function add_jquery() {
    if ( JQUERY_VERSION ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', esc_attr( JQUERY_VERSION ), [], 'tetloose', false );
        wp_enqueue_script( 'jquery' );
    }
}

/**
 * Function remove jquery if env is set not set to yes
 **/
function remove_jquery() {
    wp_deregister_script( 'jquery' );
}

/**
 * Function Load scripts
 */
function scripts() {
    $ver = null;
    foreach ( get_files( '/assets/js', [ 'main', 'runtime' ] ) as $file ) {
        wp_enqueue_script(
            $file,
            get_stylesheet_directory_uri() . '/assets/js/' . $file,
            array(),
            $ver,
            true
        );
        wp_enqueue_script( $file );
    }
}

/**
 * Function Load styles
 **/
function styles() {
    $fonts = get_field( 'fonts', 'option' );

    wp_enqueue_style(
        'fonts',
        $fonts['url'],
        '',
        'tetloose',
        false
    );

    $ver = null;
    wp_dequeue_style( 'classic-theme-styles' );
    foreach ( get_files( '/assets/css', [ 'print', 'app' ] ) as $file ) {
        wp_enqueue_style(
            $file,
            get_stylesheet_directory_uri() . '/assets/css/' . $file,
            array(),
            $ver,
            false
        );
    }
}

add_action( 'admin_head', 'tetloose_global_styles' );

/**
 * Admin Head hook,
 * Inline CSS for color scheme,
 * ACF Colour description
 **/
function tetloose_global_styles() {
    echo '
        <style type="text/css">
            ' . wp_kses_post( global_styles() ) . '

            #tcs {
                display: flex;
                flex-wrap: no-wrap;
                width: 100%;
                height: 20px;
            }

            #tcs span {
                width: 16.66666667%;
                height: 20px;
                font-size: 12px;
                text-align: center;
                color: #fff;
                text-shadow: 0.05em 0 #000, 0 0.05em #000, -0.05em 0 #000, 0 -0.05em #000, -0.05em -0.05em #000, -0.05em 0.05em #000, 0.05em -0.05em #000, 0.05em 0.05em #000;
            }

            #tcs span::nth-child(1) {
                background-color: green;
            }

            #tcs .a {
                background-color: var(--light);
            }

            #tcs .b {
                background-color: var(--dark);
            }

            #tcs .c {
                background-color: var(--color-1);
            }

            #tcs .d {
                background-color: var(--color-2);
            }

            #tcs .e {
                background-color: var(--color-3);
            }

            #tcs .f {
                background-color: var(--color-4);
            }
        </style>';
}

add_action( 'wp_head', 'tetloose_global_admin_styles' );

/**
 * Head hook,
 * Inline CSS for global styles,
 **/
function tetloose_global_admin_styles() {
    $header_logo = get_field( 'header_logo', 'option' );

    echo '
        <style type="text/css">
            ' . wp_kses_post( global_styles() ) . '

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
