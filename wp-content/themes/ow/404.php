<?php
    /**
    *   The template for displaying 404 pages (not found)
    *
    *   @package Crunch
    *   @since 4.3.0
    */
?>

<?php get_header(); ?>

<main id="main">
    <?php get_template_part('template-parts/components/hero-section'); ?>

    <div class="text-center c-py-8">
        <div class="entry-content c-mt-4">
            <?php the_field( 'error_404_content', 'options' ); ?>
        </div>
        <a href="<?= get_home_url(); ?>" class="crunch-button crunch-button__full-background crunch-button__full-background--primary-color c-mt-5">Back to Home</a>
    </div>

</main>

<?php get_footer(); ?>
