let table; 

$(function () {
    table = $('#dt-id-card-types').DataTable({
        responsive:!0,
        dom:'lBftip',
        buttons:[
            'print',
            'pdf',
            'excel'
        ],
    });
});
