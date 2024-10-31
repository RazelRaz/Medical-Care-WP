<?php

// hooks
add_action( 'after_setup_theme', 'manutdtheme' );

if ( !function_exists( 'manutdtheme' ) ) {
    function manutdtheme() {
      // Loads the theme’s translated strings
      load_theme_textdomain( 'manutdtheme', get_template_directory().'/languages' );
      // Registers theme support 
      add_theme_support( 'post-thumbnails', array( 'post' ) );
      add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video', 'audio' ) );
      // enqueue scripts
      add_action( 'wp_enqueue_scripts', 'manutdthemescript' );
      // Adding Meta Boxes
      add_action( 'add_meta_boxes', 'medical_add_custom_box' );
      add_action( 'add_meta_boxes', 'medical_add_custom_box_for_schedule' );

      // schedule
      if( !function_exists( 'medical_add_custom_box_for_schedule' ) ) {
          function medical_add_custom_box_for_schedule() {
              add_meta_box(
                'schedule_meta',
                'Top Short Title',
                'schedule_display_callback',
                'my_custom_schedule'
              );
          }
      }

      if( !function_exists( 'schedule_display_callback' ) ) {
          function schedule_display_callback( $post ) {
            // get
              $schedule_short_save =  get_post_meta( $post->ID, 'schedule_key', true );
              $learn_more_text = get_post_meta( $post->ID, 'learn_more_text_key', true ); // New meta field for Learn More text
              ?>
                <label for="schedule">Add Short Top Title Here</label>
                <input type="text" name="add_schedule" id="add_schedule" value="<?php echo $schedule_short_save; ?>">
                <br><br>
                <label for="learn_more_text">Learn More Text</label>
                <input type="text" name="learn_more_text" id="learn_more_text" value="<?php echo esc_attr($learn_more_text); ?>"> <!-- New field for "Learn More" text -->
              <?php
          }
      }

      if( !function_exists( 'schedule_meta_save' ) ) {
        // save
          function schedule_meta_save( $post_id ) {
             // Check if 'add_schedule_short' is set to avoid undefined index warnings
             if( isset( $_POST['add_schedule'] ) ) {
              update_post_meta(
                $post_id,
                'schedule_key',
                sanitize_text_field( $_POST['add_schedule'] ) // Sanitizes input to enhance security
              );
             }

             if( isset( $_POST['learn_more_text'] ) ) {
                update_post_meta(
                  $post_id,
                  'learn_more_text_key',
                  sanitize_text_field( $_POST['learn_more_text'] ),
                );
             }
              
          }
      }

      add_action( 'save_post', 'schedule_meta_save' );



      // help 

      if( !function_exists( 'medical_add_custom_box' ) ) {
          function medical_add_custom_box() {
              add_meta_box(
                  'help_meta',
                  'Add Icon',
                  'help_display_callback',
                  'my_own_help'

              );
          }
      }

      if( !function_exists( 'help_display_callback' ) ) {
          function help_display_callback($post) {
            //get
            $saveIcon = get_post_meta( $post->ID, 'save_key', true );
            ?>
              <label for="addicon">Add Help Service Icon Name Here (Example: icofont-ambulance-cross )</label>
              <p></p>
              <input type="text" name="add_icon" id="add_icon" value="<?php echo $saveIcon ?>">
              
            <?php 
          }
      }


      if( !function_exists( 'help_meta_save' ) ) {
        // SAVE
        function help_meta_save( $post_id ) {
              // Check if 'add_icon' is set to avoid undefined index warnings
              if ( isset( $_POST['add_icon'] ) ) {
                update_post_meta(
                  $post_id,
                  'save_key',
                  sanitize_text_field( $_POST['add_icon'] ), // Sanitizes input to enhance security
                );
              }
          }
      }
      add_action( 'save_post', 'help_meta_save' );

      //all scripts
      if ( !function_exists( 'manutdthemescript' ) ) {
        function manutdthemescript() {

          // Bootstrap CSS
          wp_enqueue_style( 'bootstrap_css', get_parent_theme_file_uri( 'assets/css/bootstrap.min.css' ), array(), wp_get_theme()->get( 'Version' ), 'all');

          // Nice Select CSS
          wp_enqueue_style( 'nice_css', get_parent_theme_file_uri( 'assets/css/nice-select.css' ), array(), wp_get_theme()->get( 'Version' ), 'all');

          // Font Awesome CSS
          wp_enqueue_style( 'fontawesome_css', get_parent_theme_file_uri( 'assets/css/font-awesome.min.css' ), array(), wp_get_theme()->get( 'Version' ), 'all');

          // icofont CSS
          wp_enqueue_style( 'icofont_css', get_parent_theme_file_uri( 'assets/css/icofont.css' ), array(), wp_get_theme()->get( 'Version' ), 'all');

          // Slicknav CSS
          wp_enqueue_style( 'slicknav_css', get_parent_theme_file_uri( 'assets/css/slicknav.min.css' ), array(), wp_get_theme()->get( 'Version' ), 'all');

          // Owl Carousel CSS
          wp_enqueue_style( 'owlcarousel_css', get_parent_theme_file_uri( 'assets/css/owl-carousel.css' ), array(), wp_get_theme()->get( 'Version' ), 'all');

          // Datepicker CSS
          wp_enqueue_style( 'datepicker_css', get_parent_theme_file_uri( 'assets/css/datepicker.css' ), array(), wp_get_theme()->get( 'Version' ), 'all');

          // Animate CSS 
          wp_enqueue_style( 'animate_css', get_parent_theme_file_uri( 'assets/css/animate.min.css' ), array(), wp_get_theme()->get( 'Version' ), 'all');

          // Magnific Popup CSS
          wp_enqueue_style( 'magnificpopup_css', get_parent_theme_file_uri( 'assets/css/magnific-popup.css' ), array(), wp_get_theme()->get( 'Version' ), 'all');

          // Medipro CSS
          // Medipro CSS
          wp_enqueue_style( 'normalize_css', get_parent_theme_file_uri( 'assets/css/normalize.css' ), array(), wp_get_theme()->get( 'Version' ), 'all');

          // Medipro style CSS
          wp_enqueue_style( 'stylemama_css', get_parent_theme_file_uri( 'assets/css/style.css' ), array(), wp_get_theme()->get( 'Version' ), 'all');

          // Medipro style CSS
          wp_enqueue_style( 'responsive_css', get_parent_theme_file_uri( 'assets/css/responsive.css' ), array(), wp_get_theme()->get( 'Version' ), 'all');


          wp_enqueue_style( 'manutdstyle', get_stylesheet_uri() );
          
          
          
          
          wp_enqueue_script('manutd-main', get_parent_theme_file_uri( 'assets/js/main.js' ), array(), wp_get_theme()->get( 'Version' ), true );
          

        }
        
      }

    }


}


// Custom excerpt length function
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
    return 18;
}

// Custom excerpt more text
add_filter( 'excerpt_more', 'custom_excerpt_more' );
function custom_excerpt_more() {
    return ''; // No ellipsis or "Read More"
}

// Custom excerpt more text - ALternative way if you want to add read more in the excerpt
// function custom_excerpt_more( $more ) {
//   return '... <a href="' . get_permalink() . '">Read More</a>';
// }


// Function to set the post view count
function manutdtheme_set_post_views($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);

  if ($count == '') {
      $count = 0;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
  } else {
      $count++;
      update_post_meta($postID, $count_key, $count);
  }
}

// To remove prefetching (which may cause multiple views to be added), disable prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Function to get the post view count
function manutdtheme_get_post_views($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);

  if ($count == '') {
      return "0 Views";
  }

  return $count . ' Views';
}

// custom posts
require get_template_directory().'./inc/customposts/slider.php';
require get_template_directory().'./inc/customposts/help.php';
require get_template_directory().'./inc/customposts/myschedule.php';