<?php
	// Setup globals
	// @todo: Get these out of template
	global $wp_query;

	// Setup image width and height variables
	// @todo: Investigate if these are still needed here
	$image_width  = get_option( 'single_view_image_width' );
	$image_height = get_option( 'single_view_image_height' );
?>

<div id="single_product_page_container" class="row">
	
	<?php
		// Breadcrumbs
		wpsc_output_breadcrumbs();

		// Plugin hook for adding things to the top of the products page, like the live search
		do_action( 'wpsc_top_of_products_page' );
	?>

<?php include('wpsc-sidebar-list.php'); ?>
	
<div class="eight columns main">	
	
	<div class="single_product_display group">
<?php
		/**
		 * Start the product loop here.
		 * This is single products view, so there should be only one
		 */
		while ( wpsc_have_products() ) : wpsc_the_product(); ?>
          
          <!--  Start: image -->
					<div class="imagecol">
					  <h2><?php echo wpsc_the_product_title(); ?></h2>
					  <div id="img-container" class="img-container">
						  <?php if ( wpsc_the_product_image() ) : ?>
									<img class="product_image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="<?php echo wpsc_the_product_title(); ?>" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo wpsc_the_product_image(); ?>"/>
						  <?php else: ?>
									<img class="no-image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="No Image" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo WPSC_CORE_THEME_URL; ?>wpsc-images/noimage.png" width="<?php echo get_option('product_image_width'); ?>" height="<?php echo get_option('product_image_height'); ?>" />
						  <?php endif; ?>
						</div>
						
            <!-- Start: thumbnail -->
						<div id="imgs-thumb" class="imgs-thumb clearfix">
						  <div class="imgs-thumb-center">
                <?php wpsc_the_product_images(); ?>
              </div>
            </div>
            <!-- End: thumbnail -->
            
					</div>
					<!--  End: image -->
          
					<div class="productcol">			
						<?php do_action( 'wpsc_product_addons', wpsc_the_product_id() ); ?>		
						
						<!-- Start: Short Description -->
						<?php if ( wpsc_the_product_additional_description() ) : ?>
							<div class="single_additional_description">
								<p><?php echo wpsc_the_product_additional_description(); ?></p>
							</div>
						<?php endif; ?>	
						<!-- End: Short Description -->
						
						<?php do_action( 'wpsc_product_addon_after_descr', wpsc_the_product_id() ); ?>
						<?php do_action('wpsc_product_before_description', wpsc_the_product_id(), $wp_query->post); ?>
						
						<!-- Start Product Description -->
						<div class="product_description row">
							
							<?php echo wpsc_the_product_description(); ?>
							
							<!-- Start Downloadables -->
						  <?php
						  
						  $downloadables = $wpdb->get_results("SELECT * FROM wp_posts where post_parent = '" . wpsc_the_product_id() .  "' AND post_type = 'wpsc-product-file'" ,ARRAY_A);
                              
						  foreach( $downloadables as $downloadable ){
						    
                  $pattern_tds = '/^tds-/i';
                  $pattern_msds = '/^msds-/i';
                  $pattern_cert = '/^cert-/i';
                  
                  $pattern_pdf = '/pdf/i';
                  
                  preg_match("tds-", $val['post_title'], $matches);
                  
                  if( preg_match( $pattern_pdf, $downloadable['post_mime_type'] ) ){
                    
                    // TDS
                    if( preg_match($pattern_tds, $downloadable['post_title'] ) ){
                      $tds_html .= "<li><a href=\"". $downloadable['guid'] ."\" class=\"dl-pdf\" target=\"_blank\">Technical Data Sheet</a></li>";
                    }
                    // MSDS
                    if( preg_match($pattern_msds, $downloadable['post_title'] ) ){
                      $msds_html .= "<li><a href=\"". $downloadable['guid'] ."\" target=\"_blank\" class=\"dl-pdf\" >MSDS</a></li>";
                    }
                    // CERTIFICATE
                    if( preg_match($pattern_cert, $downloadable['post_title'] ) ){
                      $cert_html .= "<li><a href=\"". $downloadable['guid'] ."\" target=\"_blank\" class=\"dl-pdf\" >CERTIFICATE</a></li>";
                    }
                  }
						  }
						  
              if ( count($downloadables) > 0 ){
                $pdf_html .= '<div class="four columns">';
                $pdf_html .= '<div class="downloads"><p class="dl-title">Downloads</p><ul>';
                $pdf_html .= $tds_html . $msds_html . $cert_html;
                $pdf_html .= '</ul></div></div>';
                echo $pdf_html;
              }

						  ?>
							<!-- End Downloadables -->
							
						</div>
						<!-- End Product Description -->
											
					</div>
					<!--End productcol-->
		
		</div>
		<!--close single_product_display-->
		
</div>
<!-- close eight columns -->
		
<?php
  // Close product loop
  endwhile; 
  do_action( 'wpsc_theme_footer' ); 
?> 	

</div>
<!--close single_product_page_container-->
