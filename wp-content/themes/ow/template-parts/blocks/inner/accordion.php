<?php
/**
 * Accordion Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-accordion-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-accordion';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$title = get_field( 'title' );
$accordion = 'accordion';

$main_tag = $title ? 'section' : 'div';
?>

<<?= $main_tag; ?> id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name).$additional_class; ?>" data-anim="fade-in">

    <?php if($title): ?>

        <h2><?= $title; ?></h2>

    <?php endif; ?>

    <?php if ( have_rows( $accordion ) ) : ?>

        <div class="accordion js-accordion<?php if($title) echo ' c-mt-3'; ?>" id="bootstrap-<?= esc_attr($id); ?>">

            <?php $i = 1; ?>
            <?php while ( have_rows( $accordion ) ) : the_row(); ?>

                <div class="single-row js-sinle-row">
                    <div class="single-row__header" id="heading<?= $i; ?>">
                        <h3 class="single-row__title position-relative">
                            <button class="single-row__button text-left d-block bg-transparent border-0 w-100<?php if($i > 1) { echo ' collapsed';} ?> px-0" type="button" data-toggle="collapse" data-target="#collapse<?= $i; ?>" aria-expanded="<?php if ($i == 1) { echo 'true';} else { echo 'false';} ?>" aria-controls="collapse<?= $i; ?>">
                                <?php the_sub_field( 'label' ); ?>
                            </button>
                        </h3>
                    </div>
                    <div id="collapse<?= $i; ?>" class="collapse js-collapse<?php if ($i == 1) echo ' show'; ?>" aria-labelledby="heading<?= $i; ?>" data-parent="#bootstrap-<?= esc_attr($id); ?>">
                        <div class="single-row__content entry-content c-mt-3 c-pb-6">
                            <?php the_sub_field( 'content' ); ?>
                        </div>
                    </div>
                </div>

                <?php $i++; ?>
            <?php endwhile; ?>

        </div>

    <?php endif; ?>

</<?= $main_tag; ?>>
