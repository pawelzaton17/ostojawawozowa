<?php

/**
 * List Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-list-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-list';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$title = get_field( 'title' );

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

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?>">

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">

                <?php get_template_part('template-parts/components/section-title', '', [ 'title' => $title, 'center' => true ]); ?>

            </div>
        </div>
    </div>

    <?php if ( have_rows( 'list' ) ): ?>

    <div class="container c-mt-9 c-mt-md-7">
        <div class="row">
            <div class="col-12">
                <ul class="list-unstyled">

                    <?php
                    while ( have_rows( 'list' ) ): the_row();
                        $item_title  = get_sub_field( 'title' );
                        $total_area  = get_sub_field( 'total_area' );
                        $garden_area = get_sub_field( 'garden_area' );
                        $stage       = get_sub_field( 'stage' );
                        $price       = get_sub_field( 'price' );
                        $status      = get_sub_field( 'status' );
                        $status_type = get_sub_field( 'status_type' );
                        $file        = get_sub_field( 'file' );
                        $link        = get_sub_field( 'link' );

                        if ( $link ) {
                            $link_url    = $link['url'];
                            $link_title  = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        }
                    ?>

                    <li class="acf-block-list__list-item">
                        <div class="acf-block-list__row row font-family-primary font-weight-light c-py-3">
                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <div class="col-6 col-md-8 col-lg-12 col-xl-2 acf-block-list__item-title">

                                        <?= $item_title; ?>

                                    </div>

                                    <div class="col-6 col-md-4 d-lg-none">
                                        <div class="row h-100 d-flex align-items-center">
                                            <div class="col-3 c-px-2 d-flex h-100 c-py-2">
                                                <a href="#" class="crunch-button crunch-button--file crunch-button__full-background crunch-button__full-background--primary-color crunch-button__full-background--medium text-decoration-none font-family-primary w-100">
                                                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.5 2.625v9.208M4.958 9L8.5 12.542 12.042 9M14.167 15.375H2.833" stroke="#fff" stroke-width="1.2" stroke-linecap="round"/></svg>
                                                    <span class="c-ml-3 d-none d-xl-inline-flex">Pobierz rzut</span>
                                                </a>
                                            </div>
                                            <div class="col-9 c-px-2 d-flex h-100 c-py-2">
                                                <a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>" <?php if($link_target != '_self') echo 'rel="'.esc_attr('nofollow').'"'; ?>
                                                   class="crunch-button crunch-button__full-background crunch-button__full-background--secondary-color text-black crunch-button__full-background--medium text-decoration-none font-family-primary w-100">

                                                    <?= esc_html($link_title); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-lg-none c-my-3"></div>

                                    <div class="acf-block-list__item col-4 col-lg-3 col-xl-2 d-flex flex-column c-mb-2 c-mb-md-0">
                                        <span class="acf-block-list__label text-light-gray line-height-1-3 font-family-secondary font-weight-medium">Powierzchnia całkowita</span>

                                        <?= $total_area ?>

                                    </div>
                                    <div class="acf-block-list__item col-4 col-lg-3 col-xl-2 d-flex flex-column c-mb-2 c-mb-md-0">
                                        <span class="acf-block-list__label text-light-gray line-height-1-3 font-family-secondary font-weight-medium">Powierzchnia ogrodu</span>

                                        <?= $garden_area ?>

                                    </div>
                                    <div class="acf-block-list__item col-4 col-lg-1 d-flex flex-column c-mb-2 c-mb-md-0">
                                        <span class="acf-block-list__label text-light-gray line-height-1-3 font-family-secondary font-weight-medium">Etap</span>

                                        <?= $stage ?>

                                    </div>
                                    <div class="acf-block-list__item col-4 col-lg-2 d-flex flex-column c-mb-2 c-mb-md-0">
                                        <span class="acf-block-list__label text-light-gray line-height-1-3 font-family-secondary font-weight-medium">Cena</span>

                                        <?= $price ?>

                                    </div>
                                    <div class="acf-block-list__item col-4 col-lg-3 col-xl-2 d-flex flex-column c-mb-2 c-mb-md-0">
                                        <span class="acf-block-list__label text-light-gray line-height-1-3 font-family-secondary font-weight-medium">Status</span
                                        <div class="acf-block-list__status--<?= $status_type; ?>">
                                            <i class="acf-block-list__status-icon d-inline-flex"></i>

                                            <?= $status ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-none d-lg-block">
                                <div class="row h-100 d-flex align-items-center">
                                    <div class="col-6 col-lg-12 col-xl-6 c-px-2 d-flex">
                                        <a href="#" class="crunch-button crunch-button--file crunch-button__full-background crunch-button__full-background--primary-color crunch-button__full-background--medium text-decoration-none font-family-primary w-100">
                                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.5 2.625v9.208M4.958 9L8.5 12.542 12.042 9M14.167 15.375H2.833" stroke="#fff" stroke-width="1.2" stroke-linecap="round"/></svg>
                                            <span class="c-ml-3 d-none d-lg-inline-flex d-xl-none d-xxl-inline-flex">Pobierz rzut</span>
                                        </a>
                                    </div>
                                    <div class="col-6 col-lg-12 col-xl-6 c-px-2 d-flex">
                                        <a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>" <?php if($link_target != '_self') echo 'rel="'.esc_attr('nofollow').'"'; ?>
                                           class="crunch-button crunch-button__full-background crunch-button__full-background--secondary-color text-black crunch-button__full-background--medium text-decoration-none font-family-primary w-100">

                                            <?= esc_html($link_title); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <?php endwhile; ?>

                </ul>
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
