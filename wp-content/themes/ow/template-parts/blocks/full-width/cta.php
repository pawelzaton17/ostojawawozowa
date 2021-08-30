<?php

/**
 * Cta Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-cta-' . $block['id'];
if ( ! empty ($block[ 'anchor' ] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-cta';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$content = get_field( 'content' );
$link    = get_field( 'link' );

if ( ! empty ( $link ) ) :
$link_url    = $link['url'];
$link_title  = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';

// block preview
if (!empty($block['data']['__is_preview'])) : ?>Phe
<img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg"  alt="block-preview"/>

<?php return;
endif; ?>


<?php
/**
 * Begin Custom Block
 */
do_action('container_start');
?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?> c-my-9">
    <div class="container">
        <div class="row">

            <?php if ( ! empty( $content ) ) : ?>

            <div class="col-12 col-md-9 col-lg-7 col-xxl-6 d-flex justify-content-center align-items-center text-center m-auto font-size-28 line-height-1-8 c-py-3">

                <?= $content; ?>

            </div>

            <?php endif; ?>

        </div>
        <div class="row">

            <?php if ( ! empty( $link_title ) ) : ?>

            <div class="col-12 d-flex justify-content-center align-items-center">
                <a class="crunch-button crunch-button__full-background crunch-button__full-background--secondary-color text-decoration-none font-family-primary text-black" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">

                    <?= esc_html( $link_title ); ?>

                </a>
            </div>

            <?php endif; ?>

        </div>
    </div>

    <?php endif ;?>

</section>

<?php
/**
 * End Custom Block
 */
do_action('container_end');
?>
