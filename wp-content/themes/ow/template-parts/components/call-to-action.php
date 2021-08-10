<?php

/**
 * Call to Action Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Create class attribute allowing for custom "className" values.
$class_name = 'acf-call-to-action';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}


// Load values and assing defaults.
$title = get_field('title');
$background_color = get_field('background_color');
$button = get_field('button');

$main_tag = $title ? 'section' : 'div';
?>

<<?= $main_tag; ?> class="<?= $class_name ?> <?= $background_color ? 'bg-'.$background_color : 'bg-gray'; ?>" data-anim="fade-in">

    <div class="container position-relative">
        <div class="d-flex justify-content-center align-items-center flex-column flex-md-row c-py-9 c-px-5">

            <?php if($title): ?>

                <h2 class="font-size-24 font-weight-bold c-mx-md-5"><?= $title; ?></h2>

            <?php endif; ?>

            <?php if($button): ?>

                <a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ? $button['target'] : '_self'); ?>" class="crunch-button crunch-button__outline crunch-button__outline--primary-color crunch-button__outline--large c-mt-8 c-mt-md-0 c-mx-md-5"><?= $button['title']; ?></a>

            <?php endif; ?>

        </div>
    </div>
</<?= $main_tag; ?>>

