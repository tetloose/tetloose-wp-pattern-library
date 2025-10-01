<?php
/**
 * Content
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'form' ) :
    $spacing = get_sub_field( 'spacing' );
    $form    = get_sub_field( 'form' );
    if ( ! empty( $form ) ) :
        $section = new Module(
            [],
            [
                $spacing['top'] ?? '',
                $spacing['bottom'] ?? '',
            ]
        );
        $row     = new Module(
            [],
            [
                'u-load-hide',
                'l-row',
            ],
            [
                'opacity: 0;',
            ],
        );
        ?>
        <section class="<?php echo esc_attr( $section->class_names() ); ?>">
            <div
                style="<?php echo esc_attr( $row->inline_styles() ); ?>"
                data-module="Content"
                data-animation="fade-in"
                data-duration="400"
                data-styles="<?php echo esc_attr( $row->styles() ); ?>"
                class="<?php echo esc_attr( $row->class_names() ); ?>"
            >
                <div class="l-row__col">
                    <?php
                        get_template_part(
                            'components/partials-form',
                            null,
                            array(
                                'styles'      => '',
                                'class_names' => '',
                                'form'        => $form,
                            )
                        );
                    ?>
                </div>
            </div>
        </section>
        <?php
    endif;
endif;
