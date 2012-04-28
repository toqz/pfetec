<!-- Start the Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="product-banner">    
    <div class="row">
        <div class="twelve columns">
            <h3><?php the_title(); ?></h3>
            <p> </p>   
        </div>
    </div>
</div>
          
<div class="content static-content about-us">
  <div class="row">
    
    <!-- sidebar -->
    <div class="four columns sidebar">

      <div class="nav">
        <ul class="lvl-1 cat-brand">
          <li>
            <a href="javascript:void(0);">About Us</a>
            <ul>
              <li><a href="http://pfetec.com/wp/wordpress/?page_id=71" class="<?php if( is_page(71) ) echo "selected"; ?>">The Company</a></li>
              <li><a href="http://pfetec.com/wp/wordpress/?page_id=241" class="<?php if( is_page(241) ) echo "selected"; ?>" >Our People</a></li>
              <li><a href="http://pfetec.com/wp/wordpress/?page_id=260" class="<?php if( is_page(260) ) echo "selected"; ?>" >Our Suppliers</a></li>
              <li><a href="http://pfetec.com/wp/wordpress/?page_id=270" class="<?php if( is_page(270) ) echo "selected"; ?> ">Our Clients</a></li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
    <!-- sidebar -->
    
    <!-- Right Content  -->
    <div class="eight columns main">
      <div class="row">
  				<div class="page-content">
  				  <?php
    				  if ('publish' == get_post_status(get_the_ID()) ):
    				    the_content();
    				  endif;
  				  ?>
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

