<?php
$menu_logo_id = get_field( 'h_menu_logo', 'options' );
?>
<nav id="mobile-navigation" class="js-mobile-navigation">
    <div id="subpanel" class="panel">

        <?php if ( ! empty( $menu_logo_id ) ) : ?>

        <figure class="mobile-navigation__logo position-absolute c-mb-0">

            <?= wp_get_attachment_image( $menu_logo_id, "full", "", array( "class" => "d-block h-auto w-100 lazyload", "data-lazy" => "true") ); ?>

        </figure>

        <?php
        endif;

        wp_nav_menu(
            array(
                'container' => false,
                'menu_id' => false,
                'menu_class' => 'mobile-navigation',
                'menu' => 'Main navigation',
                'theme_location'  => 'main_navigation'
            )
        );
        ?>

    </div>
</nav>
