	<script type="text/javascript" src="/travel_agency/Public/JS/jquery.min.2.0.2.js"></script>
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
    </script>
</body>
</html>