<?php

/**
 * The template for displaying pages
 *
 * @package Crunch
 * @version 6.0
 */

defined('ABSPATH') || exit;

get_header();
the_post();

$is_archive_page = get_field( 'page_archive' );
?>

<main id="main">

    <?= $is_archive_page ? get_template_part('template-parts/components/archive') : null; ?>

    <?php remove_empty_nodes_from_content(get_the_content()); ?>

</main>

<?php

get_footer();
