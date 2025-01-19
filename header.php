<?php
/**
 * Template for the site header
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package PerleMedia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Abel&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'perlemedia' ); ?></a>
	
	<header id="header" class="site-header">
		<div id="cta-bar">
			<div class="site-container">
				<div class="cta-wrapper flex desktop">
					<div class="cta-socials">
						<a href="https://www.facebook.com/www.GamaGroup.ie/" target="_blank">
							<img src='<?php echo get_site_url(); ?>/wp-content/uploads/2025/01/facebook.png' />
						</a>
					</div>
					<div class="cta-phone flex v-top">
						<div style="padding-right:5px;">
							Call: 
						</div>	
						<div>
							<a href="<?php echo get_site_url(); ?>/contact-us/"><?php echo get_field('company_phone', 'option');?></a> <br/>
							<a href="<?php echo get_site_url(); ?>/contact-us/"><?php echo get_field('company_phone_secondary', 'option');?></a>
						</div>
					</div>
					<div class="cta-email">
						Email: <a href="mailto:<?php echo get_field('company_email', 'option');?>"><?php echo get_field('company_email', 'option');?></a>
					</div>
					<div class="cta-contact">
						<a href="<?php echo get_site_url(); ?>/contact-us/" class="button">Contact Us Now</a>
					</div>
				</div>
				<div class="cta-wrapper flex mobile">
					<a href="tel:<?php echo get_field('company_phone', 'option');?>" class="button white full-width">Call Us</a>
					<a href="mailto:<?php echo get_field('company_email', 'option');?>" class="button white full-width">Email Us</a>
					<a href="<?php echo get_site_url(); ?>/contact-us/" class="button full-width">Contact us now</a>
				</div>
			</div>
			
		</div>

		<div class="site-container">
			
			<div id="site-branding">
				<?php if(the_custom_logo()) : the_custom_logo(); else : ?>
					<!-- <h1 class="site-title sub-heading"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> -->
				<?php endif; ?>
				</div><!-- #site-branding -->

			<nav id="site-navigation" class="main-navigation">
			<button id="menu-toggle" aria-controls="primary-menu" aria-expanded="false" onclick="menuToggle()"><span class="hamburger"></span></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->

		</div><!-- .site-container -->
	</header><!-- #header -->
