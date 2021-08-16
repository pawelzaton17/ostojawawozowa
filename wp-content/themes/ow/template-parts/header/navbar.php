<nav class="navbar d-none p-0">
    <span class="sr-only">Main navigation</span>
    <div class="container">
        <div class="row align-items-center justify-content-between w-100 no-gutters">
            <div class="col col-auto">

                <?php $logo = get_field( 'header_logo', 'options' ); ?>
                <?php if ($logo): ?>

                    <a href="<?= esc_url( home_url( '/' ) ); ?>" class="navbar-brand hover-opacity-0-75 p-0 my-0 ml-0 c-mr-3 d-flex align-items-center justify-content-start">
                        <img src="<?= $logo['url'] ?>" alt="<?= get_bloginfo('name'); ?>" class="navbar-brand__logo d-block adjustable-element" />
                    </a>

                <?php endif; ?>

            </div>
            <div class="col col-auto">
                <?php
                    wp_nav_menu([
                        'menu'            => 'Main Navigation',
                        'theme_location'  => 'main_navigation',
                        'container_id'    => false,
                        'menu_id'         => false,
                        'menu_class'      => 'navbar-nav d-none d-lg-flex flex-row position-relative js-main-navigation-animation',
                        'depth'           => 2,
                        'fallback_cb'     => 'bs4navwalker::fallback',
                        'walker'          => new bs4navwalker()
                    ]);
                ?>

                <a class="mburger mburger--spin js-mburger d-block d-lg-none" href="#mobile-navigation">
                    <b></b>
                    <b></b>
                    <b></b>
                </a>
            </div>
        </div>
    </div>
</nav>
