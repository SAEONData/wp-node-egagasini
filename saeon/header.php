<?php
/**
 * The Header template for saeon theme
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php wp_head(); ?>
</head>

<?php wp_body_open(); ?>

<body <?php body_class(); post_class();?> id="post-<?php the_ID(); ?>" saeon-header="<?php echo esc_attr($title_color); ?> test">
    <header class="saeon-header sn-noscroll" role="banner">

		<div class="sn-logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
		
		if ( has_custom_logo() ) {
			echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="' . get_bloginfo( 'name' ) . '">';
		} else {
				echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
		}
			?>
		</a>
		</div>

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="saeon-title"><strong><?php echo esc_html( get_bloginfo( 'title' ) ); ?></strong>
		<?php bloginfo( 'description' ); ?></a>

		<nav id="sn-cssmenu" role="navigation">
		<div id="sn-head-mobile"></div>
		<div class="sn-button"></div>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary-menu',
					'depth'           => 3,
					'container_class' => false,
					'container'       => 'ul',
					'menu_class'=> false
				)
			);
			?>
		</nav><!-- #site-navigation -->
        

	</header><!-- #masthead -->

