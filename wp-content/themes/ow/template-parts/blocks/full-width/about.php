<?php

/**
 * About Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-about-' . $block['id'];
if ( ! empty ($block[ 'anchor' ] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-about';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$title   = get_field( 'title' );
$content = get_field( 'content' );
$image   = get_field( 'image' );

if ( ! empty( $image ) ) {
    $image_url = wp_get_attachment_image_url( $image, 'full' );
    $a_style     = "style='background-image: url({$image_url})'";
}
// block preview
if (!empty($block['data']['__is_preview'])) : ?>
<img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg"  alt="block-preview"/>

<?php return;
endif; ?>


<?php
/**
 * Begin Custom Block
 */
do_action('container_start');
?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?> c-mb-6">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center c-py-8 c-py-md-2">

                <?= get_template_part('template-parts/components/section-title', '', [ 'title' => $title, 'center' => false ]);  ?>

            </div>
        </div>
        <div class="row c-mt-5 c-mt-md-9">

            <?php if ( ! empty( $content ) ) : ?>

            <div class="col-12 col-lg-5 d-flex flex-column justify-content-center">
                <div class="font-size-18 c-pr-lg-6 c-mb-8 c-mb-lg-0">

                    <?= $content; ?>

                </div>
            </div>

            <?php
            endif;

            if ( ! empty( $a_style ) ) :
            ?>

            <div class="acf-block-about__col col-12 col-lg-7 position-relative">
                <figure class="acf-block-about__figure h-100 w-100 background-cover" <?= $a_style; ?>></figure>
            </div>
        </div>
    </div>

    <?php endif; ?>

</section>

<?php
/**
 * End Custom Block
 */
do_action('container_end');
?>
