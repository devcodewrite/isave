let loanTable, withdrawalTable; 

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