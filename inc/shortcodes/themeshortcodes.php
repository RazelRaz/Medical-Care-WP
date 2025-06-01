<?php

// shortcode
add_action( 'init', 'myfuncforshortcode' );

if( !function_exists( 'myfuncforshortcode' ) ) {
    function myfuncforshortcode() {
        add_shortcode( 'mycode', 'shortcode_callback' );
        if ( !function_exists( 'shortcode_callback' ) ) {
            function shortcode_callback( $atts=[], $content=null ) {
              $content = 'Hello WP';
              return $content;
            }
        }
    }
}