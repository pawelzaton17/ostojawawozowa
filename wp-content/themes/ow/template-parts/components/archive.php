<div class="container">
    <div class="row c-mb-4">
        <div class="col-md-10 col-lg-9 col-xl-8 mx-auto">
            <div class="entry-content">
                <span class="first-element-fix"></span>
                <div id="acf-block-spacer-block_61347db1c9211" class="c-pt-8"></div>
                <div id="acf-block-spacer-block_61293ecfbfcb5" class="c-pt-8"></div
                <div id="acf-block-spacer-block_61347de2c9213" class="c-pt-3"></div>
            </div>
        </div>
    </div>
</div>
<section class="archive-posts">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center justify-content-md-start c-py-6">
                <div class="section-title w-100 text-center">
                    <h2 class="section-title__heading flex-column font-weight-bold text-gray-second d-inline-flex align-items-center">
                        Dziennik budowy
                        <i class="line c-mt-3"></i>
                    </h2>
                </div>
            </div>
        </div>

        <?php
        $cat_args=array(
            'orderby' => 'name',
            'order' => 'ASC'
        );
        $categories   = get_categories( $cat_args );
        $categories_i = 0;

        foreach ( $categories as $category ) :
            $args = array (
                'showposts' => -1,
                'category__in' => array( $category -> term_id ),
                'ignore_sticky_posts'=> 1
            );
            $posts     = get_posts( $args );
            $cat_name  = get_category_link( $category -> name );
            $cat_label = get_field( 'cat_label', $category -> taxonomy . '_' . $category -> term_id );

            if ( $posts ) :
                ?>

                <div class="single-post-preview__category-wrapper text-center<?= $categories_i == 0 ? ' c-mt-4' : ' c-mt-10' ?>">
                    <h3 class="font-size-36 font-weight-bold text-gray-second">

                        <?= $category -> name; ?>

                    </h3>
                    <p class="text-light-gray c-m-0">

                        <?= $cat_label; ?>

                    </p>
                </div>

                <?php
                foreach( $posts as $post ) :

                    get_template_part('template-parts/components/single-post-preview');

                endforeach;
            endif;

            $categories_i++;
        endforeach;
        ?>

    </div>
</section>
