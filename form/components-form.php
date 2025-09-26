<?php
/**
 * Content
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'form' ) :
    $spacing        = get_sub_field( 'spacing' );
    $form           = get_sub_field( 'form' );
    $form_component = new Module(
        [],
        [
            'u-load-hide',
            $spacing['top'] ?? '',
            $spacing['bottom'] ?? '',
        ]
    );
    if ( ! empty( $form ) ) :
        ?>
        <section
            style="opacity: 0"
            data-module="Content"
            data-animation="fade-in"
            data-duration="400"
            class="<?php echo esc_attr( $form_component->class_names() ); ?>">
            <div class="l-row">
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
