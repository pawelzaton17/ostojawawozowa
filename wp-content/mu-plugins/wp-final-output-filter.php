<?php

ob_start();

add_action( 'shutdown', function() {
    $final = '';

    $levels = ob_get_level();

    for ( $i = 0; $i < $levels; $i++ ) {
        $final .= ob_get_clean();
    }

    echo apply_filters( 'final_output', $final );
}, 0 );