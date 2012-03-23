<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
	<!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="initial-scale=1.6; maximum-scale=1.0; width=device-width; "/>
	
	<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
  
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<!-- Begin Container -->
	<div class="container">
		
		<!-- Header Row -->
    <header class="clearfix">
    	<div class="container clearfix">
			  <div class="logo"><a href="<?php echo site_url(); ?>"><?php bloginfo('title'); ?></a></div>
  			<h4 class="subheader"><?php bloginfo('description'); ?></h4>
			  <div class="nav">
			    <?php wp_nav_menu( array( 'theme_location' => 'header-menu','menu_class' => 'nav-bar', 'container' => 'nav') ); ?>
  				<!-- <ul>
  				            <li class="first"><a href="#">HOME</a></li>
  				            <li><a href="#">ABOUT US</a></li>
  				            <li><a href="#">OUR PRODUCTS</a></li>
  				            <li><a href="#">NEWS</a></li>
  				            <li class="last"><a href="#">CONTACT US</a></li>
  				          </ul> -->
  			</div>
		</div>		
    </header>
		<!-- Header Row -->
		
		<!-- Main Row -->
		<div class="row">
				