<!-- Start the Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
<div class="product-banner">    
  <div class="row">
    <div class="twelve columns">
      <h3><?php the_title(); ?></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec dui urna. Integer vel arcu id nisi aliquet lobortis non sit amet tellus. Nunc in ultricies ligula. Vestibulum id nunc et leo laoreet aliquet sit amet non lectus. Curabitur ac diam odio, in pretium est. </p>
    </div>
  </div>
</div>

<?php
	if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
		wpcf7_enqueue_scripts();
		wpcf7_enqueue_styles();
	}
?>
<div class="content contact">
  <div class="row">
    <div class="six columns">
      <h2>Office Location</h2>
      <p>We are located at <span class="red-text">9 Gul Street 4 Singapore 629238</span></p>
      <div class="contact-map" id="contact-map"></div>
      <div class="row contact-footer">
        <div class="six columns">
          <div class="phone">(Telephone) <span class="phone-num">+65 6558 6388</span></div>
          <div class="phone">(Fax) <span class="phone-num">+65 6558 7310</span></div>
        </div>
        <div class="six columns">
          <div class="mail">(Email) <span class="mail-add">+65 6558 7310</span></div>
          <div class="mail">(Tech Support) <span class="mail-add">+65 6558 7310</span></div>          
        </div>
      </div>
    </div>
    
    <div class="six columns">
      <h2>Contact Us</h2>
      <p>If you have any questions, feel free to contact us:</p>
      <?php the_content(); ?>
    </div>
    
  </div>
</div>
  
<!-- Stop The Loop (but note the "else:" - see next line). -->
<?php endwhile; else: ?>

<!-- The very first "if" tested to see if there were any Posts to -->
<!-- display.  This "else" part tells what do if there weren't any. -->
<?php include("page-not-found.php"); ?>

<!--End the loop -->
<?php endif; ?>

