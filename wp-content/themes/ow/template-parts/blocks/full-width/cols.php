<?php

/**
 * Cols Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-cols-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-cols';
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

    <?php get_template_part('template-parts/components/section-title', '', [ 'title' => $title ]); ?>

    <?php if ( have_rows( 'cols' ) ): ?>

    <div class="container">
        <div class="row">

            <?php
            while ( have_rows( 'cols' ) ): the_row();
                $icon_id      = get_sub_field( 'icon' );
                $col_title    = get_sub_field( 'title' );
                $text         = get_sub_field( 'text' );
            ?>

            <div class="acf-block-cols__col col-md-4">
                <div class="acf-block-cols__content-wrapper">
                    <div class="row">
                        <div class="col-4 col-md-12">

                            <?= wp_get_attachment_image( $icon_id, "full", "", array( "class" => "acf-block-cols__icon d-block h-auto w-100 lazyload", "data-lazy" => "true") ); ?>

                        </div>
                        <div class="col-8 col-md-12">
                            <h3>

                                <?= $col_title; ?>

                            </h3>
                            <div>

                                <?= $text; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>

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
