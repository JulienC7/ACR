<?php
/**
 * Template Name: Inscription
 * Description: Page d'inscription
 *
 * @package acr-theme
 */

get_header();

// Récupération des valeurs du customizer
$inscription_title = get_theme_mod( 'acr_inscription_title', 'Inscription' );
$inscription_saison = get_theme_mod( 'acr_inscription_saison', 'Saison 2025 - 2026' );
$inscription_banderole = get_theme_mod( 'acr_inscription_banderole', 'Cours • Ateliers • Stages • Événements' );

// Cards 1 et 2 (modèle complet)
$cards = array();
// Card 1
$cards[] = array(
	'type'    => 'complete',
	'title'   => get_theme_mod( "acr_card_1_title", "Formule 1" ),
	'prix'    => get_theme_mod( "acr_card_1_prix", "393€/an" ),
	'puce1'   => get_theme_mod( "acr_card_1_puce1", "Information 1" ),
	'puce2'   => get_theme_mod( "acr_card_1_puce2", "Information 2" ),
	'puce3'   => get_theme_mod( "acr_card_1_puce3", "Information 3" ),
	'puce4'   => '',
	'btn1_text' => get_theme_mod( "acr_card_1_btn1_text", "En savoir plus" ),
	'btn1_url'  => get_theme_mod( "acr_card_1_btn1_url", "#" ),
	'btn2_text' => get_theme_mod( "acr_card_1_btn2_text", "S'inscrire" ),
	'btn2_url'  => get_theme_mod( "acr_card_1_btn2_url", "#" ),
);
// Card 2 (avec 4 puces)
$cards[] = array(
	'type'    => 'complete',
	'title'   => get_theme_mod( "acr_card_2_title", "Formule 2" ),
	'prix'    => get_theme_mod( "acr_card_2_prix", "393€/an" ),
	'puce1'   => get_theme_mod( "acr_card_2_puce1", "Information 1" ),
	'puce2'   => get_theme_mod( "acr_card_2_puce2", "Information 2" ),
	'puce3'   => get_theme_mod( "acr_card_2_puce3", "Information 3" ),
	'puce4'   => get_theme_mod( "acr_card_2_puce4", "-30 % pour les moins de 26 ans" ),
	'btn1_text' => get_theme_mod( "acr_card_2_btn1_text", "En savoir plus" ),
	'btn1_url'  => get_theme_mod( "acr_card_2_btn1_url", "#" ),
	'btn2_text' => get_theme_mod( "acr_card_2_btn2_text", "S'inscrire" ),
	'btn2_url'  => get_theme_mod( "acr_card_2_btn2_url", "#" ),
);

// Cards 3 et 4 (texte simple)
$cards[] = array(
	'type'    => 'text',
	'title'   => get_theme_mod( "acr_card_3_title", "Titre 3" ),
	'content' => get_theme_mod( "acr_card_3_content", "Contenu de la carte 3" ),
);

// Card 4 avec bouton
$cards[] = array(
	'type'       => 'text',
	'title'      => get_theme_mod( "acr_card_4_title", "Titre 4" ),
	'content'    => get_theme_mod( "acr_card_4_content", "Contenu de la carte 4" ),
	'btn_text'   => get_theme_mod( "acr_card_4_btn_text", "Nous contacter" ),
	'btn_url'    => get_theme_mod( "acr_card_4_btn_url", "#contact" ),
);
?>

<main id="primary" class="site-main acr-inscription-page">
	
	<!-- Section Inscription -->
	<section id="inscription" class="acr-inscription">
		<div class="acr-container">
			
			<!-- Header avec titre et saison -->
			<div class="acr-inscription-header" data-aos="fade-up">
				<h1 class="acr-inscription-title"><?php echo esc_html( $inscription_title ); ?></h1>
				<p class="acr-inscription-saison"><?php echo esc_html( $inscription_saison ); ?></p>
			</div>

			<!-- Banderole -->
			<div class="acr-inscription-banderole" data-aos="fade-up" data-aos-delay="100">
				<p>
					<?php 
					// Séparer les mots par • et ajouter un checkmark avant chaque
					$mots = explode( '•', $inscription_banderole );
					foreach ( $mots as $index => $mot ) {
						$mot = trim( $mot );
						if ( $mot ) {
							echo '<span class="banderole-item"><span class="checkmark">✓</span> ' . esc_html( $mot ) . '</span>';
							if ( $index < count( $mots ) - 1 ) {
								echo ' ';
							}
						}
					}
					?>
				</p>
			</div>

			<!-- Cards Grid -->
			<div class="acr-inscription-cards" data-aos="fade-up" data-aos-delay="200">
				<?php foreach ( $cards as $index => $card ) : ?>
					<?php if ( $card['type'] === 'complete' ) : ?>
						<!-- Card complète avec prix et boutons -->
						<div class="acr-card acr-card-complete">
							<h3 class="acr-card-title"><?php echo esc_html( $card['title'] ); ?></h3>
							<div class="acr-card-prix">
								<p class="prix-amount">À partir de <?php echo esc_html( $card['prix'] ); ?></p>
								<p class="prix-subtitle">selon la durée et le rythme choisis</p>
							</div>
							<ul class="acr-card-features">
								<li><?php echo esc_html( $card['puce1'] ); ?></li>
								<li><?php echo esc_html( $card['puce2'] ); ?></li>
								<li><?php echo esc_html( $card['puce3'] ); ?></li>							<?php if ( ! empty( $card['puce4'] ) ) : ?>
							<li>
								<?php 
								// Surligner "-30 %" en rose si présent dans le texte
								$puce4_text = $card['puce4'];
								if ( strpos( $puce4_text, '-30 %' ) !== false ) {
									$puce4_text = str_replace( '-30 %', '<span class="highlight-pink">-30 %</span>', $puce4_text );
									echo wp_kses( $puce4_text, array( 'span' => array( 'class' => array() ) ) );
								} else {
									echo esc_html( $puce4_text );
								}
								?>
							</li>
							<?php endif; ?>							</ul>
							<div class="acr-card-buttons">
								<a href="<?php echo esc_url( $card['btn1_url'] ); ?>" class="acr-card-btn acr-btn-secondary">
									<?php echo esc_html( $card['btn1_text'] ); ?>
								</a>
								<a href="<?php echo esc_url( $card['btn2_url'] ); ?>" class="acr-card-btn acr-btn-primary">
									<?php echo esc_html( $card['btn2_text'] ); ?>
								</a>
							</div>
						</div>
					<?php else : ?>
						<!-- Card simple avec texte -->
						<div class="acr-card acr-card-text">
							<h3 class="acr-card-title"><?php echo esc_html( $card['title'] ); ?></h3>
							<div class="acr-card-content">
								<?php echo wpautop( wp_kses_post( $card['content'] ) ); ?>
							</div>						<?php if ( ! empty( $card['btn_text'] ) && ! empty( $card['btn_url'] ) ) : ?>
						<div class="acr-card-button-single">
							<a href="<?php echo esc_url( $card['btn_url'] ); ?>" class="acr-card-btn acr-btn-primary">
								<?php echo esc_html( $card['btn_text'] ); ?>
							</a>
						</div>
						<?php endif; ?>						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>

		</div>
	</section>

</main><!-- #primary -->

<?php
get_footer();
