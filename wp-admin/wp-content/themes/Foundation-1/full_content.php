<?php
/*
Template Name: Full Content
*/
?>
<?php get_header(); ?>

<?php
  //var_dump(  is_category(45)  );
  if( is_front_page() ){
    get_template_part( 'home', 'page' );
  }elseif( is_page(array(71,241,260,270)) ){
    get_template_part( 'about', 'page' ); 
  }elseif( is_page(8) ){
    get_template_part( 'product', 'page' );
  }elseif( $news ){
    
  }elseif( is_page(74) ){
    get_template_part( 'contact', 'page' );
  }
  
?>
	
<?php get_footer(); ?>