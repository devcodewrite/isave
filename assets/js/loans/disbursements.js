
let table;

$(function () {
  table = $("#dt-payouts").DataTable({
    ajax: {
      url: baseUrl + "loans/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "payout_date";
        params.date_from = $("#date-from").val();
        params.date_to = $("#date-to").val();
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
        data: "payout_date",
        name: "loans.payout_date",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      {
        data: null,
        name: "loans.id",
        render: function (data, type, row) {
          if (type === "display") {
            let d =
              `<div class="d-flex align-items-center">` +
              `<a href="${baseUrl}loans/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.id}</a>` +
              `</div>`;

            return d;
          }
          return data.id;
        },
      },
      { data: "passbook", name: "loans.passbook" },
      { data: null, name: "loans.account_id",
      render: function(data, type, row) {
        if (type === "display") {
          let d =
            `<div class="d-flex align-items-center">` +
            `<a href="${baseUrl}accounts/${data.account_id}" class="p-1 ml-1 btn btn-link float-right">${data.name}<br>(${data.accType})</a>` +
            `</div>`;
          return d;
        }
        return data.account_id;
      },},
      { data: "principal_amount", name: "principal_amount" },
      { data: "name", name: "accounts.name" },
      { data: "payin_start_date", name: "loans.payin_start_date" },
      {
        data: "appl_status",
        name: "loans.appl_status",
        render: function (data, type, row) {
          if (type === "display") {
            let labels = {
              pending: "alert-danger",
              approved: "alert-warning",
              payout: "alert-success",
            };
            return `<span class="alert p-1 px-2 text-white border-rounded ${
              labels[data]
            }">${data.toUpperCase()}</span>`;
          }
          return data;
        },
      },
      {
        data: null,
        name: "appl_status",
        render: function (data, type, rows) {
          if (type === "display") {
            let labels = {
              pending: "btn-warning",
              approved: "btn-success",
              payout: "btn-danger",
            };
            let icons = {
              pending: "fa-check",
              approved: "fa-money-bill",
              payout: "fa-times",
            };

            return `<button onclick="changeStatus(this)" data-id="${
              data.id
            }" data-status="${data.appl_status}" class="btn ${
              labels[data.appl_status]
            } ml-2 change-status"><i class="fa ${
              icons[data.appl_status]
            }"></i></button>`;
          }
          return null;
        },
      },
    ],
    order: [[0, "desc"]],
    columnDefs: [
      {
        orderable: false,
        targets: [8],
      },
    ],
  });
  $(".filter").on("click", function (params) {
    table.ajax.reload();
  });

  $(".filter-clear").on("click", function (params) {
    $("#date-from,#date-to").val("");
    table.ajax.reload();
  });
});

var changeStatus = function (el) {
  let status = $(el).data("status");
  let id = $(el).data("id");

  switch (status) {
    case "pending":
      status = "approved";
      action = "approve";
      break;
    case "approved":
      status = "paid_out";
      action = "disburse";
      break;
    default:
      action = "cancel";
  }
  let data = {
    id: id,
    appl_status: status,
  };

  Swal.fire({
    icon: "warning",
    title: "Are you sure ?",
    text: `You want to ${action} this loan payment.`,
    showCancelButton: true,
   
  }).then((result) => {
    if (!result.isConfirmed) {
      return;
    }

    $.ajax({
      method: "POST",
      url: `${baseUrl}loans/update/${id}`,
      data: data,
      dataType: "json",
      cache: false,
      success: function (d, r) {
        if (!d || r === "nocontent") {
          Swal.fire({
            icon: "error",
            text: "Malformed form data sumbitted! Please try agian.",
          });
          return;
        }
        if (typeof d.status !== "boolean" || typeof d.message !== "string") {
          Swal.fire({
            icon: "error",
            text: "Malformed data response! Please try agian.",
          });
          return;
        }

        if (d.status === true) {
          Swal.fire({
            icon: "success",
            text: d.message,
          });
        } else {
          Swal.fire({
            icon: "error",
            text: d.message,
          });
        }
      },
      error: function (r) {
        Swal.fire({
          icon: "error",
          text: "Unable to submit form! Please try agian.",
        });
      },
    });
  });
};
