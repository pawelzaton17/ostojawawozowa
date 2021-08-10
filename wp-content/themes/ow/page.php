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
    <h1 class="font-family-primary">Heading 1</h1>
    <h2>Heading 2</h2>
    <h3>Heading 3</h3>
    <h4>Heading 4</h4>
    <h5>Heading 5</h5>
    <h6>Heading 6</h6>

    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</main>

<?php

get_footer();
