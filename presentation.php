<?php
/**
 * Template Name: Présentation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package acr-theme
 */

get_header();
?>

<main id="primary" class="site-main presentation-page">

	<!-- Hero Section -->
	<section class="presentation-hero">
		<h1 class="hero-title">Présentation</h1>
		<p class="hero-subtitle"><span class="highlight-green" >Cours et Stages</span> artistiques en pleine nature, <span class="highlight-pink">Jouy-En-Josas</span></p>
	</section>

	<!-- Stats Bar -->
	<section class="presentation-stats">
		<div class="stats-container">
			<div class="stat-item">
				<svg class="stat-checkmark" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M7 10L9 12L13 8M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z" stroke="#35A691" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				<p>Association depuis 1976</p>
			</div>
			<div class="stat-item">
				<svg class="stat-checkmark" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M7 10L9 12L13 8M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z" stroke="#35A691" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				<p>40 Discipline Artistiques</p>
			</div>
			<div class="stat-item">
				<svg class="stat-checkmark" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M7 10L9 12L13 8M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10Z" stroke="#35A691" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				<p>Ateliers en pleine nature</p>
			</div>
		</div>
	</section>

	<!-- Section Les Ateliers -->
	<section class="presentation-section ateliers-section">
		<div class="section-content">
			<div class="section-text">
				<h2 class="section-title">
					Les Ateliers<br>
					Cour Roland
				</h2>
				<p class="section-description">
					Depuis 1976, les Ateliers de la Cour Roland sont un lieu vivant dédié à l'art, à l'artisanat et à la <span class="highlight-yellow">création.</span>
				</p>
				<p class="section-details">
					Installés à Jouy-en-Josas, au cœur d'un environnement naturel préservé, ils accueillent chaque année des passionnés, débutants ou confirmés, désireux de découvrir, pratiquer ou approfondir une discipline artistique.
				</p>
			</div>
			<div class="section-image">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/presentation/first-image.jpg" alt="Les Ateliers de la Cour Roland" loading="lazy">
			</div>
		</div>
	</section>

	<!-- Section À qui s'adressent -->
	<section class="presentation-section target-section">
		<h2 class="section-title-center">À qui s'adressent les ateliers ?</h2>
		
		<div class="target-cards">
			<div class="target-card">
				<div class="card-icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/presentation/bulb.png" alt="Bulb">
				</div>
				<h3 class="card-title highlight-green">Débutant</h3>
				<p class="card-description">Pour découvrir une pratique artistique sans prérequis</p>
				<div class="card-divider"></div>
			</div>
			
			<div class="target-card">
				<div class="card-icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/presentation/target.png" alt="Target">
				</div>
				<h3 class="card-title highlight-yellow">Amateurs</h3>
				<p class="card-description">Pour appronfondir une technique et developper un projet</p>
				<div class="card-divider"></div>
			</div>
			
			<div class="target-card">
				<div class="card-icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/presentation/heart.png" alt="Heart">
				</div>
				<h3 class="card-title highlight-pink">Passionnés</h3>
				<p class="card-description">Pour le plaisir de créer et de partager un moment hors du temps</p>
				<div class="card-divider"></div>
			</div>
		</div>
	</section>

	<!-- Section Transmission -->
	<section class="presentation-section transmission-section">
		<div class="section-content">
			<div class="section-text">
				<h2 class="section-title">
					Un esprit de transmission<br>
					et de partage
				</h2>
				<p class="section-description">
					Les Ateliers de la Cour Roland sont avant tout un lieu de <span class="highlight-pink" >transmission.</span><br>
					Les enseignants, artistes et artisans, partagent leur savoir-faire avec exigence, bienveillance et <span class="highlight-green" >passion.</span>
				</p>
				<p class="section-details">
					Chaque atelier est conçu comme un espace d'expérimentation, d'apprentissage et d'échange, où le geste, la matière et le temps ont toute leur place.
				</p>
			</div>
			<div class="section-image">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/presentation/second-image.jpg" alt="Esprit de transmission" loading="lazy">
			</div>
		</div>
	</section>

	<!-- Section Lieu hors du temps -->
	<section class="presentation-section lieu-section">
		<h2 class="section-title-center">
			Un lieu <span class="highlight-yellow">hors du temps</span>
		</h2>
		<p class="lieu-description">
			Nichés au cœur de la Cour Roland, les ateliers s'inscrivent dans un cadre naturel exceptionnel.<br>
			Jardins, bâtiments anciens, lumière naturelle et calme environnant offrent un contexte propice à la création, à la concentration et à l'échange.
		</p>
		<div class="lieu-image">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/presentation/third-image.jpg" alt="Un lieu hors du temps" loading="lazy">
		</div>
	</section>

	<!-- Section Partenaires -->
	<section class="presentation-section partners-section">
		<h2 class="section-title-center">Nos partenaires</h2>
		<div class="partners-logos">
			<div class="partner-logo">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/presentation/partenaire1.png" alt="Le Conseil des BEAUX ARTS" loading="lazy">
			</div>
			<div class="partner-logo">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/presentation/Bosch_logo.png" alt="BOSCH" loading="lazy">
			</div>
			<div class="partner-logo">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/presentation/Ville_et_Métiers_d'Art.png" alt="Ville et Métiers d'Art" loading="lazy">
			</div>
		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();
