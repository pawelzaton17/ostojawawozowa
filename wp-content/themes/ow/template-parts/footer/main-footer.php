<?php
$form_title    = get_field( 'f_form_title', 'options' );
$form_id       = get_field( 'f_form_id', 'options' );
$contact_title = get_field( 'f_contact_title', 'options' );
$custom_id     = get_field( 'f_custom_id', 'options' );

if ( ! empty( $custom_id ) ) {
    $id = "id='{$custom_id}'";
}
?>
<div <?= $id; ?> class="js-main-footer-wrapper">
    <footer class="main-footer text-white bg-primary">
        <div class="container c-pt-10">
            <div class="row">
                <div class="col-md-6 c-mb-6 c-mb-md-0">
                    <h2 class="main-footer__title c-pb-4 c-pb-md-3 position-relative font-weight-bold font-size-36">

                        <?= $form_title; ?>

                    </h2>
                    <div class="main-footer__form-wrapper c-mt-7">

                        <?= $form_id; ?>

                        <div class="c-mt-4 font-size-10">
                            <p>Klikając przycisk wyślij potwierdzasz, że przeczytałaś(eś) <a href="<?= esc_url( home_url( '/' ) ); ?>regulamin" class="text-white" target="_blank">Regulamin</a> i akceptujesz jego treść.</p>
                            <p>Ta strona jest chroniona przez reCAPTCHA i mają zastosowanie <a href="<?= esc_url( home_url( '/' ) ); ?>polityka-prywatnosci" class="text-white" target="_blank">Polityka Prywatności</a> i <a href="https://policies.google.com/terms" class="text-white" target="_blank">Warunki korzystania z usług Google</a>.</p>
                        </div>
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
        <div class="container">
            <div class="row">
                <div class="main-footer__copyrights-col col-12 c-mt-7 c-mt-md-4 c-mt-xl-0">
                    <p class="font-size-10 c-m-0">Informacje zamieszczone na stronie internetowej nie stanowią oferty handlowej w rozumieniu przepisów Kodeksu Cywilnego, mają charakter wyłącznie reklamowy. Szczegółowe warunki zakupu określane są na podstawie indywidualnej umowy sprzedaży (umowy deweloperskiej).</p>
                    <ul class="list-unstyled d-flex font-size-10">
                        <li><a href="<?= esc_url( home_url( '/' ) ); ?>polityka-prywatnosci" class="text-white" target="_blank">Polityka prywatnosci</a></li>
                        <li><a href="<?= esc_url( home_url( '/' ) ); ?>regulamin" class="text-white" target="_blank">Regulamin</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-dark-green c-py-2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
					    <span class="main-footer__copyrights">
                            <p class="c-m-0"> OstojaWąwozowa © 2021</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
	</footer>
</div>
