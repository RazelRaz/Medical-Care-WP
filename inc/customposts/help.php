<?php

add_action( 'init', 'mycustomhelp');

if( !function_exists('mycustomhelp') ) {
  function mycustomhelp() {
    register_post_type( 'my_own_help', array(
      'labels' => array(
        'name'               => __('Help Services', 'manutdtheme'),
        'singular_name'      => __('Help', 'manutdtheme'),
        'add_new'            => __('Add New Help', 'manutdtheme'),
        'add_new_item'       => __('Add New Help', 'manutdtheme'),
        
      ),
      'public' => true,
      'menu_icon'          => 'dashicons-editor-help',
      'supports'           => array( 'title', 'excerpt' ),
      'has_archive'  => true,
      'show_in_rest' => true, // Enable for block editor and REST API suppor
    ) );
  }
}