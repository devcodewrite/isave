let settlementTable; 

$(function () {
    settlementTable = $('#dt-related-settlements').DataTable({
        responsive:!0,
        dom:'lBftip',
        buttons:[
            'print',
            'pdf',
            'excel'
        ],
    });
});