<?php get_header(); ?>

<div class="content">
  <div class="row">
    <?php get_template_part( 'loop', 'page' ); ?>

    <?php get_sidebar(); ?>
  </div>
</div>
		
<?php get_footer(); ?>