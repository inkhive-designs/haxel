<?php
function haxel_customize_register_sanitization($wp_customize) {
    /* Sanitization Functions Common to Multiple Settings go Here, Specific Sanitization Functions are defined along with add_setting() */
    function haxel_sanitize_checkbox( $input ) {
        if ( $input == 1 ) {
            return 1;
        } else {
            return '';
        }
    }

    function haxel_sanitize_positive_number( $input ) {
        if ( ($input >= 0) && is_numeric($input) )
            return $input;
        else
            return '';
    }

    function haxel_sanitize_category( $input ) {
        if ( term_exists(get_cat_name( $input ), 'category') )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'haxel_customize_register_sanitization');