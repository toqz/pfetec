<!-- Start the Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
<div class="product-banner">    
  <div class="row">
    <div class="twelve columns">
      <h3>Contact Us</h3>
      <p><?php the_title(); ?> </p>
    </div>
  </div>
</div>

<?php
	if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
		wpcf7_enqueue_scripts();
		wpcf7_enqueue_styles();
	}
?>

      <?php the_content(); ?>
  
<!-- Stop The Loop (but note the "else:" - see next line). -->
<?php endwhile; else: ?>

<!-- The very first "if" tested to see if there were any Posts to -->
<!-- display.  This "else" part tells what do if there weren't any. -->
<?php include("page-not-found.php"); ?>

<!--End the loop -->
<?php endif; ?>

