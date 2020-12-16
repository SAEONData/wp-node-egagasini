<?php
//add menus

function saeon_register_menus() {
	register_nav_menu('primary-menu',__( 'Primary Menu','saeon' ));
}
add_action( 'init', 'saeon_register_menus' );

//add style and script files
function saeon_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; 
 
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;0,800;1,400&display=swap', false );
    wp_enqueue_script( 'saeon-js', get_template_directory_uri() . '/saeon.js', array( 'jquery' ),'',true );
}

add_action( 'wp_enqueue_scripts', 'saeon_theme_enqueue_styles' );

//content width
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

//add title
function saeon_theme_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'saeon_theme_setup' );

//add featured image support
add_theme_support( 'post-thumbnails' );

//add custom header support
add_theme_support( "custom-header", $args );

//add comment reply
function saeon_enqueue_comments_reply() {
	if( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'saeon_enqueue_comments_reply' );

//add feed links
add_theme_support( 'automatic-feed-links' );

//add widgets
if ( function_exists('register_sidebar') ) {

	register_sidebar(array(
	'name' => 'Footer 1',
	'id' => 'saeonfooter1',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>'
	 ));
 
	register_sidebar(array(
	'name' => 'Footer 2',
	'id' => 'saeonfooter2',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>'
	));
 
	register_sidebar(array(
	 'name' => 'Footer 3',
	 'id' => 'saeonfooter3',
	 'before_widget' => '<div id="%1$s" class="widget %2$s">',
	 'after_widget' => '</div>',
	 'before_title' => '<h2>',
	 'after_title' => '</h2>'
	 ));
 
 };
 add_action( 'widgets_init', 'register_sidebar', 0 );
 // Add support for custom logo
 add_theme_support( 'custom-logo' );

 // Add additional page attribute for transparent header
/* Define the custom box */
add_action( 'add_meta_boxes', 'saeon_61041_add_custom_box' );

/* Do something with the data entered */
add_action( 'save_post', 'saeon_61041_save_postdata' );

/* Add class to body if page has an attibute */

function my_body_classes( $classes ) {

	$currentpost = get_post();
	$testit = get_post_meta( $currentpost->ID, 'saeon_header_color', true);


// if page has taxonomy
if ( $testit) {
	$classes[] = $testit;
	$classes[] = 'saeon-header-elem sn-noscroll';
} else {
    $classes[] = '' ;
}
 
    
    
     
    return $classes;
     
}
add_filter( 'body_class','my_body_classes' );
/* Adds a box to the main column on the Post and Page edit screens */
function saeon_61041_add_custom_box() {
    add_meta_box( 
        'saeon_61041_sectionid',
        'Header Style',
        'saeon_61041_inner_custom_box',
        'page',
        'side',
        'high'
    );
}

/* Prints the box content */
function saeon_61041_inner_custom_box($post)
{
    // Use nonce for verification
    wp_nonce_field( 'saeon_61041_saeon_61041_field_nonce', 'saeon_61041_noncename' );

    // Get saved value, if none exists, "default" is selected
    $saved = get_post_meta( $post->ID, 'saeon_header_color', true);
    if( !$saved )
        $saved = 'default';

    $fields = array(
        'transparent'  => __('Transparent', 'saeon'),
        'default'   => __('Default', 'saeon'),
    );

    foreach($fields as $key => $label)
    {
        printf(
            '<input type="radio" name="saeon_header_color" value="%1$s" id="saeon_header_color[%1$s]" %3$s />'.
            '<label for="saeon_header_color[%1$s]"> %2$s ' .
            '</label><br>',
            esc_attr($key),
            esc_html($label),
            checked($saved, $key, false)
        );
    }
}

/* When the post is saved, saves our custom data */
function saeon_61041_save_postdata( $post_id ) 
{
      // verify if this is an auto save routine. 
      // If it is our form has not been submitted, so we dont want to do anything
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
          return;

      // verify this came from the our screen and with proper authorization,
      // because save_post can be triggered at other times
      if ( !wp_verify_nonce( $_POST['saeon_61041_noncename'], 'saeon_61041_saeon_61041_field_nonce' ) )
          return;

      if ( isset($_POST['saeon_header_color']) && $_POST['saeon_header_color'] != "" ){
            update_post_meta( $post_id, 'saeon_header_color', $_POST['saeon_header_color'] );
      } 
}