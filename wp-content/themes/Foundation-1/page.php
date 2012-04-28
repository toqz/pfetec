<?php get_header(); ?>

<?php 

  if( is_category("news") ){
    
    // News Page
    get_template_part( 'news', 'page' );

  }elseif (get_post_type() == 'wpsc-product'){

    // wpsc product
    get_template_part( 'product', 'page' );    

  }

?>

<?php get_footer(); ?>