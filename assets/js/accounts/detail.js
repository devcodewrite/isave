let table; 

$(function () {
    table = $('#dt-related-accounts').DataTable({
        responsive:!0,
        dom:'lBftip',
        buttons:[
            'print',
            'pdf',
            'excel'
        ],
    });
});