<?php
/**
 * Add Posts
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() == 'add_posts' ) :
    $_posts = get_sub_field( 'posts' );
    $_title = get_sub_field( 'title' );
    $spacing = get_sub_field( 'spacing' );
    $bg_borders = get_sub_field( 'bg_borders' );
    $pagination_spacing = get_sub_field( 'pagination_spacing' );
    $pagination_bg_borders = get_sub_field( 'pagination_bg_borders' );
    $pagination_content_styles = get_sub_field( 'pagination_content_styles' );
    $pagination_selection = get_sub_field( 'pagination_selection' );
    $posts_component = new Module(
        [],
        [
            'u-animate-hide',
            $bg_borders['background_color'],
            $bg_borders['border_color']
                ? 'u-border-t ' . $bg_borders['border_color']
                : '',
            $spacing['top'],
            $spacing['bottom'],
            'l-row',
            'no-gutter',
            'is-fullwidth',
        ]
    );
    $excerpt_component = new Module(
        [
            is_archive()
                ? 'is-archive'
                : 'is-component',
        ],
        [
            'l-row__col',
            is_archive()
                ? 'is-lrg-half'
                : 'is-lrg-1-third',
            'no-gutter',
        ]
    );
    $pagination_component = new Module(
        [
            'pagination',
        ],
        [
            $pagination_spacing['top'],
            $pagination_spacing['bottom'],
            $pagination_bg_borders['background_color'],
            $pagination_bg_borders['border_color']
                ? 'u-border-t ' . $pagination_bg_borders['border_color']
                : '',
            $pagination_content_styles['color'],
            $pagination_content_styles['link_color'],
            $pagination_content_styles['link_hover_color'],
            $pagination_content_styles['link_background_hover_color'],
            $pagination_selection['color'],
            $pagination_selection['background_color'],
        ]
    );
    ?>
    <section
        data-module="AddPosts"
        data-animation="fade-in"
        data-styles="<?php echo esc_attr( $posts_component->styles() ); ?>"
        class="<?php echo esc_attr( $posts_component->class_names() ); ?>">
        <?php
        if ( is_archive() ) :
            while ( have_posts() ) :
                the_post();

                get_template_part(
                    'components/excerpt-component',
                    null,
                    array(
                        'styles' => esc_attr( $excerpt_component->styles() ),
                        'class_names' => esc_attr( $excerpt_component->class_names() ),
                    )
                );
            endwhile;
            pagination(
                array(
                    'title' => $_title ? $_title : 'Pagination',
                    'styles' => esc_attr( $pagination_component->styles() ),
                    'class_names' => esc_attr( $pagination_component->class_names() ),
                )
            );
        elseif ( ! empty( $_posts ) ) :
            // phpcs:disable
            foreach ( $_posts as $post ) :
                setup_postdata( $post );

                get_template_part(
                    'components/excerpt-component',
                    null,
                    array(
                        'styles' => esc_attr( $excerpt_component->styles() ),
                        'class_names' => esc_attr( $excerpt_component->class_names() ),
                    )
                );
            endforeach;
            // phpcs:enable
            wp_reset_postdata();
        endif;
        ?>
    </section>
    <?php
endif;
