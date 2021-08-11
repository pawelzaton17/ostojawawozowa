<?php

/**
 * Content with image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-content-with-image-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-content-with-image';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$title    = get_field( 'title' );
$content  = get_field( 'content' );
$image_id = get_field( 'image' );
$style    = '';

if ( ! empty( $image_id ) ) {
    $image_url = wp_get_attachment_image_url( $image_id, 'full' );
    $style     = "style='background-image: url( {$image_url} )'";
}

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
<img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg" />

<?php return;
endif; ?>


<?php
/**
 * Begin Custom Block
 */
do_action('container_start');
?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <?php get_template_part('template-parts/components/section-title', '', [ 'title' => $title ]); ?>

                <div>

                    <?= $content; ?>

                </div>
            </div>

            <?php if ( ! empty( $image_url ) ) : ?>

            <div class="col-md-6">
                <figure class="acf-block-content-with-image__image background-cover w-100 img-fluid lazyload" data-lazy="true" <?= $style; ?>></figure>
            </div>

            <?php endif; ?>

        </div>
    </div>
</section>

<?php
/**
 * End Custom Block
 */
do_action('container_end');
?>
