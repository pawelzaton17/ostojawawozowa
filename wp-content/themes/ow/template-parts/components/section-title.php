<?php
$section_title = $args[ 'title' ];

if ( ! empty( $section_title ) ) :
?>

<div class="section-title">
    <h2 class="d-flex flex-column">

        <?= $section_title; ?>

        <i class="line"></i>
    </h2>
</div>

<?php
endif;
