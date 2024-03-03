<?php
/**
 * Header Menu
 *
 * @package Tetloose-Theme
 */

$open = get_field( 'header_button_title_open', 'option' );
$closed = get_field( 'header_button_title_closed', 'option' );
$header_navigation = get_field( 'header_navigation', 'option' );
$header_bg_borders = get_field( 'header_bg_borders', 'option' );
$trigger_btn_styles = get_field( 'trigger_btn_styles', 'option' );
$trigger_active_btn = get_field( 'trigger_active_btn', 'option' );
$navigation_bg_borders = get_field( 'navigation_bg_borders', 'option' );
$navigation_content_styles = get_field( 'navigation_content_styles', 'option' );
$navigation_animation_color = get_field( 'navigation_animation_color', 'option' );
$header_bg_borders = get_field( 'header_bg_borders', 'option' );

if ( isset( $header_navigation->ID ) ) :
    $trigger_component = new Module(
        [
            'menu',
        ],
        [
            $trigger_btn_styles['color'],
            $trigger_btn_styles['border_color'],
            $trigger_btn_styles['background_color'],
            $trigger_btn_styles['hover_color'],
            $trigger_btn_styles['border_hover_color'],
            $trigger_btn_styles['background_hover_color'],
            $trigger_active_btn['active_color'],
            $trigger_active_btn['active_hover_color'],
        ],
    );
    $navigation_component = new Module(
        [
            'nav',
            $navigation_animation_color,
        ],
        [
            'u-align-middle',
            'u-align-center',
            $navigation_bg_borders['background_color'],
            $navigation_bg_borders['border_color']
                ? 'u-border-b ' . $header_bg_borders['border_color']
                : '',
        ],
    );
    $navigation_ul_component = new Module(
        [
            'sub-nav',
            'is-navigation-menu',
            $navigation_content_styles['link_hover_color'],
            $navigation_content_styles['link_background_hover_color'],
        ],
        [
            $navigation_content_styles['color'],
            $navigation_content_styles['link_color'],
            $navigation_content_styles['link_hover_color'],
            $navigation_content_styles['link_background_hover_color'],
        ],
    );
    ?>
    <div
        data-closed="<?php echo ! empty( $closed ) ? esc_attr( $closed ) : ''; ?>"
        data-open="<?php echo ! empty( $open ) ? esc_attr( $open ) : ''; ?>"
        data-styles="<?php echo esc_attr( $trigger_component->styles() ); ?>"
        class="<?php echo esc_attr( $trigger_component->class_names() ); ?>">
        <?php
        get_template_part(
            'components/navigation-component',
            null,
            array(
                'tag' => 'nav',
                'id' => $header_navigation->ID,
                'styles' => $navigation_component->styles(),
                'class_names' => $navigation_component->class_names(),
                'ul_styles' => $navigation_ul_component->styles(),
                'ul_class_names' => $navigation_ul_component->class_names(),
                'aria_expanded' => 'false',
                'animation' => 'hide',
            )
        );

        $btn_class = $header_bg_borders['border_color']
            ? 'u-border-b ' . $header_bg_borders['border_color']
            : ''
        ?>
        <button
            aria-expanded="false"
            data-styles="trigger"
            aria-label="<?php echo ! empty( $closed ) ? esc_attr( $closed ) : ''; ?>"
            class="u-btn <?php echo esc_attr( $btn_class ); ?>">
            <span data-styles="trigger__title">
                <?php echo ! empty( $closed ) ? esc_attr( $closed ) : ''; ?>
            </span>
            <span data-styles="trigger__container">
                <span data-styles="trigger__bar"></span>
                <span data-styles="trigger__bar"></span>
                <span data-styles="trigger__bar"></span>
                <span data-styles="trigger__bar"></span>
            </span>
        </button>
    </div>
    <?php
endif;
