let table;

$(function () {
  table = $("#dt-loans").DataTable({
    responsive: !0,
    ajax: {
      url: baseUrl + "loans/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "ldate";
        params.date_from = $("#date-from").val();
        params.date_to = $("#date-to").val();
      },
    },
    serverSide: true,
    search: false,
    paging: true,
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
      {
        data: "ldate",
        name: "ldate",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      { data: "passbook", name: "loans.passbook" },
      {
        data: null,
        name: "accounts.id",
        render: function(data, type, row) {
          if (type === "display") {
            let d =
              `<div class="d-flex align-items-center">` +
              `<a href="${baseUrl}accounts/${data.account_id}" class="p-1 ml-1 btn btn-link float-right">${data.name}<br>(${data.accType})</a>` +
              `</div>`;
            return d;
          }
          return data.account_id;
        },
      },
      { data: "principal_amount", name: "principal_amount" },
      { data: "interest_amount", name: "loans.interest_amount" },
      {
        data: "duration",
        name: "duration",
        render: function (data, type, row) {
          return `${data} months`;
        },
      },
      { data: "rate", name: "loans.rate", render:function (data, type, row) {
        return `${data*100}%`;
      } },
      {
        data: "appl_status",
        name: "loans.appl_status",
        render: function (data, type, row) {
          if (type === "display") {
            let labels = {
              pending: "alert-danger",
              approved: "alert-warning",
              paid_out: "alert-success",
            };
            return `<span class="alert p-1 px-2 text-white border-rounded ${
              labels[data]
            }">${data.replace('_', ' ').toUpperCase()}</span>`;
          }
          return data;
        },
      },
      {
        data: "payout_date",
        name: "loans.payout_date",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      {
        data: "payin_start_date",
        name: "loans.payin_start_date",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
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
            }">${data.replace('_', ' ').toUpperCase()}</span>`;
          }
          return data;
        },
      },
      { data: "loanType", name: "loans.loan_type_id" },
      { data: null, name: "loans.user_id", 
    render:function (data, type, row) {
      if(type === 'display'){
        return `<a href="${baseUrl}users/${data.user_id}">${data.user}</a>`
      }
      return data.user_id;
    } },
    ],
    order: [[0, "desc"]],
    columnDefs: [
      {
        orderable: false,
        targets: [4],
      },
    ],
  });

  $(".filter").on("click", function (params) {
    table.ajax.reload();
  });

  $(".filter-clear").on("click", function (params) {
    $("#date-from,#date-to").val("");
    table.ajax.reload();
  });
});
