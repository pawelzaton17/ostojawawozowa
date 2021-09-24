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
$title       = get_field( 'title' );
$content     = get_field( 'content' );
$image       = get_field( 'image' );
$link        = get_field( 'button' );
$is_alt      = get_field( 'alt' );
$alt_heading = '';
$custom_id   = get_field( 'all_custom_id' );

if ( ! empty( $custom_id ) ) {
    $id .= " {$custom_id}";
}

if ( $is_alt ) {
    $alt_heading = get_field( 'alt_heading' );
    $alt_link    = get_field( 'alt_link' );

    if ( $alt_link ) {
        $alt_link_url    = $alt_link['url'];
        $alt_link_title  = $alt_link['title'];
        $alt_link_target = $alt_link['target'] ? $alt_link['target'] : '_self';
    }
}

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

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); echo ! $is_alt ? ' bg-primary' : ' acf-block-image-with-content--alt'; ?>" data-anim="fade-in">
    <div class="container c-py-10 c-py-md-7">

        <?php if ( ! $is_alt ) : ?>

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

                if ( ! empty( $link ) ) :
                ?>

                <a class="crunch-button crunch-button__full-background crunch-button__full-background--secondary-color text-black crunch-button__full-background--medium text-decoration-none font-family-primary font-size-13" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">

                    <?= esc_html( $link_title ); ?>

                </a>

                <?php endif; ?>

            </div>
        </div>

        <?php else : ?>

        <div class="row c-mb-7">
            <div class="col-12 text-center">

                <?php get_template_part('template-parts/components/section-title', '', [ 'title' => $alt_heading, 'center' => true ]); ?>

            </div>
        </div>
        <div class="row">
            <?php
            $the_query = new WP_Query(array(
                'posts_per_page' => 1,
            ));

            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();
                    $post_id = get_the_ID();
                    $label   = get_field( 's_label', $post_id );
            ?>

                <?php if ( have_rows( 's_gallery',  $post_id ) ) : ?>

                <div class="col-md-6 c-mb-5 c-mb-md-0 js-tiny-slider-single position-relative">
                    <div class="position-relative">
                        <div class="js-tiny-slider overflow-hidden">
                            <div class="single-post-preview__slider-wrapper js-tiny-slider-row">

                                <?php
                                while ( have_rows( 's_gallery',  $post_id ) ) : the_row();
                                    $image_id = get_sub_field( 'image' );
                                    $style    = '';

                                    if ( ! empty( $image_id ) ) {
                                        $image_url = wp_get_attachment_image_url( $image_id, 'full' );
                                        $style     = "style='background-image: url( {$image_url} )'";
                                    }
                                ?>

                                <div class="h-100 w-100">
                                    <figure class="h-100 c-mb-0 background-cover w-100 img-fluid lazyload" data-lazy="true" <?= $style; ?>></figure>
                                </div>

                                <?php endwhile; ?>

                            </div>
                        </div>
                        <div class="single-post-preview__controls position-absolute">
                            <div class="single-post-preview__arrows w-100 position-absolute">
                                <div class="crunch-tiny-slider__controls d-flex align-items-center h-100 js-crunch-tiny-slider-custom-controls">
                                    <button type="button" class="single-post-preview__button single-post-preview__button--prev d-flex align-items-center justify-content-center bg-primary crunch-tiny-slider__control-button crunch-tiny-slider-button-prev border-0">
                                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.82129 1.61865L1.357 7.08294L6.82129 12.5472" stroke="white" stroke-width="1.8"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="single-post-preview__button single-post-preview__button--next d-flex align-items-center justify-content-center bg-primary crunch-tiny-slider__control-button crunch-tiny-slider-button-next border-0">
                                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.17822 12.3813L6.64251 6.91706L1.17822 1.45278" stroke="white" stroke-width="1.8"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="single-post-preview__slider-counter slider-info-print position-absolute font-family-primary bg-light-green text-dark-gray d-flex align-items-center justify-content-center font-size-22 font-weight-thin"></div>
                        </div>
                    </div>
                </div>

                <?php endif; ?>

                <div class="col-md-4 d-flex flex-column justify-content-center c-ml-md-7">

                    <?php if ( ! empty( $label ) ) : ?>

                    <h4 class="font-size-14 text-dark-gray c-pb-2">

                        <?= $label; ?>

                    </h4>

                    <?php endif; ?>

                    <h2 class="font-size-36 text-gray-second fw-bold c-pb-4">

                        <?php the_title(); ?>

                    </h2>

                    <?php if ( have_rows( 's_list',  $post_id  ) ) : ?>

                    <ul class="single-post-preview__list list-unstyled d-flex flex-column">

                        <?php
                        while ( have_rows( 's_list', $post_id ) ) : the_row();
                            $item = get_sub_field( 'item' );
                        ?>

                        <li class="single-post-preview__list-item position-relative font-size-14 text-dark-gray c-pb-2 c-pl-5">

                            <?= $item; ?>

                        </li>

                        <?php endwhile; ?>

                    </ul>

                    <?php
                    endif;

                    if ( ! empty( $alt_link ) ) :
                    ?>

                    <a
                       class="crunch-button crunch-button__full-background crunch-button__full-background--secondary-color text-black crunch-button__full-background--medium text-decoration-none font-family-primary font-size-13"
                       href="<?= esc_url( $alt_link_url ); ?>"
                       target="<?= esc_attr( $alt_link_target ); ?>"
                    >

                        <?= esc_html( $alt_link_title ); ?>

                    </a>

                    <?php endif; ?>

                </div>

            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

        </div>

        <?php endif; ?>

    </div>
</section>

<?php
/**
 * End Custom Block
 */
do_action('container_end');
?>
