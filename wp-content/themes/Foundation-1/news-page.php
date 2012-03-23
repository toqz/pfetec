<div class="product-banner">    
  <div class="row">
    <div class="twelve columns">
      <h3>News</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec dui urna. Integer vel arcu id nisi aliquet lobortis non sit amet tellus. Nunc in ultricies ligula. Vestibulum id nunc et leo laoreet aliquet sit amet non lectus. Curabitur ac diam odio, in pretium est. </p>
    </div>
  </div>
</div>

<!-- Start the Loop -->
<div class="content">
  <div class="row">
    

    <div class="eight columns">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    

        <div class="row news">
          <h2> <?php the_title(); ?> </h2>
          <p><?php the_content(); ?></p>
          <a href="<?php the_permalink() ?>" class="read-more">read more</a>
        </div>

       <!-- End: news -->
       
      <!-- Stop The Loop (but note the "else:" - see next line). -->
      <?php endwhile; else: ?>
         <!-- The very first "if" tested to see if there were any Posts to -->
         <!-- display.  This "else" part tells what do if there weren't any. -->
         <div class="alert-box error">Sorry, the page you requested was not found</div>
         <!--End the loop -->
       <?php endif; ?>

    </div>
    <!-- End: eight columns -->
    
    <div class="four columns">
      <?php include('sidebar-news.php'); ?>
    </div>
   
  </div>
  <!-- End: row news -->
  
</div>
<!-- End: Content -->