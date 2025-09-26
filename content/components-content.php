<?php
/**
 * Content
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'content' ) :
    $spacing                = get_sub_field( 'spacing' );
    $count_content_repeater = count( get_sub_field( 'content_repeater' ) )
        ? count( get_sub_field( 'content_repeater' ) )
        : 1;
    $content_component      = new Module(
        [],
        [
            'u-load-hide',
            $spacing['bottom'] ?? '',
        ]
    );
    $column_component       = new Module(
        [],
        [
            'l-row__col',
            $spacing['top'] ?? '',
            $count_content_repeater === 2
                ? 'lrg-width-6'
                : '',
            $count_content_repeater >= 3
                ? 'lrg-width-4'
                : '',
        ]
    );
    ?>
    <section
        style="opacity: 0"
        data-module="Content"
        data-animation="fade-in"
        data-duration="400"
        class="<?php echo esc_attr( $content_component->class_names() ); ?>">
        <div class="l-row">
            <?php
            if ( have_rows( 'content_repeater' ) ) :
                while ( have_rows( 'content_repeater' ) ) :
                    the_row();
                    $content_editor = get_sub_field( 'content_editor' );
                    ?>
                    <div class="<?php echo esc_attr( $column_component->class_names() ); ?>">
                        <?php
                        if ( ! empty( $content_editor ) ) :
                            get_template_part(
                                'components/partials-content',
                                null,
                                array(
                                    'styles'      => '',
                                    'class_names' => '',
                                    'content'     => $content_editor,
                                )
                            );
                        endif;
                        ?>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </section>
    <?php
endif;
