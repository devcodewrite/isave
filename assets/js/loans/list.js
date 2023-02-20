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
        params.association_id = $('.select2-associations').val();
        params.member_id = $('.select2-members').val();
        params.acc_type_id = $('.select2-account-types').val();
        params.ownership = $('.select2-ownership').val();
        params.status = $('#status').val();
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
        render: function (data, type, row) {
          if (type === "display") {
            let d =
              `<div class="d-flex align-items-center">` +
              `<a href="${baseUrl}bankaccounts/${data.account_id}" class="p-1 ml-1 btn btn-link float-right">${data.name}<br>(${data.accType})</a>` +
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
              pending: "alert-warning",
              approved: "alert-info",
              disbursed: "alert-success",
              rejected: "alert-danger",
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
              not_paid: "alert-warning",
              started: "alert-info",
              paid: "alert-success",
              defaulted: "alert-danger",
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

  $(".filter").on("click", function (params) {
    table.ajax.reload();
  });

  $(".filter-clear").on("click", function (params) {
    $("#date-from,#date-to").val("");
    table.ajax.reload();
  });
});



$(".select2-associations").select2({
  ajax: {
    url: `${baseUrl}associations/select2`,
    dataType: "json",
    data: function (params) {
      return params;
    },
  },
  allowClear: true,
  placeholder: "Select an association",
  selectionCssClass: "form-select2",
});

$(".select2-account-types").select2({
  allowClear: true,
  placeholder: "Select an account type",
  selectionCssClass: "form-select2",
});

$(".select2-members").select2({
  ajax: {
    url: `${baseUrl}customers/select2`,
    dataType: "json",
    data: function (params) {
      params.association_id = $(".select2-associations").val();
      return params;
    },
  },
  allowClear: true,
  placeholder: "Select a member",
  selectionCssClass: "form-select2",
  templateResult: formatPeopleResult,
});

$(".select2-status, .select2-ownership").select2({
  allowClear: true,
  placeholder: "Select an option",
  selectionCssClass: "form-select2",
});