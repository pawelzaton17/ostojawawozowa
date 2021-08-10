<?php
/**
 * Logos Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-logos-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-logos';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

$title = get_field( 'title' );
$logos = 'logos';

$main_tag = $title ? 'section' : 'div';
?>

<?php if ( have_rows( $logos ) ) : ?>

    <section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name).$additional_class; ?>" data-anim="fade-in">

        <?php if($title): ?>

            <h2 class="text-center"><?= $title; ?></h2>

        <?php endif; ?>

        <div class="c-mt-3">
            <div class="row justify-content-center">

                <?php while ( have_rows( $logos ) ) : the_row(); ?>

                    <div class="col-6 col-sm-4 col-md-3">

                        <?php $url = get_sub_field( 'url' ); ?>
                        <?php if( $url ): ?>

                            <a href="<?= $url ?>" rel="nofollow noopener noreferrer" target="_blank" class="single-logo-wrapper d-flex align-items-center justify-content-center c-mt-4">

                        <?php else: ?>

                            <div class="single-logo-wrapper d-flex align-items-center justify-content-center c-mt-4">

                        <?php endif; ?>

                            <?php $image = get_sub_field('logo') ?>
                            <?php if( !empty($image) ): ?>

                                <img data-src="<?= $image['url']; ?>" src="<?= get_template_directory_uri(); ?>/images/img__empty.png" alt="<?= $image['alt']; ?>" class="lazyload adjustable-element d-block" />

                            <?php endif; ?>

                        <?php if( $url ): ?>

                            </a>

                        <?php else: ?>

                            </div>

                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>

            </div>
        </div>
    </section>

<?php endif; ?>
