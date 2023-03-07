let table;

$(function () {
  table = $("#dt-users").DataTable({
    ajax: {
      url: baseUrl + "users/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "users.created_at";
        params.date_from = $("#date-from").val();
        params.date_to = $("#date-to").val();
        params.rstatus = $("#status").val();
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
        name: "users.id",
        render: function (data, type, row) {
          if (type === "display") {
            data.getPhoto = function () {
              let imgs = {
                male: `${baseUrl}assets/images/man.png`,
                female: `${baseUrl}assets/images/woman.png`,
                other: `${baseUrl}assets/images/user.png`,
              };
              return imgs[this.sex ? this.sex : "other"];
            };
            let d =
              `<div class="d-flex flex-column-reverse align-items-center">` +
              `<a href="${baseUrl}users/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.username}</a>` +
              `<img height="40" src="${data.getPhoto()}" class="mx-1" />` +
              `</div>`;

            return d;
          }
          return data.id;
        },
      },
      { data: "phone", name: "phone" },
      { data: "email", name: "email" },
      { data: "firstname", name: "firstname" },
      { data: "lastname", name: "lastname" },
      {
        data: null,
        name: "role_id",
        render: function (data, type, row) {
          return data.role_label;
        },
      },
      {
        data: "rstatus",
        name: "rstatus",
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
      { data: "created_at", name: "users.created_at" },
    ],
    //order: [[10, "desc"]],
    columnDefs: [
      {
        orderable: false,
        targets: [],
      },
    ],
  });

  $('.filter').on('click keyup paste select2:select select2:unselect', function (params) {
    table.ajax.reload();
  });

  $(".filter-clear").on("click", function (params) {
    $("#date-from,#date-to").val("");
    table.ajax.reload();
  });

  $(".select2").select2({
    allowClear: true,
    placeholder: "Select an option",
    selectionCssClass: "form-select2",
  });

});
