<?php
/**
 * Header CTA
 *
 * @package Tetloose-Theme
 */

$header_cta = get_field( 'header_cta', 'option' );
$cta_btn_styles = get_field( 'cta_btn_styles', 'option' );

if ( have_rows( 'header_cta', 'option' ) ) :
    $cta_component = new Module(
        [
            'cta',
        ],
        [
            $cta_btn_styles['color'],
            $cta_btn_styles['border_color'],
            $cta_btn_styles['background_color'],
            $cta_btn_styles['hover_color'],
            $cta_btn_styles['border_hover_color'],
            $cta_btn_styles['background_hover_color'],
        ]
    );
    $link_component = new Module(
        [
            'cta__link',
        ],
        [
            'u-btn',
        ]
    );
    ?>
    <div
        data-styles="<?php echo esc_attr( $cta_component->styles() ); ?>"
        class="<?php echo esc_attr( $cta_component->class_names() ); ?>">
        <?php
        while ( have_rows( 'header_cta', 'option' ) ) :
            the_row();
            if ( ! empty( get_sub_field( 'link' ) ) ) :
                get_template_part(
                    'components/partials-link',
                    null,
                    array(
                        'link' => get_sub_field( 'link' ),
                        'styles' => esc_attr( $link_component->styles() ),
                        'class_names' => esc_attr( $link_component->class_names() ),
                    )
                );
            endif;
        endwhile;
        ?>
    </div>
    <?php
endif;
