let loanTable, withdrawalTable, transferTable; 

$(function () {
    loanTable = $('#dt-related-loans').DataTable({
        responsive:!0,
        dom:'lBftip',
        buttons:[
            'print',
            'pdf',
            'excel'
        ],
    });

    transferTable = $('#dt-related-transfers').DataTable({
        responsive:!0,
        dom:'lBftip',
        buttons:[
            'print',
            'pdf',
            'excel'
        ],
    });

    withdrawalTable = $('#dt-related-withdrawals').DataTable({
        responsive:!0,
        dom:'lBftip',
        buttons:[
            'print',
            'pdf',
            'excel'
        ],
    });
});