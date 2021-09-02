<nav id="mobile-navigation" class="js-mobile-navigation">
    <div id="subpanel" class="panel">

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
