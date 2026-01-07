<?php
/**
 * Template Name: Page d'accueil
 * Front page template for Atelier Cour Roland
 *
 * @package acr-theme
 */

get_header();

// Récupération des valeurs du customizer
$hero_title       = get_theme_mod( 'acr_hero_title', 'Atelier Cour Roland' );
$hero_subtitle    = get_theme_mod( 'acr_hero_subtitle', 'Créativité et Savoir-Faire Artisanal' );
$hero_description = get_theme_mod( 'acr_hero_description', '' );
$hero_button_text = get_theme_mod( 'acr_hero_button_text', 'Découvrir nos créations' );
$hero_button_url  = get_theme_mod( 'acr_hero_button_url', '#about' );

<<<<<<< HEAD
$about_title      = get_theme_mod( 'acr_about_title', 'Bienvenue aux Ateliers de la Cour Roland' );
=======
$about_title      = get_theme_mod( 'acr_about_title', 'À Propos' );
>>>>>>> main
$about_content    = get_theme_mod( 'acr_about_content', 'Découvrez notre passion pour l\'artisanat et notre engagement envers l\'excellence.' );
$about_image      = get_theme_mod( 'acr_about_image', '' );

$about2_title     = get_theme_mod( 'acr_about2_title', 'Notre Histoire' );
$about2_content   = get_theme_mod( 'acr_about2_content', 'Une tradition familiale transmise de génération en génération.' );
$about2_image     = get_theme_mod( 'acr_about2_image', '' );

$services_image   = get_theme_mod( 'acr_services_image', '' );
?>

<main id="primary" class="site-main acr-homepage">
	
	<!-- Section Hero -->
	<section id="hero" class="acr-hero">
		<div class="acr-container">
			<div class="acr-hero-content">
				<h1 class="acr-hero-title" data-aos="fade-up"><?php echo esc_html( $hero_title ); ?></h1>
				<p class="acr-hero-subtitle" data-aos="fade-up" data-aos-delay="100"><?php echo esc_html( $hero_subtitle ); ?></p>
				<?php if ( $hero_description ) : ?>
				<p class="acr-hero-description" data-aos="fade-up" data-aos-delay="200"><?php echo esc_html( $hero_description ); ?></p>
				<?php endif; ?>
				<a href="<?php echo esc_url( $hero_button_url ); ?>" class="acr-btn acr-btn-primary" data-aos="fade-up" data-aos-delay="300">
					<?php echo esc_html( $hero_button_text ); ?>
				</a>
			</div>
		</div>
		<div class="acr-scroll-indicator">
			<span>Scroll</span>
			<div class="acr-scroll-line"></div>
		</div>
	</section>

	<!-- Section À Propos -->
	<section id="about" class="acr-about">
		<div class="acr-container">
			<div class="acr-about-grid">
				<div class="acr-about-content" data-aos="fade-right">
					<h2 class="acr-section-title"><?php echo esc_html( $about_title ); ?></h2>
					<div class="acr-about-text">
						<?php echo wpautop( wp_kses_post( $about_content ) ); ?>
					</div>
				</div>
				<?php if ( $about_image ) : ?>
				<div class="acr-about-image" data-aos="fade-left">
					<div class="acr-image-wrapper">
						<img src="<?php echo esc_url( $about_image ); ?>" alt="<?php echo esc_attr( $about_title ); ?>">
					</div>
				</div>
				<?php else : ?>
				<div class="acr-about-image" data-aos="fade-left">
					<div class="acr-image-wrapper acr-image-placeholder">
						<span>Image à venir</span>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- Section Services (Image) -->
	<section id="services" class="acr-services">
		<div class="acr-container">
			<div class="acr-services-image" data-aos="fade-up">
				<?php if ( $services_image ) : ?>
					<img src="<?php echo esc_url( $services_image ); ?>" alt="Services">
				<?php else : ?>
					<div class="acr-image-placeholder">
						<span>Image à venir</span>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- Section À Propos 2 (Image à gauche, Texte à droite) -->
	<section id="about2" class="acr-about acr-about-reverse">
		<div class="acr-container">
			<div class="acr-about-grid">
				<!-- Image à gauche -->
				<?php if ( $about2_image ) : ?>
				<div class="acr-about-image" data-aos="fade-right">
					<div class="acr-image-wrapper">
						<img src="<?php echo esc_url( $about2_image ); ?>" alt="<?php echo esc_attr( $about2_title ); ?>">
					</div>
				</div>
				<?php else : ?>
				<div class="acr-about-image" data-aos="fade-right">
					<div class="acr-image-wrapper acr-image-placeholder">
						<span>Image à venir</span>
					</div>
				</div>
				<?php endif; ?>
				<!-- Texte à droite -->
				<div class="acr-about-content" data-aos="fade-left">
					<h2 class="acr-section-title"><?php echo esc_html( $about2_title ); ?></h2>
					<div class="acr-about-text">
						<?php echo wpautop( wp_kses_post( $about2_content ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

</main><!-- #primary -->

<?php
get_footer();
?>