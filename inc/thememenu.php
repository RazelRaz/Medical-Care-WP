<?php


// menus
add_action( 'init', 'myallmenus' );

if( !function_exists( 'myallmenus' ) ){

    // add active class in menu
    add_filter( 'wp_nav_menu_objects', 'mymenuactive_class' );
    function mymenuactive_class( $menu_items ) {

        $menu_items[1]->classes[] ="active";
        return $menu_items;
        
    }

    function myallmenus() {
        register_nav_menus( [
          'top-menu' => __( 'Top Menu', 'manutdtheme' ),
          'primary-menu' => __( 'Main Menu', 'manutdtheme' ),
          'footer-menu-one' => __( 'Footer Menu One', 'manutdtheme' ),
          'footer-menu-two' => __( 'Footer Menu Two', 'manutdtheme' ),
        ] );
    }
}
