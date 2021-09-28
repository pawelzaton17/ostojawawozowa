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
$content       = get_field( 'content' );
$link          = get_field( 'link' );
$get_custom_id = get_field( 'all_custom_id' );
$custom_id     = '';

if ( ! empty( $get_custom_id ) ) {
    $custom_id = "id='{$get_custom_id}'";
}

if ( ! empty ( $link ) ) {
    $link_url    = $link['url'];
    $link_title  = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
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

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?> c-my-9">
    <div <?= $custom_id; ?> class="container">

        <?php if ( ! empty( $content ) ) : ?>

        <div class="row">
            <div class="col-12 col-md-9 col-lg-7 col-xxl-6 d-flex justify-content-center align-items-center text-center m-auto font-size-28 line-height-1-8 c-py-3">

                <?= $content; ?>

            </div>
        </div>

        <?php
        endif;

        if ( ! empty( $link_title ) ) :
        ?>

        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <button
                    class="js-modal-trigger border-0 crunch-button crunch-button__full-background crunch-button__full-background--secondary-color text-decoration-none font-family-primary text-black"
                    data-target-modal="#<?= $block['id']; ?>-financing-modal"
                >

                    <?= esc_html( $link_title ); ?>

                </button>
            </div>
        </div>

        <?php endif; ?>

    </div>
    <div class="js-modal modal contact-modal-wrapper fade" id="<?= $block['id']; ?>-financing-modal">
        <div class="main-footer__popup-wrapper js-modal-item m-auto overflow-hidden bg-white h-100 position-relative c-py-4 c-px-6">
            <i class="js-modal-close modal__close z-index-2 position-absolute c-p-3 d-block">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27.9566 27.9568L10.0433 10.0434" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                    <path d="M27.9567 10.0434L10.0434 27.9568" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                </svg>
            </i>
            <div class="h-100 overflow-auto">

                <?= do_shortcode('[gravityform id="14" ajax="true"]'); ?>

            </div
        </div>
    </div>
</section>

<?php
/**
 * End Custom Block
 */
do_action('container_end');
?>
