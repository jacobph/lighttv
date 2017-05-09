<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin 
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); 
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but I would keep it around.
?>
</head>

<body 
	<?php body_class(); 
	// This will display a class specific to whatever is being loaded by Wordpress
	// i.e. on a home page, it will return [class="home"]
	// on a single post, it will return [class="single postid-{ID}"]
	// and the list goes on. Look it up if you want more.
	?>
>

<header class="site-header js_site-header">
	<div class="menu-button menu-open js_menu-toggle"></div>
	<div class="container">
		<?php include "social-icons.php" ?>
		<h1 class="site-title">
			<a class="site-title__link" href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home">
				<img src="/wp-content/themes/lighttv/img/LTV_LOGO_COLOR.PNG" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>">
			</a>
		</h1><!-- .site-title -->
	
		<nav class="site-navigation">
			<?php if (strpos($_SERVER['REQUEST_URI'], 'index.php') || ($_SERVER['REQUEST_URI'] === "")) {
				$watchLink = '#section-live';
			} else {
				$watchLink = '/index.php#section-live';
			}?>
			<a class="site-navigation__button button-watch js_button-watch" href="<?php echo $watchLink; ?>">watch <b>LIGHTtv</b> now</a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
			<a class="site-navigation__button button-find js_button-find" href="#">find <b>LIGHTtv</b> in your area</a>
		</nav><!-- .site-navigation  -->
	</div>
</header><!-- #masthead .site-header -->

<div class="header-channel-finder hidden js_header-channel-finder">
	<?php include 'finder.php'; ?>
</div> <!-- .header-channel-finder -->

<div class="mobile-menu js_mobile-menu">
	<div class="menu-button menu-close js_menu-toggle"></div>
	<nav class="mobile-nav">
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
	</nav>
	<a class="site-navigation__button button-watch js_button-watch" href="/index.php#section-live">watch <b>LIGHTtv</b> now</a>
	<?php include "finder.php" ?>
	<?php include "social-icons.php" ?>
</div><!-- .mobile-menu -->

<main class="main-fluid"><!-- start the page containter -->
