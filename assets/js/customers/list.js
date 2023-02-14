let table;

$(function () {
  table = $("#dt-customers").DataTable({
    ajax: {
      url: baseUrl + "customers/datatables",
      dataType: "json",
      contentType: "application/json",
      data:function (params) {
        params.date_range_column = 'members.created_at';
        params.date_from = $('#date-from').val();
        params.date_to = $('#date-to').val();
        params.marital_status = $('#marital-status').val();
        params.association_id = $('.select2-associations').val();
        params.education = $('#education').val();
        params.settlement = $('#settlement').val();
        params.sex = $('#sex').val();
        params.city = $('#city').val();
        params.rstate = $('#rstate').val();
      }
    },
    serverSide: true,
    search: false,
    paging: true,
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    columns: [
      { data: null, name: "members.id",
      render:function(data, type, row){
        if(type === 'display'){
            data.getPhoto = function () {
                let imgs = {
                    male: `${baseUrl}assets/images/man.png`,
                    female: `${baseUrl}assets/images/woman.png`,
                    other: `${baseUrl}assets/images/user.png`,
                };
                return imgs[this.sex?this.sex:'other'];
            };
            let d = `<div class="d-flex align-items-center">`
            + `<a href="${baseUrl}customers/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.id}</a>`
            +`<img height="40" src="${data.getPhoto()}" class="mx-1" />`
            +`</div>`;

            return d;
        }
        return data.id;
     }},
      { data: "firstname", name: "firstname" },
      { data: "lastname", name: "lastname" },
      {
        data: "sex",
        name: "sex",
        render: function (data, type, row) {
          
          return data?data.toUpperCase():'';
        },
      },
      { data: "primary_phone", name: "primary_phone" },
      { data: "identity_card_number", name: "identity_card_number" },
      { data: "association_name", name: "associations.name" },
      { data: "occupation", name: "occupation" },
      {
        data: "rstate",
        name: "rstate",
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
      { data: "created_at", name: "members.created_at",render: function (data, type, row) {
        return (new Date(data)).toDateString();
      } },
    ],
    order: [[9, "desc"]],
  });
  $('.filter').on('click', function (params) {
    table.ajax.reload();
  });

  $('.filter-clear').on('click', function (params) {
    $('#date-from,#date-to').val('');
    table.ajax.reload();
  });
});

$(".select2").select2({
  allowClear:true,
  placeholder:"Select an option",
  selectionCssClass: "form-select2",
});

$(".select2-associations").select2({
  ajax: {
    url:`${baseUrl}associations/select2`,
    dataType: "json",
    data: function (params) {
    },
  },
  allowClear: true,
  placeholder: "Select an association",
  selectionCssClass: "form-select2",
});


$('.filter').on('keyup paste select2:select select2:unselect', function (params) {
  table.ajax.reload();
});