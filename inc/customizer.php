<?php
/**
 * acr-theme Theme Customizer
 *
 * @package acr-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function acr_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'acr_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'acr_theme_customize_partial_blogdescription',
			)
		);
	}

	// ==========================================
	// SECTION PAGE D'ACCUEIL
	// ==========================================
	$wp_customize->add_section( 'acr_homepage_section', array(
		'title'       => __( 'Page d\'Accueil', 'acr-theme' ),
		'priority'    => 30,
		'description' => __( 'Personnalisez le contenu de votre page d\'accueil', 'acr-theme' ),
	) );

	// --- Section Hero ---
	$wp_customize->add_setting( 'acr_hero_title', array(
		'default'           => 'Atelier Cour Roland',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'acr_hero_title', array(
		'label'    => __( 'Hero - Titre Principal', 'acr-theme' ),
		'section'  => 'acr_homepage_section',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'acr_hero_subtitle', array(
		'default'           => 'Créativité et Savoir-Faire Artisanal',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'acr_hero_subtitle', array(
		'label'    => __( 'Hero - Sous-titre', 'acr-theme' ),
		'section'  => 'acr_homepage_section',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'acr_hero_description', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'acr_hero_description', array(
		'label'    => __( 'Hero - Description (optionnel)', 'acr-theme' ),
		'section'  => 'acr_homepage_section',
		'type'     => 'textarea',
	) );

	$wp_customize->add_setting( 'acr_hero_button_text', array(
		'default'           => 'Découvrir nos créations',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'acr_hero_button_text', array(
		'label'    => __( 'Hero - Texte du Bouton', 'acr-theme' ),
		'section'  => 'acr_homepage_section',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'acr_hero_button_url', array(
		'default'           => '#about',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'acr_hero_button_url', array(
		'label'    => __( 'Hero - Lien du Bouton', 'acr-theme' ),
		'section'  => 'acr_homepage_section',
		'type'     => 'url',
	) );

	// --- Section À Propos ---
	$wp_customize->add_setting( 'acr_about_title', array(
		'default'           => 'À Propos',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'acr_about_title', array(
		'label'    => __( 'À Propos - Titre', 'acr-theme' ),
		'section'  => 'acr_homepage_section',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'acr_about_content', array(
		'default'           => 'Découvrez notre passion pour l\'artisanat et notre engagement envers l\'excellence.',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'acr_about_content', array(
		'label'    => __( 'À Propos - Contenu', 'acr-theme' ),
		'section'  => 'acr_homepage_section',
		'type'     => 'textarea',
	) );

	$wp_customize->add_setting( 'acr_about_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'acr_about_image', array(
		'label'    => __( 'À Propos - Image', 'acr-theme' ),
		'section'  => 'acr_homepage_section',
	) ) );

	// --- Section À Propos 2 (Image à gauche) ---
	$wp_customize->add_setting( 'acr_about2_title', array(
		'default'           => 'Notre Histoire',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'acr_about2_title', array(
		'label'    => __( 'À Propos 2 - Titre', 'acr-theme' ),
		'section'  => 'acr_homepage_section',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'acr_about2_content', array(
		'default'           => 'Une tradition familiale transmise de génération en génération.',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'acr_about2_content', array(
		'label'    => __( 'À Propos 2 - Contenu', 'acr-theme' ),
		'section'  => 'acr_homepage_section',
		'type'     => 'textarea',
	) );

	$wp_customize->add_setting( 'acr_about2_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'acr_about2_image', array(
		'label'    => __( 'À Propos 2 - Image (à gauche)', 'acr-theme' ),
		'section'  => 'acr_homepage_section',
	) ) );

	// --- Section Services (Image) ---
	$wp_customize->add_setting( 'acr_services_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'acr_services_image', array(
		'label'    => __( 'Services - Image', 'acr-theme' ),
		'section'  => 'acr_homepage_section',
	) ) );

	// ==========================================
	// SECTION PAGE INSCRIPTION
	// ==========================================
	$wp_customize->add_section( 'acr_inscription_section', array(
		'title'       => __( 'Page Inscription', 'acr-theme' ),
		'priority'    => 31,
		'description' => __( 'Personnalisez le contenu de votre page d\'inscription', 'acr-theme' ),
	) );

	// --- Header Inscription ---
	$wp_customize->add_setting( 'acr_inscription_title', array(
		'default'           => 'Inscription',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'acr_inscription_title', array(
		'label'    => __( 'Titre Principal', 'acr-theme' ),
		'section'  => 'acr_inscription_section',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'acr_inscription_saison', array(
		'default'           => 'Saison 2025 - 2026',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'acr_inscription_saison', array(
		'label'    => __( 'Saison', 'acr-theme' ),
		'section'  => 'acr_inscription_section',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'acr_inscription_banderole', array(
		'default'           => 'Cours • Ateliers • Stages • Événements',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'acr_inscription_banderole', array(
		'label'    => __( 'Banderole (mots séparés par •)', 'acr-theme' ),
		'section'  => 'acr_inscription_section',
		'type'     => 'text',
	) );

	// --- Cards 1 et 2 (modèle complet avec prix et boutons) ---
	for ( $i = 1; $i <= 2; $i++ ) {
		// Titre de la card
		$wp_customize->add_setting( "acr_card_{$i}_title", array(
			'default'           => "Formule {$i}",
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( "acr_card_{$i}_title", array(
			'label'    => sprintf( __( 'Card %d - Titre', 'acr-theme' ), $i ),
			'section'  => 'acr_inscription_section',
			'type'     => 'text',
		) );

		// Prix
		$wp_customize->add_setting( "acr_card_{$i}_prix", array(
			'default'           => '393€/an',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( "acr_card_{$i}_prix", array(
			'label'    => sprintf( __( 'Card %d - Prix', 'acr-theme' ), $i ),
			'section'  => 'acr_inscription_section',
			'type'     => 'text',
		) );

		// 3 puces
		for ( $j = 1; $j <= 3; $j++ ) {
			$wp_customize->add_setting( "acr_card_{$i}_puce{$j}", array(
				'default'           => "Information {$j}",
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'refresh',
			) );
			$wp_customize->add_control( "acr_card_{$i}_puce{$j}", array(
				'label'    => sprintf( __( 'Card %d - Puce %d', 'acr-theme' ), $i, $j ),
				'section'  => 'acr_inscription_section',
				'type'     => 'text',
			) );
		}

		// 4ème puce uniquement pour la card 2
		if ( $i === 2 ) {
			$wp_customize->add_setting( "acr_card_2_puce4", array(
				'default'           => 'Information 4',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'refresh',
			) );
			$wp_customize->add_control( "acr_card_2_puce4", array(
				'label'    => __( 'Card 2 - Puce 4', 'acr-theme' ),
				'section'  => 'acr_inscription_section',
				'type'     => 'text',
			) );
		}

		// Bouton 1
		$wp_customize->add_setting( "acr_card_{$i}_btn1_text", array(
			'default'           => 'En savoir plus',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( "acr_card_{$i}_btn1_text", array(
			'label'    => sprintf( __( 'Card %d - Bouton 1 Texte', 'acr-theme' ), $i ),
			'section'  => 'acr_inscription_section',
			'type'     => 'text',
		) );

		$wp_customize->add_setting( "acr_card_{$i}_btn1_url", array(
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( "acr_card_{$i}_btn1_url", array(
			'label'    => sprintf( __( 'Card %d - Bouton 1 URL', 'acr-theme' ), $i ),
			'section'  => 'acr_inscription_section',
			'type'     => 'url',
		) );

		// Bouton 2
		$wp_customize->add_setting( "acr_card_{$i}_btn2_text", array(
			'default'           => 'S\'inscrire',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( "acr_card_{$i}_btn2_text", array(
			'label'    => sprintf( __( 'Card %d - Bouton 2 Texte', 'acr-theme' ), $i ),
			'section'  => 'acr_inscription_section',
			'type'     => 'text',
		) );

		$wp_customize->add_setting( "acr_card_{$i}_btn2_url", array(
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( "acr_card_{$i}_btn2_url", array(
			'label'    => sprintf( __( 'Card %d - Bouton 2 URL', 'acr-theme' ), $i ),
			'section'  => 'acr_inscription_section',
			'type'     => 'url',
		) );
	}

	// --- Cards 3 et 4 (texte simple uniquement) ---
	// Card 3
	$wp_customize->add_setting( "acr_card_3_title", array(
		'default'           => "Titre 3",
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( "acr_card_3_title", array(
		'label'    => __( 'Card 3 - Titre', 'acr-theme' ),
		'section'  => 'acr_inscription_section',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( "acr_card_3_content", array(
		'default'           => "Contenu de la carte 3",
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( "acr_card_3_content", array(
		'label'    => __( 'Card 3 - Contenu', 'acr-theme' ),
		'section'  => 'acr_inscription_section',
		'type'     => 'textarea',
	) );

	// Card 4 (avec bouton)
	$wp_customize->add_setting( "acr_card_4_title", array(
		'default'           => "Titre 4",
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( "acr_card_4_title", array(
		'label'    => __( 'Card 4 - Titre', 'acr-theme' ),
		'section'  => 'acr_inscription_section',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( "acr_card_4_content", array(
		'default'           => "Contenu de la carte 4",
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( "acr_card_4_content", array(
		'label'    => __( 'Card 4 - Contenu', 'acr-theme' ),
		'section'  => 'acr_inscription_section',
		'type'     => 'textarea',
	) );

	$wp_customize->add_setting( "acr_card_4_btn_text", array(
		'default'           => 'Nous contacter',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( "acr_card_4_btn_text", array(
		'label'    => __( 'Card 4 - Bouton Texte', 'acr-theme' ),
		'section'  => 'acr_inscription_section',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( "acr_card_4_btn_url", array(
		'default'           => '#contact',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( "acr_card_4_btn_url", array(
		'label'    => __( 'Card 4 - Bouton URL', 'acr-theme' ),
		'section'  => 'acr_inscription_section',
		'type'     => 'url',
	) );
}
add_action( 'customize_register', 'acr_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function acr_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function acr_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function acr_theme_customize_preview_js() {
	wp_enqueue_script( 'acr-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'acr_theme_customize_preview_js' );
