<?php

if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

function icecred_preloader_frontend()
{
    include('frontend/html.php');
    include('frontend/style.php');
    include('frontend/js.php');
}

add_action( 'wp_head', 'icecred_preloader_frontend' );
