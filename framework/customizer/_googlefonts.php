<?php
function haxel_customize_register_google_fonts($wp_customize) {
    $wp_customize->add_section(
        'haxel_typo_options',
        array(
            'title'     => __('Google Web Fonts','haxel'),
            'priority'  => 41,
            'panel' => 'haxel_design_panel'
        )
    );

    $font_array = array('Ubuntu','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo 27px','Lora');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'haxel_title_font',
        array(
            'default'=> 'Ubuntu',
            'sanitize_callback' => 'haxel_sanitize_gfont'
        )
    );

    function haxel_sanitize_gfont( $input ) {
        if ( in_array($input, array('Ubuntu','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo 27px','Lora') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'haxel_title_font',array(
            'label' => __('Title','haxel'),
            'settings' => 'haxel_title_font',
            'section'  => 'haxel_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'haxel_body_font',
        array(	'default'=> 'Ubuntu',
            'sanitize_callback' => 'haxel_sanitize_gfont' )
    );

    $wp_customize->add_control(
        'haxel_body_font',array(
            'label' => __('Body','haxel'),
            'settings' => 'haxel_body_font',
            'section'  => 'haxel_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );
}
add_action('customize_register', 'haxel_customize_register_google_fonts');