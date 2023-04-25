<?php
/**
 * Menu
 *
 * @package Tetloose-Theme
 */

$header_navigation = get_field( 'header_navigation', 'option' );
$navigation_styles = get_field( 'navigation_styles', 'option' );
$nav_component = new Module(
    [
        'nav',
        $navigation_styles['animation_color'],
    ],
    [
        'u-animate-hide',
        'u-align-middle',
        'u-align-center',
        $navigation_styles['bg_borders']['background_color'],
        $navigation_styles['selection']['color'],
        $navigation_styles['selection']['background_color'],
    ],
);
$sub_nav_component = new Module(
    [
        'sub-nav',
        'is-navigation-menu',
        $navigation_styles['content_styles']['link_hover_color'],
        $navigation_styles['content_styles']['link_background_hover_color'],
    ],
    [
        $navigation_styles['content_styles']['color'],
        $navigation_styles['content_styles']['link_color'],
        $navigation_styles['content_styles']['link_hover_color'],
        $navigation_styles['content_styles']['link_background_hover_color'],
    ],
);
if ( ! empty( $header_navigation ) ) :
    ?>
    <div
        data-module="Menu"
        data-animation="fade-in"
        data-styles="menu"
        <?php if ( ! empty( $header_navigation['menu_title_closed'] ) ) : ?>
            data-closed="<?php echo esc_attr( $header_navigation['menu_title_closed'] ); ?>"
        <?php endif; ?>
        <?php if ( ! empty( $header_navigation['menu_title_open'] ) ) : ?>
            data-open="<?php echo esc_attr( $header_navigation['menu_title_open'] ); ?>"
        <?php endif; ?>>
        <?php
        if ( ! empty( $header_navigation['menu']->ID ) ) :
            ?>
            <nav
                data-styles="<?php echo esc_attr( $nav_component->styles() ); ?>"
                class="<?php echo esc_attr( $nav_component->class_names() ); ?>"
                aria-expanded="false">
                <?php
                get_template_part(
                    'components/navigation-component',
                    null,
                    array(
                        'id' => $header_navigation['menu']->ID,
                        'styles' => $sub_nav_component->styles(),
                        'class_names' => $sub_nav_component->class_names(),
                    )
                );
                ?>
            </nav>
            <?php
        endif;
        ?>
        <button
            aria-expanded="false"
            aria-label="Open navigation"
            data-styles="trigger"
            class="u-btn js-menuTrigger">
            <span class="u-btn__title js-menuTriggerTitle">
                <?php if ( ! empty( $header_navigation['menu_title_closed'] ) ) : ?>
                    <?php echo esc_attr( $header_navigation['menu_title_closed'] ); ?>
                <?php endif; ?>
            </span>
            <span class="u-btn__container">
                <span class="u-btn__bar"></span>
                <span class="u-btn__bar"></span>
                <span class="u-btn__bar"></span>
                <span class="u-btn__bar"></span>
            </span>
        </button>
    </div>
    <?php
endif;
