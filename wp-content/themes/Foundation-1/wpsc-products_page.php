<?php
global $wp_query;	
$image_width = get_option('product_image_width');
/*
 * Most functions called in this page can be found in the wpsc_query.php file
 */
?>
<div id="default_products_page_container" class="row">

  <?php wpsc_output_breadcrumbs(); ?>
  <?php //include("sidebar-product-search.php"); ?>
	
	<?php do_action('wpsc_top_of_products_page'); // Plugin hook for adding things to the top of the products page, like the live search ?>
	
  <!-- Begin: Sidebar -->
	<?php if(wpsc_display_categories()): ?>
	  <?php if(wpsc_category_grid_view()) :?>
			<div class="wpsc_categories wpsc_category_grid group">
				<?php wpsc_start_category_query(array('category_group'=> get_option('wpsc_default_category'), 'show_thumbnails'=> 1)); ?>
					<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_grid_item  <?php wpsc_print_category_classes_section(); ?>" title="<?php wpsc_print_category_name(); ?>">
						<?php wpsc_print_category_image(get_option('category_image_width'),get_option('category_image_height')); ?>
					</a>
					<?php wpsc_print_subcategory("", ""); ?>
				<?php wpsc_end_category_query(); ?>
				
			</div><!--close wpsc_categories-->
	  <?php else:?>
    
    <?php include('wpsc-sidebar-list.php'); ?>
		
		<?php endif; ?>
	<?php endif; ?>
	<!-- End: Sidebar -->
	
<?php // */ ?>
	
	<?php if(wpsc_display_products()): ?>
		
		<div class="eight columns main product-list">
		
    <!-- Begin: Top pagination -->
		<?php if(wpsc_has_pages_top()) : ?>
		<div class="pagination clearfix">
			<div class="wpsc_page_numbers_top">
				<?php wpsc_pagination(); ?>
			</div>
		</div>
		<?php endif; ?>
		<!-- End: Top pagination -->
		
    <!-- Begin: Products List -->
		<?php while (wpsc_have_products()) :  wpsc_the_product(); ?>
			
			<div class="row item" data-product-link="<?php echo wpsc_the_product_permalink(); ?>">
			    
        <!-- Begin: Product thumbnail -->
				<?php if(wpsc_show_thumbnails()) :?>
					<div class="three columns product-list-thumb">
						<?php if(wpsc_the_product_thumbnail()) :
						?>
							<a href="<?php echo wpsc_the_product_permalink(); ?>">
							  <img class="product_image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="<?php echo wpsc_the_product_title(); ?>" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo wpsc_the_product_thumbnail(); ?>"/>
							</a>
						<?php else: ?>
								<img class="no-image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="No Image" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo WPSC_CORE_THEME_URL; ?>wpsc-images/noimage.png" width="<?php echo get_option('product_image_width'); ?>" height="<?php echo get_option('product_image_height'); ?>" />	
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<!-- End: Product thumbnail -->
				
        <!-- Begin: Product Details -->
			  <div class="nine columns">
				  <h3><?php echo wpsc_the_product_title(); ?></h3>
					<div class="productcol">
						<?php
							do_action('wpsc_product_before_description', wpsc_the_product_id(), $wp_query->post);
							do_action('wpsc_product_addons', wpsc_the_product_id());
						?>
						
						<div class="wpsc_description">
							<?php echo wpsc_the_product_additional_description(); ?>
						</div>
				    
				    <a class="more-info" href="<?php echo wpsc_the_product_permalink(); ?>">View Details</a>
				    
						<form class="product_form"  enctype="multipart/form-data" action="<?php echo $action; ?>" method="post" name="product_<?php echo wpsc_the_product_id(); ?>" id="product_<?php echo wpsc_the_product_id(); ?>" >
						<?php do_action ( 'wpsc_product_form_fields_begin' ); ?>
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
				
							<?php if((get_option('hide_addtocart_button') == 0) &&  (get_option('addtocart_or_buynow') !='1')) : ?>
								<?php if(wpsc_product_has_stock()) : ?>
									<div class="wpsc_buy_button_container">
										<div class="wpsc_loading_animation">
											<img title="Loading" alt="Loading" src="<?php echo wpsc_loading_animation_url(); ?>" />
											<?php _e('Updating cart...', 'wpsc'); ?>
										</div><!--close wpsc_loading_animation-->
											<?php if(wpsc_product_external_link(wpsc_the_product_id()) != '') : ?>
											<?php $action = wpsc_product_external_link( wpsc_the_product_id() ); ?>
											<input class="wpsc_buy_button" type="submit" value="<?php echo wpsc_product_external_link_text( wpsc_the_product_id(), __( 'Buy Now', 'wpsc' ) ); ?>" onclick="return gotoexternallink('<?php echo $action; ?>', '<?php echo wpsc_product_external_link_target( wpsc_the_product_id() ); ?>')">
											<?php else: ?>
										<input type="submit" value="<?php _e('Add To Cart', 'wpsc'); ?>" name="Buy" class="wpsc_buy_button" id="product_<?php echo wpsc_the_product_id(); ?>_submit_button"/>
											<?php endif; ?>
									</div><!--close wpsc_buy_button_container-->
								<?php endif ; ?>
							<?php endif ; ?>
							<div class="entry-utility wpsc_product_utility">
								<?php edit_post_link( __( 'Edit', 'wpsc' ), '<span class="edit-link">', '</span>' ); ?>
							</div>
							<?php do_action ( 'wpsc_product_form_fields_end' ); ?>
						</form><!--close product_form-->
						
						<?php echo wpsc_product_rater(); ?>
											
					<?php // */ ?>
				</div><!--close productcol-->
			</div><!--eight column-->
			
			<?php if(wpsc_product_on_special()) : ?><span class="sale"><?php _e('Sale', 'wpsc'); ?></span><?php endif; ?>
		</div><!--close item-->

		<?php endwhile; ?>
		
		<?php /** end the product loop here */?>

		<?php if(wpsc_product_count() == 0):?>
			<h3><?php  _e('There are no products in this group.', 'wpsc'); ?></h3>
		<?php endif ; ?>
	    
	    <?php do_action( 'wpsc_theme_footer' ); ?> 	
      
    <!-- Begin: Pagination Bottom -->
		<?php if(wpsc_has_pages_bottom()) : ?>
		<div class="pagination clearfix">
  		<div class="wpsc_page_numbers_bottom">
  			<?php wpsc_pagination(); ?>
  		</div>
    </div>
		<?php endif; ?>
		<!-- End: Pagination Bottom -->
		
	</div>
		
	<?php endif; ?>
</div><!--close default_products_page_container-->
