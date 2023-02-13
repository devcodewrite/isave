let table; 

$(function () {
    table = $("#dt-transfers").DataTable({
        ajax: {
          url: baseUrl + "transfers/datatables",
          dataType: "json",
          contentType: "application/json",
          data:function (params) {
            params.date_range_column = 'tdate';
            params.date_from = $('#date-from').val();
            params.date_to = $('#date-to').val();
          }
        },
        serverSide: true,
        search: false,
        paging: true,
        responsive: !0,
        dom: "lBftip",
        buttons: ["print", "pdf", "excel"],
        columns: [
          {
            data: 'tdate',
            name: "tdate",
            render: function (data, type, row) {
              return (new Date(data)).toDateString();
            }
          },
          {
            data: 'amount',
            name: "amount",
          },
          {
            data: null,
            name: "transfers.from_account_id",
            render: function (data, type, row) {
              if (type === "display") {
                return `<a href="${data.from_account_id}" class="btn btn-link">${data.from_acc_name} (${data.from_acc_number})</a>`;
              }
              return data.from_account_id;
            },
          },
          {
            data: null,
            name: "transfers.to_account_id",
            render: function (data, type, row) {
              if (type === "display") {
                return `<a href="${data.to_account_id}" class="btn btn-link">${data.to_acc_name} (${data.to_acc_number})</a>`;
              }
              return data.to_account_id;
            },
          },
          {
            data: null,
            name: "transfers.from_passbook",
            render: function (data, type, row) {
              if (type === "display") {
                return `<a href="members/${data.from_member_id}" class="btn btn-link">${data.from_passbook} (${data.to_acc_name})</a>`;
              }
              return data.from_passbook;
            },
          },
          {
            data: null,
            name: "transfers.to_passbook",
            render: function (data, type, row) {
              if (type === "display") {
                return `<a href="members/${data.to_member_id}" class="btn btn-link">${data.to_passbook} (${data.to_acc_name})</a>`;
              }
              return data.from_passbook;
            },
          },
          {
            data: null,
            name: "transfers.from_association_id",
            render: function (data, type, row) {
              if (type === "display") {
                return `<a href="associations/${data.from_association_id}" class="btn btn-link">${data.from_assoc_name}</a>`;
              }
              return data.from_association_id;
            },
          },
          {
            data: null,
            name: "transfers.to_association_id",
            render: function (data, type, row) {
              if (type === "display") {
                return `<a href="associations/${data.to_association_id}" class="btn btn-link">${data.to_assoc_name}</a>`;
              }
              return data.to_association_id;
            },
          },
          {
            data: 'addedby',
            name: "user_id",
          },
        ],
        // order: [[7, "desc"]],
        columnDefs: [
          {
            orderable: false,
            //targets: [4],
          },
        ],
      });
      $('.filter').on('click', function (params) {
        table.ajax.reload();
      });
    
      $('.filter-clear').on('click', function (params) {
        $('#date-from,#date-to').val('');
        table.ajax.reload();
      });
});
