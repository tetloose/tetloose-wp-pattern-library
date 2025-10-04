<?php
/**
 * Logos
 * ACF Flexible Content Logos.
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'logos' ) :
    $spacing             = get_sub_field( 'spacing' );
    $carousel_attributes = get_sub_field( 'carousel_attributes' );
    $section             = new Module(
        [],
        [
            $spacing['top'] ?? '',
            $spacing['bottom'] ?? '',
        ]
    );
    $component           = new Module(
        [
            'logos',
        ],
        [
            'u-load-hide',
            'l-row',
            $carousel_attributes['full_width'] ? 'full-width' : '',
        ],
        [
            'opacity: 0;',
            'position: relative',
            'overflow: hidden',
        ],
    );
    if ( have_rows( 'logos' ) ) :
        ?>
        <section class="<?php echo esc_attr( $section->class_names() ); ?>">
            <div
                style="<?php echo esc_attr( $component->inline_styles() ); ?>"
                data-module="Logos"
                data-animation="fade-in"
                data-duration="400"
                data-auto-height="<?php echo esc_attr( $carousel_attributes['auto_height'] ? 'true' : 'false' ); ?>"
                data-loop="<?php echo esc_attr( $carousel_attributes['loop'] ? 'true' : 'false' ); ?>"
                data-slides-per-view-desktop="<?php echo esc_attr( $carousel_attributes['slides_per_view_desktop'] ?? '4' ); ?>"
                data-slides-per-view-mobile="<?php echo esc_attr( $carousel_attributes['slides_per_view_mobile'] ?? '2' ); ?>"
                data-rows-desktop="<?php echo esc_attr( $carousel_attributes['rows_desktop'] ?? '1' ); ?>"
                data-rows-mobile="<?php echo esc_attr( $carousel_attributes['rows_mobile'] ?? '1' ); ?>"
                data-styles="<?php echo esc_attr( $component->styles() ); ?>"
                class="<?php echo esc_attr( $component->class_names() ); ?>"
            >
                <div
                    data-styles="logos__nav"
                    class="l-row__col"
                >
                    <div
                        data-styles="logos__carousel"
                        class="js-slider"
                    >
                        <div class="swiper-wrapper">
                            <?php get_template_part( '/components/logos', 'slides' ); ?>
                        </div>
                    </div>
                    <button
                        data-styles="logos__trigger is-left"
                        class="js-sliderPrev">
                        <i class="u-icon-prev"></i>
                    </button>
                    <button
                        data-styles="logos__trigger is-right"
                        class="js-sliderNext">
                        <i class="u-icon-next"></i>
                    </button>
                </div>
            </div>
        </section>
        <?php
    endif;
endif;
