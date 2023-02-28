let table;

$(function () {
  table = $("#dt-statements").DataTable({
    ajax: {
      url: baseUrl + "associations/statement-datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "account_statements.id";
        params.date_from = $("#date-from").val();
        params.date_to = $("#date-to").val();
        params.association_id = $(".select2-associations").val();
      },
    },
    serverSide: true,
    search: false,
    paging: true,
    responsive: !0,
    dom: "lBftip",
    buttons: [
      { extend: "print", footer: true },
      { extend: "pdf", footer: true },
      { extend: "excel", footer: true },
    ],
    columns: [
      { data: "id", name: "account_statements.id" },
      {
        data: null,
        name: "association_id",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="${baseUrl}associations/${data.association_id}" class="btn btn-link">${data.association_name}</a>`;
          }
          return data.association_id;
        },
      },
      {
        data: "total_amount",
        name: "total_amount",
        render: function (data, type, row) {
          return data < 0 ? `(${Math.abs(data).toFixed(2)})` : data;
        },
      },
      {
        data: "reconcile_amount",
        name: "reconcile_amount",
        render: function (data, type, row) {
          return data < 0 ? `(${Math.abs(data).toFixed(2)})` : data;
        },
      },
      {
        data: "reconcile_diff",
        name: "reconcile_diff",
        render: function (data, type, row) {
          return data < 0 ? `(${Math.abs(data).toFixed(2)})` : data;
        },
      },
      { data: "reconcile_note", name: "reconcile_note" },
      {
        data: null,
        name: "account_statements.id",
        render: function (data, type, rows) {
          return `<a href="${baseUrl}associations/statements?id=${data.id}&association_id=${data.association_id}" class="btn btn-icon btn-primary"><i class="fa fa-edit"></i></a>`;
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
        .column(2)
        .data()
        .reduce(function (a, b) {
          return intVal(a) + intVal(b);
        }, 0);

      // Total over this page
      pageTotal = api
        .column(2, { page: "current" })
        .data()
        .reduce(function (a, b) {
          return intVal(a) + intVal(b);
        }, 0);

      // Update footer
      $(api.column(2).footer()).html(
        pageTotal.toFixed(2) + " (" + total.toFixed(2) + " total)"
      );

      // Total over all pages
      total2 = api
        .column(3)
        .data()
        .reduce(function (a, b) {
          return intVal(a) + intVal(b);
        }, 0);

      // Total over this page
      pageTotal2 = api
        .column(3, { page: "current" })
        .data()
        .reduce(function (a, b) {
          return intVal(a) + intVal(b);
        }, 0);

      // Update footer
      $(api.column(3).footer()).html(
        pageTotal2.toFixed(2) + " (" + total2.toFixed(2) + " total)"
      );

      // Total over all pages
      total3 = api
        .column(4)
        .data()
        .reduce(function (a, b) {
          return intVal(a) + intVal(b);
        }, 0);

      // Total over this page
      pageTotal3 = api
        .column(4, { page: "current" })
        .data()
        .reduce(function (a, b) {
          return intVal(a) + intVal(b);
        }, 0);

      // Update footer
      $(api.column(4).footer()).html(
        pageTotal3.toFixed(2) + " (" + total3.toFixed(2) + " total)"
      );
    },
    columnDefs: [
      {
        orderable: false,
        targets: [6],
      },
    ],
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

  $(".select2-associations1")
    .select2({
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
    })
    .on("change", function (e) {
      if ($("#id").val() !== "") {
        location.assign(
          `${baseUrl}associations/statements?association_id=${$(
            this
          ).val()}&id=${$("#id").val()}`
        );
      }
    });

  $("#id").on("change", function (e) {
    if ($(".select2-associations1").val() !== "") {
      location.assign(
        `${baseUrl}associations/statements?association_id=${$(
          ".select2-associations1"
        ).val()}&id=${$(this).val()}`
      );
    }
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

  $(".filter").on("click select2:select select2:unselect", function (params) {
    table.ajax.reload();
  });

  $(".filter-clear").on("click", function (params) {
    $("#date-from,#date-to").val("");
    table.ajax.reload();
  });
});

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
