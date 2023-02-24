let loanTable, depositTable, transactionTable, withdrawalTable;

$(function () {
  loanTable = $("#dt-related-loans").DataTable({
    responsive: !0,
    ajax: {
      url: baseUrl + "loans/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "ldate";
        params.date_from = $("#loan-date-from").val();
        params.date_to = $("#loan-date-to").val();
        params.account_id = $("#dt-related-loans").data("account-id");
      },
    },
    serverSide: true,
    search: false,
    paging: true,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    columns: [
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
      {
        data: "ldate",
        name: "ldate",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      { data: "principal_amount", name: "principal_amount" },
      { data: "interest_amount", name: "loans.interest_amount" },
      {
        data: "duration",
        name: "duration",
        render: function (data, type, row) {
          return `${data} months`;
        },
      },
      {
        data: null,
        name: "loans.rate",
        render: function (data, type, row) {
          return `${(data.rate* data.duration* 100).toFixed(2)}%`;
        },
      },
      {
        data: "appl_status",
        name: "loans.appl_status",
        render: function (data, type, row) {
          if (type === "display") {
            let labels = {
              pending: "alert-danger",
              approved: "alert-warning",
              paid_out: "alert-success",
            };
            return `<span class="alert p-1 px-2 text-white border-rounded ${
              labels[data]
            }">${data.replace("_", " ").toUpperCase()}</span>`;
          }
          return data;
        },
      },
      {
        data: "payout_date",
        name: "loans.payout_date",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      {
        data: "payin_start_date",
        name: "loans.payin_start_date",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      {
        data: "setl_status",
        name: "loans.setl_status",
        render: function (data, type, row) {
          if (type === "display") {
            let labels = {
              not_paid: "alert-danger",
              started: "alert-warning",
              paid: "alert-success",
            };
            return `<span style="font-size:12px;" class="alert p-1 px-2 text-white border-rounded ${
              labels[data]
            }">${data.replace("_", " ").toUpperCase()}</span>`;
          }
          return data;
        },
      },
      {
        data: null,
        name: "loans.user_id",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="${baseUrl}users/${data.user_id}">${data.user}</a>`;
          }
          return data.user_id;
        },
      },
    ],
    order: [[0, "desc"]],
    columnDefs: [
      {
        orderable: false,
        targets: [4],
      },
    ],
  });

  $(".loan-filter").on("click", function (params) {
    loanTable.ajax.reload();
  });

  $(".loan-filter-clear").on("click", function (params) {
    $("#loan-date-from,#loan-date-to").val("");
    loanTable.ajax.reload();
  });

  var minDate, maxDate;

  // Create date inputs
  minDate = $("#transaction-date-from");

  maxDate = $("#transaction-date-to");

  $.fn.DataTable.ext.search.push(function (settings, data, dataIndex) {
    var min = new Date(minDate.val());
    var max = new Date(maxDate.val());
    var date = new Date(data[1]);

    if (
      (min <= date && max >= date)||
      (minDate.val() === '' && maxDate.val() === '')
    ) {
      return true;
    }
    return false;
  });

  // transactions
  transactionTable = $("#dt-transactions").DataTable({
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    order: [[0, "desc"]],
  });

  $(".transaction-filter").on("click", function (params) {
    transactionTable.draw();
  });

  $(".transaction-filter-clear").on("click", function (params) {
    $("#transaction-date-from,#transaction-date-to").val("");
    transactionTable.draw();
  });
});


let form2 = $("#newCharge");

form2.validate({
    rules: {
      amount: "required",
      wdate:"required",
    },
    messages: {
      amount: "Please enter the  amount",
      wdate:"Please choose a date",
    },
    errorElement: "em",
    errorPlacement: function (t, e) {
      t.addClass("invalid-feedback"),
        "checkbox" === e.prop("type")
          ? t.insertAfter(e.nex$("label"))
          : t.insertAfter(e);
    },
    highlight: function (e, i, n) {
      $(e).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function (e, i, n) {
      $(e).addClass("is-valid").removeClass("is-invalid");
    },
  });
form2.on("submit", function (e) {
  e.preventDefault();
  if (form2.valid() === true) {
    $.ajax({
      method: "POST",
      url: this.getAttribute("action"),
      data: new FormData(this),
      enctype: "multipart/form-data",
      dataType: "json",
      contentType: false,
      processData: false,
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
          setTimeout(location.reload(), 500);
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
  }
});
