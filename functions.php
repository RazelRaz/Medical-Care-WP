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