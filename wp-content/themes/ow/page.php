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

?>

<main id="main">
    <?php remove_empty_nodes_from_content(get_the_content()); ?>
</main>

<?php

get_footer();
