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
$title         = get_field( 'title' );
$content       = get_field( 'content' );
$heading       = get_field( 'heading' );
$image         = get_field( 'image' );
$is_alt        = get_field( 'alt' );
$get_custom_id = get_field( 'all_custom_id' );
$custom_id     = '';

if ( ! empty( $get_custom_id ) ) {
    $custom_id = "id='{$get_custom_id}'";
}

if ( ! empty( $image ) ) {
    $image_url    = wp_get_attachment_image_url( $image, 'full' );
    $figure_style = "style='background-image: url({$image_url})'";
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

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?> c-mb-6" data-anim="fade-in">
    <div <?= $custom_id; ?> class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center c-py-6 c-py-md-2">

                <?= get_template_part('template-parts/components/section-title', '', [ 'title' => $title, 'center' => true ]);  ?>

            </div>
        </div>
        <div class="row c-mt-5 c-mt-md-9">
            <div class="d-flex flex-column justify-content-center<?= $is_alt ? ' col-lg-4' : ' col-lg-5'; ?>">

                <?php if ( ! empty( $heading ) ) : ?>

                <h2 class="acf-block-about__heading font-size-36 fw-bold position-relative c-pb-4<?= $is_alt ? ' acf-block-about__heading--alt' : ' null'; ?>">

                    <?= $heading; ?>

                </h2>
                <i class="line c-mb-6"></i>

                <?php
                endif;

                if ( ! empty( $content ) ) :
                ?>

                <div class="acf-block-about__content font-size-18 c-pr-lg-6 c-mb-8 c-mb-lg-0<?= $is_alt ? ' acf-block-about__content--alt' : ' null'; ?>">

                    <?= $content; ?>

                </div>

                <?php endif; ?>

            </div>

            <?php if ( ! empty( $figure_style ) ) : ?>

            <div class="acf-block-about__col-primary position-relative<?= $is_alt ? ' col-lg-8' : ' col-lg-7'; ?>">
                <figure class="acf-block-about__figure h-100 w-100 background-cover"<?= $figure_style; ?>></figure>
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
