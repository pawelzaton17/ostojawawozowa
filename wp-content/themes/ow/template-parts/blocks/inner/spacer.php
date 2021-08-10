<?php
/**
 * Spacer Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-spacer-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Load values and assing defaults.
$spacer = get_field( 'spacer' );
$spacer_visibility = get_field( 'spacer_visibility' );
$custom_classes_enable = get_field( 'custom_classes_enable' );
$custom_classes = get_field( 'custom_classes' );

if($spacer_visibility == 'all-breakpoints') {
    $class_name = 'c-pt-'.$spacer;
} elseif($spacer_visibility == 'xs') {
    $class_name = 'c-pt-'.$spacer.' c-pt-sm-0';
} elseif($spacer_visibility == 'sm-xl') {
    $class_name = 'c-pt-sm-'.$spacer;
} elseif($spacer_visibility == 'md-xl') {
    $class_name = 'c-pt-md-'.$spacer;
} elseif($spacer_visibility == 'lg-xl') {
    $class_name = 'c-pt-lg-'.$spacer;
} elseif($spacer_visibility == 'xl') {
    $class_name = 'c-pt-xl-'.$spacer;
} elseif ($custom_classes_enable) {
    $class_name = $custom_classes;
}
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name); ?>"></div>
