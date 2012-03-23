/*
 * Custom JS
 * for Pfetec.com
*/
 
// Closure
(function ($) {
  
  // Document Ready
  $(function(){
    
    // hide default category
    $('.wpsc_category_link[title="default"]').parent('li').remove();
    
    // sidemenu
    var currCat =  $('ul ul .wpsc-current-cat');
    if( currCat.length > 0 ){
      currCat.addClass('selected')
      if( currCat.next().length > 0 ){
        currCat.addClass('selected').next().show();
      }else{
        currCat.css({'backgroundPosition':'65px -164px'});
      }
    }
    
    var currSubcat =  $('ul ul ul .wpsc-current-cat');
    if( currSubcat.length > 0 ){
      var container = currSubcat.parents('ul').first();
      container.show();
      currSubcat.addClass('selected');
      container.parent().children('a').addClass('selected');
    }
    
    // remove primary category hyperlinks
    $('ul.cat-brand > li > a').attr('href', 'javascript:void(0);').css({'pointer':'default'});
     
     //Breadcrumbs
     var crumb = $('.wpsc-breadcrumbs a');
     if( crumb.length > 0 ){
       crumb.last().addClass('current_crumb')
     }
     
    //orbit
    $('#orbit').orbit();
    
    //Google Map
    if (GBrowserIsCompatible()) {
        if(document.getElementById("contact-map") !== null){
          var map = new GMap2( document.getElementById("contact-map") );
          var point = new GLatLng(1.318586,103.665447);
          map.setCenter(new GLatLng(1.318586,103.665447), 13);
          map.addOverlay(new GMarker(point));
        }
        
        // footer map
        if( document.getElementById("footer-map") !== null ){
          var map_footer = new GMap2( document.getElementById("footer-map") );
          var point = new GLatLng(1.318586,103.665447);
          map_footer.setCenter(new GLatLng(1.318586,103.665447), 13);
          map_footer.addOverlay(new GMarker(point));
        }
    }
    
    // Hide Image on product homepage
    if( $('.postid-523').length > 0 ){
      // hide unwanted categories
      $('.imagecol').hide();
      $('.wpsc_category_grid_item[title="default"]').parent().remove()
    }
    
    
  });
  

  
})(jQuery);

