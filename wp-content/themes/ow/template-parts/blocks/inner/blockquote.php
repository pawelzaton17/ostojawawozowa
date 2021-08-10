<?php
/**
 * Blockquote Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-blockquote-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-blockquote';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$quote = get_field( 'quote' );
$cite = get_field( 'cite' );
?>

<blockquote id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name).$additional_class; ?>">
    <div class="entry-content">
        <?= $quote; ?>
    </div>
    <cite>~ <?= $cite; ?></cite>
</blockquote>
