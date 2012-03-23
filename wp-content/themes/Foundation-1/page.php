<?php get_header(); ?>

<?php 

if( is_category() ){
  get_template_part( 'news', 'page' );    
}else{
  get_template_part( 'loop', 'page' );    
}

?>

<?php get_footer(); ?>