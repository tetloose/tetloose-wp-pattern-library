<?php
/**
 * Animated Banner
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'animated_banner' ) :
    $alignment      = get_sub_field( 'alignment' );
    $text_alignment = get_sub_field( 'text_alignment' );

    $post_title        = get_sub_field( 'post_title' );
    $use_post_title    = $post_title['use_post_title'];
    $_title            = bold_last_string(
        ! $use_post_title
            ? $post_title['title'] ?? get_the_title()
            : get_the_title()
    );
    $sub_title         = get_sub_field( 'sub_title' );
    $decal             = get_sub_field( 'decal_image' );
    $background        = get_sub_field( 'background_image' );
    $section_component = new Module(
        [
            'animated-banner',
        ],
        [
            'u-load-hide',
        ],
        [
            'opacity: 0;',
            ! empty( $background ) && isset( $background['url'] )
                ? 'background-image: url(' . $background['url'] . ');'
                : '',
        ]
    );
    $row_component     = new Module(
        [
            'animated-banner__row',
        ],
        [
            'l-row',
            $alignment['height'] ?? '',
            $alignment['vertical'] ?? '',
            $alignment['horizontal'] ?? '',
            $text_alignment ?? '',
        ]
    );
    $content           = '<h1 data-styles="animated-banner__title"><span data-styles="animated-banner__title-inside">' . $_title . '</span></h1>';
    $content          .= $sub_title
        ? '<p data-styles="animated-banner__title"><span data-styles="animated-banner__title-inside" class="u-h3">' . $sub_title . '</span></p>'
        : '';
    ?>
    <section
        style="<?php echo esc_attr( $section_component->inline_styles() ); ?>"
        data-module="AnimatedBanner"
        data-animation="fade-in"
        data-duration="400"
        data-styles="<?php echo esc_attr( $section_component->styles() ); ?>"
        class="<?php echo esc_attr( $section_component->class_names() ); ?>">
        <?php
        if ( ! empty( $content ) ) :
            ?>
            <div
                data-styles="<?php echo esc_attr( $row_component->styles() ); ?>"
                class="<?php echo esc_attr( $row_component->class_names() ); ?>"
            >
                <div class="l-row__col width-auto">
                    <?php
                    get_template_part(
                        'components/partials-content',
                        null,
                        array(
                            'styles'      => '',
                            'class_names' => '',
                            'content'     => $content,
                        )
                    );
                    ?>
                </div>
            </div>
            <?php
        endif;
        if ( ! empty( $decal ) ) :
            get_template_part(
                'components/figure',
                null,
                array(
                    'image'              => $decal,
                    'styles'             => 'animated-banner__decal',
                    'class_names'        => 'is-contain is-right-bottom',
                    'animation_duration' => 400,
                )
            );
        endif;
        ?>
    </section>
    <?php
endif;
