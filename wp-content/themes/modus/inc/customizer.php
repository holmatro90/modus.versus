<?php
/**
 * Modus Theme Customizer
 *
 * @package Modus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function modus_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'modus_customize_register' );

function modus_add_customizer_sections( $wp_customize ) {

    $social_sites = ct_modus_social_array();

    // set a priority used to order the social sites
    $priority = 5;

    // section
    $wp_customize->add_section( 'ct_modus_social_media_icons', array(
        'title'       => __( 'Social Media Icons', 'modus' ),
        'priority'    => 25,
        'description' => __( 'Add the URL for each of your social profiles.', 'modus' )
    ) );

    // create a setting and control for each social site
    foreach ( $social_sites as $social_site => $value ) {

        $label = ucfirst( $social_site );

        if ( $social_site == 'google-plus' ) {
            $label = 'Google Plus';
        } elseif ( $social_site == 'rss' ) {
            $label = 'RSS';
        } elseif ( $social_site == 'soundcloud' ) {
            $label = 'SoundCloud';
        } elseif ( $social_site == 'slideshare' ) {
            $label = 'SlideShare';
        } elseif ( $social_site == 'codepen' ) {
            $label = 'CodePen';
        } elseif ( $social_site == 'stumbleupon' ) {
            $label = 'StumbleUpon';
        } elseif ( $social_site == 'deviantart' ) {
            $label = 'DeviantArt';
        } elseif ( $social_site == 'hacker-news' ) {
            $label = 'Hacker News';
        } elseif ( $social_site == 'whatsapp' ) {
            $label = 'WhatsApp';
        } elseif ( $social_site == 'qq' ) {
            $label = 'QQ';
        } elseif ( $social_site == 'vk' ) {
            $label = 'VK';
        } elseif ( $social_site == 'wechat' ) {
            $label = 'WeChat';
        } elseif ( $social_site == 'tencent-weibo' ) {
            $label = 'Tencent Weibo';
        } elseif ( $social_site == 'paypal' ) {
            $label = 'PayPal';
        } elseif ( $social_site == 'email-form' ) {
            $label = 'Contact Form';
        }
        // setting
        $wp_customize->add_setting( $social_site, array(
            'sanitize_callback' => 'esc_url_raw'
        ) );
        // control
        $wp_customize->add_control( $social_site, array(
            'type'     => 'url',
            'label'    => $label,
            'section'  => 'ct_modus_social_media_icons',
            'priority' => $priority
        ) );
        // increment the priority for next site
        $priority = $priority + 5;
    }
}
add_action( 'customize_register', 'modus_add_customizer_sections' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function modus_customize_preview_js() {
	wp_enqueue_script( 'modus_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'modus_customize_preview_js' );
