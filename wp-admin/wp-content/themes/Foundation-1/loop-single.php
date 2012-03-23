<div class="content news">
  <div class="row">
    
    <div class="eight columns">
      
      <!-- Start the Loop -->
    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    		<!-- Begin the first article -->
    		<div class="article">

    			<!-- Display the Title as a link to the Post's permalink. -->
    			<h2 class="news-title">
    				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
    			</h2>

    			<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
    			<span class="news-date"><?php the_time('F jS, Y') ?></span> by <span class="news-author"><?php the_author_posts_link() ?></span>

    			<!-- Display the Post's Content in a div box. -->
    			<div class="news-full">
    				<?php the_content(); ?>
    			</div>

    			<!-- Display a comma separated list of the Post's Categories. -->
    			<p class="postmetadata">Posted in <?php the_category(', '); ?></p>

    		</div>
    		<!-- Closes the first article -->

    		<!-- Begin Comments -->
    	    <?php comments_template( '', true ); ?>
    	    <!-- End Comments -->

    	<!-- Stop The Loop (but note the "else:" - see next line). -->
    	<?php endwhile; else: ?>

    		<!-- The very first "if" tested to see if there were any Posts to -->
    		<!-- display.  This "else" part tells what do if there weren't any. -->
    		<div class="alert-box error">Sorry, no posts matched your criteria.</div>

    	<!--End the loop -->
    	<?php endif; ?>
    	
    </div>
    <!-- End: Left Columns -->
    
    <div class="four columns">
      <?php include('sidebar-news.php'); ?>
    </div>
    <!-- End: Left Columns -->
    
  </div>
</div>