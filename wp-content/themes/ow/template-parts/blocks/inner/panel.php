<?php
/**
 * Panel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-panel-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-panel';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$type = get_field( 'type' );
$main_color = get_field( 'main_color' );
$panel = get_field( 'panel' );

if($type == 'outline') {
    $additional_class .= ' border border-'.$main_color;
} else {
    $additional_class .= ' bg-'.$main_color;
}
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name).$additional_class; ?> rounded c-p-4 c-mt-4 entry-content">
    <?= $panel; ?>
</div>
