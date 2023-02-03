let table; 

$(function () {
    table = $("#dt-loans").DataTable({
      ajax: {
        url: baseUrl + "loans/datatables",
        dataType: "json",
        contentType: "application/json",
      },
      serverSide: true,
      search: false,
      paging: true,
      responsive: !0,
      dom: "lBftip",
      buttons: ["print", "pdf", "excel"],
      columns: [
        {
          data: null,
          name: "loans.id",
          render: function (data, type, row) {
            if (type === "display") {
              let d =
                `<div class="d-flex align-items-center">` +
                `<a href="${baseUrl}loans/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.id}</a>` +
                `</div>`;
  
              return d;
            }
            return data.id;
          },
        },
        {data: 'passbook', name: "loans.passbook"},
        { data: "acc_number", name: "accounts.acc_number" },
        { data: "principal_amount", name: "principal_amount" },
        { data: "interest_amount", name: "loans.interest_amount" },
        { data: "duration", name: "duration", render:function (data, type, row) {
            return `${data} months`;
        } },
        { data: "rate", name: "loans.rate" },
        {
          data: "appl_status",
          name: "loans.appl_status",
          render: function (data, type, row) {
            if (type === "display") {
              let labels = {
                pending: "alert-danger",
                approved: "alert-warning",
                payout: "alert-success",
              };
              return `<span class="alert p-1 px-2 text-white border-rounded ${
                labels[data]
              }">${data.toUpperCase()}</span>`;
            }
            return data;
          },
        },
        { data: "payout_date", name: "loans.payout_date" },
        { data: "payin_start_date", name: "loans.payin_start_date" },
        {
            data: "setl_status",
            name: "loans.setl_status",
            render: function (data, type, row) {
              if (type === "display") {
                let labels = {
                  not_paid: "alert-danger",
                  started: "alert-warning",
                  paid: "alert-success",
                };
                return `<span style="font-size:12px;" class="alert p-1 px-2 text-white border-rounded ${
                  labels[data]
                }">${data.replace('_', " ").toUpperCase()}</span>`;
              }
              return data;
            },
          },
          { data: "loanType", name: "loans.loan_type_id" },
      ],
      order: [[0, "desc"]],
       columnDefs: [
          {
            orderable: false,
            targets: [4],
          },
        ],
    });
  });
  