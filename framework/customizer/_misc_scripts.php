<?php
function haxel_customize_register_misc_scripts($wp_customize){
    $wp_customize->add_section(
        'haxel_sec_upgrade',
        array(
            'title'     => __('Haxel - Help & Support','haxel'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'haxel_upgrade',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new WP_Customize_Upgrade_Control(
            $wp_customize,
            'haxel_upgrade',
            array(
                'label' => __('Thanks for Downloading.','haxel'),
                'description' => __('Thank you for Downloading Haxel Theme. We hope you are enjoying it. To see how this theme would look like after complete set up, check out its <a target="_blank" href="http://demo.inkhive.com/haxel/">demo blog</a>. Visit <a href="http://inkhive.com" target="_blank"> for any help','haxel'),
                'section' => 'haxel_sec_upgrade',
                'settings' => 'haxel_upgrade',
            )
        )
    );

    $wp_customize->add_section(
        'haxel_sec_upgrade_pro',
        array(
            'title'     => __('Discover Haxel Plus','haxel'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'haxel_upgrade_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new WP_Customize_Upgrade_Control(
            $wp_customize,
            'haxel_upgrade_pro',
            array(
                'label' => __('Want More Control & Features?','haxel'),
                'description' => __('Haxel Plus is the Powerful Version of Haxel, with Multiple Header Layouts, Unlimited Colors and fonts, Custom Widgets, Multiple Footer Columns, Custom Skin Designer, More Showcases and Featured Areas, etc. <a target="_blank" href="https://inkhive.com/product/haxel-plus/">More Details</a>.','haxel'),
                'section' => 'haxel_sec_upgrade_pro',
                'settings' => 'haxel_upgrade_pro',
            )
        )
    );
}
add_action('customize_register', 'haxel_customize_register_misc_scripts');