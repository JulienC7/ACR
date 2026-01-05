<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package acr-theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-container">
			<div class="footer-content">
				<div class="footer-left">
					<h2 class="footer-brand">LES ATELIERS DE LA COUR ROLAND</h2>
				</div>
				
				<div class="footer-right">
					<div class="footer-section">
						<h3 class="footer-heading">Navigation</h3>
						<ul class="footer-links">
							<li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
							<li><a href="<?php echo home_url('/a-propos'); ?>">À propos</a></li>
							<li><a href="<?php echo home_url('/realisations'); ?>">Réalisations</a></li>
							<li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
						</ul>
					</div>
					
					<div class="footer-section">
						<h3 class="footer-heading">Contact</h3>
						<ul class="footer-contact">
							<li>123 Rue de la Roland</li>
							<li>75000 Paris, France</li>
							<li><a href="mailto:contact@atelier-cour-roland.com">contact@atelier-cour-roland.com</a></li>
							<li><a href="tel:+33123456789">+33 1 23 45 67 89</a></li>
						</ul>
					</div>
					
					<div class="footer-section">
						<h3 class="footer-heading">Suivez-nous</h3>
						<ul class="footer-social">
							<li>
								<a href="https://www.instagram.com/ateliersdelacourroland/?hl=fr" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icons8-instagram-48.png" alt="Instagram" class="social-icon">
								</a>
							</li>
							<li>
								<a href="https://www.facebook.com/Ateliers.Cour.Roland" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icons8-facebook-60.png" alt="Facebook" class="social-icon">
								</a>
							</li>
							<li>
								<a href="https://www.youtube.com/channel/UC8pU8Mlz8fIxkXwO3gEZ-lA" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icons8-youtube-50.png" alt="YouTube" class="social-icon">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="footer-bottom">
				<p>&copy; <?php echo date('Y'); ?> Atelier Cour Roland. Tous droits réservés.</p>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
