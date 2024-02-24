<?php
/**
 * Animated Banner
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() == 'animated_banner' ) :
    $bg_borders = get_sub_field( 'bg_borders' );
    $ratio = get_sub_field( 'ratio' );
    $plane = get_sub_field( 'plane' );
    $clouds = get_sub_field( 'clouds' );
    $buildings = get_sub_field( 'buildings' );
    $aliens = get_sub_field( 'aliens' );
    $ufo_1 = get_sub_field( 'ufo_1' );
    $ufo_2 = get_sub_field( 'ufo_2' );
    $logo = get_sub_field( 'logo' );
    $hero_component = new Module(
        [
            'animated-banner',
        ],
        [
            'u-animate-hide',
            $ratio,
            $bg_borders['background_color'],
            $bg_borders['border_color']
                ? 'u-border-t ' . $bg_borders['border_color']
                : '',
        ]
    );
    ?>
    <section
        style="opacity: 0"
        data-module="AnimatedBanner"
        data-animation="fade-in"
        data-duration="400"
        data-styles="<?php echo esc_attr( $hero_component->styles() ); ?>"
        class="<?php echo esc_attr( $hero_component->class_names() ); ?>">
        <?php
        if ( ! empty( $plane ) ) :
            get_template_part(
                'components/figure',
                null,
                array(
                    'image' => $plane,
                    'styles' => 'animated-banner__plane is-contain',
                    'class_names' => '',
                    'animation_duration' => 400,
                )
            );
        endif;
        if ( ! empty( $clouds ) ) :
            get_template_part(
                'components/figure',
                null,
                array(
                    'image' => $clouds,
                    'styles' => 'animated-banner__clouds is-contain',
                    'class_names' => '',
                    'animation_duration' => 400,
                )
            );
        endif;
        if ( ! empty( $buildings ) ) :
            get_template_part(
                'components/figure',
                null,
                array(
                    'image' => $buildings,
                    'styles' => 'animated-banner__buildings is-contain',
                    'class_names' => '',
                    'animation_duration' => 400,
                )
            );
        endif;
        if ( ! empty( $aliens ) ) :
            get_template_part(
                'components/figure',
                null,
                array(
                    'image' => $aliens,
                    'styles' => 'animated-banner__aliens is-contain',
                    'class_names' => '',
                    'animation_duration' => 400,
                )
            );
        endif;
        if ( ! empty( $ufo_1 ) ) :
            get_template_part(
                'components/figure',
                null,
                array(
                    'image' => $ufo_1,
                    'styles' => 'animated-banner__ufo is-1 is-contain',
                    'class_names' => '',
                    'animation_duration' => 400,
                )
            );
        endif;
        if ( ! empty( $ufo_2 ) ) :
            get_template_part(
                'components/figure',
                null,
                array(
                    'image' => $ufo_2,
                    'styles' => 'animated-banner__ufo is-2 is-contain',
                    'class_names' => '',
                    'animation_duration' => 400,
                )
            );
        endif;
        if ( ! empty( $logo ) ) :
            get_template_part(
                'components/figure',
                null,
                array(
                    'image' => $logo,
                    'styles' => 'animated-banner__logo is-contain',
                    'class_names' => '',
                    'animation_duration' => 400,
                )
            );
        endif;
        ?>
    </section>
    <?php
endif;
