let table;

$(function () {
  table = $("#dt-associations").DataTable({
    ajax: {
      url: baseUrl + "associations/datatables",
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
        name: "id",
        render: function (data, type, row) {
          if (type === "display") {
            let d =
              `<div class="d-flex align-items-center">` +
              `<a href="${baseUrl}associations/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.id}</a>` +
              `</div>`;

            return d;
          }
          return data.id;
        },
      },
      { data: "name", name: "name" },
      { data: "community", name: "community" },
      { data: "cluster_office_address", name: "cluster_office_address" },
      { data: "assigned_person_name", name: "assigned_person_name" },
      {
        data: "totalMembers",
        name: "id",
        render: function (data, type, row) {
          return data + " members";
        },
      },
      {
        data: "status",
        name: "status",
        render: function (data, type, row) {
          if (type === "display") {
            let labels = {
              open: "alert-success",
              close: "alert-danger",
            };
            return `<span class="alert p-1 px-2 text-white border-rounded ${
              labels[data]
            }">${data.toUpperCase()}</span>`;
          }
          return data;
        },
      },
      { data: "created_at", name: "created_at" },
    ],
    //order: [[10, "desc"]],
    columnDefs: [
      {
        orderable: false,
        targets: [5],
      },
    ],
  });
});
