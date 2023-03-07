let table;

$(function () {
  table = $("#dt-passbooks").DataTable({
    ajax: {
      url: baseUrl + "bankaccounts/passbook-datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "accounts.created_at";
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
      { data: "passbook", name: "passbook" },
      {
        data: null,
        name: "association_members.association_id",
        render: function (data, type, row) {
          if (type === "display") {
            return data.association_name;
          }
          return data.member_association_id;
        },
      },
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
      { data: "balance", name: "accounts.id", render:function (data, type, row) {
          return data < 0 ? `(${Math.abs(data).toFixed(2)})`:data;
      } },
      { data: "accounts", name: "accounts.id" },
    ],
    columnDefs: [
      {
        orderable: false,
        targets: [2, 3],
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
