<?php
    /*
        Template Name: Kitchen Sink
    *
    *   @package Crunch
    *   @since 6.0.1
    */
?>

<?php get_header(); the_post(); ?>

<main id="main" class="kitchen-sink-template">
    <div class="container">

        <!-- tiny slider example -->
        <div class="js-tiny-slider crunch-tiny-slider">
            <div class="js-tiny-slider-row">
                <div class="tiny-slider-item text-center">
                    <img src="<?= get_template_directory_uri(); ?>/images/img__empty.png" data-src="https://via.placeholder.com/200x250" alt="Placeholder Image" class="crunch-tiny-slider__item-image tns-lazy-img" />
                </div>
                <div class="tiny-slider-item text-center">
                    <img src="<?= get_template_directory_uri(); ?>/images/img__empty.png" data-src="https://via.placeholder.com/200x250" alt="Placeholder Image" class="crunch-tiny-slider__item-image tns-lazy-img" />
                </div>
                <div class="tiny-slider-item text-center">
                    <img src="<?= get_template_directory_uri(); ?>/images/img__empty.png" data-src="https://via.placeholder.com/200x250" alt="Placeholder Image" class="crunch-tiny-slider__item-image tns-lazy-img" />
                </div>
                <div class="tiny-slider-item text-center">
                    <img src="<?= get_template_directory_uri(); ?>/images/img__empty.png" data-src="https://via.placeholder.com/200x250" alt="Placeholder Image" class="crunch-tiny-slider__item-image tns-lazy-img" />
                </div>
                <div class="tiny-slider-item text-center">
                    <img src="<?= get_template_directory_uri(); ?>/images/img__empty.png" data-src="https://via.placeholder.com/200x250" alt="Placeholder Image" class="crunch-tiny-slider__item-image tns-lazy-img" />
                </div>
            </div>
            <!-- If you need to use custom controls container uncomment lines below, else remove it -->
            <!-- <div class="crunch-tiny-slider__controls js-crunch-tiny-slider-custom-controls">
                <button type="button" class="crunch-tiny-slider__control-button crunch-tiny-slider-button-prev hover-opacity-0-75 bg-transparent border-0">
                    <svg class="crunch-tiny-slider__control-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 253.21 442.83"><title>icon__chevron-regular-left--black-color</title><path d="M229.9,439.31l19.8-19.79a12,12,0,0,0,0-17L69,221.41,249.7,40.28a12,12,0,0,0,0-17L229.9,3.51a12,12,0,0,0-17,0L3.51,212.93a12,12,0,0,0,0,17L212.93,439.31A12,12,0,0,0,229.9,439.31Z"/></svg>
                </button>
                <button type="button" class="crunch-tiny-slider__control-button crunch-tiny-slider-button-next hover-opacity-0-75 bg-transparent border-0">
                    <svg class="crunch-tiny-slider__control-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 253.21 442.83"><title>icon__chevron-regular-right--black-color</title><path d="M23.31,3.52,3.51,23.31a12,12,0,0,0,0,17l180.7,181.13L3.51,402.54a12,12,0,0,0,0,17l19.8,19.79a12,12,0,0,0,17,0L249.7,229.9a12,12,0,0,0,0-17L40.28,3.52A12,12,0,0,0,23.31,3.52Z"/></svg>
                </button>
            </div> -->
        </div>
    </div>

    <section class="intro">

        <?php $image = get_field( 'image' ); ?>
        <?php if ($image): ?>

            <?php $thumbnail_id = get_post_thumbnail_id( $post->ID ); ?>
            <?php $url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
            <?php $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>
            <?php $placeholder_url = get_template_directory_uri().'/images/img__placeholder.png'; ?>
            <?php $placeholder_alt = 'Featured image placeholder'; ?>

            <img src="<?= get_template_directory_uri(); ?>/images/img__empty.png" data-src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>" class="lazyload d-block" />

            <div class="d-flex align-items-center justify-content-center mx-auto">
                <img src="<?= get_template_directory_uri(); ?>/images/img__empty.png" data-src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" class="d-block adjustable-element lazyload" />
            </div>

            <!-- Lazyload -->
            <?= wp_get_attachment_image( $image, "full", "", array( "class" => "d-block h-auto w-100 lazyload", "data-lazy" => "true") ); ?>

            <!-- Lazyload + object-fit -->
            <?= wp_get_attachment_image( $image, "1920-auto", "", array( "class" => "object-fit-cover d-block w-100 lazyload", "data-lazy" => "true") ); ?>

             <!-- Front-end srcset with lazy -->

            <img class="lazyload d-block" src="images/img__empty.png" data-src="images/img__placeholder.png" data-srcset="images/img__placeholder.jpg 1x, images/img__placeholder-2x.jpg 2x" alt="Alt image">

            <!-- Front-end srcset -->

            <img src="images/img__placeholder.png" data-srcset="images/img__placeholder.jpg 1x, images/img__placeholder-2x.jpg 2x" alt="Alt image">

        <?php endif; ?>

        <div class="container c-my-5">
            <div class="position-relative" style="padding-bottom: 25%;">
                <img src="https://via.placeholder.com/1000x500" alt="Alt image" class="d-block position-absolute object-fit-cover w-100 h-100">
            </div>
        </div>

        <div class="container">
            <h1 class="intro__title">Hello World!</h1>
            <div class="entry-content c-my-6">
                <h2 class="js-match-height-by-class">Lorem h2</h2>
                <p ><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit. Explicabo nulla, <i>quae aperiam facere</i> veniam, delectus <u>minus eaque earum</u> reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! Facilis accusantium doloremque eaque.</p>
                <p ><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur <strong>adipisicing elit.</strong> Explicabo nulla, quae aperiam facere veniam, delectus minus eaque earum reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! <b>Facilis accusantium</b> doloremque eaque.</p>
                <h3 >Lorem h3</h3>
                <p> <a href="#0">Lorem ipsum dolor</a> sit amet, consectetur <strong>adipisicing elit.</strong> Explicabo nulla, quae aperiam facere veniam, delectus minus eaque earum reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! <b>Facilis accusantium</b> doloremque eaque.</p>
                <p class="js-match-height-by-class"><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur <strong>adipisicing elit.</strong> Explicabo nulla, quae aperiam facere veniam, delectus minus eaque earum reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! <b>Facilis accusantium</b> doloremque eaque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore vero nihil et nostrum recusandae est quam corporis officia, dolorem sunt.</p>
                <h4>Lorem h4</h4>
                <div class="row">
                    <div class="col-md-6">
                        <p data-mh="test"><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur <strong>adipisicing elit.</strong> Explicabo nulla, quae aperiam facere veniam, delectus minus eaque earum reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! <b>Facilis accusantium</b> doloremque eaque.</p>
                    </div>
                    <div class="col-md-6">
                        <p data-mh="test"><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit. Explicabo nulla, <i>quae aperiam facere</i> veniam, delectus <u>minus eaque earum</u> reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! Facilis accusantium doloremque eaque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore necessitatibus, in sunt porro culpa vero provident impedit deserunt rem iure.</p>
                    </div>
                </div>
                <h5 class="js-match-height-by-class">Lorem h5</h5>
                <p><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit. Explicabo nulla, <i>quae aperiam facere</i> veniam, delectus <u>minus eaque earum</u> reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! Facilis accusantium doloremque eaque.</p>
                <p><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit. Explicabo nulla, <i>quae aperiam facere</i> veniam, delectus <u>minus eaque earum</u> reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! Facilis accusantium doloremque eaque.</p>
                <h6>Lorem h6</h6>
                <p><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit. Explicabo nulla, <i>quae aperiam facere</i> veniam, delectus <u>minus eaque earum</u> reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! Facilis accusantium doloremque eaque.</p>
                <p><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit. Explicabo nulla, <i>quae aperiam facere</i> veniam, delectus <u>minus eaque earum</u> reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! Facilis accusantium doloremque eaque.</p>
            </div>

            <div id="test" class="row">

                <!-- Blog Categories -->

                <?php
                    $category_args = array(
                        "hide_empty" => 1,
                        "orderby"   => "name",
                        'parent'    => 0,
                        "order"     => "ASC"
                    );
                ?>

                <?php if(is_home() || is_category()) {
                    $categories = get_terms('category', $category_args);
                } ?>

                <?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ): ?>

                    <div class="post-category position-relative z-index-1 c-py-5">
                        <div class="crunch-dropdown dropdown c-mt-4 c-mt-md-0 d-md-none">
                            <button class="crunch-dropdown__button dropdown-toggle w-100 text-left position-relative font-weight-bold" id="dropdown-post-categories" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if(is_tax() || is_category()) { echo $current_category_name; } else { echo 'View All'; } ?>
                            </button>
                            <div class="dropdown-menu w-100 c-py-2" aria-labelledby="dropdown-post-categories">
                                <a class="dropdown-item<?php if(is_home()) echo ' active'; ?>" href="<?= get_permalink( get_option( 'page_for_posts' ) ) ?>">View All</a>

                                <?php foreach ( $categories as $category ): ?>

                                    <a class="dropdown-item<?php if($category->slug == $current_category_slug) echo ' active'; ?>" href="<?= esc_url( get_term_link( $category ) ); ?>"><?= $category->name; ?></a>

                                <?php endforeach; ?>
                            </div>
                        </div>
                        <ul class="post-category__list list-unstyled d-none d-md-flex flex-wrap justify-content-md-center c-pb-5 text-uppercase font-weight-extrabold">
                            <li class="category-item">
                                <a href="<?= get_permalink( get_option( 'page_for_posts' ) ) ?>" class="category-item__link crunch_button crunch-button__outline crunch-button__outline--small crunch-button__outline--black-color c-mr-3 c-mt-5<?php if( is_home() ) echo ' crunch-button__outline--focus crunch-button__outline--black-color--focus'; ?>">View All</a>
                            </li>

                            <?php foreach ( $categories as $category ): ?>

                                <li class="category-item">
                                    <a href="<?= esc_url( get_term_link( $category ) ); ?>" class="category-item__link c-mr-3 c-mt-5 crunch_button crunch-button__outline crunch-button__outline--small crunch-button__outline--black-color<?php if($category->slug == $current_category_slug) echo ' crunch-button__outline--focus crunch-button__outline--black-color--focus'; ?>"><?= $category->name; ?></a>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                    </div>

                <?php endif; ?>


                <!-- example of crunch dropdown -->

                <div class="crunch-dropdown dropdown c-mt-4 c-mt-md-0">
                    <button class="crunch-dropdown__button dropdown-toggle w-100 text-left position-relative" id="dropdown-taxonomy-collection-list" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="crunch-dropdown__label c-mr-6">Choose a collection</span>
                    </button>
                    <div class="dropdown-menu rounded-0 w-100 c-py-2" aria-labelledby="dropdown-taxonomy-collection-list">
                        <button type="button" class="dropdown-item c-px-4 c-py-2">All</button>
                        <button type="button" class="dropdown-item c-px-4 c-py-2">First</button>
                        <button type="button" class="dropdown-item c-px-4 c-py-2">Second</button>
                        <button type="button" class="dropdown-item c-px-4 c-py-2">Third</button>
                    </div>
                </div>


                <!-- example of crunch modal -->

                <button type="button" class="crunch-button crunch-button__full-background crunch-button__full-background--large crunch-button__full-background--primary-color" data-toggle="modal" data-target="#example-name-modal">
                  Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade js-modal crunch-modal" id="example-name-modal" tabindex="-1" role="dialog" aria-labelledby="example-name-modal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content border-0 rounded-0">
                            <button type="button" class="close border-0 bg-transparent position-absolute c-p-2" data-dismiss="modal" aria-label="Close">
                                <svg class="crunch-modal__close-icon d-block" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15.56 15.56">
                                    <defs>
                                        <style>
                                            .close-icon-line{fill:none;stroke:#ce0e2d;stroke-miterlimit:10;stroke-width:2px;}
                                        </style>
                                    </defs>
                                    <title>icon__close</title>
                                    <line class="close-icon-line" x1="0.71" y1="0.71" x2="14.85" y2="14.85"/>
                                    <line class="close-icon-line" x1="0.71" y1="14.85" x2="14.85" y2="0.71"/></svg>
                            </button>
                            <h2><?php the_title(); ?></h2>
                            <div class="entry-content c-mt-3">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod dignissimos non dolores repudiandae perspiciatis, laudantium voluptatibus, deserunt porro vero neque nobis ullam illo numquam at aspernatur, aliquid delectus in. Soluta sequi quibusdam numquam, veniam unde totam eos! Beatae perspiciatis accusantium quia porro iste ab cumque est. Labore eligendi necessitatibus, placeat.</p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem quis unde optio voluptatum eum eaque mollitia vitae ipsum, atque laudantium consequatur ut eligendi molestias nulla necessitatibus quam quod ea? Laudantium excepturi quisquam enim necessitatibus a possimus iste dicta, eveniet accusamus totam, aliquid asperiores. Pariatur, eligendi. Nemo, consectetur ea sed eius numquam dolores praesentium quam vero iste amet earum enim impedit quisquam ipsa adipisci commodi, et voluptatibus laboriosam voluptatum repellat soluta dicta omnis? Placeat voluptate vero quis cumque sunt, fuga dignissimos libero, architecto aliquid a atque autem similique, iusto sequi, officia. Perspiciatis consequuntur, ad, perferendis, eius, quos doloribus temporibus ab facilis officiis tempora magni quas voluptate modi? Quod nesciunt recusandae earum fugit nostrum autem, iusto eligendi rem culpa, ad expedita natus. Nemo accusantium voluptatum explicabo fuga aliquam fugit optio ad dolor magni distinctio quae rerum necessitatibus, deleniti odio nihil dolorem voluptatem cum asperiores commodi possimus iure. Dolore ea magni mollitia nesciunt tenetur commodi dolorem sequi quo placeat, obcaecati atque soluta quas sed, eveniet ratione error velit praesentium nemo adipisci, non? Molestiae voluptas beatae eveniet voluptatum. Quos sunt debitis reprehenderit est! Id autem expedita dignissimos non velit minima debitis eveniet minus consequuntur beatae aliquam, officiis nemo incidunt neque nam animi reprehenderit quaerat molestias ducimus reiciendis possimus? Fugiat quia harum veritatis laboriosam esse saepe explicabo tenetur ut, quis dicta excepturi vitae quaerat in. Pariatur, delectus maiores mollitia quia obcaecati autem provident tempora sed aspernatur cupiditate fugiat et tempore eum excepturi explicabo rerum enim id error commodi ut atque labore? Libero numquam delectus tempore dolorem ex quis provident perspiciatis, sit quibusdam magnam illo nam sequi dolor itaque sed voluptas! Aperiam deserunt dignissimos quae quos officiis neque quasi, deleniti nostrum assumenda, quaerat quo dolorum tempore illum aliquam itaque beatae magnam hic numquam facere! Fuga error beatae modi, provident, corporis fugiat molestiae. Illum ad distinctio at vitae consectetur optio excepturi iusto quidem, nobis voluptatem cupiditate animi nemo, repellat delectus accusamus? Ipsam iusto eius nulla earum deserunt, dolore adipisci libero itaque asperiores fugiat facere odit, non, sit aspernatur distinctio saepe animi, praesentium quibusdam ea sint? Consectetur illum laborum cumque neque cum ab ipsum sit fugiat accusantium. Magni obcaecati perferendis laborum explicabo rerum eaque. Blanditiis dolor natus veniam similique, aspernatur nostrum sunt unde tempora minus dignissimos minima eaque voluptates laudantium ex qui in, perspiciatis animi. Suscipit ducimus cupiditate praesentium, eligendi fuga totam quos nulla sunt aut iusto harum accusamus esse sint id voluptatem nam itaque, ipsa dicta porro molestias. Earum hic cumque, dolore quod? Cum quae quaerat a blanditiis placeat aspernatur quod, voluptatem voluptate reprehenderit sequi necessitatibus dicta eos tenetur qui. Nobis, debitis! Molestias a ipsam veniam asperiores nisi, libero delectus optio hic provident impedit dolor blanditiis minima quos dolore, sint, deserunt, expedita consequatur soluta quo et consectetur aliquid odio eveniet. Veritatis, iusto, optio. Facere placeat nisi magnam repellat nobis sequi cumque sit minima saepe aliquam repellendus architecto inventore libero molestias ipsa expedita, obcaecati totam ea neque iure magni at. Nobis, totam fuga saepe iste maiores. Provident inventore omnis aspernatur consequuntur rerum vitae maiores magnam nulla corrupti adipisci!</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias quam aliquam in, reprehenderit eum neque natus quo qui sed. Recusandae alias quos praesentium ut nobis, consectetur, sit quibusdam, libero consequuntur eius ducimus dolorum aliquam itaque sapiente possimus necessitatibus qui minus. Nobis ut nemo a earum explicabo cumque est sequi, omnis totam eos, atque laboriosam? Consequuntur tempore aperiam nemo ratione, corporis veniam totam commodi quam eius distinctio, ad modi! Blanditiis aliquid, possimus porro, error rem, animi delectus unde odio neque quod et rerum ea? Dolorem voluptate voluptatem labore cupiditate atque, consectetur blanditiis eligendi fugit rem non nemo iusto, modi quia quod deserunt, velit dignissimos magni quidem, quaerat veritatis. Laudantium, minus. Dolore pariatur possimus quae nulla est adipisci facere. Nostrum sint suscipit repellendus, optio, culpa reprehenderit adipisci, a corrupti nulla dolorem accusamus libero aliquam. Nisi iure atque quos distinctio tempora perspiciatis deserunt. Minus neque cumque, distinctio deleniti quod esse amet totam a eligendi quisquam laborum aut voluptatem laboriosam eaque ex aliquam, blanditiis temporibus fugiat quae, ipsam ratione? Nihil voluptas soluta cum dolorem qui nulla vero cumque hic, ipsa porro tempore fuga repellendus culpa magni ullam vel veritatis atque molestiae eum illo beatae sed unde alias! Illo mollitia, fugit aliquam itaque amet tenetur aspernatur, tempora minus non facere quibusdam! Error, praesentium eveniet nesciunt. Sequi, saepe. Soluta ut, sapiente numquam cumque rem omnis repellendus quo similique sequi, aliquam beatae natus magnam quos ex voluptates, impedit optio unde aperiam alias voluptate maxime corporis voluptatibus dolor. Quos corporis non quidem aspernatur labore ipsa repellendus adipisci perferendis qui iure eaque eligendi tenetur mollitia ipsam laboriosam, dignissimos corrupti doloremque. Ex corporis voluptatibus, vel? Saepe fuga libero asperiores natus nemo sunt aliquid inventore excepturi sint vero impedit, nostrum quasi beatae velit nobis ad fugiat totam minus assumenda veritatis deleniti necessitatibus nulla blanditiis quisquam incidunt. Perferendis et doloribus officiis ratione exercitationem aut rem architecto, veritatis inventore delectus maiores odio accusantium nobis. Repellendus dolores animi, itaque, aliquid totam at amet reiciendis maiores sunt sapiente tenetur fugit reprehenderit autem minima exercitationem omnis deleniti ipsum odit? Esse nam voluptate eveniet ea hic deserunt, repellendus iure ducimus quo. Repellat, aut ex. Nihil, quaerat eum quisquam quae veniam enim provident praesentium quidem dolor alias similique odit incidunt optio illo. Assumenda laboriosam deleniti ullam sequi laborum fugiat dolorum repellat asperiores dolore atque error expedita, aspernatur magnam officiis. Earum sunt cum error. Voluptatum esse tempore possimus facilis sint necessitatibus atque accusantium optio reiciendis laborum ipsam reprehenderit officiis, voluptates odit quae veritatis. Unde, minus voluptatibus autem nemo quisquam magnam omnis a facere! Labore reiciendis molestias vel necessitatibus cumque tempora aspernatur, soluta nisi. Dolor unde nulla ducimus quibusdam debitis corporis eius pariatur et iusto ipsa quidem eveniet facilis ea est iste, placeat amet itaque eum perspiciatis, velit nam impedit minima inventore ut, at? Facere quia suscipit repellendus, velit! Veniam vel facere velit rem maxime voluptate soluta cupiditate voluptatum, sed odit sequi labore ab aliquam cumque inventore perferendis incidunt provident ut voluptates quis at consequatur minima, corporis. Sapiente magnam consequuntur dolor voluptatibus porro sit id, iusto, facilis tenetur. Laudantium, nesciunt.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 ">

                    <!-- example of acf link field -->

                    <?php $link = get_field('link'); ?>
                    <?php if( $link ): ?>

                        <?php $link_url = $link['url']; ?>
                        <?php $link_title = $link['title']; ?>
                        <?php $link_target = $link['target'] ? $link['target'] : '_self'; ?>

                        <a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>" <?php if($link_target != '_self') echo 'rel="'.esc_attr('nofollow').'"'; ?> class="crunch-button crunch-button__full-background crunch-button__full-background--primary-color c-mt-5"><?= esc_html($link_title); ?></a>

                    <?php endif; ?>


                    <!-- Buttons -->

                    <div class="white-buttons" style="background: black; padding: 20px;">
                        <a href="#0" class="crunch-button crunch-button__full-background crunch-button__full-background--white-color crunch-button__full-background--small c-mt-5">Example Button</a>

                        <a href="#0" class="crunch-button crunch-button__full-background crunch-button__full-background--white-color crunch-button__full-background--medium c-mt-5">Example Button</a>

                        <a href="#0" class="crunch-button crunch-button__full-background crunch-button__full-background--white-color crunch-button__full-background--large c-mt-5">Example Button</a>

                        <a href="#0" class="crunch-button crunch-button__outline crunch-button__outline--white-color crunch-button__outline--small c-mt-5">Example Button</a>

                        <a href="#0" class="crunch-button crunch-button__outline crunch-button__outline--white-color crunch-button__outline--medium c-mt-5">Example Button</a>

                        <a href="#0" class="crunch-button crunch-button__outline crunch-button__outline--white-color crunch-button__outline--large c-mt-5">Example Button</a>

                        <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only--white-color crunch-button__text-only--small c-mt-5">Example Button</a>

                        <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only--white-color crunch-button__text-only--medium c-mt-5">Example Button</a>

                        <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only--white-color crunch-button__text-only--large c-mt-5">Example Button</a>

                        <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only-with-border-bottom crunch-button__text-only-with-border-bottom--white-color crunch-button__text-only--small c-mt-5">Example Button</a>

                        <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only-with-border-bottom crunch-button__text-only-with-border-bottom--white-color crunch-button__text-only--medium c-mt-5">Example Button</a>

                        <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only-with-border-bottom crunch-button__text-only-with-border-bottom--white-color crunch-button__text-only--large c-mt-5">Example Button</a>
                    </div>

                    <a href="#0" class="crunch-button crunch-button__full-background crunch-button__full-background--primary-color crunch-button__full-background--small c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__full-background crunch-button__full-background--primary-color crunch-button__full-background--medium c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__full-background crunch-button__full-background--primary-color crunch-button__full-background--large c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__outline crunch-button__outline--primary-color crunch-button__outline--small c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__outline crunch-button__outline--primary-color crunch-button__outline--medium c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__outline crunch-button__outline--primary-color crunch-button__outline--large c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only--primary-color crunch-button__text-only--small c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only--primary-color crunch-button__text-only--medium c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only--primary-color crunch-button__text-only--large c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only-with-border-bottom crunch-button__text-only-with-border-bottom--primary-color crunch-button__text-only--small c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only-with-border-bottom crunch-button__text-only-with-border-bottom--primary-color crunch-button__text-only--medium c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only-with-border-bottom crunch-button__text-only-with-border-bottom--primary-color crunch-button__text-only--large c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__full-background crunch-button__full-background--secondary-color crunch-button__full-background--small c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__full-background crunch-button__full-background--secondary-color crunch-button__full-background--medium c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__full-background crunch-button__full-background--secondary-color crunch-button__full-background--large c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__outline crunch-button__outline--secondary-color crunch-button__outline--small c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__outline crunch-button__outline--secondary-color crunch-button__outline--medium c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__outline crunch-button__outline--secondary-color crunch-button__outline--large c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only--secondary-color crunch-button__text-only--small c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only--secondary-color crunch-button__text-only--medium c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only--secondary-color crunch-button__text-only--large c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only-with-border-bottom crunch-button__text-only-with-border-bottom--secondary-color crunch-button__text-only--small c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only-with-border-bottom crunch-button__text-only-with-border-bottom--secondary-color crunch-button__text-only--medium c-mt-5">Example Button</a>

                    <a href="#0" class="crunch-button crunch-button__text-only crunch-button__text-only-with-border-bottom crunch-button__text-only-with-border-bottom--secondary-color crunch-button__text-only--large c-mt-5">Example Button</a>
                </div>
            </div>
        </div>
    </section>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>

    <div class="container">
        <a href="#gsnaptestid" class="c-my-10 d-inline-block bg-primary c-p-3 text-white">Click me</a>
        <h1>GSAP Effects</h1>
        <h2>Fade-up</h2>
    </div>

    <div class="c-py-10 bg-primary" data-anim="fade-up"></div>
    <div class="c-py-10 bg-secondary" data-anim="fade-up">
        <div class="container text-white font-size-32">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi rem, cupiditate debitis obcaecati quaerat fugit labore voluptatem, quibusdam distinctio corporis sequi inventore quod, quae laboriosam earum quas sunt laudantium saepe?
            Itaque consectetur saepe beatae molestias unde id, molestiae accusantium reiciendis qui eum, odio adipisci inventore aliquam sed, maiores quis aliquid facilis, voluptates alias harum quos? Quisquam animi maxime, numquam dolorem.
            Repellendus impedit dolorum laborum amet accusantium adipisci delectus cum earum, eligendi, molestiae beatae eveniet eaque, omnis quo fugit natus alias. Eveniet quibusdam voluptas amet dignissimos optio veritatis officiis consequatur fugiat.
            Unde vero magnam voluptatibus molestias tenetur esse porro, nihil reiciendis illo. Dignissimos, laudantium quis beatae doloribus molestias provident aspernatur ipsa nostrum nesciunt, dolores facilis error nam veniam assumenda neque. Ullam.
            Qui, sint, ipsum. Quam aliquam facilis obcaecati corporis error animi enim voluptatem eveniet recusandae fugit quidem porro similique consectetur, ut inventore ipsa perferendis sed doloribus. Nulla, iure. Pariatur, quae atque.
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi rem, cupiditate debitis obcaecati quaerat fugit labore voluptatem, quibusdam distinctio corporis sequi inventore quod, quae laboriosam earum quas sunt laudantium saepe?
            Itaque consectetur saepe beatae molestias unde id, molestiae accusantium reiciendis qui eum, odio adipisci inventore aliquam sed, maiores quis aliquid facilis, voluptates alias harum quos? Quisquam animi maxime, numquam dolorem.
            Repellendus impedit dolorum laborum amet accusantium adipisci delectus cum earum, eligendi, molestiae beatae eveniet eaque, omnis quo fugit natus alias. Eveniet quibusdam voluptas amet dignissimos optio veritatis officiis consequatur fugiat.
            Unde vero magnam voluptatibus molestias tenetur esse porro, nihil reiciendis illo. Dignissimos, laudantium quis beatae doloribus molestias provident aspernatur ipsa nostrum nesciunt, dolores facilis error nam veniam assumenda neque. Ullam.
            Qui, sint, ipsum. Quam aliquam facilis obcaecati corporis error animi enim voluptatem eveniet recusandae fugit quidem porro similique consectetur, ut inventore ipsa perferendis sed doloribus. Nulla, iure. Pariatur, quae atque.
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi rem, cupiditate debitis obcaecati quaerat fugit labore voluptatem, quibusdam distinctio corporis sequi inventore quod, quae laboriosam earum quas sunt laudantium saepe?
            Itaque consectetur saepe beatae molestias unde id, molestiae accusantium reiciendis qui eum, odio adipisci inventore aliquam sed, maiores quis aliquid facilis, voluptates alias harum quos? Quisquam animi maxime, numquam dolorem.
            Repellendus impedit dolorum laborum amet accusantium adipisci delectus cum earum, eligendi, molestiae beatae eveniet eaque, omnis quo fugit natus alias. Eveniet quibusdam voluptas amet dignissimos optio veritatis officiis consequatur fugiat.
            Unde vero magnam voluptatibus molestias tenetur esse porro, nihil reiciendis illo. Dignissimos, laudantium quis beatae doloribus molestias provident aspernatur ipsa nostrum nesciunt, dolores facilis error nam veniam assumenda neque. Ullam.
            Qui, sint, ipsum. Quam aliquam facilis obcaecati corporis error animi enim voluptatem eveniet recusandae fugit quidem porro similique consectetur, ut inventore ipsa perferendis sed doloribus. Nulla, iure. Pariatur, quae atque.
        </div>
    </div>
    <div id="gsnaptestid" class="c-py-10 bg-primary" data-anim="fade-up"></div>
    <div class="c-py-10 bg-secondary" data-anim="fade-up"></div>
    <div class="c-py-10 bg-primary" data-anim="fade-up"></div>

    <div class="container">
        <h2>Fade-In</h2>
    </div>

    <div class="c-py-10 bg-primary" data-anim="fade-in"></div>
    <div class="c-py-10 bg-secondary" data-anim="fade-in">
        <div class="container text-white font-size-32" data-anim="fade-in">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi rem, cupiditate debitis obcaecati quaerat fugit labore voluptatem, quibusdam distinctio corporis sequi inventore quod, quae laboriosam earum quas sunt laudantium saepe?
            Itaque consectetur saepe beatae molestias unde id, molestiae accusantium reiciendis qui eum, odio adipisci inventore aliquam sed, maiores quis aliquid facilis, voluptates alias harum quos? Quisquam animi maxime, numquam dolorem.
            Repellendus impedit dolorum laborum amet accusantium adipisci delectus cum earum, eligendi, molestiae beatae eveniet eaque, omnis quo fugit natus alias. Eveniet quibusdam voluptas amet dignissimos optio veritatis officiis consequatur fugiat.
            Unde vero magnam voluptatibus molestias tenetur esse porro, nihil reiciendis illo. Dignissimos, laudantium quis beatae doloribus molestias provident aspernatur ipsa nostrum nesciunt, dolores facilis error nam veniam assumenda neque. Ullam.
            Qui, sint, ipsum. Quam aliquam facilis obcaecati corporis error animi enim voluptatem eveniet recusandae fugit quidem porro similique consectetur, ut inventore ipsa perferendis sed doloribus. Nulla, iure. Pariatur, quae atque.
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi rem, cupiditate debitis obcaecati quaerat fugit labore voluptatem, quibusdam distinctio corporis sequi inventore quod, quae laboriosam earum quas sunt laudantium saepe?
            Itaque consectetur saepe beatae molestias unde id, molestiae accusantium reiciendis qui eum, odio adipisci inventore aliquam sed, maiores quis aliquid facilis, voluptates alias harum quos? Quisquam animi maxime, numquam dolorem.
            Repellendus impedit dolorum laborum amet accusantium adipisci delectus cum earum, eligendi, molestiae beatae eveniet eaque, omnis quo fugit natus alias. Eveniet quibusdam voluptas amet dignissimos optio veritatis officiis consequatur fugiat.
            Unde vero magnam voluptatibus molestias tenetur esse porro, nihil reiciendis illo. Dignissimos, laudantium quis beatae doloribus molestias provident aspernatur ipsa nostrum nesciunt, dolores facilis error nam veniam assumenda neque. Ullam.
            Qui, sint, ipsum. Quam aliquam facilis obcaecati corporis error animi enim voluptatem eveniet recusandae fugit quidem porro similique consectetur, ut inventore ipsa perferendis sed doloribus. Nulla, iure. Pariatur, quae atque.
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi rem, cupiditate debitis obcaecati quaerat fugit labore voluptatem, quibusdam distinctio corporis sequi inventore quod, quae laboriosam earum quas sunt laudantium saepe?
            Itaque consectetur saepe beatae molestias unde id, molestiae accusantium reiciendis qui eum, odio adipisci inventore aliquam sed, maiores quis aliquid facilis, voluptates alias harum quos? Quisquam animi maxime, numquam dolorem.
            Repellendus impedit dolorum laborum amet accusantium adipisci delectus cum earum, eligendi, molestiae beatae eveniet eaque, omnis quo fugit natus alias. Eveniet quibusdam voluptas amet dignissimos optio veritatis officiis consequatur fugiat.
            Unde vero magnam voluptatibus molestias tenetur esse porro, nihil reiciendis illo. Dignissimos, laudantium quis beatae doloribus molestias provident aspernatur ipsa nostrum nesciunt, dolores facilis error nam veniam assumenda neque. Ullam.
            Qui, sint, ipsum. Quam aliquam facilis obcaecati corporis error animi enim voluptatem eveniet recusandae fugit quidem porro similique consectetur, ut inventore ipsa perferendis sed doloribus. Nulla, iure. Pariatur, quae atque.
        </div>
    </div>
    <div id="gsnaptestid" class="c-py-10 bg-primary" data-anim="fade-in"></div>
    <div class="c-py-10 bg-secondary" data-anim="fade-in">
        <div class="container text-white entry-content">
            <h2 class="js-match-height-by-class" data-anim="fade-in">Lorem h2</h2>
            <p class="js-gsap-fade-in"><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit. Explicabo nulla, <i>quae aperiam facere</i> veniam, delectus <u>minus eaque earum</u> reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! Facilis accusantium doloremque eaque.</p>
            <p class="js-gsap-fade-in"><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur <strong>adipisicing elit.</strong> Explicabo nulla, quae aperiam facere veniam, delectus minus eaque earum reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! <b>Facilis accusantium</b> doloremque eaque.</p>
            <h3 class="js-gsap-fade-in">Lorem h3</h3>
            <p class="js-gsap-fade-in"> <a href="#0">Lorem ipsum dolor</a> sit amet, consectetur <strong>adipisicing elit.</strong> Explicabo nulla, quae aperiam facere veniam, delectus minus eaque earum reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! <b>Facilis accusantium</b> doloremque eaque.</p>
            <p class="js-match-height-by-class" data-anim="fade-in"><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur <strong>adipisicing elit.</strong> Explicabo nulla, quae aperiam facere veniam, delectus minus eaque earum reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! <b>Facilis accusantium</b> doloremque eaque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore vero nihil et nostrum recusandae est quam corporis officia, dolorem sunt.</p>
            <h4 class="js-gsap-fade-in">Lorem h4</h4>
            <div class="row" data-anim="fade-in">
                <div class="col-md-6">
                    <p data-anim="fade-in" data-mh="test"><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur <strong>adipisicing elit.</strong> Explicabo nulla, quae aperiam facere veniam, delectus minus eaque earum reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! <b>Facilis accusantium</b> doloremque eaque.</p>
                </div>
                <div class="col-md-6">
                    <p data-anim="fade-in" data-mh="test"><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit. Explicabo nulla, <i>quae aperiam facere</i> veniam, delectus <u>minus eaque earum</u> reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! Facilis accusantium doloremque eaque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore necessitatibus, in sunt porro culpa vero provident impedit deserunt rem iure.</p>
                </div>
            </div>
            <h5 class="js-match-height-by-class" data-anim="fade-in">Lorem h5</h5>
            <p class="js-gsap-fade-in"><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit. Explicabo nulla, <i>quae aperiam facere</i> veniam, delectus <u>minus eaque earum</u> reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! Facilis accusantium doloremque eaque.</p>
            <p class="js-gsap-fade-in"><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit. Explicabo nulla, <i>quae aperiam facere</i> veniam, delectus <u>minus eaque earum</u> reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! Facilis accusantium doloremque eaque.</p>
            <h6 class="js-gsap-fade-in">Lorem h6</h6>
            <p class="js-gsap-fade-in"><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit. Explicabo nulla, <i>quae aperiam facere</i> veniam, delectus <u>minus eaque earum</u> reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! Facilis accusantium doloremque eaque.</p>
            <p class="js-gsap-fade-in"><a href="#0">Lorem ipsum dolor</a> sit amet, consectetur adipisicing elit. Explicabo nulla, <i>quae aperiam facere</i> veniam, delectus <u>minus eaque earum</u> reprehenderit cupiditate, dolorum alias corrupti ipsa fugit consequatur! Facilis accusantium doloremque eaque.</p>
        </div>
    </div>
    <div class="c-py-10 bg-primary" data-anim="fade-in"></div>

    <div class="container">
        <h2>Long Fade-up</h2>
    </div>

    <div class="c-py-10 bg-primary" data-anim="fade-up-long"></div>
    <div class="c-py-10 bg-secondary" data-anim="fade-up-long"></div>
    <div class="c-py-10 bg-primary" data-anim="fade-up-long"></div>
    <div class="c-py-10 bg-secondary" data-anim="fade-up-long"></div>
    <div class="c-py-10 bg-primary" data-anim="fade-up-long"></div>
</main>

<?php get_footer(); ?>
