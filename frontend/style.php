<?php
$background_color = get_option('icecred_preloader')['background_color'];

if( $background_color == '' || $background_color == Null ) {
    $background_color = '#ffffff';
}
?>

<style type="text/css">
    #icecred-preloader-bg {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: <?php echo $background_color; ?>;
        z-index: 999999;
    }
    #icecred-preloader-image {
        /*width: 200px;*/
        top: 0;
        bottom: 0;
        margin: auto;
        position: absolute;
        left: 0;
        right: 0;
    }
</style>
