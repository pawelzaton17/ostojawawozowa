<?php
$form_title    = get_field( 'f_form_title', 'options' );
$form_id       = get_field( 'f_form_id', 'options' );
$contact_title = get_field( 'f_contact_title', 'options' );
?>

<div class="js-main-footer-wrapper">
	<footer class="main-footer text-white bg-primary">
        <div class="container c-py-10">
            <div class="row">
                <div class="col-md-6 c-mb-6 c-mb-md-0">
                    <h2 class="main-footer__title c-pb-4 c-pb-md-3 position-relative font-weight-bold font-size-36">

                        <?= $form_title; ?>

                    </h2>
                    <div class="c-mt-7">

                        <?= $form_id; ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="main-footer__title c-pb-4 c-pb-md-3 position-relative font-weight-bold font-size-36">

                        <?= $contact_title; ?>

                    </h2>

                    <?php
                    if ( have_rows( 'f_contact_cols', 'options' ) ) :
                        $i = 0;
                    ?>

                    <div class="row c-mt-7">

                        <?php
                        while ( have_rows( 'f_contact_cols', 'options' ) ) : the_row();
                            $heading = get_sub_field( 'title' );
                            $content = get_sub_field( 'content' );

                            if ( ! empty( $heading ) && ! empty( $content ) ) :
                        ?>

                        <div class="col-lg-6<?= $i === 0 ? ' c-mb-6 c-mb-lg-0' : null; ?>">
                            <h4 class="main-footer__contact-title font-weight-bold">

                                <?= $heading; ?>

                            </h4>
                            <div class="entry-content c-mt-4">

                                <?= $content; ?>

                            </div>
                        </div>

                        <?php
                            endif;
                            $i++;
                        endwhile;
                        ?>

                    </div>

                    <?php endif; ?>

                    <?php if ( have_rows( 'f_socials', 'options' ) ) : ?>

                    <ul class="list-unstyled d-flex c-mt-7 c-mb-0">

                        <?php
                        while ( have_rows( 'f_socials', 'options' ) ) : the_row();
                            $icon_id = get_sub_field( 'icon' );
                            $link    = get_sub_field( 'link' );

                            if ( $link ) {
                                $link_url    = $link['url'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            }
                            if ( ! empty( $link ) && ! empty( $icon_id ) ) :
                        ?>

                        <li class="main-footer__socials-item">
                            <a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>" <?php if($link_target != '_self') echo 'rel="'.esc_attr('nofollow').'"'; ?>>

                                <?= wp_get_attachment_image( $icon_id, "full", "", array( "class" => "d-block h-auto w-100 lazyload", "data-lazy" => "true") ); ?>

                            </a>
                        </li>

                        <?php
                            endif;
                        endwhile;
                        ?>

                    </ul>

                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="bg-dark-green c-py-2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
					    <span class="main-footer__copyrights">

                            <?= get_bloginfo('name'); ?> © <?= date('Y'); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>
	</footer>
</div>
