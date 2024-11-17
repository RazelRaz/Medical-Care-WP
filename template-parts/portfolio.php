<section class="portfolio section" >
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>We Maintain Cleanliness Rules Inside Our Hospital</h2>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/section-img.png" alt="#">
							<p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="owl-carousel portfolio-slider">

							<?php 
								$medicalGallery = new WP_Query(array(
									'post_type' => 'medical_gallery',
									'order'     => 'ASC',
									'posts_per_page' => -1, // Display unlimted
								));
								while( $medicalGallery->have_posts() ) : $medicalGallery->the_post();					
							?>
							<?php 
								$gal_btn_txt = get_post_meta( get_the_ID(), 'gal_key', true );
								$gal_btn_txt = !empty( $gal_btn_txt ) ? $gal_btn_txt : 'View Details'; // Default text if not set

								// Get the featured image URL
								$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
								$featured_img_url = $featured_img_url ? $featured_img_url : get_template_directory_uri() . '/assets/img/default.jpg'; // Default image fallback
							?>
							<div class="single-pf">
								<img src="<?php echo esc_url($featured_img_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
								<a href="<?php echo esc_url(get_permalink()); ?>" class="btn"><?php echo esc_html( $gal_btn_txt ); ?></a>
							</div>

							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>