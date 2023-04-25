<?php
/**
 * Header - favicons
 *
 * @package Tetloose-Theme
 */

$favicon_url = get_template_directory_uri() . '/favicons';
$favicon_version = '1';
$favicon_application_colour = '#ff69b4';

try {
    if ( get_files( '/favicons', [ 'favicon-' ] ) ) {
        $has_favicons = true;
    }
} catch ( Exception $e ) {
    $has_favicons = false;
}

?>
<meta name="apple-mobile-web-app-title" content="<?php echo esc_attr( get_bloginfo() ); ?>">
<meta name="application-name" content="<?php echo esc_attr( get_bloginfo() ); ?>">
<meta name="msapplication-TileColor" content="<?php echo esc_attr( $favicon_application_colour ); ?>">
<meta name="theme-color" content="<?php echo esc_attr( $favicon_application_colour ); ?>">
<?php
if ( ! empty( $has_favicons ) ) :
    ?>
    <meta name="msapplication-TileImage" content="<?php echo esc_url( $favicon_url ); ?>/mstile-150x150.png?v=<?php echo esc_attr( $favicon_version ); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url( $favicon_url ); ?>/android-chrome-192x192.png?v=<?php echo esc_attr( $favicon_version ); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( $favicon_url ); ?>/apple-touch-icon.png?v=<?php echo esc_attr( $favicon_version ); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( $favicon_url ); ?>/favicon-16x16.png?v=<?php echo esc_attr( $favicon_version ); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( $favicon_url ); ?>/favicon-32x32.png?v=<?php echo esc_attr( $favicon_version ); ?>">
    <link rel="shortcut icon" href="<?php echo esc_url( $favicon_url ); ?>/favicon.ico?v=<?php echo esc_attr( $favicon_version ); ?>">
    <link rel="mask-icon" href="<?php echo esc_url( $favicon_url ); ?>/safari-pinned-tab.svg?v=<?php echo esc_attr( $favicon_version ); ?>" color="<?php echo esc_attr( $favicon_application_colour ); ?>">
    <?php
endif;
