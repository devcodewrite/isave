let table; 

$(function () {
    table = $('#dt-customers').DataTable({
        responsive:!0,
        dom:'lBftip',
        buttons:[
            'print',
            'pdf',
            'excel'
        ],
    });
});

$('.select2-associations').select2({
  ajax: {
    url: "/api/select2/associations",
        dataType: "json",
        data: function (params) {
            params.api_token = $('meta[name="api-token"]').attr("content");
            return params;
        },
  },
  allowClear: true,
  placeholder: "Select an association",
  selectionCssClass: 'form-select2',
});
