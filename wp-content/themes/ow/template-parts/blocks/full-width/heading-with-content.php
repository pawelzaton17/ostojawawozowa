<?php

/**
 * Heading with content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-heading-with-content-' . $block['id'];
if ( ! empty ($block[ 'anchor' ] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-heading-with-content';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$title   = get_field( 'title' );
$content = get_field( 'content' );

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
<img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg"  alt="block-heading-with-content-preview"/>

<?php return;
endif; ?>


<?php
/**
 * Begin Custom Block
 */
do_action('container_start');
?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?> c-my-7" data-anim="fade-in">
   <div class="container">
       <div class="row">
           <div class="col-md-6 col-lg-4 d-flex flex-column align-items-sm-center align-items-md-start">

               <?php if ( ! empty( $title ) ) : ?>

               <h2 class="acf-block-heading-with-content__heading fw-bold text-gray-second text-center text-md-start font-size-48">

                   <?= $title; ?>

               </h2>
               <i class="line d-none d-md-flex c-mt-3"></i>

               <?php endif; ?>

           </div>
           <div class="col-md-6 col-lg-5">

               <?php if ( ! empty( $content ) ) : ?>

               <div class="acf-block-heading-with-content__content m-auto text-dark-gray c-pt-7 c-pt-md-0 text-center text-md-start c-pl-md-7 c-pl-xxl-5">

                   <?= $content; ?>

               </div>

               <?php endif; ?>

           </div>
       </div>
   </div>
</section>

<?php
/**
 * End Custom Block
 */
do_action('container_end');
?>
