<?php

/* enqueue script for parent theme stylesheeet */        
function childtheme_parent_styles() {
 
 // enqueue style
 wp_enqueue_style( 'parent', get_template_directory_uri().'/style.css' );     
 wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/custom.js', array( 'jquery' ),'',true );                  
}
add_action( 'wp_enqueue_scripts', 'childtheme_parent_styles');

//add wp-login branding
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url("<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png");
            background-size: contain;
		    height: 100px;
    		width: 100%;
			}
        	body.login{
				background-color: #fff;
			}
			body.login .button-primary {
				background: #4c74b9;
				border-color: #4c74b9;
				-webkit-box-shadow: none;
				box-shadow: none;
				color: #fff;
				text-decoration: none;
				text-shadow: none;
				border-radius: 0;
			}
			body.login .button-primary:hover,
			body.login .button-primary:active,
			body.login .button-primary:focus,
			body.login .button-primary:active:focus{
				background: #231f20;
				border-color: #231f20;
				-webkit-box-shadow: none;
				box-shadow: none;
				color: #fff;
				text-decoration: none;
				text-shadow: none;
				border-radius: 0;
			}
			body.login .message {
			    border-left: 4px solid #231f20;
			}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function loginpage_custom_link() {
	return home_url();
}
add_filter('login_headerurl','loginpage_custom_link');
function change_title_on_logo() {
	return 'SAEON';
}
add_filter('login_headertext', 'change_title_on_logo');


