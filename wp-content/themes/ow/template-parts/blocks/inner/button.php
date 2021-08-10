<?php
/**
 * Button Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'crunch-button-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'crunch-button';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

$class_align = (!empty($block['align'])) ? ' align' . $block['align'] : '';

// Load values and assing defaults.
$link = get_field( 'link' );
$type = get_field( 'type' );
$size = get_field( 'size' );
$color = get_field( 'color' );
?>

<?php if( $link ): ?>

    <?php $link_url = $link['url']; ?>
    <?php $link_title = $link['title']; ?>
    <?php $link_target = $link['target'] ? $link['target'] : '_self'; ?>

    <div class="crunch-button-wrapper<?= $class_align; ?>">
        <a href="<?= esc_url($link_url); ?>" id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name).$additional_class . ' ' . esc_attr($class_name). '__' . $type . ' ' . esc_attr($class_name). '__' . $type . '--' . $color . ' ' . esc_attr($class_name). '__' . $type . '--' . $size; ?>" target="<?= esc_attr($link_target); ?>" <?php if($link_target != '_self') echo 'rel="'.esc_attr('nofollow').'"'; ?>><?= $link_title; ?></a>
    </div>

<?php endif; ?>
