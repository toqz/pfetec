<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
	<!-- Set the viewport width to device width for mobile -->
  <!-- <meta name="viewport" content="initial-scale=1.6; maximum-scale=1.0; width=device-width; "/> -->
	
	<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
  
  <!-- Included CSS Files -->
	<!-- Combine and Compress These CSS Files -->
	<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700,400italic,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/globals.css">
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/typography.css">
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/grid.css">
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/ui.css">
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/forms.css">
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/orbit.css">
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/reveal.css">
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/mobile.css">
  <!-- End Combine and Compress These CSS Files -->
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/app.css">
  
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/stylesheets/ie.css">
	<![endif]-->
	
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBrmySoU4kGHUJjGxj9Ewgsh61QU3m1Hic&sensor=true" type="text/javascript"></script>
</head>

<body <?php body_class(); ?>>
  <!--Container-->
  <div class="container">
      <div class="header">
          <div class="row">
              <div class="four columns">
                 <a href="<?php echo site_url(); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/misc/logo.png" /></a>
              </div>
              <div class="eight columns">
                  <div class="row">
                      <div class="main-nav">
                        <!-- <?php wp_nav_menu( array( 'theme_location' => 'header-menu','menu_class' => 'nav-bar', 'container' => 'div') ); ?>  -->   
                        <div class="two columns"><a href="<?php bloginfo( 'url' ); ?>">HOME</a></div>
                        <div class="two columns"><a href="<?php bloginfo( 'url' ); ?>/?page_id=71">ABOUT US</a></div> 
                        <div class="three columns"><a href="<?php bloginfo( 'url' ); ?>/?wpsc-product=product-home">OUR PRODUCTS</a></div>
                        <div class="two columns"><a href="<?php bloginfo( 'url' ); ?>/?cat=45">NEWS</a></div>
                        <div class="three columns"><a href="<?php bloginfo( 'url' ); ?>/?page_id=74">CONTACT US</a></div>
                      </div>
                  </div>
              </div>
          </div>        
      </div>
