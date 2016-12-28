function queryParams(params) {
    if (params.search){
        searchType = $('#searchType option:selected').val();
        if(searchType!=0){
            params.type = searchType;
        }
    }
    return {
        limit: params.limit,
        offset: params.offset,
        search: params.search,
        sort: params.sort,
        order: params.order,
        type: params.type
    };
}

$(function () {
        $('#DataGrid').on('click-row.bs.table', function (e, row, $element) {
            $('.success').removeClass('success');
            $($element).addClass('success');
        });
});

$(function () {
    $('#ok').click(function () {
        $('#DataGrid').bootstrapTable('refresh');
    });
});

$('#DataGrid').bootstrapTable({
    onRefresh: function (arg1, arg2) {
        var r=$('<input/>').attr({
        type: "button",
        id: "field",
        class: "pull-left btn btn-success",
        value: 'new'
    });

    customTollbar();
    },
});

$('.columns-right button[name="refresh"]').click(function(e) {
    $(".search").find('input[type="text"]').val(null);
    $('#DataGrid').bootstrapTable('refresh', {url: baseurl + 'Client/ClientsInfo_json',params:'queryParams'});
});

$(function () {
    customTollbar();
});

function customTollbar(){
    $('.search').find('div.customTollbar').first().remove();
    $(".search").addClass('form-inline');
    $(".search").prepend('<div class="customTollbar form-group"><label class="control-label"></label><select class="form-control searchType" name="searchType" id="searchType"><option value="0">Search Type</option><option value="EntityNo">Entity No</option><option value="FirstName">First Name</option></select></div>');
}

function imageFormatter(photo) {
    return '<img style="height: 150px; width: 150px;" src="'+baseurl+'Public/Photos/Clients/'+photo+'">';
}


function operateFormatter(value, row, index) {
    return [
        '<a class="details" href="'+baseurl+"Client/Details/"+row.EntityNo+'" title="Details">',
        '<i class="fa fa-user" aria-hidden="true"></i>',
        '</a>  ',
        '<a class="edit" href="'+baseurl+"Client/Edit/"+row.EntityNo+'" title="Edit">',
        '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
        '</a>  ',
        '<a class="remove text-danger" href="'+baseurl+"Client/Remove/"+row.EntityNo+'" title="Remove">',
        '<i class="glyphicon glyphicon-remove"></i>',
        '</a>'
    ].join('');
}
    
/*window.operateEvents = {
    'click .edit': function (e, value, row, index) {
        $('a.edit').attr('href', baseurl+"Medicines/Details/"+row.EntityNo);
        $('#EntityNo').val(row.EntityNo);
        $('#Title').val(row.Title);
        $('#Remarks').val(row.Remarks);
        $('#SaveCategory').text('Update');
    },
    'click .remove': function (e, value, row, index) {
        //$('#DeleteForm').attr('action', baseurl+"Common/DeleteCategory/"+row.EntityNo);
        $('#CategoryId').val(row.EntityNo);
        $('#deleteModal').modal('show');
    },
    'click .details': function (e, value, row, index) {
        $('.detailEno').text(row.EntityNo);
        $('.detailTitle').text(row.Title);
        $('.detailRemarks').text(row.Remarks);
        $('#detailsModal').modal('show');
    }
};*/

$('#newCategory').on('click', function() {
    //$('#CategoryForm').attr('action', baseurl+"Dealers");
    $('#CategoryForm').clearForm();
    //toastr['error']("Test","Delete");
});

$('#testbtn').on('click', function() {
    $.notify({
        icon: 'glyphicon glyphicon-star',
        title: "Welcome:",
        message: "This plugin has been provided to you by Robert McIntosh aka mouse0270"
    },{
        // settings
        type: "danger",
        allow_dismiss: true,
        newest_on_top: true,
        showProgressbar: true,
        icon_type: 'class'
    });
});

$('#DeleteCategory').on('click',function(){
    var formData = $("#DeleteForm").serializeObject();
    $.ajax({
        url: baseurl + "Common/DeleteCategory",
                type: 'POST',
                data: {
                    formData: formData
                },
                dataType: 'json',
                success: function(data) {
                    if(data.status){
                        toastr['error']("Data have been deleted successfully.","Deleted");
                    }
                    else{
                        toastr['error']("Data have been deleted successfully.","Deleted");
                    }
                    $('#deleteModal').modal('hide');
                    $('#CategoriesTable').bootstrapTable('refresh');
                },
                error: function(){                      
                    alert(this.url);
                }
    });
});

$('#SaveCategory').click(function(e) {
    $("#CategoryForm").submit();
});

$.fn.clearForm = function() {
  return this.each(function() {
    var type = this.type, tag = this.tagName.toLowerCase();
    if (tag == 'form')
      return $(':input',this).clearForm();
    if (type == 'text' || type == 'email' || type == 'password' || tag == 'textarea')
      this.value = '';
    else if (type == 'checkbox' || type == 'radio')
      this.checked = false;
    else if (tag == 'select')
      this.selectedIndex = 0;
  });
};

/*$('body').on('change', 'select.searchType', function() {
    $('#DealersTable').bootstrapTable('refresh');
});*/

/*function Messages(notification) {
    if(typeof notification !== 'undefined')
    {
        toastr[notification.type](notification.body,notification.title);
    }
}*/

