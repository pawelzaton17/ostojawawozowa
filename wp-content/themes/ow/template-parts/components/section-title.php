<?php
$section_title = $args[ 'title' ];

if ( ! empty( $section_title ) ) :
?>

<div class="section-title">
    <h2 class="section-title__heading d-flex flex-column font-weight-bold text-gray-second">

        <?= $section_title; ?>

        <i class="line c-mt-1"></i>
    </h2>
</div>

<?php
endif;
