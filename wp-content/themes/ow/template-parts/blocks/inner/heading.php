<?php
/**
 * Heading Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-heading-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Load values and assing defaults.
$text = get_field( 'text' );
$tag = get_field( 'tag' );
$style = get_field( 'style' );
$color = get_field( 'color' );
?>

<<?= $tag; ?> id="<?= esc_attr($id); ?>" class="<?= $style; ?> heading" style="color: <?= $color; ?>"><?= $text; ?></<?= $tag; ?>>
