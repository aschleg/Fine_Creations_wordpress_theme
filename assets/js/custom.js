var $j = jQuery.noConflict();

(function($){
 
  var $container = $('#projects'),
 
      // create a clone that will be used for measuring container width
      $containerProxy = $container.clone().empty().css({ visibility: 'hidden' });
 
  $container.after( $containerProxy );
 
    // get the first item to use for measuring columnWidth
  var $item = $container.find('.project').eq(0);
  $container.imagesLoaded(function(){
  $(window).smartresize( function() {
 
    // calculate columnWidth
    var colWidth = Math.floor( $containerProxy.width() / 4 ); // Change this number to your desired amount of columns
 
    // set width of container based on columnWidth
    $container.css({
        width: colWidth * 4 // Change this number to your desired amount of columns
    })
    .isotope({
 
      // disable automatic resizing when window is resized
      resizable: false,
 
      // set columnWidth option for masonry
      masonry: {
        columnWidth: colWidth
      }
    });
 
    // trigger smartresize for first time
  }).smartresize();
   });
 
// filter items when filter link is clicked
$('#filter a').click(function(){
$('#filter a.active').removeClass('active');
var selector = $(this).attr('data-filter');
$container.isotope({ filter: selector, animationEngine : "css" });
$(this).addClass('active');
return false;
 
});
 
}) (jQuery);

var $container = $j('#projects');
  $container.imagesLoaded( function() {
    $container.isotope({
      itemSelector: '.project',
      layoutMode: 'fitRows',
      animationEngine: 'best-available',
      columnWidth: $container.width() / 4
    });
  });
