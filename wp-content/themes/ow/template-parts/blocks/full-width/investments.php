<?php

/**
 * Investments Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-investments-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name       = 'acf-block-investments';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$title      = get_field( 'title' );
$bg_image   = wp_get_attachment_image_url( $bg_image, 'full' );

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
            <div class="col-12 d-flex justify-content-center justify-content-md-start c-py-8 c-py-md-2">

                <?= get_template_part('template-parts/components/section-title', '', [ 'title' => $title, 'center' => false ]);  ?>

            </div>
        </div>

            <?php
            while( have_rows( 'item' ) ) : the_row();
                $i_title    = get_sub_field( 'i_title' );
                $content    = get_sub_field( 'content' );
                $bg_image   = get_sub_field( 'bg_image' );
                $label      = get_sub_field( 'label' );
            ?>

        <?php if ( ! empty( $bg_image ) ) : ?>

            <div class="acf-block-investments__wrapper col-12 col-md-6 w-100 background-cover img-fluid c-my-4 position-relative lazyload" data-lazy="true">
                <div class="col-12 d-flex align-items-center">
                    <div class="acf-block-investments__label d-flex align-items-center justify-content-center text-white bg-red c-py-2 c-px-4">

                        <?= $label; ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-9 d-flex flex-column">
                        <h2 class="acf-block-investments__title">

                            <?= $i_title; ?>

                        </h2>
                        <div class="acf-block-investments__content">

                            <?= $content; ?>

                        </div>
                    </div>
                    <div class="col-3">
                        <i class="acf-block-investments__arrow"><svg width="56" height="19" viewBox="0 0 56 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.5H54M54 9.5L45.5844 18M54 9.5L45.5844 1" stroke="white" stroke-width="2"/></svg></i>
                    </div>
                </div>
            </div>

        <?php endif; ?>

            <?php endwhile; ?>
    </div>
</section>

<?php
/**
 * End Custom Block
 */
do_action('container_end');
?>
