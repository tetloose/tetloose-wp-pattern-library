<?php
/**
 * Animated Banner
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'animated_banner' ) :
    $row_attributes   = get_sub_field( 'row_attributes' );
    $image_attributes = get_sub_field( 'image_attributes' );
    $section          = new Module(
        [
            'animated-banner',
        ],
        [
            'u-hide-hide',
        ],
        [
            'opacity: 0;',
            'position: relative',
            'overflow: hidden',
        ],
    );
    $row              = new Module(
        [],
        [
            'l-row u-spacing-t-xxlrg u-spacing-b-xxlrg',
            $row_attributes['full_width'] ? 'full-width' : '',
            $row_attributes['vertical'] ?? '',
            $row_attributes['horizontal'] ?? '',
            $row_attributes['direction'] ?? '',
            $image_attributes['height'] ? $image_attributes['height'] : 'u-ratio-16x9',
        ]
    );
    ?>
    <section
        style="<?php echo esc_attr( $section->inline_styles() ); ?>"
        data-module="AnimatedBanner"
        data-animation="fade-in"
        data-duration="400"
        data-styles="<?php echo esc_attr( $section->styles() ); ?>"
        class="<?php echo esc_attr( $section->class_names() ); ?>"
    >
        <div
            data-styles="<?php echo esc_attr( $row->styles() ); ?>"
            class="<?php echo esc_attr( $row->class_names() ); ?>"
        >
            <?php get_template_part( '/components/animated-banner', 'content' ); ?>
        </div>
        <?php
        get_template_part( '/components/animated-banner', 'image' );
        get_template_part( '/components/animated-banner', 'decal' );
        ?>
    </section>
    <?php
endif;
