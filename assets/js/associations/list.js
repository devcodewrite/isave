let table;

$(function () {
  table = $("#dt-associations").DataTable({
    ajax: {
      url: baseUrl + "associations/datatables",
      dataType: "json",
      contentType: "application/json",
      data:function (params) {
        params.date_range_column = 'associations.created_at';
        params.date_from = $('#date-from').val();
        params.date_to = $('#date-to').val();
        params.status = $('#status').val();
        params.user_id = $('.select2-users').val();
        params.community = $('#community').val();
        params.cluster_office_address = $('#cluster_office_address').val();
      }
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
      { data: "created_at", name: "created_at", render: function (data, type, row) {
        return (new Date(data)).toDateString();
      }},
    ],
    //order: [[10, "desc"]],
    columnDefs: [
      {
        orderable: false,
        targets: [5],
      },
    ],
  });

  $(".select2").select2({
    allowClear:true,
    placeholder:"Select an option",
    selectionCssClass: "form-select2",
  });


$(".select2-users").select2({
  ajax: {
    url: `${baseUrl}users/select2`,
    dataType: "json",
    data: function (params) {
      params.association_id = $('.select2-users').val();
      return params;
    },
  },
  allowClear: true,
  placeholder: "Select a user",
  selectionCssClass: "form-select2",
  templateResult: formatPeopleResult,
});

  $('.filter').on('click', function (params) {
    table.ajax.reload();
  });

  $('.filter-clear').on('click', function (params) {
    $('#date-from,#date-to').val('');
    table.ajax.reload();
  });
});


$('.filter').on('keyup paste select2:select select2:unselect', function (params) {
  table.ajax.reload();
});