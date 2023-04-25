<?php
/**
 *  Images
 *
 * @package Tetloose-Theme
 **/

/**
 *  Add SVG Mine support for uploads.
 **/
add_filter(
    'upload_mimes',
    function ( $mimes ) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    },
    20
);

/**
 *  Add Image sizes.
 */
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1080, 1080, true );
    add_image_size( 'xxlrg', 1520, 9999 );
    add_image_size( 'xlrg', 1280, 9999 );
    add_image_size( 'lrg', 1024, 9999 );
    add_image_size( 'med', 768, 9999 );
    add_image_size( 'sml', 320, 9999 );
}

/**
 *  Register taxon for attachement.
 */
add_action(
    'init',
    function ( $add_gallery_tags ) {
        $labels = array(
            'name'              => 'Gallery Tags',
            'singular_name'     => 'Gallery Tags',
            'search_items'      => 'Search Gallery Tags',
            'all_items'         => 'All Gallery Tags',
            'parent_item'       => 'Parent Gallery Tag',
            'parent_item_colon' => 'Parent Gallery Tag:',
            'edit_item'         => 'Edit Gallery Tag',
            'update_item'       => 'Update Gallery Tag',
            'add_new_item'      => 'Add New Gallery Tag',
            'new_item_name'     => 'New Gallery Tag Name',
            'menu_name'         => 'Gallery Tags',
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'query_var' => 'true',
            'rewrite' => 'true',
            'show_admin_column' => 'true',
        );

        register_taxonomy( 'gallery_tags', 'attachment', $args );

        return $add_gallery_tags;
    }
);

/**
 *  Gallery layout
 */
add_filter(
    'post_gallery',
    function ( $string, $attr ) {
        $posts_order_string = $attr['ids'];
        $posts_order = explode( ',', $posts_order_string );

        if ( ! empty( $attr['columns'] ) ) {
            $gallery_columns = (int) $attr['columns'];

            if ( $gallery_columns > 6 ) {
                $gallery_columns = 6;
            }
        } else {
            $gallery_columns = 3;
        }

        $output = '<div data-styles="gallery is-' . esc_attr( $gallery_columns ) . '">';
        $posts = get_posts(
            array(
                'include' => $posts_order,
                'post_type' => 'attachment',
                'orderby' => 'post__in',
            )
        );

        if ( $attr['orderby'] == 'rand' ) {
            shuffle( $posts );
        }

        foreach ( $posts as $image ) {
            $output .= '
                <figure
                    class="u-figure js-figure u-skeleton-figure"
                    data-styles="gallery__item"
                    data-animation="fade-in"
                    data-duration="200"
                    data-alt="' . esc_attr( get_the_title( $image->ID ) ) . '"
                    data-src="' . esc_attr( $image->image['sizes']['sml'] ) . '"
                    data-srcset="
                        ' . esc_attr( $image->image['sizes']['xxlrg'] ) . ' 1520w,
                        ' . esc_attr( $image->image['sizes']['xlrg'] ) . ' 1280w,
                        ' . esc_attr( $image->image['sizes']['lrg'] ) . ' 1024w,
                        ' . esc_attr( $image->image['sizes']['med'] ) . ' 768w,
                        ' . esc_attr( $image->image['sizes']['sml'] ) . ' 320w"
                ></figure>
            ';
        }
        $output .= '</div>';
        return $output;
    },
    10,
    2
);
