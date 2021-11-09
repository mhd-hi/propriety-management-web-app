
// Update the Provinces data list
function getProvinces() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (data) {
                    var provinceTable = $('#provinceData');
                    provinceTable.empty();
                    $.each(data.Provinces, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="btn btn-warning" rowID="' +
                                    value.id + 
                                    '" data-type="dit" data-toggle="modal" data-target="#modalProvinceAddEdit">' + 
                                    'edit</a>' +
                                '<a href="javascript:void(0);" class="btn btn-danger"' +
                                    'onclick="return confirm(\'Are you sure to delete data?\') ?' + 
                                    'provinceAction(\'delete\', \'' + 
                                    value.id + 
                                    '\') : false;">delete</a>' +
                                '</td></tr>';
                        provinceTable.append('<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + value.code + editDeleteButtons);
 
                    });

                }

    });
}

 /* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}


function provinceAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var provinceData = '';
    var ajaxUrl = urlToRestApi;
    frmElement = $("#modalProvinceAddEdit");
    if (type == 'add') {
        requestType = 'POST';
        provinceData = convertFormToJSON(frmElement.find('form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        ajaxUrl = ajaxUrl + "/" + id;
        provinceData = convertFormToJSON(frmElement.find('form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(provinceData),
        success: function (msg) {
            if (msg) {
                frmElement.find('.statusMsg').html('<p class="alert alert-success">Province data has been ' + statusArr[type] + ' successfully.</p>');
                getProvinces();
                if (type == 'add') {
                    frmElement.find('form')[0].reset();
                }
            } else {
                frmElement.find('.statusMsg').html('<p class="alert alert-danger">Some problem occurred, please try again.</p>');
            }
        }
    });
}

// Fill the Province data in the edit form
function editProvince(id) {
    $.ajax({
        type: 'GET',
        url: urlToRestApi + "/" + id,
        dataType: 'JSON',
       // data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#id').val(data.province.id);
            $('#name').val(data.province.name);
            $('#code').val(data.province.code);

        }
    });
}

// Actions on modal show and hidden events
$(function () {
    $('#modalProvinceAddEdit').on('show.bs.modal', function (e) {
        var type = $(e.relatedTarget).attr('data-type');
        var provinceFunc = "provinceAction('add');";
        $('.modal-title').html('Add new province');
        if (type == 'edit') {
            var rowId = $(e.relatedTarget).attr('rowID');
            provinceFunc = "provinceAction('edit'," + rowId + ");";
            $('.modal-title').html('Edit province');
            editProvince(rowId);
        }
        $('#provinceSubmit').attr("onclick", provinceFunc);
    });

    $('#modalProvinceAddEdit').on('hidden.bs.modal', function () {
        $('#provinceSubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});



