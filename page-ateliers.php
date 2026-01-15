<?php
/**
 * Template Name: Nos Ateliers
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package acr-theme
 */

get_header();
?>

<main id="primary" class="site-main ateliers-page">

	<?php
	while ( have_posts() ) :
		the_post();
		?>

		<section class="ateliers-hero">
			<div class="ateliers-hero-content">
				<h1 class="ateliers-title"><?php the_title(); ?></h1>
				<p class="ateliers-subtitle">
					<strong>Notre association propose une <span style="background-color: #ECACB8;">large séléction de stages accessibles </span><span style="background-color: #96CFC8;"> dès 16 ans, même aux grands débutants</span></strong>
				</p>
			</div>
		</section>

		<section class="ateliers-gallery">
			<div class="gallery-grid">
				<?php
				// Images locales pour la galerie
				$gallery_images = array(
					array(
						'url' => get_template_directory_uri() . '/assets/images/ateliers/5U2A6221.jpg',
						'title' => 'Pièces Uniques',
						'description' => 'Création de pièces uniques'
					),
					array(
						'url' => get_template_directory_uri() . '/assets/images/ateliers/DSC03236.jpg',
						'title' => 'Traditionnelle',
						'description' => 'Technique traditionnelle'
					),
					array(
						'url' => get_template_directory_uri() . '/assets/images/ateliers/5U2A6195.jpg',
						'title' => 'Ateliers',
						'description' => 'Les ateliers'
					),
					array(
						'url' => get_template_directory_uri() . '/assets/images/ateliers/5U2A6231.jpg',
						'title' => 'Métal',
						'description' => 'Façonnage métal'
					),
					array(
						'url' => get_template_directory_uri() . '/assets/images/ateliers/5U2A6248.jpg',
						'title' => 'Atelier Créatif',
						'description' => 'Atelier de création'
					),
					array(
						'url' => get_template_directory_uri() . '/assets/images/ateliers/DSC03221.jpg',
						'title' => 'Art',
						'description' => 'De tout les styles'
					),
				);
				
				$index = 0;
				foreach ( $gallery_images as $item ) :
					$image_url = isset( $item['url'] ) ? $item['url'] : $item;
					$title = isset( $item['title'] ) ? $item['title'] : '';
					$description = isset( $item['description'] ) ? $item['description'] : '';
					$index++;
					?>
					<div class="gallery-item gallery-item-<?php echo $index; ?>" data-aos="fade-up" data-aos-delay="<?php echo ($index * 100); ?>">
						<div class="gallery-item-inner">
							<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
							<?php if ( $title || $description ) : ?>
								<div class="gallery-overlay">
									<?php if ( $title ) : ?>
										<h3><?php echo esc_html( $title ); ?></h3>
									<?php endif; ?>
									<?php if ( $description ) : ?>
										<p><?php echo esc_html( $description ); ?></p>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</section>

		<?php if ( get_the_content() ) : ?>
			<section class="ateliers-content">
				<div class="content-wrapper">
					<?php the_content(); ?>
				</div>
			</section>
		<?php endif; ?>

		<section class="ateliers-carousel">
			<h2 class="carousel-title">Galerie</h2>
			<div class="carousel-container">
				<button class="carousel-btn carousel-prev" aria-label="Précédent">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<polyline points="15 18 9 12 15 6"></polyline>
					</svg>
				</button>
				
				<div class="carousel-track-container">
					<div class="carousel-track">
						<?php
						// Réutiliser les images de la galerie pour le carrousel
						foreach ( $gallery_images as $item ) :
							$image_url = isset( $item['url'] ) ? $item['url'] : $item;
							$title = isset( $item['title'] ) ? $item['title'] : '';
							?>
							<div class="carousel-slide">
								<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				
				<button class="carousel-btn carousel-next" aria-label="Suivant">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<polyline points="9 18 15 12 9 6"></polyline>
					</svg>
				</button>
			</div>
			
			<div class="carousel-indicators">
				<?php
				$slide_count = count( $gallery_images );
				for ( $i = 0; $i < $slide_count; $i++ ) :
					?>
					<button class="carousel-indicator <?php echo $i === 0 ? 'active' : ''; ?>" data-slide="<?php echo $i; ?>" aria-label="Slide <?php echo $i + 1; ?>"></button>
				<?php endfor; ?>
			</div>
		</section>

	<?php
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
