let table; 

$(function () {
    table = $('#dt-loan-types').DataTable({
        responsive:!0,
        dom:'lBftip',
        buttons:[
            'print',
            'pdf',
            'excel'
        ],
    });
});
