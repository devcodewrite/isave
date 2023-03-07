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
            render: function (data, type, row) {
              return data < 0 ? `(${Math.abs(data).toFixed(2)})` : data.toFixed(2);
            },
          },
          {
            data: null,
            name: "transfers.from_account_id",
            render: function (data, type, row) {
              if (type === "display") {
                return `<a href="${baseUrl}bankaccounts/${data.from_account_id}" class="btn btn-link">${data.from_acc_name} (${data.from_acc_number})</a>`;
              }
              return data.from_account_id;
            },
          },
          {
            data: null,
            name: "transfers.to_account_id",
            render: function (data, type, row) {
              if (type === "display") {
                return `<a href="${baseUrl}bankaccounts/${data.to_account_id}" class="btn btn-link">${data.to_acc_name} (${data.to_acc_number})</a>`;
              }
              return data.to_account_id;
            },
          },
          {
            data: null,
            name: "transfers.from_passbook",
            render: function (data, type, row) {
              if (type === "display") {
                return `<a href="${baseUrl}members/${data.from_member_id}" class="btn btn-link">${data.from_passbook} (${data.to_acc_name})</a>`;
              }
              return data.from_passbook;
            },
          },
          {
            data: null,
            name: "transfers.to_passbook",
            render: function (data, type, row) {
              if (type === "display") {
                return `<a href="${baseUrl}members/${data.to_member_id}" class="btn btn-link">${data.to_passbook} (${data.to_acc_name})</a>`;
              }
              return data.from_passbook;
            },
          },
          {
            data: null,
            name: "transfers.from_association_id",
            render: function (data, type, row) {
              if (type === "display") {
                return `<a href="${baseUrl}associations/${data.from_association_id}" class="btn btn-link">${data.from_assoc_name}</a>`;
              }
              return data.from_association_id;
            },
          },
          {
            data: null,
            name: "transfers.to_association_id",
            render: function (data, type, row) {
              if (type === "display") {
                return `<a href="${baseUrl}associations/${data.to_association_id}" class="btn btn-link">${data.to_assoc_name}</a>`;
              }
              return data.to_association_id;
            },
          },
          {
            data: 'addedby',
            name: "users.user_id",
          },
        ],
        footerCallback: function (row, data, start, end, display) {
          var api = this.api();
    
          // Remove the formatting to get integer data for summation
          var intVal = function (i) {
            return typeof i === "string"
              ? i.replace(/[\$,]/g, "") * 1
              : typeof i === "number"
              ? i
              : 0;
          };
    
          // Total over all pages
          total = api
            .column(1)
            .data()
            .reduce(function (a, b) {
              return intVal(a) + intVal(b);
            }, 0);
    
          // Total over this page
          pageTotal = api
            .column(1, { page: "current" })
            .data()
            .reduce(function (a, b) {
              return intVal(a) + intVal(b);
            }, 0);
    
          // Update footer
          $(api.column(1).footer()).html(
            "GHS "+pageTotal.toFixed(2)
          );
        },
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
