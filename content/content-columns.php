<?php
/**
 * Content
 *
 * @package Tetloose-Theme
 **/

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
                $column_attributes['vertical'] ?? '',
                $column_attributes['horizontal'] ?? '',
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
