let transactionTable;

$(function () {
  // transactions
  table = $("#dt-cashbook").DataTable({
    ajax: {
      url: baseUrl + "reporting/cashbook-datatable",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "edate";
        params.date_from = $("#date-from").val();
        params.date_to = $("#date-to").val();
      },
    },
    serverSide: true,
    search: false,
    paging: true,
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    columns: [
      { data: "edate" },
      { data: "associationName" },
      {
        data: null,
        render: function (data, type, row) {
          return `${data.name} [${data.passbook}]`;
        },
      },
      {
        data: "accType",
        render: function (data, type, row) {
          return data.toUpperCase();
        },
      },
      {
        data: "type",
        render: function (data, type, row) {
          return data.toUpperCase();
        },
      },
      {
        data: null,
        render: function (data, type, row) {
          return data.is_credit === "0" ? data.amount : "0.00";
        },
      },
      {
        data: null,
        render: function (data, type, row) {
          return data.is_credit === "1" ? data.amount : "0.00";
        },
      },
      { data: "balance" },
      { data: "narration" },
    ],
    order: [[0, "asc"]],
    columnDefs: [
      {
        orderable: false,
        //targets: [4],
      },
    ],
  });

  $(".filter").on("click select2:select select2:unselect", function (params) {
    table.ajax.reload();
  });

  $(".filter-clear").on("click", function (params) {
    $("#date-from,#date-to").val("");
    table.ajax.reload();
  });
});
