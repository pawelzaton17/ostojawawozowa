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
$custom_id         = get_field( 'all_custom_id' );

if ( ! empty( $custom_id ) ) {
    $id .= " {$custom_id}";
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

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?> c-my-9" data-anim="fade-in" >
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
            <div class="col-lg-6 d-flex justify-content-md-center c-p-0">
                <div class="row acf-block-calendar__calendar-row w-100 m-auto">

                    <?php if ( ! empty( $heading_secondary ) ) : ?>

                    <div class="col-12 d-flex flex-row justify-content-md-center c-mb-5 align-items-center">
                        <svg width="28" height="28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 3.86h25.75v22.89H1V3.86Z" stroke="#72832C" stroke-width="1.2" stroke-linejoin="round"/><path d="M26.75 9.583H1M6.722 3.861V1M21.028 3.861V1" stroke="#72832C" stroke-width="1.2" stroke-linecap="round"/>
                        </svg>
                        <h3 class="acf-block-calendar__heading_secondary text-gray-second fw-bold c-pl-4">

                            <?= $heading_secondary; ?>

                        </h3>
                    </div>

                    <?php endif; ?>

                    <div>
                        <div class="col-12 acf-block-calendar__calendar-wrapper js-tiny-slider-calendar c-px-0 c-py-md-5 position-relative">
                            <div class="js-tiny-slider overflow-hidden c-py-7 c-px-5 c-py-md-0 bg-olive-2">
                                <div id="js-calendar" class="js-tiny-slider-row d-flex"></div>
                            </div>
                            <div class="single-post-preview__controls acf-block-calendar__controls">
                                <div class="single-post-preview__arrows acf-block-calendar__arrows w-100 position-md-absolute">
                                    <div class="crunch-tiny-slider__controls d-flex align-items-center h-100 js-crunch-tiny-slider-custom-controls acf-block-calendar__mobile-controls w-100 c-px-6 c-px-md-0">
                                        <div class="acf-block-calendar__slider-buttons">
                                            <div class="d-md-none border-0 crunch-button acf-block-calendar__slider-button crunch-button--file crunch-button__full-background crunch-button__full-background--primary-color text-decoration-none font-family-primary w-100 font-size-14">
                                                Wcześniejszy termin
                                            </div>
                                            <div class="d-none d-md-flex single-post-preview__button single-post-preview__button--prev d-flex align-items-center justify-content-center bg-primary crunch-tiny-slider__control-button crunch-tiny-slider-button-prev border-0">
                                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.82129 1.61865L1.357 7.08294L6.82129 12.5472" stroke="white" stroke-width="1.8"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="acf-block-calendar__slider-buttons">
                                            <div class="d-md-none border-0 crunch-button crunch-button--file acf-block-calendar__slider-button crunch-button__full-background crunch-button__full-background--primary-color text-decoration-none font-family-primary w-100 font-size-14">
                                                Pózniejszy termin
                                            </div>
                                            <div class="d-none d-md-flex single-post-preview__button single-post-preview__button--next d-flex align-items-center justify-content-center bg-primary crunch-tiny-slider__control-button crunch-tiny-slider-button-next border-0">
                                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.17822 12.3813L6.64251 6.91706L1.17822 1.45278" stroke="white" stroke-width="1.8"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div

                        <div class="acf-block-calendar__buttons-wrapper c-px-6 c-px-md-0 c-pb-md-5 c-mt-5 c-mt-md-0 d-flex flex-column flex-md-row justify-content-md-center">
                            <button
                                class="js-modal-trigger acf-block-calendar__modal-button acf-block-calendar__modal-button--short font-size-14 border-0 crunch-button crunch-button__full-background crunch-button__full-background--medium text-decoration-none font-family-primary text-primary w-100"
                                data-target-modal="#calendar-other-date-modal"
                            >
                                Inny termin
                            </button>
                            <button
                                class="js-modal-trigger acf-block-calendar__modal-button acf-block-calendar__modal-button--long font-size-14 border-0 crunch-button crunch-button__full-background crunch-button__full-background--medium text-decoration-none font-family-primary text-black w-100"
                                data-target-modal="#calendar-without-date-modal"
                            >
                                Umów się
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="js-modal modal contact-modal-wrapper fade" id="calendar-modal">
        <div class="main-footer__popup-wrapper js-modal-item m-auto overflow-hidden bg-white h-100 position-relative c-py-4 c-px-6">
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
    <div class="js-modal modal contact-modal-wrapper fade" id="calendar-other-date-modal">
        <div class="main-footer__popup-wrapper js-modal-item m-auto overflow-hidden bg-white h-100 position-relative c-py-4 c-px-6">
            <i class="js-modal-close modal__close z-index-2 position-absolute c-p-3 d-block">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27.9566 27.9568L10.0433 10.0434" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                    <path d="M27.9567 10.0434L10.0434 27.9568" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                </svg>
            </i>
            <div class="h-100 overflow-auto">

                <?= do_shortcode('[gravityform id="12" ajax="true"]'); ?>

            </div
        </div>
    </div>
    <div class="js-modal modal contact-modal-wrapper fade" id="calendar-without-date-modal">
        <div class="main-footer__popup-wrapper js-modal-item m-auto overflow-hidden bg-white h-100 position-relative c-py-4 c-px-6">
            <i class="js-modal-close modal__close z-index-2 position-absolute c-p-3 d-block">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27.9566 27.9568L10.0433 10.0434" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                    <path d="M27.9567 10.0434L10.0434 27.9568" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                </svg>
            </i>
            <div class="h-100 overflow-auto">

                Umów się

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
