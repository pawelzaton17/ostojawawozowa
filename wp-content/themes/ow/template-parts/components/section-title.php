<?php
$section_title = $args[ 'title' ];
$center_title  = $args[ 'center' ];

if ( ! empty( $section_title ) ) :
?>

<div class="section-title">
    <h2 class="section-title__heading flex-column font-weight-bold text-gray-second<?= $center_title ? ' d-inline-flex align-items-center' : ' d-flex' ?>">

        <?= $section_title; ?>

        <i class="line c-mt-3"></i>
    </h2>
</div>

<?php
endif;
