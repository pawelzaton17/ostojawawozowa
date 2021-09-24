<?php

/**
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-hero-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name       = 'acf-block-hero overflow-hidden';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$custom_id = get_field( 'all_custom_id' );

if ( ! empty( $custom_id ) ) {
    $id .= " {$custom_id}";
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

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?> position-relative">

    <?php if ( have_rows( 'buttons' ) ) : ?>

    <ul class="acf-block-hero__buttons d-none d-md-flex flex-column list-unstyled z-index-2 align-items-end position-fixed d-flex c-m-0">

        <?php
        while ( have_rows( 'buttons' ) ) : the_row();
            $icon_id  = get_sub_field( 'icon' );
            $text     = get_sub_field( 'text' );
            $modal_id = get_sub_field( 'modal_id' );
        ?>

        <li
            class="acf-block-hero__buttons-item js-modal-trigger z-index-2 overflow-hidden d-flex<?= empty( $text ) ? ' acf-block-hero__buttons-item--alt' : null; ?>"
            data-target-modal="<?= $modal_id; ?>"
        >
            <figure class="c-mb-0">

                <?= wp_get_attachment_image( $icon_id, "full", "", array( "class" => "acf-block-hero__icon d-block h-auto w-100 lazyload", "data-lazy" => "true") ); ?>

            </figure>

            <?php if ( ! empty( $text ) ) : ?>

            <h6 class="acf-block-hero__buttons-item-text d-flex js-hero-buttons-text align-items-center font-size-14">

                <?= $text; ?>

            </h6>

            <?php endif; ?>

        </li>

        <?php endwhile; ?>

    </ul>

    <?php
    endif;

    if ( have_rows( 'slider' ) ):
    ?>

    <div class="js-tiny-slider-hero overflow-hidden">
        <div class="js-tiny-slider crunch-tiny-slider position-relative">
            <div class="acf-block-hero__slider-row js-tiny-slider-row">

                <?php
                while ( have_rows( 'slider' ) ) : the_row();
                    $title     = get_sub_field( 'title' );
                    $image_id  = get_sub_field( 'image' );
                    $link      = get_sub_field( 'link' );
                    $image_url = '';

                    if ( $link ) {
                        $link_url    = $link['url'];
                        $link_title  = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    }
                    if ( $image_id ) {
                        $image_url = wp_get_attachment_image_url( $image_id, 'full' );
                        $style     = "style='background-image: url({$image_url})'";
                    }
                ?>

                <div class="acf-block-hero__slider-item tiny-slider-item">
                    <figure class="h-100 w-100 background-cover" <?= $style?>></figure>
                    <div class="acf-block-hero__content-wrapper position-absolute c-p-7 c-pr-md-10">
                        <div class="acf-block-hero__title text-white c-mb-7">

                            <?= $title; ?>

                        </div>
                        <a
                            href="<?= esc_url($link_url); ?>"
                            class="js-modal-trigger crunch-button crunch-button__full-background crunch-button__full-background--secondary-color text-decoration-none font-family-primary"
                            data-target-modal="#contact-modal"
                            target="<?= esc_attr($link_target); ?>"
                            <?php if($link_target != '_self') echo 'rel="'.esc_attr('nofollow').'"'; ?>
                        >

                            <?= esc_html($link_title); ?>

                        </a>
                    </div>
                </div>

                <?php endwhile; ?>

            </div>
            <div class="acf-block-hero__controls d-none d-md-block">
                <div class="container d-flex align-items-center h-100">
                    <div class="row w-100">
                        <div class="col-10">
                            <div class="text-white slider-info-print font-size-15 font-weight-medium"></div>
                        </div>
                        <div class="col-2 position-relative">
                            <div class="crunch-tiny-slider__controls d-flex align-items-center h-100 js-crunch-tiny-slider-custom-controls">
                                <button type="button" class="acf-block-hero__control-item crunch-tiny-slider__control-button crunch-tiny-slider-button-prev hover-opacity-0-75 bg-transparent border-0">
                                    <svg class="acf-block-hero__control-icon crunch-tiny-slider__control-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 253.21 442.83"><title>icon__chevron-regular-left--black-color</title><path d="M229.9,439.31l19.8-19.79a12,12,0,0,0,0-17L69,221.41,249.7,40.28a12,12,0,0,0,0-17L229.9,3.51a12,12,0,0,0-17,0L3.51,212.93a12,12,0,0,0,0,17L212.93,439.31A12,12,0,0,0,229.9,439.31Z"/></svg>
                                </button>
                                <button type="button" class="acf-block-hero__control-item crunch-tiny-slider__control-button crunch-tiny-slider-button-next hover-opacity-0-75 bg-transparent border-0">
                                    <svg class="acf-block-hero__control-icon crunch-tiny-slider__control-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 253.21 442.83"><title>icon__chevron-regular-right--black-color</title><path d="M23.31,3.52,3.51,23.31a12,12,0,0,0,0,17l180.7,181.13L3.51,402.54a12,12,0,0,0,0,17l19.8,19.79a12,12,0,0,0,17,0L249.7,229.9a12,12,0,0,0,0-17L40.28,3.52A12,12,0,0,0,23.31,3.52Z"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
