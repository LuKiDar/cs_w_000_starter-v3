<?php
/**
 * Customize theme
 */

function cs__customize_register( $wp_customize ){
	// --- 1. Header Section ---
	$wp_customize->add_section('cs_header_section', array(
		'title'				=> __('Header', CSWP),
		'priority'			=> 101,
	));

	$wp_customize->add_setting('cs_header_button_text', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('cs_header_button_text', array(
		'label'				=> __('Button Text', CSWP),
		'type'				=> 'text',
		'section'			=> 'cs_header_section',
	));

	$wp_customize->add_setting('cs_header_button_url', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('cs_header_button_url', array(
		'label'				=> __('Button URL', CSWP),
		'type'				=> 'url',
		'section'			=> 'cs_header_section',
	));

	$wp_customize->add_setting('cs_header_button_new_tab', array(
		'default'			=> false,
		'type'				=> 'option',
		'sanitize_callback'	=> 'wp_validate_boolean',
	));
	$wp_customize->add_control('cs_header_button_new_tab', array(
		'label'				=> __('Open link in a new window', CSWP),
		'type'				=> 'checkbox',
		'section'			=> 'cs_header_section',
	));

	// --- 2. Social Networks Section ---
	$wp_customize->add_section('cs_social_section', array(
		'title'				=> __('Social Networks', CSWP),
		'priority'			=> 102,
	));

	$social_networks = array('Email', 'Facebook', 'Instagram', 'LinkedIn', 'Twitter', 'YouTube');
	foreach ( $social_networks as $network ){
		$slug = strtolower($network);

		$wp_customize->add_setting("cs_social_{$slug}", array(
			'default'			=> '',
			'type'				=> 'option',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control("cs_social_{$slug}", array(
			'label'				=> sprintf(__('%s', CSWP), $network),
			'type'				=> ( $slug=='email' ) ? 'text' : 'url',
			'section'			=> 'cs_social_section',
		));
	}

	// --- 3. Footer Section ---
	$wp_customize->add_section('cs_footer_section', array(
		'title'				=> __('Footer', CSWP),
		'priority'			=> 121,
	));

	$wp_customize->add_setting('cs_footer_logo', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback'	=> 'absint',
	) );
	$wp_customize->add_control( new WP_Customize_Media_Control($wp_customize, 'cs_footer_logo', array(
		'label'				=> __('Footer Logo', CSWP),
		'section'			=> 'cs_footer_section',
		'mime_type'			=> 'image'
	) ) );	

	$wp_customize->add_setting('cs_footer_button_text', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('cs_footer_button_text', array(
		'label'				=> __('Button Text', CSWP),
		'type'				=> 'text',
		'section'			=> 'cs_footer_section',
	));

	$wp_customize->add_setting('cs_footer_button_url', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('cs_footer_button_url', array(
		'label'				=> __('Button URL', CSWP),
		'type'				=> 'url',
		'section'			=> 'cs_footer_section',
	));

	$wp_customize->add_setting('cs_footer_button_new_tab', array(
		'default'			=> false,
		'type'				=> 'option',
		'sanitize_callback'	=> 'wp_validate_boolean',
	));
	$wp_customize->add_control('cs_footer_button_new_tab', array(
		'label'				=> __('Open link in a new window', CSWP),
		'type'				=> 'checkbox',
		'section'			=> 'cs_footer_section',
	));

	$wp_customize->add_setting('cs_footer_contact_info', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback'	=> 'wp_kses_post',
	));
	$wp_customize->add_control('cs_footer_contact_info', array(
		'label'				=> __('Contact Info (HTML allowed)', CSWP),
		'type'				=> 'textarea',
		'section'			=> 'cs_footer_section',
	));

	$wp_customize->add_setting('cs_footer_copyright', array(
		'default'			=> '© 2025 Copyright',
		'type'				=> 'option',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('cs_footer_copyright', array(
		'label'				=> __('Copyright Text', CSWP),
		'type'				=> 'text',
		'section'			=> 'cs_footer_section',
	));
}
add_action('customize_register', 'cs__customize_register');