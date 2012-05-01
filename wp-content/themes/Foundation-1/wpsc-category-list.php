<?php
/**
 * wpsc-category-shortcode is the code trigered by using the [showcategories] shortcode
 * @package wp-e-commerce 
 * @since 3.8
 */
?>
<ul class="row catergory-list" id="accordion-slider">
	<?php wpsc_start_category_query(array('category_group'=> get_option('wpsc_default_category'), 'show_thumbnails'=> 1)); ?>
    <li class="slide">
      <?php wpsc_print_category_image(get_option('category_image_width'), get_option('category_image_height')); ?>
      <!-- <a href="<?php wpsc_print_category_url();?>" class="slide-image" title="<?php wpsc_print_category_name(); ?>"><?php wpsc_print_category_name(); ?></a> -->
      <div class="slide-data">
        <a href="<?php wpsc_print_category_url();?>" class="slide-image" title="<?php wpsc_print_category_name(); ?>"><h4><?php wpsc_print_category_name(); ?></h4></a>
      </div>
    </li>
	<?php wpsc_end_category_query(); ?>
</ul>