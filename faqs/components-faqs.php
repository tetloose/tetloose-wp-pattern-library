<?php
/**
 * Faqs
 * ACF Flexible content, pulls posts from FAQ post type.
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'faqs' ) :
    $_posts  = get_sub_field( 'faq_posts' );
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
            'faqs',
        ],
        [
            'u-load-hide',
            'l-row',
        ],
        [
            'opacity: 0;',
        ]
    );
    if ( ! empty( $_posts ) ) :
        ?>
        <section class="<?php echo esc_attr( $section->class_names() ); ?>">
            <div
                style="<?php echo esc_attr( $row->inline_styles() ); ?>"
                data-module="Faqs"
                data-animation="fade-in"
                data-duration="400"
                data-styles="<?php echo esc_attr( $row->styles() ); ?>"
                class="<?php echo esc_attr( $row->class_names() ); ?>"
            >
                <div class="l-row__col">
                    <?php
                    // phpcs:disable
                    $count = 0;
                    foreach ( $_posts as $post ) :
                        setup_postdata( $post );

                        get_template_part(
                            '/components/faqs', 'item',
                            array(
                                'count' => $count,
                            )
                        );
                        $count ++;
                    endforeach;
                    // phpcs:enable
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>
        <?php
    endif;
endif;
