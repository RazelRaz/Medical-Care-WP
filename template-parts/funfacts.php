<div id="fun-facts" class="fun-facts section overlay">
	<div class="container">
		<div class="row">

			<?php 
				$medicalFuncFact = new WP_Query(array(
					'post_type' => 'my_own_myfunfacts',
					'order'     => 'ASC',
					'posts_per_page' => 4, // Display 4 posts
				));

				while( $medicalFuncFact->have_posts() ) : $medicalFuncFact->the_post();
			?>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Fun -->
				<div class="single-fun">
					<i class="<?php echo get_post_meta( $post->ID, 'fun_key', true ); ?>"></i>
					<div class="content">
						<span class="counter"><?php esc_html(the_excerpt()); ?></span>
						<p><?php esc_html(the_title()); ?></p>
					</div>
				</div>
				<!-- End Single Fun -->
			</div>

			<?php endwhile; wp_reset_postdata(); ?>
			
		</div>
	</div>
</div>