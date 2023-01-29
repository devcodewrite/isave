let table; 

$(function () {
    table = $('#dt-withdrawals').DataTable({
        responsive:!0,
        dom:'lBftip',
        buttons:[
            'print',
            'pdf',
            'excel'
        ],
    });
});
