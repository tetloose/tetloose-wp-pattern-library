<?php
/**
 * Content
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() == 'form' ) :
    $spacing = get_sub_field( 'spacing' );
    $bg_borders = get_sub_field( 'bg_borders' );
    $content_styles = get_sub_field( 'content_styles' );
    $btn_styles = get_sub_field( 'btn_styles' );
    $form_styles = get_sub_field( 'form_styles' );
    $selection = get_sub_field( 'selection' );
    $form = get_sub_field( 'form' );
    $form_component = new Module(
        [],
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
            $form_styles['color'],
            $form_styles['background_color'],
            $form_styles['border_color'],
            $form_styles['hover_color'],
            $form_styles['background_hover_color'],
            $form_styles['border_hover_color'],
            $form_styles['validation_color'],
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
    if ( ! empty( $form ) ) :
        ?>
        <section
            data-module="Content"
            data-animation="fade-in"
            class="<?php echo esc_attr( $form_component->class_names() ); ?>">
            <div class="l-row">
                <div class="l-row__col">
                    <?php
                        get_template_part(
                            'components/partials-form',
                            null,
                            array(
                                'styles' => '',
                                'class_names' => '',
                                'form' => $form,
                            )
                        );
                    ?>
                </div>
            </div>
        </section>
        <?php
    endif;
endif;
