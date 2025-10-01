<?php
/**
 * Faqs - item
 * ACF Flexible content, pulls posts from FAQ post type.
 *
 * @package Tetloose-Theme
 **/

$faq_index   = isset( $args ) && isset( $args['count'] )
    ? $args['count']
    : 0;
$_title      = get_the_title();
$description = get_field( 'description' );
$_id         = esc_attr( $faq_index ) . create_slug( $_title );
$_content    = $description
    ? typography(
        $description,
        'span',
        '',
        'u-p'
    )
    : null;

if ( $_content ) :
    ?>
    <div
        data-styles="faqs__item"
        class="js-item"
    >
        <button
            type="button"
            data-styles="faqs__trigger"
            data-index="<?php echo esc_attr( $faq_index ); ?>"
            aria-label="question"
            aria-expanded="false"
            aria-controls="<?php echo esc_attr( $_id ); ?>-id"
            class="js-trigger u-h3 u-uppercase"
        >
            <?php echo esc_attr( $_title ); ?>
        </button>
        <div
            id="<?php echo esc_attr( $_id ); ?>-id"
            role="region"
            aria-labelledby="<?php echo esc_attr( $_id ); ?>"
            data-styles="faqs__reveal"
            tabindex="-1"
            class="js-reveal">
            <?php
            get_template_part(
                'components/partials-content',
                null,
                array(
                    'styles'      => 'faqs__content',
                    'class_names' => '',
                    'content'     => '<span class="u-p">' . $_content . '</span>',
                )
            );
            ?>
        </div>
    </div>
    <?php
endif;
