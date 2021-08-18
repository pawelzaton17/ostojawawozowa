<?php

/**
 * Numbers Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-block-numbers-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-block-numbers';
$additional_class = !empty($block['className']) ? ' ' .$block['className'] : null;

// Load values and assing defaults.
$v_title = get_field( 'v_title' );
$w_title = get_field( 'w_title' );

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

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name.$additional_class); ?> postion-relative">
    <div class="container">
        <div class="row">

        <?php if ( have_rows( 'v_items' ) ): ?>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-8">
                        <h2 class="acf-block-numbers__mainheading c-pb-4 c-pb-md-3 position-relative font-weight-bold font-size-36">

                            <?= $v_title; ?>

                        </h2>
                    </div>

                    <?php  
                    while ( have_rows( 'v_items' ) ): the_row();
                        $v_heading     = get_sub_field( 'v_item_heading' );
                        $v_content     = get_sub_field( 'v_item_content' );
                    ?>

                    <div class="col-6">
                        <h2 class="acf-block-numbers__heading">

                            <?= $v_heading; ?>

                        </h2>
                        <div class="acf-block-numbers__content">

                            <?= $v_content; ?>

                        </div>
                    </div>

                    <?php endwhile; ?>
                
                </div>
            </div>
            
            <?php endif; ?>

            <?php if ( have_rows( 'w_items' ) ): ?>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <h2 class="acf-block-numbers__secondaryheading c-pb-4 c-pb-md-3 position-relative font-weight-bold font-size-36">

                            <?= $w_title; ?>

                        </h2>
                    </div>

                    <?php  
                    while ( have_rows( 'w_items' ) ): the_row();
                        $w_heading     = get_sub_field( 'w_item_heading' );
                        $w_content     = get_sub_field( 'w_item_content' );
                    ?>

                    <div class="col-6">
                        <h2>

                            <?= $w_heading; ?>

                        </h2>
                        <div>

                            <?= $w_content; ?>

                        </div>
                    </div>

                    <?php endwhile; ?>
                
                </div>
            </div>
            
            <?php endif; ?>

        </div>
    </div> 
</section>

<?php
/**
 * End Custom Block
 */
do_action('container_end');
?>