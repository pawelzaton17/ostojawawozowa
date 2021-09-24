<?php

/**
 * Variants Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-variants-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name       = 'acf-block-variants';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$title     = get_field( 'title' );
$content   = get_field( 'content' );
$alt       = get_field( 'alt' );
$style     = '';
$custom_id = get_field( 'all_custom_id' );

if ( ! empty( $custom_id ) ) {
    $id .= " {$custom_id}";
}

if ( $alt ) {
    $class_name .= ' acf-block-variants--alt';
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

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?> position-relative" data-anim="fade-in">
    <div class="container">
        <div class="row<?= $alt ? ' d-flex flex-row-reverse' : null; ?>">
            <div class="col-lg-5 acf-block-variants__content-wrapper d-md-flex justify-content-end flex-column">

                <?php if ( $alt ) : ?>

                <div class="c-pl-lg-4 c-pl-xxl-10 c-ml-xl-6">

                <?php endif; ?>

                <?php if ( ! empty( $title ) ) : ?>

                <h2 class="acf-block-variants__heading">

                    <?= $title; ?>

                </h2>

                <?php
                endif;

                if ( ! empty( $content ) ) :
                ?>

                <div class="acf-block-variants__content font-family-primary entry-content text-gray-2 font-weight-light c-mt-md-2">

                    <?= $content; ?>

                </div>

                <?php
                endif;

                if ( have_rows( 'tabs' ) ) :
                    $i          = 0;
                    $tabs_count = count( get_field( 'tabs' ) );
                ?>

                <ul
                    id="variants-tab"
                    class="list-unstyled nav nav-pills c-mt-5 c-mt-md-3<?= $tabs_count >= 2 ? null : ' d-none'; ?>"
                    role="tablist"
                >

                    <?php
                    while ( have_rows( 'tabs' ) ) : the_row();
                        $tab_title = get_sub_field( 'tab_title' );
                    ?>

                    <li class="acf-block-variants__list-item nav-link<?= $i == 0 ? ' c-pl-0' : null; ?>" role="presentation">
                        <button
                            class="acf-block-variants__tab-btn font-size-14 border-0 crunch-button crunch-button__outline crunch-button__outline--primary-color crunch-button__outline--medium text-decoration-none font-family-primary<?= $i == 0 ? ' active' : null; ?>"
                            data-bs-toggle="pill"
                            data-bs-target="<?= ".{$block['id']}-{$i}" ?>"
                            role="tab"
                            aria-selected="<?= $i == 0 ? 'true' : 'false'; ?>"
                        >
                            <span class="z-index-2">

                                <?= $tab_title; ?>

                            </span>
                        </button>
                    </li>

                    <?php
                        $i++;
                    endwhile;
                    ?>

                </ul>

                <?php
                endif;

                if ( $alt ) :
                ?>

                </div>

                <?php
                endif;

                if ( have_rows( 'tabs' ) ) :
                    $i = 0;
                ?>

                <div class="acf-block-variants__tab-wrapper list-unstyled tab-content bg-white z-index-2 position-relative c-mt-7 c-mt-md-2 c-pt-3<?= $alt ? ' acf-block-variants__tab-wrapper--alt' : null; ?>">

                    <?php
                    while ( have_rows( 'tabs' ) ) : the_row();
                        $title       = get_sub_field( 'title' );
                        $content     = get_sub_field( 'content' );
                        $button_text = get_sub_field( 'button_text' );
                        $image_id    = get_sub_field( 'image_with_dimensions' );
                    ?>

                    <div
                        class="acf-block-variants__tab tab-pane fade<?= $i == 0 ? ' show active' : null; echo " {$block['id']}-{$i}"; ?>"
                        role="tabpanel"
                    >
                        <div class="row">
                            <div class="col-md-4 c-mt-6 c-mt-md-7 order-2 order-md-1">

                                <?php if ( ! empty( $title ) ) : ?>

                                <h2 class="acf-block-variants__tab-heading">

                                    <?= $title ?>

                                </h2>

                                <?php
                                endif;

                                if ( ! empty( $content ) ) :
                                ?>

                                <div class="entry-content font-size-14 c-my-5 c-my-md-4 text-dark-gray">

                                    <?= $content; ?>

                                </div>

                                <?php
                                endif;

                                if ( ! empty( $button_text ) ) :
                                ?>

                                <button
                                    class="js-modal-trigger font-size-14 border-0 crunch-button crunch-button__full-background crunch-button__full-background--medium crunch-button__full-background--secondary-color text-decoration-none font-family-primary text-black"
                                    data-target-modal="#variants-modal-<?= $i; ?>"
                                >
                                    <svg class="c-mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.6524 10.7085L14.7826 14.6666" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.39133 11.8334C9.84059 11.8334 11.8261 9.93058 11.8261 7.58337C11.8261 5.23616 9.84059 3.33337 7.39133 3.33337C4.94206 3.33337 2.95654 5.23616 2.95654 7.58337C2.95654 9.93058 4.94206 11.8334 7.39133 11.8334Z" stroke="#333333" stroke-width="1.2"/>
                                    </svg>

                                    <?= $button_text; ?>

                                </button>

                                <?php endif; ?>

                            </div>
                            <div class="col-md-8 c-px-md-6 order-1 order-md-2">
                                <figure class="d-flex justify-content-center">

                                    <?= wp_get_attachment_image( $image_id, "335-450", "", array( "class" => "d-block h-auto w-auto lazyload", "data-lazy" => "true") ); ?>

                                </figure>
                            </div>
                        </div>
                    </div>

                    <?php
                        $i++;
                    endwhile;
                    ?>

                </div>

                <?php endif; ?>

            </div>

            <?php
            if ( have_rows( 'tabs' ) ) :
                $i = 0;
            ?>

            <div id="acf-block-variants__tab-alt" class="col-lg-7 acf-block-variants__image-col tab-content c-mt-8 c-mt-md-0 c-p-0">

                <?php
                while ( have_rows( 'tabs' ) ) : the_row();
                    $item = get_sub_field('item');
                ?>

                <div
                    class="acf-block-variants__slider-wrapper h-100 js-tiny-slider-variants acf-block-variants__tab tab-pane fade<?= $i == 0 ? ' show active' : null; echo " {$block['id']}-{$i}"; ?>"
                    role="tabpanel"
                >

                    <?php if ( have_rows( 'slider' ) ) : ?>

                    <div class="acf-block-variants__image-wrapper h-100 js-tiny-slider-row<?= $alt ? ' acf-block-variants__image-wrapper--alt' : null; ?>">

                        <?php
                        while ( have_rows( 'slider' ) ) : the_row();
                            $image_id = get_sub_field( 'image' );

                            if ( ! empty( $image_id ) ) {
                                $image_url = wp_get_attachment_image_url( $image_id, 'full' );
                                $style     = "style='background-image: url( {$image_url} )'";
                            }
                        ?>

                        <figure class="h-100 c-mb-0 background-cover w-100 img-fluid lazyload" data-lazy="true" <?= $style; ?>></figure>

                        <?php endwhile; ?>

                    </div>

                    <?php endif; ?>

                    <div class="single-post-preview__controls main-variants-controls__controls single-post-preview__controls--main-variants single-post-preview__controls--variants position-absolute">
                        <div class="single-post-preview__arrows w-100 position-absolute">
                            <div class="crunch-tiny-slider__controls d-flex align-items-center h-100 js-crunch-tiny-slider-custom-controls">
                                <button type="button" class="single-post-preview__button main-variants-controls__button single-post-preview__button--alt single-post-preview__button--prev d-flex align-items-center justify-content-center bg-primary crunch-tiny-slider__control-button crunch-tiny-slider-button-prev border-0">
                                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.82129 1.61865L1.357 7.08294L6.82129 12.5472" stroke="white" stroke-width="1.8"/>
                                    </svg>
                                </button>
                                <button type="button" class="single-post-preview__button main-variants-controls__button single-post-preview__button--alt single-post-preview__button--next d-flex align-items-center justify-content-center bg-primary crunch-tiny-slider__control-button crunch-tiny-slider-button-next border-0">
                                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.17822 12.3813L6.64251 6.91706L1.17822 1.45278" stroke="white" stroke-width="1.8"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if( have_rows( 'popup_slider' ) ): ?>

                <div class="js-modal modal fade" id="variants-modal-<?= $i; ?>">
                    <div class="acf-block-variants__popup-wrapper js-modal-item m-auto overflow-hidden bg-white h-100 w-100 position-relative c-p-4">
                        <i class="js-modal-close modal__close z-index-2 position-absolute c-p-3 d-block bg-secondary">
                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27.9566 27.9568L10.0433 10.0434" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                                <path d="M27.9567 10.0434L10.0434 27.9568" stroke="#333333" stroke-width="1.2" stroke-linecap="round"/>
                            </svg>
                        </i>
                        <div class="js-tiny-slider-variants-modal h-100">
                            <div class="acf-block-variants__popup-slider h-100 js-tiny-slider-row">

                                <?php
                                while( have_rows( 'popup_slider' ) ): the_row();
                                    $popup_image_id = get_sub_field( 'image' );

                                    if ( ! empty( $popup_image_id ) ) {
                                        $popup_image_url = wp_get_attachment_image_url( $popup_image_id, 'full' );
                                        $popup_style     = "style='background-image: url( {$popup_image_url} )'";
                                    }
                                ?>

                                <a href="<?= $popup_image_url ?>" class="h-100" target="_blank">
                                    <figure class="acf-block-variants__popup-image h-100 c-mb-0 background-cover w-100 img-fluid lazyload " data-lazy="true" <?= $popup_style; ?>></figure>
                                </a>

                                <?php endwhile; ?>

                            </div>
                            <div class="single-post-preview__controls position-absolute">
                                <div class="single-post-preview__arrows w-100 position-absolute">
                                    <div class="crunch-tiny-slider__controls d-flex align-items-center h-100 js-crunch-tiny-slider-custom-controls">
                                        <button type="button" class="single-post-preview__button single-post-preview__button--alt single-post-preview__button--prev d-flex align-items-center justify-content-center bg-primary crunch-tiny-slider__control-button crunch-tiny-slider-button-prev border-0">
                                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.82129 1.61865L1.357 7.08294L6.82129 12.5472" stroke="white" stroke-width="1.8"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="single-post-preview__button single-post-preview__button--alt single-post-preview__button--next d-flex align-items-center justify-content-center bg-primary crunch-tiny-slider__control-button crunch-tiny-slider-button-next border-0">
                                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.17822 12.3813L6.64251 6.91706L1.17822 1.45278" stroke="white" stroke-width="1.8"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endif; ?>

                <?php
                    $i++;
                endwhile;
                ?>

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
