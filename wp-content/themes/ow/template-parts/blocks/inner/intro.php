<?php
/**
 * Intro Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-intro-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-intro';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$intro = get_field( 'intro' );
?>

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name).$additional_class; ?> font-size-24 c-mt-6">
    <div class="entry-content">

        <?= $intro;  ?>

    </div>
</div>
