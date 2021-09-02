<?php
    $category_args = array(
        "hide_empty" => 1,
        "orderby"   => "name",
        'parent'    => 0,
        "order"     => "ASC"
        // Please check the id of "Uncategorized" category and add line with correct id to exclude it:
        // "exclude" => 1
    );

    global $post;
    $terms_post_category = wp_get_post_terms($post->ID, 'category', $category_args);
    $label               = get_field( 's_label', $post->ID );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-preview d-block ' ); ?>>
    <div class="row">
        <div class="col-md-6 col-lg-7 d-flex flex-column justify-content-center c-my-6 c-my-md-0">

            <?php if ( ! empty( $label ) ) : ?>

            <h4 class="font-size-14 text-dark-gray c-pb-2">

                <?= $label; ?>

            </h4>

            <?php endif; ?>

            <h2 class="font-size-36 text-gray-second fw-bold c-pb-4">

                <?php the_title(); ?>

            </h2>

            <?php if ( have_rows( 's_list',  $post->ID  ) ) : ?>

            <ul class="single-post-preview__list list-unstyled d-flex flex-column d-lg-grid">

                <?php
                while ( have_rows( 's_list', $post->ID) ) : the_row();
                    $item = get_sub_field( 'item' );
                ?>

                <li class="single-post-preview__list-item position-relative font-size-14 text-dark-gray c-pb-2 c-pl-5">

                    <?= $item; ?>

                </li>

                <?php endwhile; ?>

            </ul>

            <?php endif; ?>

        </div>

        <?php if ( have_rows( 's_gallery',  $post->ID ) ) : ?>

        <div class="col-md-6 col-lg-5 js-tiny-slider-single position-relative">
            <div class="position-relative">
                <div class="js-tiny-slider overflow-hidden">
                    <div class="single-post-preview__slider-wrapper js-tiny-slider-row">

                        <?php
                        while ( have_rows( 's_gallery',  $post->ID ) ) : the_row();
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

    </div>
</article>

