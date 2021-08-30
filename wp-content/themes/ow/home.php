<?php get_header(); ?>

<main id="main">
    <section class="archive-posts">
        <div class="container">

        <?php
        if ( have_posts() ) :
            $i = 0;
            while ( have_posts() ) : the_post();
        ?>

            <?php get_template_part('template-parts/components/single-post-preview', null, ['index' => $i]); ?>

        <?php
            $i++;
            endwhile;
        endif
        ?>

        </div>
    </section>
</main>

<?php get_footer(); ?>
