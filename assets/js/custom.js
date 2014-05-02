jQuery(function($){

  'use strict';

  var finecreations = window.finecreations || {};

      finecreations.portfolio = function(){
          if($('#portfolio').length > 0){
              var $container = $('#portfolio');

              $container.imagesLoaded(function() {
                  $container.isotope({
                      animationEngine: 'best-available',
                      itemSelector: '.project'
                  });
              });

              $(window).smartresize(function() {
                  $('#portfolio').isotope('reLayout');
              });

              var $optionSets = $('#filters .projectnav'),
                  $optionLinks = $optionSets.find('a');

                $optionLinks.click(function(){
                    var $this = $(this);
                    if( $this.hasClass('selected') ) {
                        return false;
                    }
                    var $optionSet = $this.parents('.projectnav');
                        $optionSet.find('.selected').removeClass('selected');
                        $this.addClass('selected');

                    var options = {},
                        key = $optionSet.attr('data-option-key'),
                        value = $this.attr('data-option-value');

                    value = value === 'false' ? false : value;
                    options[ key ] = value;

                    if( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
                        changeLayoutMode( $this, options );
                    }
                    else {
                        $container.isotope( options );
                    }
                    return false;
              });
          }
      };

      $(document).ready(function(){
          finecreations.portfolio();
      });
});
 

