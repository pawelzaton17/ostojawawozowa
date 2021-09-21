<?php
$logo = get_field( 'header_logo', 'options' );
?>
<nav class="navbar p-0">
    <div class="navbar__wrapper container">
        <div class="row align-items-center justify-content-between w-100 no-gutters c-m-0">
            <div class="col-8 col-md-3 col-lg-10 col-xxl-8 navbar__col d-flex align-items-center">
                <div class="row w-100">
                    <div class="col-4 navbar__logo-col c-pl-lg-5 d-lg-flex position-relative">

                        <?php if ( $logo ) : ?>

                        <a href="<?= esc_url( home_url( '/' ) ); ?>" class="navbar-brand navbar__logo-wrapper position-relative hover-opacity-0-75 p-0 my-0 ml-0 c-mr-3 d-flex align-items-center justify-content-start">
                            <img src="<?= $logo['url'] ?>" alt="<?= get_bloginfo('name'); ?>" class="navbar-brand__logo d-block adjustable-element" />
                        </a>

                        <?php endif; ?>

                    </div>

                    <?php if ( have_rows( 'h_nav', 'options' )) : ?>

                    <div class="col-8 c-pl-lg-6 d-none d-lg-block">
                        <ul class="list-unstyled d-flex c-mb-0">

                            <?php
                            while ( have_rows( 'h_nav', 'options' )) : the_row();
                                $link = get_sub_field( 'link' );

                                if ( $link ) {
                                    $link_url    = $link['url'];
                                    $link_title  = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                }
                            ?>

                            <li class="navbar__quick-nav-item">
                                <a
                                    href="<?= esc_url($link_url); ?>"
                                    target="<?= esc_attr($link_target); ?>" <?php if($link_target != '_self') echo 'rel="'.esc_attr('nofollow').'"'; ?>
                                    class="navbar__quick-nav-link text-decoration-none font-size-18 js-scroll-to"
                                >

                                    <?= esc_html($link_title); ?>

                                </a>
                            </li>

                            <?php endwhile; ?>

                        </ul>
                    </div>

                    <?php endif; ?>

                </div>
            </div>
            <div class="col-4 col-md-2 c-p-0 d-flex justify-content-end">

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

                <div class="bg-secondary position-relative navbar__burger-wrapper w-100 d-flex align-items-center">
                    <a class="mburger position-absolute h-100 mburger--spin js-mburger d-flex align-items-center text-decoration-none" href="#mobile-navigation">
                        <div>
                            <b></b>
                            <b></b>
                            <b></b>
                        </div>
                        <span class="font-family-primary font-size-18 c-pl-md-3 c-pl-lg-5">
                            Menu
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
