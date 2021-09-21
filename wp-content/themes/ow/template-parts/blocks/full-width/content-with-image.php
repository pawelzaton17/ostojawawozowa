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
$link     = get_field( 'button' );
$is_alt   = get_field( 'alt' );
$style    = '';

if ( $is_alt )
    $mobile_title = ! empty( get_field( 'mobile_title' ) ) ? get_field( 'mobile_title' ) : null;
if ( $link ) {
    $link_url    = $link['url'];
    $link_title  = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}
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

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?> position-relative c-my-10" data-anim="fade-in">
    <div class="container">
        <div class="row">
            <div class="col-md-6 c-px-md-7 c-px-lg-9 c-px-xl-6 c-py-md-5 d-md-flex flex-md-column justify-content-md-center">

                <?php
                if ( $is_alt ) :
                    if ( ! empty( $mobile_title ) ) :
                ?>

                    <h2 class="font-size-55 font-weight-bold text-center d-md-none">

                        <?= $mobile_title; ?>

                    </h2>

                    <?php endif; ?>

                <div class="d-none d-md-block">

                <?php endif; ?>

                <div class="col-12 d-flex justify-content-center justify-content-md-start c-py-8 c-py-md-2">

                        <?= get_template_part('template-parts/components/section-title', '', [ 'title' => $title, 'center' => false ]);  ?>

                </div>

                    <div class="acf-block-content-with-image__content entry-content c-mt-5 c-mb-8<?= $is_alt ? ' acf-block-content-with-image__content--alt font-size-14 text-dark-gray c-mt-xl-4' : ' c-mt-xl-7'; ?>">

                        <?= $content; ?>

                    </div>

                <?php if ( $is_alt ) : ?>

                </div>

                <?php
                endif;

                if( $link ) :
                ?>

                <div class="c-my-7 c-mt-md-5 c-mb-md-0 d-flex justify-content-center justify-content-md-start">
                    <a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>" <?php if($link_target != '_self') echo 'rel="'.esc_attr('nofollow').'"'; ?> class="crunch-button crunch-button__full-background crunch-button__full-background--secondary-color text-black crunch-button__full-background--medium text-decoration-none font-family-primary">

                        <?= esc_html($link_title); ?>

                    </a>
                </div>

                <?php endif; ?>
            </div>

            <?php if ( ! empty( $image_url ) ) : ?>

            <div class="acf-block-content-with-image__image-col col-md-6 c-p-0">
                <div class="acf-block-content-with-image__image-wrapper h-100">
                    <figure class="h-100 c-mb-0 background-cover w-100 img-fluid lazyload" data-lazy="true" <?= $style; ?>></figure>
                </div>
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
