<?php
/**
 * Content
 * ACF Flexible Content
 *
 * @package Tetloose-Theme
 **/

if ( get_row_layout() === 'content' ) :
    $row_attributes = get_sub_field( 'row_attributes' );
    $spacing        = get_sub_field( 'spacing' );

    if ( have_rows( 'content_columns' ) ) :
        $section = new Module(
            [],
            [
                $spacing['bottom'] ?? '',
            ]
        );
        $row     = new Module(
            [],
            [
                'u-load-hide',
                'l-row',
                $row_attributes['full_width'] ? 'full-width' : '',
                $row_attributes['vertical'] ?? '',
                $row_attributes['horizontal'] ?? '',
                $row_attributes['direction'] ?? '',
            ],
            [
                'opacity: 0;',
            ]
        );
        ?>
        <section class="<?php echo esc_attr( $section->class_names() ); ?>">
            <div
                style="<?php echo esc_attr( $row->inline_styles() ); ?>"
                data-module="Content"
                data-animation="fade-in"
                data-duration="400"
                data-styles="<?php echo esc_attr( $row->styles() ); ?>"
                class="<?php echo esc_attr( $row->class_names() ); ?>"
            >
                <?php
                while ( have_rows( 'content_columns' ) ) :
                    the_row();
                    $column_attributes = get_sub_field( 'column_attributes' );
                    $content_editor    = get_sub_field( 'content_editor' );

                    if ( ! empty( $content_editor ) ) :
                        $col = new Module(
                            [],
                            [
                                'l-row__col',
                                $spacing['top'] ?? '',
                                $column_attributes['width'] ? 'med-width-' . $column_attributes['width'] : '',
                            ]
                        );
                        ?>
                        <div class="<?php echo esc_attr( $col->class_names() ); ?>">
                            <?php
                            get_template_part(
                                'components/partials-content',
                                null,
                                array(
                                    'styles'      => '',
                                    'class_names' => '',
                                    'content'     => $content_editor,
                                )
                            );
                            ?>
                        </div>
                        <?php
                    endif;
                endwhile;
                ?>
            </div>
        </section>
        <?php
    endif;
endif;
