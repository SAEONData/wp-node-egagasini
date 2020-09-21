<?php

/* enqueue script for parent theme stylesheeet */        
function childtheme_parent_styles() {
 
 // enqueue style
 wp_enqueue_style( 'parent', get_template_directory_uri().'/style.css' );     
 wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/custom.js', array( 'jquery' ),'',true );                  
}
add_action( 'wp_enqueue_scripts', 'childtheme_parent_styles');


