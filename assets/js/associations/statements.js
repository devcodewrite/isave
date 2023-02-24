let table;

$(function () {
  table = $("#dt-statements").DataTable({
    ajax: {
      url: baseUrl + "associations/statement-datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "created_at";
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
    buttons: ["print", "pdf", "excel"],
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
      { data: null, name: "account_statements.id",render:function (data, type, rows) {
        return `<a href="${baseUrl}associations/statements?id=${data.id}&association_id=${data.association_id}" class="btn btn-icon btn-primary"><i class="fa fa-edit"></i></a>`;
      } },
    ],
    columnDefs: [
      {
        orderable: false,
        targets: [6],
      },
    ],
  });

  $(".select2-associations")
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
