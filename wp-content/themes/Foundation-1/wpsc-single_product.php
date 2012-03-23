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
					<div class="imagecol">
					  <h2><?php echo wpsc_the_product_title(); ?></h2>
						<?php if ( wpsc_the_product_image() ) : ?>
									<img class="product_image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="<?php echo wpsc_the_product_title(); ?>" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo wpsc_the_product_image(); ?>"/>
						<?php else: ?>
									<img class="no-image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="No Image" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo WPSC_CORE_THEME_URL; ?>wpsc-images/noimage.png" width="<?php echo get_option('product_image_width'); ?>" height="<?php echo get_option('product_image_height'); ?>" />
						<?php endif; ?>
					</div><!--close imagecol-->

					<div class="productcol">			
						<?php do_action( 'wpsc_product_addons', wpsc_the_product_id() ); ?>		
						
						<!-- Start Additional Description -->
						<?php if ( wpsc_the_product_additional_description() ) : ?>
							<div class="single_additional_description">
								<p><?php echo wpsc_the_product_additional_description(); ?></p>
							</div><!--close single_additional_description-->
						<?php endif; ?>	
						<!-- End Additional Description -->
						
						<?php do_action( 'wpsc_product_addon_after_descr', wpsc_the_product_id() ); ?>
						<?php do_action('wpsc_product_before_description', wpsc_the_product_id(), $wp_query->post); ?>
						
						<!-- Start Product Description -->
						<div class="product_description row">
							
							<?php echo wpsc_the_product_description(); ?>
							
							<!-- Start Downloadables -->
						  <?php
						  
						  $downloadables = $wpdb->get_results("SELECT * FROM wp_posts where post_parent = '" . wpsc_the_product_id() .  "' AND post_type = 'wpsc-product-file'" ,ARRAY_A);
                              
						  foreach( $downloadables as $downloadable ){
						    
                // echo '<pre>';
                // var_dump ( $downloadable );
                // echo '</pre>';

                  $pattern_tds = '/^tds-/i';
                  $pattern_msds = '/^msds-/i';
                  $pattern_cert = '/^cert-/i';
                  
                  $pattern_pdf = '/pdf/i';
                  
                  preg_match("tds-", $val['post_title'], $matches);
                  
                  if( preg_match( $pattern_pdf, $downloadable['post_mime_type'] ) ){
                    
                    // TDS
                    if( preg_match($pattern_tds, $downloadable['post_title'] ) ){
                      $tds_html .= "<li><a href=\"". $downloadable['guid'] ."\" class=\"dl-pdf\">Technical Data Sheet</a></li>";
                    }
                    // MSDS
                    if( preg_match($pattern_msds, $downloadable['post_title'] ) ){
                      $msds_html .= "<li><a href=\"". $downloadable['guid'] ."\" target=\"_blank\" class=\"dl-pdf\" >MSDS</a></li>";
                    }
                    // CERTIFICATE
                    if( preg_match($pattern_cert, $downloadable['post_title'] ) ){
                      $cert_html .= "<li><a href=\"". $downloadable['guid'] ."\" target=\"_blank\" class=\"dl-pdf\" >CERTIFICATE</a></li>";
                    }
                    
                    $pdf_html .= '<div class="four columns">';
                    $pdf_html .= '<div class="downloads"><p class="dl-title">Downloads</p><ul>';
                    $pdf_html .= $tds_html . $msds_html . $cert_html;
                    $pdf_html .= '</ul></div></div>';
                  }
						  }
						  
						  echo $pdf_html;
						  
						  ?>
							<!-- End Downloadables -->
							
						</div>
						<!-- End Product Description -->
						
						<?php
						/**
						 * Custom meta HTML and loop
						 */
						?>
            <?php if (wpsc_have_custom_meta()) : ?>
						<div class="custom_meta">
							<?php while ( wpsc_have_custom_meta() ) : wpsc_the_custom_meta(); ?>
								<strong><?php echo wpsc_custom_meta_name(); ?>: </strong><?php echo wpsc_custom_meta_value(); ?><br />
							<?php endwhile; ?>
						</div><!--close custom_meta-->
                        <?php endif; ?>
						<?php
						/**
						 * Form data
						 */
						?>
						
						<form class="product_form" enctype="multipart/form-data" action="<?php echo wpsc_this_page_url(); ?>" method="post" name="1" id="product_<?php echo wpsc_the_product_id(); ?>">
							<?php do_action ( 'wpsc_product_form_fields_begin' ); ?>
							<?php if ( wpsc_product_has_personal_text() ) : ?>
								<fieldset class="custom_text">
									<legend><?php _e( 'Personalize Your Product', 'wpsc' ); ?></legend>
									<p><?php _e( 'Complete this form to include a personalized message with your purchase.', 'wpsc' ); ?></p>
									<textarea cols='55' rows='5' name="custom_text"></textarea>
								</fieldset>
							<?php endif; ?>
						
							<?php if ( wpsc_product_has_supplied_file() ) : ?>

								<fieldset class="custom_file">
									<legend><?php _e( 'Upload a File', 'wpsc' ); ?></legend>
									<p><?php _e( 'Select a file from your computer to include with this purchase.', 'wpsc' ); ?></p>
									<input type="file" name="custom_file" />
								</fieldset>
							<?php endif; ?>	
						<?php /** the variation group HTML and loop */?>
                        <?php if (wpsc_have_variation_groups()) { ?>
                        <fieldset><legend><?php _e('Product Options', 'wpsc'); ?></legend>
						<div class="wpsc_variation_forms">
                        	<table>
							<?php while (wpsc_have_variation_groups()) : wpsc_the_variation_group(); ?>
								<tr><td class="col1"><label for="<?php echo wpsc_vargrp_form_id(); ?>"><?php echo wpsc_the_vargrp_name(); ?>:</label></td>
								<?php /** the variation HTML and loop */?>
								<td class="col2"><select class="wpsc_select_variation" name="variation[<?php echo wpsc_vargrp_id(); ?>]" id="<?php echo wpsc_vargrp_form_id(); ?>">
								<?php while (wpsc_have_variations()) : wpsc_the_variation(); ?>
									<option value="<?php echo wpsc_the_variation_id(); ?>" <?php echo wpsc_the_variation_out_of_stock(); ?>><?php echo wpsc_the_variation_name(); ?></option>
								<?php endwhile; ?>
								</select></td></tr> 
							<?php endwhile; ?>
                            </table>
						</div><!--close wpsc_variation_forms-->
                        </fieldset>
						<?php } ?>
						<?php /** the variation group HTML and loop ends here */?>

							<?php
							/**
							 * Quantity options - MUST be enabled in Admin Settings
							 */
							?>
							<?php if(wpsc_has_multi_adding()): ?>
                            	<fieldset><legend><?php _e('Quantity', 'wpsc'); ?></legend>
								<div class="wpsc_quantity_update">
								<input type="text" id="wpsc_quantity_update_<?php echo wpsc_the_product_id(); ?>" name="wpsc_quantity_update" size="2" value="1" />
								<input type="hidden" name="key" value="<?php echo wpsc_the_cart_item_key(); ?>"/>
								<input type="hidden" name="wpsc_update_quantity" value="true" />
                                </div><!--close wpsc_quantity_update-->
                                </fieldset>
							<?php endif ;?>
	
							<!--sharethis-->
							<?php if ( get_option( 'wpsc_share_this' ) == 1 ): ?>
							<div class="st_sharethis" displayText="ShareThis"></div>
							<?php endif; ?>
							<!--end sharethis-->
							<input type="hidden" value="add_to_cart" name="wpsc_ajax_action" />
							<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="product_id" />					
							<?php if( wpsc_product_is_customisable() ) : ?>
								<input type="hidden" value="true" name="is_customisable"/>
							<?php endif; ?>
					
							<?php
							/**
							 * Cart Options
							 */
							?>

							<?php if((get_option('hide_addtocart_button') == 0) &&  (get_option('addtocart_or_buynow') !='1')) : ?>
								<?php if(wpsc_product_has_stock()) : ?>
									<div class="wpsc_buy_button_container">
											<?php if(wpsc_product_external_link(wpsc_the_product_id()) != '') : ?>
											<?php $action = wpsc_product_external_link( wpsc_the_product_id() ); ?>
											<input class="wpsc_buy_button" type="submit" value="<?php echo wpsc_product_external_link_text( wpsc_the_product_id(), __( 'Buy Now', 'wpsc' ) ); ?>" onclick="return gotoexternallink('<?php echo $action; ?>', '<?php echo wpsc_product_external_link_target( wpsc_the_product_id() ); ?>')">
											<?php else: ?>
										<input type="submit" value="<?php _e('Add To Cart', 'wpsc'); ?>" name="Buy" class="wpsc_buy_button" id="product_<?php echo wpsc_the_product_id(); ?>_submit_button"/>
											<?php endif; ?>
										<div class="wpsc_loading_animation">
											<img title="Loading" alt="Loading" src="<?php echo wpsc_loading_animation_url(); ?>" />
											<?php _e('Updating cart...', 'wpsc'); ?>
										</div><!--close wpsc_loading_animation-->
									</div><!--close wpsc_buy_button_container-->
								<?php else : ?>
									<p class="soldout"><?php _e('This product has sold out.', 'wpsc'); ?></p>
								<?php endif ; ?>
							<?php endif ; ?>
							<?php do_action ( 'wpsc_product_form_fields_end' ); ?>
						</form><!--close product_form-->
					
						<?php
							if ( (get_option( 'hide_addtocart_button' ) == 0 ) && ( get_option( 'addtocart_or_buynow' ) == '1' ) )
								echo wpsc_buy_now_button( wpsc_the_product_id() );
					
							echo wpsc_product_rater();

							echo wpsc_also_bought( wpsc_the_product_id() );
						
						if(wpsc_show_fb_like()): ?>
	                        <div class="FB_like">
	                        <iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo wpsc_the_product_permalink(); ?>&amp;layout=standard&amp;show_faces=true&amp;width=435&amp;action=like&amp;font=arial&amp;colorscheme=light" frameborder="0"></iframe>
	                        </div><!--close FB_like-->
                        <?php endif; ?>
					</div><!--close productcol-->
		
					<form onsubmit="submitform(this);return false;" action="<?php echo wpsc_this_page_url(); ?>" method="post" name="product_<?php echo wpsc_the_product_id(); ?>" id="product_extra_<?php echo wpsc_the_product_id(); ?>">
						<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="prodid"/>
						<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="item"/>
					</form>
					
				
		</div><!--close single_product_display-->
</div><!-- close eight columns -->
		
		<?php echo wpsc_product_comments(); ?>

<?php endwhile;

    do_action( 'wpsc_theme_footer' ); ?> 	

</div><!--close single_product_page_container-->
