<?php

/**
 * Calendar Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-calendar-' . $block['id'];
if ( ! empty ($block[ 'anchor' ] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-calendar';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$heading_primary   = get_field( 'title_primary' );
$content           = get_field( 'content' );
$heading_secondary = get_field( 'title_secondary' );

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
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column flex-md-row flex-lg-column align-items-md-center align-items-lg-start c-mb-10 c-mb-lg-0">

                <?php if ( ! empty( $heading_primary ) ) : ?>

                <h2 class="acf-block-calendar__heading-primary fw-bold c-pb-4 c-pb-lg-2">

                    <?= $heading_primary; ?>

                </h2>
                <i class="line d-block d-md-none d-lg-block"></i>

                <?php
                endif;

                if ( ! empty( $content ) ) :
                ?>

                <div class="acf-block-calendar__content d-none d-md-block font-size-14 text-dark-gray c-py-6">

                    <?= $content; ?>

                </div>

                <?php endif; ?>

            </div>
            <div class="col-lg-6 d-flex justify-content-md-center">
                <div class="row">
                    <div class="col-12 d-flex flex-row justify-content-md-center-center">

                        <?php if ( ! empty( $heading_secondary ) ) : ?>

                        <svg width="28" height="28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 3.86h25.75v22.89H1V3.86Z" stroke="#72832C" stroke-width="1.2" stroke-linejoin="round"/><path d="M26.75 9.583H1M6.722 3.861V1M21.028 3.861V1" stroke="#72832C" stroke-width="1.2" stroke-linecap="round"/>
                        </svg>
                        <h3 class="acf-block-calendar__heading_secondary text-gray-second fw-bold c-pl-4">

                            <?= $heading_secondary; ?>

                        </h3>

                        <?php endif; ?>

                    </div>
                    <div class="col-12">
                        <div id="js-calendar" class="d-flex"></div>
                    </div
                </div>
            </div>
        </div>
    </div>
    <div class="js-modal modal contact-modal-wrapper fade" id="calendar-modal">
        <div class="main-footer__popup-wrapper m-auto overflow-hidden bg-white h-100 position-relative c-py-4 c-px-6">
            <i class="js-modal-close modal__close z-index-2 position-absolute c-p-3 d-block">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27.9566 27.9568L10.0433 10.0434" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                    <path d="M27.9567 10.0434L10.0434 27.9568" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                </svg>
            </i>
            <div class="h-100 overflow-auto">

                <?= do_shortcode('[gravityform id="11" ajax="true"]'); ?>

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
