<?php

/**
 * Image with content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-image-with-content-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-image-with-content';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$title   = get_field( 'title' );
$content = get_field( 'content' );
$image   = get_field( 'image' );
$link    = get_field( 'button' );
$is_alt  = get_field( 'alt' );

if ( $link ) {
    $link_url    = $link['url'];
    $link_title  = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}

if ( ! empty( $image ) ) {
    $image_url    = wp_get_attachment_image_url( $image, 'full' );
    $image_style = "style='background-image: url({$image_url})'";
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

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?> bg-primary">
    <div class="container c-py-10 c-py-md-7">
        <div class="row">

            <?php if ( ! empty( $image_style ) ) : ?>

            <div class="col-md-6 c-p-0 c-p-md-3">
                <div class="acf-block-image-with-content__col-primary position-relative">
                    <figure class="h-100 w-100 background-cover position-absolute"<?= $image_style; ?>></figure>
                </div>
            </div>

            <?php endif; ?>

            <div class="col-md-4 d-flex flex-column justify-content-center c-ml-md-7">

                <?php if ( ! empty( $title ) ) : ?>

                <h2 class="acf-block-image-with-content__heading fw-bold font-size-48 text-white c-mt-8 c-mt-md-0">

                    <?= $title; ?>

                </h2>
                <i class="line c-mt-3 d-none d-md-block"></i>

                <?php
                endif;

                if ( ! empty( $content ) ) :
                ?>

                <div class="acf-block-image-with-content__content font-size-14 text-white c-py-4">

                    <?= $content; ?>

                </div>

                <?php
                endif;

                if ( ! empty( $link_title ) ) :
                ?>

                <a class="crunch-button crunch-button__full-background crunch-button__full-background--secondary-color text-black crunch-button__full-background--medium text-decoration-none font-family-primary font-size-13" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">

                    <?= esc_html( $link_title ); ?>

                </a>

                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<?php
/**
 * End Custom Block
 */
do_action('container_end');
?>
