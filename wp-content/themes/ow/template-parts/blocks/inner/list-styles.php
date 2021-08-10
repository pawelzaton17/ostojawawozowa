<?php
/**
 * List Styles Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-list-styles-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-list-styles';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$type = get_field( 'type' );
$color = get_field( 'color' );
$list_styles = 'list_styles';
?>

<?php if ( have_rows( $list_styles ) ) : ?>

    <div id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name).$additional_class; ?>">
        <div class="list-styles list-styles__<?= $type; ?> list-styles__<?= $type; ?>--<?= $color; ?>">
            <ul>

                <?php while ( have_rows( $list_styles ) ) : the_row(); ?>

                    <li><?php the_sub_field( 'list_item' ); ?></li>

                <?php endwhile; ?>

            </ul>
        </div>
    </div>

<?php endif; ?>
