/*
 * Custom JS
 * for Pfetec.com
*/
 
// Closure
(function ($) {
  
  // Document Ready
  $(function(){
    
    // Sidemenu
    if($('ul.wpsc_categories').length>0){
      $('ul.wpsc_categories').formatSidemenu();
    }
     
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
    
    initVideos();
    
    // single product thumbnails
    if ( $('.imgs-thumb').length > 0 ){
      initProductThumbs( $('#img-container'), $('#imgs-thumb') );
    }
    
    $('#accordion-slider').kwicks({
      max : 450,
      spacing : 2
    });

  });
  
  // Init product videos
  var initVideos = function(){

    var videos = $('[data-video-src]');
    videos.each(function(i, v){
      $(v).click(function(){
        var vidLink = $(this).data('videoSrc')
        var vidWrapper = $('<iframe width="640" height="480" frameborder="0" allowfullscreen></iframe>');
        vidWrapper.attr('src', vidLink);
        
        $.blockUI({ 
          message: vidWrapper,
          overlayCSS: {
            "backgroundColor": "#444",
            "opacity": "0.4",
            "cursor": "pointer"
          },
          css:{ 
            "top": "20%",
            "left": ($(window).width() - 640) /2 + 'px',
            "width": '640px'}
        });
        $('.blockOverlay').click($.unblockUI);
        
      });
    });
  }
  
  // img thumbs
  var initProductThumbs = function(imgPlaceholder, thumbContainer){
    if( imgPlaceholder===undefined || imgPlaceholder==='' || thumbContainer===undefined || thumbContainer==='' ) return;
    
    var thumbs = thumbContainer.find('[data-full-img-link]');
    if(thumbs.length===1){
      thumbContainer.remove();
      return;
    }
    
    thumbs.each(function(i, thumb){
      var bigImg = $(thumb).data('fullImgLink');
      $(thumb).click(function(e){
        bigImgPlaceholder = imgPlaceholder.find('img');
        bigImgPlaceholder.fadeOut(400, function(){
          $(this).attr('src', bigImg);
          $(this).fadeIn(400);
        });
        
      });
    });
  }
  
})(jQuery);

(function ($) {
  $.fn.formatSidemenu = function(options){
    var defaults={};
    var opts = $.extend(defaults, options);
    return this.each(function(){
      var _nav = $(this);
  
      if( typeof _nav=='undefined' || _nav=='' || _nav===null || _nav.length===0 ){
        return false;
      }
      hideOtherCategory(_nav);
      removeHyperlinks(_nav);
      accordion(_nav);
      categoryOrder(_nav);
      
    });
  };
  
  var hideOtherCategory = function(_nav){
    _nav.find('.wpsc_category_link[title="default"]').parent('li').remove();
  }
  
  var removeHyperlinks = function(_nav){
    _nav.children('li').children('a').attr('href', 'javascript:void(0);').css({'pointer':'default'});
  }
  
  var accordion = function(_nav){
    var currCat = _nav.find('ul .wpsc-current-cat');
    if( currCat.length > 0 ){
      currCat.addClass('selected')
      if( currCat.next().length > 0 ){
        currCat.addClass('selected').next().show();
      }else{
        currCat.css({'backgroundPosition':'65px -164px'});
      }
    }
    
    var currSubcat =  _nav.find('ul ul .wpsc-current-cat');
    if( currSubcat.length > 0 ){
      var container = currSubcat.parents('ul').first();
      container.show();
      currSubcat.addClass('selected');
      container.parent().children('a').addClass('selected');
    }
  }
  
  var categoryOrder = function(_nav){
    var order = ['pereseal','soudal','klingspor','vogel'],
      len = order.length,
      arrCats = _nav.children(),
      orderedCats=[];

    for(i=0; i<len; i++){
      $.each(arrCats, function(k, v){
         var cat = $(v).children('.wpsc_category_link').attr('title');
         if( cat && cat.toLowerCase()==order[i].toLowerCase() ){
           _nav.append(v);
         }
       });
    }
  }
  
})(jQuery);