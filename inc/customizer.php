<?php
/**
 * elevkaren Theme Customizer
 *
 * @package elevkaren
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function elevkaren_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->add_section( 'edit_content', array(
		'title' => __( 'Redigera innehåll' ),
		'description' => __( 'Lägg till eller ta bort textinnehåll på förstasidan.' ),
		'priority' => 90,
	) );
	$wp_customize->add_setting( 'cta_text_setting' , array(
        'default'   => 'Bli medlem',
        'transport' => 'refresh',
    ) );
	$wp_customize->add_control( 'cta_text', array(
		'type' => 'text',
		'priority' => 10, // Within the section.
		'section' => 'edit_content', // Required, core or custom.
		'settings' => 'cta_text_setting',
		'label' => __( 'Call-To-Action knapp text' ),
		'description' => __( 'Vad ska det stå på knappen under titeln på förstasidan?' ),
	) );


	$wp_customize->add_setting( 'aboutus_image_setting' , array(
        'default'   => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',
        'transport' => 'refresh',
    ) );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'aboutus_image', array(
		'label' => __( 'Bild till presentation', 'theme_textdomain' ),
		'section' => 'edit_content',
		'mime_type' => 'image',
		'priority' => 20,
		'settings' => 'aboutus_image_setting',
	) ) );


	$wp_customize->add_setting( 'aboutus_title_setting' , array(
        'default'   => 'Låt oss presentera:',
        'transport' => 'refresh',
    ) );
	$wp_customize->add_control( 'aboutus_title', array(
		'type' => 'text',
		'priority' => 30, // Within the section.
		'section' => 'edit_content', // Required, core or custom.
		'settings' => 'aboutus_title_setting',
		'label' => __( 'Titel till presentation' ),
		'description' => __( 'Vad ska titeln vara till den första röda bannern?' ),
	) );


	$wp_customize->add_setting( 'aboutus_content_setting' , array(
        'default'   => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',
        'transport' => 'refresh',
    ) );
	$wp_customize->add_control( 'aboutus_content', array(
		'type' => 'textarea',
		'priority' => 40, // Within the section.
		'section' => 'edit_content', // Required, core or custom.
		'settings' => 'aboutus_content_setting',
		'label' => __( 'Text till presentation' ),
		'description' => __( 'Vad ska texten vara till den första röda bannern?' ),
		'input_attrs' => array(
			'style' => 'height:300px',
		),
	) );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'elevkaren_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'elevkaren_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'elevkaren_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function elevkaren_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function elevkaren_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function elevkaren_customize_preview_js() {
	wp_enqueue_script( 'elevkaren-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'elevkaren_customize_preview_js' );
