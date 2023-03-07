let table;

$(function () {
  table = $("#dt-withdrawals").DataTable({
    ajax: {
      url: baseUrl + "withdrawals/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "wdate";
        params.date_from = $("#date-from").val();
        params.date_to = $("#date-to").val();
        params.association_id = $(".select2-associations").val();
        params.member_id = $(".select2-members").val();
        params.acc_type_id = $(".select2-account-types").val();
        params.ownership = $(".select2-ownership").val();
        params.status = $("#status").val();
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
      {
        data: "wdate",
        name: "wdate",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      {
        data: null,
        name: "associations.name",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="${baseUrl}associations/${data.association_id}" class="btn btn-link">${data.association_name}</a>`;
          }
          return data.association_name;
        },
      },
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
      {
        data: "amount",
        name: "withdrawals.amount",
        render: function (data, type, row) {
          return data < 0 ? `(${Math.abs(data).toFixed(2)})` : data;
        },
      },
      {
        data: "type",
        name: "withdrawals.type",
        render: function (data, type, row) {
          return data.toUpperCase();
        },
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
        .column(5)
        .data()
        .reduce(function (a, b) {
          return intVal(a) + intVal(b);
        }, 0);

      // Total over this page
      pageTotal = api
        .column(5, { page: "current" })
        .data()
        .reduce(function (a, b) {
          return intVal(a) + intVal(b);
        }, 0);

      // Update footer
      $(api.column(5).footer()).html("GHS " + pageTotal.toFixed(2));
    },
    order: [[1, "desc"]],
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
