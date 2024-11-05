<?php get_header(); ?>
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <!-- Check if on a single post for 'my_custom_schedule' -->
                    <?php if( get_post_type() === 'my_custom_schedule' ) : ?>
                    
                    <ul class="bread-list">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active"><?php the_title(); ?></li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<section class="custom-schedule-single">
    <div class="container">
        <!-- <h1>Single Schedule Custom Post</h1> -->
        <h1><?php the_title(); ?></h1>
        <div class="content">
            <?php
            // Display the main content of the post
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>