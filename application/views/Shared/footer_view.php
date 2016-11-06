	<script type="text/javascript" src="/travel_agency/Public/JS/jquery.min.2.0.2.js"></script>
  <script type="text/javascript">
        var baseurl = "<?php print base_url(); ?>";
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