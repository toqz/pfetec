<!-- sidebar -->
<div class="four columns sidebar">  
  <div class="nav">  
    	<ul class="wpsc_categories cat-brand">
				<?php wpsc_start_category_query(array('category_group'=>'klingspor', 'show_thumbnails'=> get_option('show_category_thumbnails'))); ?>
					<li>
						<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_link <?php wpsc_print_category_classes_section(); ?>" title="<?php wpsc_print_category_name(); ?>"><?php wpsc_print_category_name(); ?></a>
				
						<?php wpsc_print_subcategory("<ul class='sub-category'>", "</ul>"); ?>
					</li>
				<?php wpsc_end_category_query(); ?>
			</ul>
	</div>
</div>
<!-- sidebar -->
