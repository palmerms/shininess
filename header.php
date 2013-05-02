<?php /* Header for Shininess Theme */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/normalize.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link href='http://fonts.googleapis.com/css?family=Overlock:400,700,900,700italic,900italic|Niconne|Felipa|Alex+Brush|Redressed|Arizonia|Playball|Rancho|Herr+Von+Muellerhoff|Pinyon+Script|Qwigley|Allan' rel='stylesheet' type='text/css'>
        <script src="<?php bloginfo( 'template_url' ); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
		<?php wp_head(); ?>
		<script type="text/javascript">
			jQuery(function($){
				$(document).ready(function(){
				// superFish
				$('ul.sf-menu').supersubs({
				minWidth:    16, // minimum width of sub-menus in em units
				maxWidth:    40, // maximum width of sub-menus in em units
				extraWidth:  1 // extra width can ensure lines don't sometimes turn over
				})
				.superfish(); // call supersubs first, then superfish
				});
				});
		</script>
    </head>
    <body <?php body_class(); ?>>
		<?php /* wp_nav_menu( array( 'theme_location' => 'menu1', 'container' => 'nav', 'container_class' => 'menu1nav fullwidth', 'menu_class' => 'sf-menu' ) ) */ ?>
		<header id="siteheader" class="fullwidth">
			<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
		</header>

		<?php wp_nav_menu( array( 'theme_location' => 'menu2', 'container' => 'nav', 'container_class' => 'menu2nav fullwidth', 'menu_class' => 'sf-menu' ) ) ?>