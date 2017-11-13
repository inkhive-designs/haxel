<?php
function haxel_customize_register_menu($wp_customize) {
    //Settings for Nav Area
    $wp_customize->add_section(
        'haxel_menu_basic',
        array(
            'title'     => __('Menu Settings','haxel'),
            'priority'  => 0,
            'panel'     => 'nav_menus'
        )
    );

    $wp_customize->add_setting( 'haxel_disable_nav_desc' , array(
        'default'     => true,
        'sanitize_callback' => 'haxel_sanitize_checkbox',
    ) );

    $wp_customize->add_control(
        'haxel_disable_nav_desc', array(
        'label' => __('Disable Description of Menu Items','haxel'),
        'section' => 'haxel_menu_basic',
        'settings' => 'haxel_disable_nav_desc',
        'type' => 'checkbox'
    ) );

    $wp_customize->add_setting( 'haxel_disable_active_nav' , array(
        'default'     => true,
        'sanitize_callback' => 'haxel_sanitize_checkbox',
    ) );

    $wp_customize->add_control(
        'haxel_disable_active_nav', array(
        'label' => __('Disable Highlighting of Current Active Item on the Menu.','haxel'),
        'section' => 'nav',
        'settings' => 'haxel_disable_active_nav',
        'type' => 'checkbox'
    ) );
}
add_action('customize_register', 'haxel_customize_register_menu');