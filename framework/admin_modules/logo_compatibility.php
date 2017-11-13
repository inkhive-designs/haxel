<?php

//Backwards Compatibility FUnction
function haxel_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}

function haxel_has_logo() {
    if (function_exists( 'has_custom_logo')) {
        if ( has_custom_logo() ) {
            return true;
        }
    } else {
        return false;
    }
}