$(function() {
    $('#side-menu').metisMenu();
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    /*var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }*/

    // get current URL path and assign 'active' class
        var pathname = window.location.href;
        var selector;
        if(pathname == 'http://localhost/travel_agency/'){
            $('.nav > li > a[id="Home"]').parent().addClass('active');
        }
        else{
            selector = $('.nav > li > a[href="'+pathname+'"]');
            grandP = selector.gparent( 2 );
            grandP.removeClass( "collapse" ).addClass( "in" );
            $('.nav > li > a[href="'+pathname+'"]').addClass('active');
        }
});

$.fn.gparent = function( recursion ){
   //console.log( 'recursion: ' + recursion );
   if( recursion > 1 ) return $(this).parent().gparent( recursion - 1 );
   return $(this).parent();
};

$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);

        if (input[0].files && input[0].files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $("#Image")
                .attr('src', e.target.result)
                .width(250)
                .height(350);
          };
          reader.readAsDataURL(input[0].files[0]);
        }
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) console.log(log);
          }

      });
  });
  
});
