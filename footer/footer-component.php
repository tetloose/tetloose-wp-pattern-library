<?php
/**
 * Footer
 *
 * @package Tetloose-Theme
 */

$footer = get_field( 'footer', 'option' );
$footer_styles = get_field( 'footer_styles', 'option' );
$footer_component = new Module(
    [
        'footer',
    ],
    [
        'u-animate-hide',
        $footer_styles['bg_borders']['background_color'],
        $footer_styles['bg_borders']['border_color']
            ? 'u-border-t ' . $footer_styles['bg_borders']['border_color']
            : '',
        $footer_styles['content_styles']['color'],
        $footer_styles['content_styles']['link_color'],
        $footer_styles['content_styles']['link_hover_color'],
        $footer_styles['content_styles']['link_background_hover_color'],
        $footer_styles['selection']['color'],
        $footer_styles['selection']['background_color'],
    ]
);
$sub_nav_component = new Module(
    [
        'u-animate-hide',
        'sub-nav',
        'is-inline',
        $footer_styles['content_styles']['link_hover_color'],
        $footer_styles['content_styles']['link_background_hover_color'],
    ],
);
?>
<footer
    data-module="Footer"
    data-animation="fade-in"
    data-styles="<?php echo esc_attr( $footer_component->styles() ); ?>"
    class="<?php echo esc_attr( $footer_component->class_names() ); ?>">
    <?php
    get_template_part(
        'components/social-component',
        null,
        array(
            'styles' => 'footer__social',
            'class_names' => '',
        )
    );
    ?>
    <nav data-styles="footer__nav">
        <?php
        if ( ! empty( $footer['navigation']->ID ) ) :
            get_template_part(
                'components/navigation-component',
                null,
                array(
                    'id' => $footer['navigation']->ID,
                    'styles' => $sub_nav_component->styles(),
                    'class_names' => '',
                )
            );
        endif
        ?>
    </nav>
    <?php
    if ( ! empty( $footer['copyright'] ) ) :
        get_template_part(
            'components/partials-content',
            null,
            array(
                'styles' => 'footer__content',
                'class_names' => '',
                'content' => '<p><small>' . wp_kses_post( '<sup>&copy;</sup> ' . get_bloginfo() . ' ' . esc_attr( gmdate( 'Y' ) ) . ' ' . $footer['copyright'] ) . '</small></p>',
            )
        );
    endif;
    ?>
</footer>
