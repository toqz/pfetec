<div class="product-banner">    
  <div class="row">
    <div class="twelve columns">
      <h3>News</h3>
    </div>
  </div>
</div>

<!-- Start the Loop -->
<div class="content">
  <div class="row">
    

    <div class="eight columns">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    

         <div class="row news">
           <div class="ten columns">  
             <h2>
               <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
               <small><?php the_date(); ?></small>
             </h2>
             <p><?php echo get_the_excerpt(); ?></p>
             <a href="<?php echo get_permalink(); ?>" class="read-more">read more</a>
           </div>
         </div>
       
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