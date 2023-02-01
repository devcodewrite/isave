let table;

$(function () {
  table = $("#dt-accounts").DataTable({
    ajax: {
      url: baseUrl + "bankaccounts/datatables",
      dataType: "json",
      contentType: "application/json",
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
      {data: 'passbook', name: "passbook"},
      { data: "name", name: "accounts.name" },
      { data: null, name: "ownership" , render:function (data, type, row) {
        if(type === 'display'){
            return data.ownership === 'individual'?data.member_owner:data.association_owner;
        }
        return data.ownership;
      }},
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
      { data: "created_at", name: "accounts.created_at" },
    ],
    order: [[7, "desc"]],
     columnDefs: [
        {
          orderable: false,
          targets: [4],
        },
      ],
  });
});
