<?php
/**
 * Social
 *
 * @package Tetloose-Theme
 */

if ( have_rows( 'social', 'option' ) && ! empty( $args ) ) :
    $social_component = new Module(
        [
            'social',
            $args['styles'],
        ],
        [
            'u-animate-hide',
            $args['class_names'],
        ]
    );
    ?>
    <div
        data-module="Social"
        data-styles="<?php echo esc_attr( $social_component->styles() ); ?>"
        class="<?php echo esc_attr( $social_component->class_names() ); ?>">
        <?php
        while ( have_rows( 'social', 'option' ) ) :
            the_row();

            get_template_part(
                'components/partials-link',
                null,
                array(
                    'link' => get_sub_field( 'link' ),
                    'styles' => 'social__link',
                    'class_names' => get_sub_field( 'icon' ),
                )
            );
         endwhile;
        ?>
    </div>
    <?php
endif; ?>
