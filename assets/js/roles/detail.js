let table; 

$(function () {


table = $('#dt-').DataTable({
        responsive:!0,
        dom:'lBftip',
        buttons:[
            'print',
            'pdf',
            'excel'
        ],
    });
});