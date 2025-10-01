<?php
/**
 * Quote
 * ACF flexible content quote slider
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'quote' ) :
    $_posts  = get_sub_field( 'quote_posts' );
    $spacing = get_sub_field( 'spacing' );
    $section = new Module(
        [],
        [
            $spacing['top'] ?? '',
            $spacing['bottom'] ?? '',
        ]
    );
    $row     = new Module(
        [
            'quote',
        ],
        [
            'u-load-hide',
            'l-row',
        ],
        [
            'opacity: 0;',
        ]
    );
    ?>
    <section class="<?php echo esc_attr( $section->class_names() ); ?>">
        <div
            style="<?php echo esc_attr( $row->inline_styles() ); ?>"
            data-module="Quote"
            data-animation="fade-in"
            data-duration="400"
            data-styles="<?php echo esc_attr( $row->styles() ); ?>"
            class="<?php echo esc_attr( $row->class_names() ); ?>"
        >
            <div class="l-row__col">
                <div
                    data-styles="quote__carousel"
                    class="js-quote"
                >
                    <div class="swiper-wrapper">
                        <?php
                        if ( ! empty( $_posts ) ) :
                            // phpcs:disable
                            foreach ( $_posts as $post ) :
                                setup_postdata( $post );

                                get_template_part( '/components/quote', 'slide');
                            endforeach;
                            // phpcs:enable
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
                <div
                    data-styles="quote__actions"
                    class="u-spacing-t-sml"
                >
                    <div
                        data-styles="quote__pagination"
                        class="js-pagination">
                    </div>
                    <div data-styles="quote__actions-group">
                        <button class="u-trigger js-quotePrev">
                            <i class="u-icon-chevron-left"></i>
                        </button>
                        <button class="u-trigger js-quoteNext">
                            <i class="u-icon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
endif;
