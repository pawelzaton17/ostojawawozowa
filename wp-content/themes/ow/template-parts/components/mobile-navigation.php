<nav id="mobile-navigation" class="js-mobile-navigation">
    <div id="subpanel" class="panel">

        <?php $logo = get_field( 'header_logo', 'options' ); ?>
        <?php if ($logo): ?>

            <a href="<?= esc_url( home_url( '/' ) ); ?>" class="mm-menu__logo-wrapper mx-auto d-flex align-items-center justify-content-center c-mt-3 c-mb-2">
                <img src="<?= $logo['url'] ?>" alt="<?= get_bloginfo('name'); ?>" class="mm-menu__logo d-block adjustable-element" />
            </a>

        <?php endif; ?>

        <?php
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
