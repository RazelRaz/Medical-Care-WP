<section class="schedule">
			<div class="container">
				<div class="schedule-inner">
					<div class="row">

						<?php 
						
							$medicalSchedule = new WP_Query(array(
								'post_type' => 'my_custom_schedule',
								'order'     => 'ASC',
							));
							while( $medicalSchedule->have_posts() ) : $medicalSchedule->the_post();
						
						?>
						<div class="col-lg-4 col-md-6 col-12 ">
							<!-- single-schedule -->
							<div class="single-schedule first">
								<div class="inner">
									<div class="icon">
										<i class="fa fa-ambulance"></i>
									</div>
									<div class="single-content">
										<span><?php echo get_post_meta( $post->ID, 'schedule_key', true ); ?></span>
										<h4><?php esc_html(the_title()); ?></h4>
										<p><?php esc_html(the_excerpt()); ?></p>

										<?php 
											$learn_more_text = get_post_meta( get_the_ID(), 'learn_more_text_key', true );
											$learn_more_text = !empty($learn_more_text) ? $learn_more_text : 'Learn More'; // Default text if not set
										?>

										<a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html($learn_more_text); ?><i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>
						
					</div>
				</div>
			</div>
		</section>