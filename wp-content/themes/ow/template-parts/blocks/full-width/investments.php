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
$title         = get_field( 'title' );
$get_custom_id = get_field( 'all_custom_id' );
$custom_id     = '';

if ( ! empty( $get_custom_id ) ) {
    $custom_id = "id='{$get_custom_id}'";
}

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
<img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg"  alt="preview"/>

<?php return;
endif; ?>


<?php
/**
 * Begin Custom Block
 */
do_action('container_start');
?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?>" data-anim="fade-in">
    <div <?= $custom_id; ?> class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center justify-content-md-start c-py-6">

                <?= get_template_part('template-parts/components/section-title', '', [ 'title' => $title, 'center' => false ]);  ?>

            </div>
        </div>

        <?php if ( have_rows( 'item' ) ): ?>

        <div class="row">

            <?php
            while( have_rows( 'item' ) ) : the_row();
                $item_title = get_sub_field( 'i_title' );
                $content    = get_sub_field( 'content' );
                $image_id   = get_sub_field( 'bg_image' );
                $label      = get_sub_field( 'label' );
                $link       = get_sub_field( 'link' );

                $image_url  = wp_get_attachment_image_url( $image_id, 'full' );
                $style      = "style='background-image: url( {$image_url} )'";

                if ( $link ) {
                    $link_url    = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                }
            ?>

            <div class="acf-block-investments__col col-12 col-lg-6 c-my-2">
                <a class="acf-block-investments__link h-100 w-100 position-relative text-decoration-none d-block" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                    <figure class="acf-block-investments__figure background-cover position-absolute" <?= $style; ?>></figure>

                    <?php if ( ! empty( $label ) ) : ?>

                    <div class="col-12 d-flex align-items-center justify-content-end c-pt-5">
                        <div class="acf-block-investments__label d-flex align-items-center justify-content-center text-white bg-red c-py-2 c-px-4">

                        <?= $label; ?>

                        </div>
                    </div>

                    <?php endif; ?>

                    <div class="acf-block-investments__main-content row position-absolute c-px-5 c-mb-7">
                        <div class="col-9 col-md-10 d-flex flex-column">

                            <?php if ( ! empty( $item_title ) ) : ?>

                            <h2 class="acf-block-investments__title text-white c-pb-2">

                                <?= $item_title; ?>

                            </h2>

                            <?php
                            endif;

                            if ( ! empty( $content ) ) :
                            ?>

                            <div class="acf-block-investments__content text-white">

                            <?= $content; ?>

                            </div>

                            <?php endif; ?>

                        </div>
                        <div class="acf-block-investments__arrow col-3 col-md-2">
                            <svg width="56" height="19" viewBox="0 0 56 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.5H54M54 9.5L45.5844 18M54 9.5L45.5844 1" stroke="white" stroke-width="2"/></svg>
                        </div>
                    </div>
                </a>
            </div>

            <?php endwhile; ?>

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
