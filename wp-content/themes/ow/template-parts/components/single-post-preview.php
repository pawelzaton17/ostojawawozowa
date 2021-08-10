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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-preview d-block' ); ?>>
    <a href="<?php the_permalink(); ?>" class="single-post-preview__image-wrapper overflow-hidden position-relative d-block hover-opacity-0-75">

        <?php if ( has_post_thumbnail() ): ?>

            <?php $image = get_post_thumbnail_id( $post->ID ); ?>

            <?= wp_get_attachment_image( $image, "add-here-thumbnail-size", "", array( "class" => "single-post-preview__image d-block img-fluid object-fit-cover object-fit-cover--centered lazyload position-absolute", "data-lazy"=>"true") ); ?>

        <?php endif; ?>

    </a>
    <div class="single-post-preview__content-wrapper c-p-5 position-relative">

        <?php if ( ! empty( $terms_post_category ) && ! is_wp_error( $terms_post_category ) ): ?>

            <ul class="single-post-preview__categories list-unstyled">

                <?php foreach ( $terms_post_category as $key => $term ): ?>

                    <li class="d-inline-flex line-height-1">
                        <a href="<?= get_post_type_archive_link('post'); ?>?type=<?= $term->slug; ?>" class="single-post-preview__category d-block font-weight-bold font-size-14 line-height-1 text-hover-primary"><?= $term->name; ?></a>
                    </li>

                <?php endforeach; ?>

            </ul>

        <?php endif; ?>

        <h2>
            <a href="<?php the_permalink(); ?>" class="single-post-preview__title-wrapper d-block c-mt-2 text-hover-primary">
                <?php the_title(); ?>
            </a>
        </h2>

        <?php $excerpt = get_the_excerpt(); ?>
        <?php if ($excerpt): ?>

            <span class="d-block c-mt-4">
                <?php cut_text($excerpt); ?>
            </span>

        <?php endif; ?>

        <a href="<?php the_permalink(); ?>" class="crunch-button crunch-button__text-only crunch-button__text-only--primary-color crunch-button__text-only--medium">Read more</a>
    </div>
</article>

