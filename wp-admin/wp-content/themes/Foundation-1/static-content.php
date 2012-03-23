<!-- Start the Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php the_content(); ?>
	
	<!-- Stop The Loop (but note the "else:" - see next line). -->
	<?php endwhile; else: ?>
	
	<!-- The very first "if" tested to see if there were any Posts to -->
	<!-- display.  This "else" part tells what do if there weren't any. -->
	<div class="alert-box error">Sorry, the page you requested was not found</div>
	
<!--End the loop -->
<?php endif; ?>
