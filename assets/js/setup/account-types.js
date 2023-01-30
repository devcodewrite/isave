let table; 

$(function () {
    table = $('#dt-account-types').DataTable({
        responsive:!0,
        dom:'lBftip',
        buttons:[
            'print',
            'pdf',
            'excel'
        ],
    });
});
