let loanTable, depositTable, transferTable, withdrawalTable;

$(function () {
  loanTable = $("#dt-related-loans").DataTable({
    responsive: !0,
    ajax: {
      url: baseUrl + "loans/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "ldate";
        params.date_from = $("#loan-date-from").val();
        params.date_to = $("#loan-date-to").val();
        params.account_id = $("#dt-related-loans").data("account-id");
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
      { data: "principal_amount", name: "principal_amount" },
      { data: "interest_amount", name: "loans.interest_amount" },
      {
        data: "duration",
        name: "duration",
        render: function (data, type, row) {
          return `${data} months`;
        },
      },
      {
        data: "rate",
        name: "loans.rate",
        render: function (data, type, row) {
          return `${data * 100}%`;
        },
      },
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
            }">${data.replace("_", " ").toUpperCase()}</span>`;
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
            }">${data.replace("_", " ").toUpperCase()}</span>`;
          }
          return data;
        },
      },
      { data: "loanType", name: "loans.loan_type_id" },
      {
        data: null,
        name: "loans.user_id",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="${baseUrl}users/${data.user_id}">${data.user}</a>`;
          }
          return data.user_id;
        },
      },
    ],
    order: [[0, "desc"]],
    columnDefs: [
      {
        orderable: false,
        targets: [4],
      },
    ],
  });

  $(".loan-filter").on("click", function (params) {
    loanTable.ajax.reload();
  });

  $(".loan-filter-clear").on("click", function (params) {
    $("#loan-date-from,#loan-date-to").val("");
    loanTable.ajax.reload();
  });

  // withdrawals

  withdrawalTable = $("#dt-related-withdrawals").DataTable({
    ajax: {
      url: baseUrl + "withdrawals/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "wdate";
        params.date_from = $("#withdrawal-date-from").val();
        params.date_to = $("#withdrawal-date-to").val();
        params.account_id = $("#dt-related-withdrawals").data("account-id");
      },
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
        name: "withdrawals.id",
        render: function (data, type, row) {
          if (type === "display") {
            let d =
              `<div class="d-flex align-items-center">` +
              `<a href="${baseUrl}withdrawals/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.id}</a>` +
              `</div>`;

            return d;
          }
          return data.id;
        },
      },
      { data: "amount", name: "withdrawals.amount" },
      {
        data: "type",
        name: "withdrawals.type",
        render: function (data, type, row) {
          return data.toUpperCase();
        },
      },
      { data: "withdrawer_name", name: "withdrawer_name" },
      { data: "withdrawer_phone", name: "withdrawer_phone" },
      {
        data: "wdate",
        name: "wdate",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
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

  $(".withdrawal-filter").on("click", function (params) {
    withdrawalTable.ajax.reload();
  });

  $(".withdrawal-filter-clear").on("click", function (params) {
    $("#withdrawal-date-from,#withdrawal-date-to").val("");
    withdrawalTable.ajax.reload();
  });

  // deposits

  table = $("#dt-related-deposits").DataTable({
    ajax: {
      url: baseUrl + "deposits/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "ddate";
        params.date_from = $("#deposit-date-from").val();
        params.date_to = $("#deposit-date-to").val();
        params.account_id = $("#dt-related-deposits").data("account-id");
      },
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
        name: "deposits.id",
        render: function (data, type, row) {
          if (type === "display") {
            let d =
              `<div class="d-flex align-items-center">` +
              `<a href="${baseUrl}deposits/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.id}</a>` +
              `</div>`;

            return d;
          }
          return data.id;
        },
      },
      { data: "amount", name: "deposits.amount" },
      {
        data: "type",
        name: "deposits.type",
        render: function (data, type, row) {
          return data.toUpperCase();
        },
      },
      { data: "depositor_name", name: "depositor_name" },
      { data: "depositor_phone", name: "depositor_phone" },
      {
        data: "ddate",
        name: "ddate",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
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
  $(".deposit-filter").on("click", function (params) {
    depositTable.ajax.reload();
  });

  $(".deposit-filter-clear").on("click", function (params) {
    $("#deposit-date-from,#deposit-date-to").val("");
    depositTable.ajax.reload();
  });

  // transfers

  table = $("#dt-related-transfers").DataTable({
    ajax: {
      url: baseUrl + "transfers/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "tdate";
        params.date_from = $("#transfer-date-from").val();
        params.date_to = $("#transfer-date-to").val();
        params.account_id = $("#dt-related-transfers").data("account-id");
      },
    },
    serverSide: true,
    search: false,
    paging: true,
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    columns: [
      {
        data: "tdate",
        name: "tdate",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      {
        data: "amount",
        name: "amount",
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
        name: "transfers.to_association_id",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="associations/${data.to_association_id}" class="btn btn-link">${data.to_assoc_name}</a>`;
          }
          return data.to_association_id;
        },
      },
      {
        data: "addedby",
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
  $(".transfer-filter").on("click", function (params) {
    transferTable.ajax.reload();
  });

  $(".transfer-filter-clear").on("click", function (params) {
    $("#transfer-date-from,#transfer-date-to").val("");
    transferTable.ajax.reload();
  });
});
