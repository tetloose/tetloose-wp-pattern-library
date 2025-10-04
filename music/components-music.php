<?php
/**
 * Music
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'music' ) :
    $iframe_attributes = get_sub_field( 'iframe_attributes' );
    $spacing           = get_sub_field( 'spacing' );
    $section           = new Module(
        [],
        [
            $spacing['top'] ?? '',
            $spacing['bottom'] ?? '',
        ]
    );
    $row               = new Module(
        [
            'music',
        ],
        [
            'u-load-hide',
            'l-row',
            $iframe_attributes['full_width'] ? 'full-width' : '',
        ],
        [
            'opacity: 0;',
        ]
    );
    ?>
    <section class="<?php echo esc_attr( $section->class_names() ); ?>">
        <div
            styles="<?php echo esc_attr( $row->inline_styles() ); ?>"
            data-module="Music"
            data-animation="fade-in"
            data-duration="400"
            data-styles="<?php echo esc_attr( $row->styles() ); ?>"
            class="<?php echo esc_attr( $row->class_names() ); ?>"
        >
            <div class="l-row__col">
                <?php
                get_template_part( '/components/music', 'player' );
                ?>
            </div>
        </div>
    </section>
    <?php
endif;
