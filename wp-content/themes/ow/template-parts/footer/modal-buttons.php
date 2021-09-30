<?php if ( have_rows( 'modal_buttons', 'options' ) ) : ?>

<ul class="main-footer__buttons d-none d-md-flex flex-column list-unstyled z-index-2 align-items-end position-fixed d-flex c-m-0">

    <?php
    while ( have_rows( 'modal_buttons', 'options' ) ) : the_row();
        $icon_id  = get_sub_field( 'icon' );
        $text     = get_sub_field( 'text' );
        $modal_id = get_sub_field( 'modal_id' );
    ?>

    <li
        class="main-footer__buttons-item js-modal-trigger z-index-2 overflow-hidden d-flex<?= empty( $text ) ? ' main-footer__buttons-item--alt' : null; ?>"
        data-target-modal="<?= $modal_id; ?>"
    >
        <figure class="c-mb-0">

            <?= wp_get_attachment_image( $icon_id, "full", "", array( "class" => "main-footer__icon d-block h-auto w-100 lazyload", "data-lazy" => "true") ); ?>

        </figure>

        <?php if ( ! empty( $text ) ) : ?>

        <h6 class="main-footer__buttons-item-text d-flex js-main-footer-buttons-text align-items-center font-size-14">

            <?= $text; ?>

        </h6>

        <?php endif; ?>

    </li>

    <?php endwhile; ?>

</ul>

<?php endif; ?>
