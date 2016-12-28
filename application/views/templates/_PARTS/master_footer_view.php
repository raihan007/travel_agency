<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
                <footer id="footer" class="footer text-center">
    <label>© Talukder, Md. Raihan</label> ||
        <label>Page rendered in <strong>0.1013</strong> seconds. CodeIgniter Version <strong>2.2.6</strong></label>
</footer>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<script type="text/javascript">
    var baseurl = "<?php print base_url(); ?>";
</script>
<script type="text/javascript" src="<?= base_url('Public/Contents/JS/moment.min.js') ?>"></script>
<!--Bootstrap Datepicker-->
<link rel="stylesheet" type="text/css" href="<?= base_url('Public/Contents/CSS/bootstrap/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')?>">
<script src="<?= base_url('Public/Contents/CSS/bootstrap/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')?>" type="text/javascript"></script>
<!--Bootstrap Datepicker-->
<!--Sticky Notification-->
<link rel="stylesheet" type="text/css" href="<?= base_url('Public/Contents/JS/jquery/sticky-notification/sticky.css')?>">
<script type="text/javascript" src="<?= base_url('Public/Contents/JS/jquery/sticky-notification/sticky.js') ?>"></script>
<!--/Sticky Notification-->
<!--/bootstrap-table-->
<script type="text/javascript" src="<?= base_url('Public/Bootstrap-Table/bootstrap-table.js') ?>"></script>
<!--/bootstrap-table-->
<!-- Metis Menu Plugin JavaScript -->
<script type="text/javascript" src="<?= base_url('Public/Contents/metisMenu/metisMenu.min.js') ?>"></script>
<!-- Custom Theme JavaScript -->
<script type="text/javascript" src="<?= base_url('Public/app/js/sb-admin-2.js') ?>"></script>
<!--/Js-Controller-->
<script type="text/javascript" src="<?= base_url('Public/app/Js-Controller/ClientController.js') ?>"></script>
<!--/bootstrap-table-->
<script type="text/javascript">
	$(function () {
	    $('.datepicker').datetimepicker({
	        format: 'YYYY-MM-DD'
	    });
	});
</script>
<script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#Image")
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function PackageImages(input){
            if (input.files && input.files[0]) {
                var fileList = input.files;
                $("#Photos img").remove();
                var anyWindow = window.URL || window.webkitURL;

                    for(var i = 0; i < fileList.length; i++){
                      //get a blob to play with
                      var objectUrl = anyWindow.createObjectURL(fileList[i]);
                      // for the next line to work, you need something class="preview-area" in your html
                      $('#Photos').append('<img height="200" width="150" src="' + objectUrl + '" />');
                      // get rid of the blob
                      window.URL.revokeObjectURL(fileList[i]);
                    }
            }
        }

        $('#Quantity').on('paste keyup',function(e){
            var Quantity = $(this).val();
            var check = isNormalInteger(Quantity);
            if(check){
                var Quantity = parseInt($('#Quantity').val());
                var Cost = Quantity * parseInt($('#Cost').val());
                var Discount = parseInt($('#Discount').val());
                var TotalCost = Cost - (Cost * Discount / 100) ;
                $("#Cost").val(parseInt($('#Cost').val()));
                $("#Discount").val(Discount);
                $("#TotalCost").val(TotalCost);
            }
        });

        function isNormalInteger(str) {
            return /^\+?(0|[1-9]\d*)$/.test(str);
        }

        function GetDetails(){
          var packageId = $('#PackageId option:selected').val();
          if(packageId != ' '){
            $.ajax({
                url: baseurl + "Packages/PackageDetails",
                type: 'POST',
                data: {
                    packageId: packageId
                },
                dataType: 'json',
                success: function(data) {
                    if(data.Package){
                        var Quantity = parseInt($('#Quantity').val());
                        var Cost = Quantity * parseInt(data.Package.Cost);
                        var Discount = parseInt(data.Package.Discount);
                        var TotalCost = Cost - (Cost * Discount / 100) ;
                        $("#Cost").val(parseInt(data.Package.Cost));
                        $("#Discount").val(Discount);
                        $("#TotalCost").val(TotalCost);
                    }
                },
                error: function(){
                }
            });
          }
        };
        
    </script>
</body>
</html>