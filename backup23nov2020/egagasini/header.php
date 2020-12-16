<?php
/**
 * The Header template for our theme
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

<body <?php body_class(); post_class();?> id="post-<?php the_ID(); ?>" >
    <header class="saeon-header sn-noscroll" role="banner">
		<div class="logo"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_home_url() ?>/wp-content/themes/saeon/img/logo.png " /></a></div>
		<a href="<?php echo get_home_url(); ?>" id="saeon-title"><strong><span class="display-desktop">SAEON </span><?php bloginfo( 'title' ); ?></strong>
		<?php bloginfo( 'description' ); ?></a>

		<nav id="cssmenu" role="navigation">
		<div id="head-mobile"></div>
		<div class="button"></div>
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
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-22143310-14"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-22143310-14');
		</script>
        

	</header><!-- #masthead -->

