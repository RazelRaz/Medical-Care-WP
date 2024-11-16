<?php get_header(); ?>

		<!-- Breadcrumbs -->
		<div class="breadcrumbs overlay">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2><?php the_title(); ?></h2>
							<ul class="bread-list">
								<li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active"><?php the_title(); ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

        <!-- Start Portfolio Details Area -->
		<section class="pf-details section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="inner-content">
							<div class="image-slider">
								<div class="pf-details-slider">
                                    <?php
                                        $slider_images = get_post_meta( get_the_ID(), 'slider_images', true );
                                        if( !empty( $slider_images ) ) {
                                            foreach( $slider_images as $image_id ) {
                                                echo wp_get_attachment_image( $image_id, 'large' );
                                            }
                                        }
                                        /**
                                         * <img src="<?php echo esc_url( get_template_directory_uri(). './assets/img/call-bg.jpg'  ); ?>" alt="#">
                                         */
									
                                        ?>
								</div>
							</div>
							<div class="date">
								<ul>
									<li><span>Category :</span> Heart Surgery</li>
									<li><span>Date :</span> April 20, 2019</li>
									<li><span>Client :</span> Suke Agency</li>
									<li><span>Ags :</span> Typo</li>
								</ul>
							</div>
							<div class="body-text">
								<h3><?php the_title( '<h3>', '</h3>' ); ?></h3>
								<p><?php the_content(); ?></p>
								<div class="share">
									<h4>Share Now -</h4>
									<ul>
										<li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Portfolio Details Area -->

<?php get_footer(); ?>