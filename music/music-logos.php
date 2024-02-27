<?php
/**
 * Music Logos
 *
 * @package Tetloose-Theme
 **/

if ( have_rows( 'logo_repeater' ) ) :
    ?>
    <div data-styles="music__logos">
        <?php
        while ( have_rows( 'logo_repeater' ) ) :
            the_row();
            $_link = get_sub_field( 'link' );
            $image = get_sub_field( 'image' );

            if ( ! empty( $_link ) && ! empty( $image ) ) :
                $link_url = $_link['url'];
                $link_title = $_link['title'];
                $link_target = $_link['target'] ? $_link['target'] : '_self';
                $figure_component = new Module(
                    [
                        'music__logos-image',
                    ],
                    [
                        'is-contain',
                    ]
                );
                ?>
                <a
                    data-styles="music__logos-button"
                    href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>"
                    aria-label="<?php echo esc_html( $link_title ); ?>">
                    <?php
                    get_template_part(
                        'components/figure',
                        null,
                        array(
                            'image' => $image,
                            'styles' => esc_attr( $figure_component->styles() ),
                            'class_names' => esc_attr( $figure_component->class_names() ),
                            'animation_duration' => 400,
                        )
                    );
                    ?>
                </a>
                <?php
            endif;
        endwhile;
        ?>
    </div>
    <?php
endif;
