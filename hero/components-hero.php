<?php
/**
 * Hero
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() == 'hero' ) :
    $bg_borders = get_sub_field( 'bg_borders' );
    $selection = get_sub_field( 'selection' );
    $hero_component = new Module(
        [
            'hero',
        ],
        [
            'u-animate-hide',
            $bg_borders['background_color'],
            $bg_borders['border_color']
                ? 'u-border-t ' . $bg_borders['border_color']
                : '',
            $selection['color'],
            $selection['background_color'],
        ]
    );
    ?>
    <section
        style="opacity: 0"
        data-module="Hero"
        data-animation="fade-in"
        data-duration="400"
        data-styles="<?php echo esc_attr( $hero_component->styles() ); ?>"
        class="<?php echo esc_attr( $hero_component->class_names() ); ?>">
        <?php
        get_template_part( '/components/hero', 'image' );
        get_template_part( '/components/hero', 'content' );
        ?>
    </section>
    <?php
endif;
