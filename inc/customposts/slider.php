<?php

add_action( 'init', 'mycustompost');

if( !function_exists('mycustompost') ) {
  function mycustompost() {
    register_post_type( 'my_own_slder', array(
      'labels' => array(
        'name'               => __('Sliders', 'manutdtheme'),
        'singular_name'      => __('Slider', 'manutdtheme'),
        'add_new'            => __('Add New Slide', 'manutdtheme'),
        'add_new_item'       => __('Add New Slider', 'manutdtheme'),
      ),
      'public' => true,
      'menu_icon'          => 'dashicons-images-alt2',
    ) );
  }
}