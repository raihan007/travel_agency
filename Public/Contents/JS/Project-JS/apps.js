$('#Test').on('click', function() {
    /*$.sticky('Clever message', {classList: 'success',position: 'top-right'});*/
    $.sticky("<b>Success !!!</b> " + "m", { autoclose: 5000, position: "top-right", type: "st-success" });
});