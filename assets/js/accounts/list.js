let table;

$(function () {
  table = $("#dt-accounts").DataTable({
    ajax: {
      url: baseUrl + "bankaccounts/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "accounts.created_at";
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
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    columns: [
      {
        data: null,
        name: "accounts.id",
        render: function (data, type, row) {
          if (type === "display") {
            let d =
              `<div class="d-flex align-items-center">` +
              `<a href="${baseUrl}bankaccounts/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.acc_number}</a>` +
              `</div>`;

            return d;
          }
          return data.id;
        },
      },
      { data: "passbook", name: "passbook" },
      { data: "name", name: "accounts.name" },
      {
        data: null,
        name: "ownership",
        render: function (data, type, row) {
          if (type === "display") {
            return data.ownership === "individual"
              ? data.member_owner
              : data.association_owner;
          }
          return data.ownership;
        },
      },
      { data: "acc_type", name: "acc_type_id" },
      { data: "balance", name: "accounts.id" },
      { data: "ownership", name: "ownership" },
      {
        data: "status",
        name: "accounts.status",
        render: function (data, type, row) {
          if (type === "display") {
            let labels = {
              open: "alert-success",
              close: "alert-danger",
              suspended: "alert-warning",
            };
            return `<span class="alert p-1 px-2 text-white border-rounded ${
              labels[data]
            }">${data.toUpperCase()}</span>`;
          }
          return data;
        },
      },
      {
        data: "created_at",
        name: "accounts.created_at",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
    ],
    order: [[7, "desc"]],
    columnDefs: [
      {
        orderable: false,
        targets: [4],
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