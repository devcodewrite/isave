let table;

$(function () {
  table = $("#dt-deposits").DataTable({
    ajax: {
      url: baseUrl + "deposits/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "ddate";
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
      { data: "association_name", name: "associations.name" },
      { data: "passbook", name: "passbook" },
      {
        data: null,
        name: "accounts.acc_number",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="${baseUrl}bankaccounts/${data.account_id}" class="btn btn-link">${data.acc_name} (${data.acc_number})</a>`;
          }
          return data.acc_number;
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
      { data: "ddate", name: "ddate", render: function (data, type, row) {
        return (new Date(data)).toDateString();
      } },
    ],
    // order: [[7, "desc"]],
    columnDefs: [
      {
        orderable: false,
        //targets: [4],
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
