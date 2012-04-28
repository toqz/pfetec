<h1>Loop-page.php</h1>
<!-- Start the Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
  <!-- Product Banner -->
  <div class="product-banner">    
      <div class="row">
          <div class="twelve columns">
              <h3>Products</h3>
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec dui urna. Integer vel arcu id nisi aliquet lobortis non sit amet tellus. Nunc in ultricies ligula. Vestibulum id nunc et leo laoreet aliquet sit amet non lectus. Curabitur ac diam odio, in pretium est. </p>     -->
          </div>
      </div>
  </div>
  <!-- End: Product Banner -->		
	
	<!-- Display the Page's Content in a div box. -->
	<div class="product content">
	    <?php the_content(); ?>
	</div>

<!-- Stop The Loop (but note the "else:" - see next line). -->
<?php endwhile; else: ?>

	<!-- The very first "if" tested to see if there were any Posts to -->
	<!-- display.  This "else" part tells what do if there weren't any. -->
	<!-- <div class="alert-box error">Sorry, the page you requested was not found</div> -->
  <?php include('page-not-found.php'); ?>
  
<!--End the loop -->
<?php endif; ?>
	
