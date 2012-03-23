<?php
/**
 * wpsc-category-shortcode is the code trigered by using the [showcategories] shortcode
 * @package wp-e-commerce 
 * @since 3.8
 */
?>
<div class="row catergory-list">
	<?php wpsc_start_category_query(array('category_group'=> get_option('wpsc_default_category'), 'show_thumbnails'=> 1)); ?>
    <div class="six columns brand-logo">
			<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_grid_item" title="<?php wpsc_print_category_name(); ?>">
  			<?php wpsc_print_category_image(get_option('category_image_width'),get_option('category_image_height')); ?>
  		</a>
    </div>
	<?php wpsc_end_category_query(); ?>
</div>