<!-- Start the Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
<div class="product-banner">    
    <div class="row">
        <div class="twelve columns">
            <?php //if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  

            <h3><?php the_title(); ?></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec dui urna. Integer vel arcu id nisi aliquet lobortis non sit amet tellus. Nunc in ultricies ligula. Vestibulum id nunc et leo laoreet aliquet sit amet non lectus. Curabitur ac diam odio, in pretium est. </p>   

            <?php// endif; ?> 

        </div>
    </div>
</div>
        
<div class="content static-content">
  <div class="row">
    
    <!-- Left Sidebar -->
    <?php 
      if( is_page(array(71,241,260,270)) ){
        include ('sidebar-about.php');
      }
    ?>
    <!-- End: Left Sidebar -->
    
    <!-- Right Content     -->
    <div class="eight columns main">
      
      <div class="row">

  				<div class="page-content">
  				  <?php the_content(); ?>
  		    </div>
        
      </div>
      
    </div>
    <!-- End: Right Content -->
    
  </div>
</div>

<!-- Stop The Loop (but note the "else:" - see next line). -->
<?php endwhile; else: ?>

<!-- The very first "if" tested to see if there were any Posts to -->
<!-- display.  This "else" part tells what do if there weren't any. -->
<div class="alert-box error">Sorry, the page you requested was not found</div>

<!--End the loop -->
<?php endif; ?>

