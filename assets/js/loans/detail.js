let settlementTable;

$(function () {
  settlementTable = $("#dt-related-settlements").DataTable({
    // ajax: {
    //   url: baseUrl + "payments/datatables",
    //   dataType: "json",
    //   contentType: "application/json",
    //   // data: function (params) {
    //   //   params.date_range_column = "pdate";
    //   //   params.date_from = $("#date-from").val();
    //   //   params.date_to = $("#date-to").val();
    //   //   params.loan_id = $("#dt-related-settlements").data("loan-id");
    //   // },
    // },
    // serverSide: true,
    // search: false,
    // paging: true,
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    // columns: [
    //   {
    //     data: "id",
    //     name: "loan_payments.id",
    //   },
    //   {
    //     data: "pdate",
    //     name: "pdate",
    //     render: function (data, type, row) {
    //       return new Date(data).toDateString();
    //     },
    //   },
    //   { data: "principal_amount", name: "principal_amount" },
    //   { data: "interest_amount", name: "interest_amount" },
    //   {
    //     data: 'balance',
    //     name: "balance",
    //   },
    //   {
    //     data: "id",
    //     name: "id",
    //     render: function (data, type, rows) {
    //       if (type === "display") {
    //         return `<button onclick="deletePayment(this)" data-id="${data}" class="btn btn-danger ml-2"><i class="fa fa-trash"></i></button>`;
    //       }
    //       return null;
    //     },
    //   },
    // ],
    order: [[0, "desc"]],
    // columnDefs: [
    //   {
    //     orderable: false,
    //     targets: [],
    //   },
    // ],
  });
});

var deletePayment = function (el) {
  let id = $(el).data("id");

  Swal.fire({
    icon: "warning",
    title: "Are you sure ?",
    text: `You want to delete this loan repayment.`,
    showCancelButton: true,
  }).then((result) => {
    if (!result.isConfirmed) {
      return;
    }

    $.ajax({
      method: "POST",
      url: `${baseUrl}payments/delete/${id}`,
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
         setTimeout(() => {
          location.reload();
         }, 500);
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

$(".disburse").on("click", function (e) {
  Swal.fire({
    icon: "warning",
    title: "Are you sure ?",
    text: `You want to disburse this loan payment.`,
    showCancelButton: true,
  }).then((result) => {
    if (!result.isConfirmed) {
      return;
    }
    $.ajax({
      method: "POST",
      url: `${baseUrl}loans/update/${$(this).data("id")}`,
      data: {
        appl_status: "disbursed",
      },
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
          location.reload();
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
});

$(".approve").on("click", function (e) {
  Swal.fire({
    icon: "warning",
    title: "Are you sure ?",
    text: `You want to approve this loan request.`,
    showCancelButton: true,
  }).then((result) => {
    if (!result.isConfirmed) {
      return;
    }
    $.ajax({
      method: "POST",
      url: `${baseUrl}loans/update/${$(this).data("id")}`,
      data: {
        appl_status: "approved",
      },
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
          location.reload();
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
});
$(".cancel").on("click", function (e) {
  Swal.fire({
    icon: "warning",
    title: "Are you sure ?",
    text: `You want to reject this loan request.`,
    showCancelButton: true,
  }).then((result) => {
    if (!result.isConfirmed) {
      return;
    }
    $.ajax({
      method: "POST",
      url: `${baseUrl}loans/update/${$(this).data("id")}`,
      data: {
        appl_status: "rejected",
      },
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
          location.reload();
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
});

$(".delete").on("click", function (e) {
  Swal.fire({
    icon: "warning",
    title: "Are you sure ?",
    text: `You want delete this record. This process cannot be reversed.`,
    showCancelButton: true,
  }).then((result) => {
    if (!result.isConfirmed) {
      return;
    }
    $.ajax({
      method: "POST",
      url: `${baseUrl}loans/delete/${$(this).data("id")}`,
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

          setTimeout(() => {
            location.assign(`${baseUrl}loans`);
          }, 500);
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
});

let form = $(".repaymentForm");

form.validate({
  rules: {
    loan_type_id: "required",
    account_id: "required",
    passbook: "required",
    amount: "required",
    payin_start_date: "required",
    payout_date: "required",
    rate: {
      required: true,
      min: 0,
      max: 1,
    },
    duration: {
      required: true,
      min: 1,
      max: 12,
    },
  },
  messages: {
    loan_type_id: "Please choose a loan type",
    account_id: "Please select the account",
    passbook: "Please choose a passbook number",
    amount: "Please enter the amount",
    payout_date: "Please set payout date",
    payin_start_date: "Please set repayment start date",
    rate: {
      required: "Enter the rate (0.0 - 1, i.e. 0% - 100%)",
      min: "The min rate should be 0.0 i.e. 0%",
      max: "The max rate should be 1 i.e. 100%",
    },
    duration: {
      required: "Enter the duration in months",
      min: "The min duration should be 1 i.e 1 month",
      max: "The max duration should be 12 i.e. 12 months",
    },
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

$("#toggle-use-personal-info").on("change", function (e) {
  if ($(this).prop("checked")) {
    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();

    $("#account-name").val(`${firstname} ${lastname}`);
  } else {
    $("#account-name").val("");
  }
});

$(".select2-loan-types").select2({
  allowClear: true,
  placeholder: "Select a type",
  selectionCssClass: "form-select2",
});

$(".select2-associations").select2({
  ajax: {
    url: `${baseUrl}associations/select2`,
    dataType: "json",
    data: function (params) {
      params.association_id = $(".select2-associations").val();
      return params;
    },
  },
  allowClear: true,
  placeholder: "Select an association",
  selectionCssClass: "form-select2",
});

form.on("submit", function (e) {
  e.preventDefault();
  if (form.valid() === true) {
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
          if (typeof d.input === "object") {
            if (d.input._method === "post") {
              form.trigger("reset");
              $("select").val("").trigger("change.select2");
            }
            setTimeout(() => {
              location.reload();
            }, 500);
          }

          Swal.fire({
            icon: "success",
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
