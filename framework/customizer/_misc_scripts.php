<?php
function haxel_customize_register_misc_scripts($wp_customize){
    $wp_customize->add_section(
        'haxel_sec_pro',
        array(
            'title'     => __('Important Links','haxel'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'haxel_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new WP_Customize_Upgrade_Control(
            $wp_customize,
            'haxel_pro',
            array(
                'description'	=> '<a class="haxel-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'haxel').'</a>
                                    <a class="haxel-important-links" href="https://demo.inkhive.com/haxel-plus/" target="_blank">'.__('Haxel Plus Live Demo', 'haxel').'</a>
                                    <a class="haxel-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'haxel').'</a>
                                    <a class="haxel-important-links" href="https://wordpress.org/support/theme/haxel/reviews" target="_blank">'.__('Review Haxel on WordPress', 'haxel').'</a>',
                'section' => 'haxel_sec_pro',
                'settings' => 'haxel_pro',
            )
        )
    );
}
add_action('customize_register', 'haxel_customize_register_misc_scripts');