<?php

/**
 * Map Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-map-' . $block['id'];
if ( ! empty ($block[ 'anchor' ] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-map';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$title     = get_field( 'title' );
$link      = get_field( 'button' );
$custom_id = get_field( 'all_custom_id' );

if ( ! empty( $custom_id ) ) {
    $id .= " {$custom_id}";
}

if ( $link ) {
    $link_url = $link['url'];
    $link_title = $link['title'];
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

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?> position-relative" data-anim="fade-in">
    <div class="d-xxl-none">
        <div class="container c-mb-7">
            <div class="row">
                <div class="col-12 text-center">

                    <?php get_template_part('template-parts/components/section-title', '', [ 'title' => $title, 'center' => true ]); ?>

                </div>
            </div>
        </div>

        <?php
        if ( have_rows( 'tabs' ) ) :
            $i = 0;
        ?>

        <ul class="list-unstyled nav nav-pills d-flex" id="map-tab" role="tablist">

            <?php
            while ( have_rows( 'tabs' ) ) : the_row();
                $tab_title  = get_sub_field( 'tab_title' );
                $tabs_count = count( get_sub_field( 'items' ) );
            ?>

            <li class="acf-block-map__tabs-mobile-item nav-link" role="presentation">
                <button
                    class="w-100 font-size-14 border-0 crunch-button crunch-button__outline crunch-button__outline--primary-color crunch-button__outline--medium text-decoration-none font-family-primary<?= $i == 0 ? ' active' : null; ?>"
                    data-bs-toggle="pill"
                    data-bs-target="<?= ".{$block['id']}-{$i}" ?>"
                    role="tab"
                    aria-selected="<?= $i == 0 ? 'true' : 'false'; ?>"
                >
                    <span class="z-index-2">

                        <?= $tab_title; echo " ({$tabs_count})"; ?>

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

        if ( have_rows( 'tabs' ) ) :
            $i = 0;
        ?>

        <div class="list-unstyled tab-content bg-white">

            <?php
            while ( have_rows( 'tabs' ) ) : the_row();
                $tab_color       = get_sub_field( 'bg_color' );
                $image_mobile_id = get_sub_field( 'main_image_mobile' );
                $image_tablet_id = get_sub_field( 'main_image_tablet' );

                if ( ! empty( $image_mobile_id ) ) {
                    $image_mobile_url   = wp_get_attachment_image_url( $image_mobile_id, 'full' );
                    $mobile_image_style = "style='background-image: url({$image_mobile_url})'";
                }
                if ( ! empty( $image_tablet_id ) ) {
                    $image_tablet_url   = wp_get_attachment_image_url( $image_tablet_id, 'full' );
                    $tablet_image_style = "style='background-image: url({$image_tablet_url})'";
                }
            ?>

                <div
                    class="acf-block-variants__tab tab-pane fade<?= $i == 0 ? ' show active' : null; echo " {$block['id']}-{$i}"; ?>"
                    role="tabpanel"
                >

                    <div class="row c-my-7">

                        <?php
                        while( have_rows( 'items' ) ): the_row();
                            $icon_id      = get_sub_field( 'icon' );
                            $title_mobile = get_sub_field( 'title' );
                            $style        = "style='background-color: {$tab_color}'";
                        ?>

                        <div class="col-md-6">
                            <div class="d-flex c-mb-4 c-mx-4">
                                <i class="acf-block-map__icon-wrapper position-relative d-flex align-items-center justify-content-center" <?= $style; ?>>

                                    <?= wp_get_attachment_image( $icon_id, "19-19", "", array( "class" => "acf-block-map__tab-icon d-block h-100 w-100 lazyload", "data-lazy" => "true") ); ?>

                                </i>
                                <div class="c-pl-4">
                                    <h5 class="font-size-18">

                                        <?= $title_mobile; ?>

                                    </h5>

                                    <?php if( have_rows( 'extra_info' ) ): ?>

                                        <ul class="d-flex c-m-0 list-unstyled">

                                            <?php
                                            while( have_rows( 'extra_info' ) ): the_row();
                                                $extra_item_content = get_sub_field( 'extra_content' );
                                                $extra_item_icon_id = get_sub_field( 'extra_icon' );
                                                ?>

                                                <li class="d-flex align-items-center text-dark-gray c-pr-3">
                                                    <i>

                                                        <?= wp_get_attachment_image( $extra_item_icon_id, "19-19", "", array( "class" => "d-block h-100 w-100 lazyload", "data-lazy" => "true") ); ?>

                                                    </i>
                                                    <p class="font-size-14 c-m-0">

                                                        <?= $extra_item_content; ?>

                                                    </p>
                                                </li>

                                            <?php endwhile; ?>

                                        </ul>

                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <?php endwhile; ?>

                    </div>

                    <div>
                        <figure
                            class="acf-block-map__tabs-mobile-figure d-md-none c-m-0"
                            <?= $mobile_image_style; ?>
                        ></figure>
                        <figure
                            class="acf-block-map__tabs-mobile-figure d-none d-md-block c-m-0"
                            <?= $tablet_image_style; ?>
                        ></figure>
                    </div>
                </div>

            <?php
                $i++;
            endwhile;
            ?>

        </div>

        <?php endif; ?>

    </div>
    <div class="container-fluid d-none d-xxl-block">

        <?php
        if( have_rows( 'tabs' ) ) :
            $tab_image_index = 0;
        ?>

        <div class="acf-block-map__figure-wrapper position-relative">

            <?php
            while( have_rows( 'tabs' ) ): the_row();
                $main_image_id = get_sub_field( 'main_image' );

                if ( ! empty( $main_image_id ) ) {
                    $image_url = wp_get_attachment_image_url( $main_image_id, 'full' );
                    $style     = "style='background-image: url({$image_url})'";
                }
            ?>

            <figure
                class="js-acf-block-map__figure acf-block-map__figure tab-image-index-<?= $tab_image_index; ?> position-absolute h-100 w-100<?= $tab_image_index == 0 ? ' acf-block-map__figure--active' : null; ?>"
                <?= $style; ?>
            ></figure>

            <?php
                $tab_image_index++;
            endwhile;
            ?>

        </div>

        <?php
        endif;

        if( have_rows( 'tabs' ) ):
            $tab_index = 0;
        ?>

        <div class="row acf-block-map__content-row position-absolute w-100">
            <div class="col-md-5 acf-block-map__content-col bg-white c-pl-lg-7 c-pr-lg-6 c-pt-lg-6 c-pb-lg-5 accordion" id="js-tabsAccordion">
                <div class="c-mb-4">
                    <h2>

                        <?= $title; ?>

                    </h2>
                </div>

                <?php
                while( have_rows( 'tabs' ) ): the_row();
                    $tab_title     = get_sub_field( 'tab_title' );
                    $tab_color     = get_sub_field( 'bg_color' );
                    $heading_color = "style='color: {$tab_color}'";
                    $box_bg        = "style='background-color: {$tab_color}'";
                ?>

                <div class="accordion-item border-0 position-relative">
                    <div
                        id="tab-heading-<?= $tab_index; ?>"
                        class="js-acf-block-map__heading-wrapper acf-block-map__heading-wrapper position-relative d-flex align-items-center justify-content-between c-py-3 c-mb-2"
                        data-tabImage="tab-image-index-<?= $tab_index; ?>"
                        data-bs-toggle="collapse"
                        data-bs-target="#tab-collapse-<?= $tab_index; ?>"
                        aria-expanded="<?= $tab_index == 0 ? 'true' : 'false'; ?>"
                        aria-controls="tab-collapse-<?= $tab_index; ?>"
                    >
                        <i class="acf-block-map__heading-wrapper-box m-auto position-absolute" <?= $box_bg; ?>></i>
                        <h3 class="font-size-24" <?= $heading_color ?>>

                            <?= $tab_title; ?>

                        </h3>
                        <svg width="23" height="14" viewBox="0 0 23 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L11.5 12L22 1" stroke="#333333" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div
                        id="tab-collapse-<?= $tab_index; ?>"
                        class="acf-block-map__collapse-content accordion-collapse collapse<?= $tab_index == 0 ? ' show' : null; ?>"
                        aria-labelledby="tab-heading-<?= $tab_index; ?>"
                        data-bs-parent="#js-tabsAccordion"
                    >

                        <?php
                        while( have_rows( 'items' ) ): the_row();
                            $icon_id = get_sub_field( 'icon' );
                            $title   = get_sub_field( 'title' );
                            $style   = "style='background-color: {$tab_color}'";
                        ?>

                        <div class="d-flex c-mb-4">
                            <i class="acf-block-map__icon-wrapper position-relative d-flex align-items-center justify-content-center" <?= $style; ?>>

                                <?= wp_get_attachment_image( $icon_id, "19-19", "", array( "class" => "acf-block-map__tab-icon d-block h-100 w-100 lazyload", "data-lazy" => "true") ); ?>

                            </i>
                            <div class="acf-block-map__icon-title c-pl-4">
                                <h5 class="font-size-18">

                                    <?= $title; ?>

                                </h5>

                                <?php if( have_rows( 'extra_info' ) ): ?>

                                <ul class="d-flex c-m-0 list-unstyled">

                                    <?php
                                    while( have_rows( 'extra_info' ) ): the_row();
                                        $extra_item_content = get_sub_field( 'extra_content' );
                                        $extra_item_icon_id = get_sub_field( 'extra_icon' );
                                    ?>

                                    <li class="d-flex align-items-center text-dark-gray c-pr-3">
                                        <i>

                                            <?= wp_get_attachment_image( $extra_item_icon_id, "19-19", "", array( "class" => "d-block h-100 w-100 lazyload", "data-lazy" => "true") ); ?>

                                        </i>
                                        <p class="font-size-14 c-m-0 c-pl-1">

                                            <?= $extra_item_content; ?>

                                        </p>
                                    </li>

                                    <?php endwhile; ?>

                                </ul>

                                <?php endif; ?>

                            </div>
                        </div>

                        <?php endwhile; ?>

                    </div>
                </div>

                <?php
                    $tab_index++;
                endwhile;

                if ( $link ) :
                ?>

                <a class="c-mt-4 crunch-button crunch-button--file crunch-button__full-background crunch-button__full-background--primary-color crunch-button__full-background--large text-decoration-none font-family-primary w-100" href="<?= $link_url; ?>" target="<?= $link_target; ?>">

                    <?= $link_title; ?>

                </a>

                <?php endif; ?>

            </div>
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
