<?php if(is_archive() && !is_search() && !is_tax() && !is_category()) {
    $title = get_queried_object()->labels->name;
} elseif(is_search()) {
    $title = 'Search';
} elseif(is_tax() || is_category()) {
    $title = 'Category: ' . get_queried_object()->name;
} elseif(is_tax() || is_category()) {
    $current_id = get_queried_object()->term_id;
    /* How to get custom field from any tax you are in:
    $id = get_taxonomy( get_queried_object()->taxonomy )->name."_".get_queried_object()->term_id;
    $content = get_field( 'content', $id );
    */
    $cat_name = get_taxonomy( get_queried_object()->taxonomy )->labels->singular_name;
    $title = $cat_name.': ' . get_queried_object()->name;
} elseif(is_404()) {
    $title = get_field( 'error_404_title', 'options' );
} else {
    $title = get_the_title();
} ?>

<section class="hero-section c-py-8 text-white bg-secondary">
    <div class="container">
        <h1><?= $title; ?></h1>
    </div>
</section>
