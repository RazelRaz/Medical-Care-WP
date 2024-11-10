<?php

add_action( 'init', 'medicalgallery' );

if( !function_exists( 'medicalgallery' ) ) {
    function medicalgallery() {
        register_post_type( 'medical_gallery', array(
            'labels' => array(
              'name'               => __('Galleries', 'manutdtheme'),
              'singular_name'      => __('Gallery', 'manutdtheme'),
              'add_new'            => __('Add New Gallery', 'manutdtheme'),
              'add_new_item'       => __('Add New Gallery', 'manutdtheme'),
            ),
            'public' => true,
            'menu_icon'          => 'dashicons-format-gallery',
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
            'has_archive'  => true,
            'show_in_rest' => true, // Enable for block editor and REST API support
        ) );
    }
}