
<!-- Start the Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
  <!-- Product Banner -->
  <div class="product-banner">    
      <div class="row">
          <div class="twelve columns">
              <h3>Products</h3>
              <p></p>
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
	<div class="product content">
	  <div id="default_products_page_container" class="row">
	    <?php wpsc_output_breadcrumbs(); ?>
	    <?php include('wpsc-sidebar-list.php'); ?>
	    
	    <div class="eight columns main">
	      <div class="no-product">
	        <h2>No product found on this category</h2>
	      </div>
	    </div>
	  </div>
  </div>
<!--End the loop -->
<?php endif; ?>