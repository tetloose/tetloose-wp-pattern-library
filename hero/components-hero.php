<?php
/**
 * Hero
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'hero' ) :
    $section_component = new Module(
        [
            'hero',
        ],
        [
            'u-load-hide',
        ]
    );
    ?>
    <section
        style="opacity: 0"
        data-module="Hero"
        data-animation="fade-in"
        data-duration="400"
        data-styles="<?php echo esc_attr( $section_component->styles() ); ?>"
        class="<?php echo esc_attr( $section_component->class_names() ); ?>">
        <?php
        get_template_part( '/components/hero', 'image' );
        get_template_part( '/components/hero', 'content' );
        ?>
    </section>
    <?php
endif;
