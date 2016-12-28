<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<footer id="footer" class="footer text-center">
    <label>&copy; Talukder, Md. Raihan</label> ||
        <label>Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></label>
</footer>
<script type="text/javascript" src="<?= base_url('Public/Contents/JS/moment.min.js') ?>"></script>
<!--Bootstrap Datepicker-->
<link rel="stylesheet" type="text/css" href="<?= base_url('Public/Contents/CSS/bootstrap/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')?>">
<script src="<?= base_url('Public/Contents/CSS/bootstrap/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')?>" type="text/javascript"></script>
<!--Bootstrap Datepicker-->
<!--Sticky Notification-->
<link rel="stylesheet" type="text/css" href="<?= base_url('Public/Contents/JS/jquery/sticky-notification/sticky.css')?>">
<script type="text/javascript" src="<?= base_url('Public/Contents/JS/jquery/sticky-notification/sticky.js') ?>"></script>
<!--/Sticky Notification-->
<!--Project JS-->
<script type="text/javascript" src="<?= base_url('Public/Contents/JS/Project-JS/apps.js') ?>"></script>
<!--/Project JS-->
<script type="text/javascript">
	$(document).ready(function() {
		// get current URL path and assign 'active' class
		var pathname = window.location.href;
		if(pathname == 'http://localhost/travel_agency/'){
			$('.nav > li > a[id="Home"]').parent().addClass('active');
		}
		else{
			$('.nav > li > a[href="'+pathname+'"]').parent().addClass('active');
		}

		$(function () {
		    $('.datepicker').datetimepicker({
		        format: 'YYYY-MM-DD'
		    });
		});

	});	
</script>
<script type="text/javascript">
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
              if( log ) alert(log);
          }

      });
  });
  
});
</script>
</body>
</html>