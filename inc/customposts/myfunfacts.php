<?php

add_action( 'init', 'myfunfacts' );

if( !function_exists( 'myfunfacts' ) ) {
    function myfunfacts() {
        register_post_type( 'my_own_myfunfacts', array(
            'labels' => array(
              'name'               => __('Fun Facts', 'manutdtheme'),
              'singular_name'      => __('Fun Fact', 'manutdtheme'),
              'add_new'            => __('Add New Fun Fact', 'manutdtheme'),
              'add_new_item'       => __('Add New Fun Fact', 'manutdtheme'),
            ),
            'public' => true,
            'menu_icon'          => 'dashicons-smiley',
            'supports'           => array( 'title', 'excerpt' ),
            'has_archive'  => true,
            'show_in_rest' => true, // Enable for block editor and REST API suppor
        ) );
    }
}