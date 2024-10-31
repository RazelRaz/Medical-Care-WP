<?php

add_action( 'init', 'mycustomschedule' );

if( !function_exists( 'mycustomschedule' ) ) {
    function mycustomschedule() {
        register_post_type( 'my_custom_schedule', array(
            'labels' => array(
            'name'               => __('Schedules', 'manutdtheme'),
            'singular_name'      => __('Schedule', 'manutdtheme'),
            'add_new'            => __('Add New Schedule', 'manutdtheme'),
            'add_new_item'       => __('Add New Schedule', 'manutdtheme'),
            ),
            'public' => true,
            'menu_icon'          => 'dashicons-schedule',
            'supports'           => array( 'title', 'excerpt' ),
            'has_archive'  => true,
            'show_in_rest' => true, // Enable for block editor and REST API suppor
        ) );
    }
}

