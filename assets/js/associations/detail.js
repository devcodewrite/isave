let loanTable, transactionTable, customerTable, settlementTable;

$("#dt-related-accounts").DataTable({
  responsive: !0,
  dom: "lBftip",
  buttons: ["print", "pdf", "excel"],
});

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
      params.association_id = $("#dt-related-loans").data("association-id");
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
    { data: "passbook", name: "loans.passbook" },
    {
      data: null,
      name: "accounts.id",
      render: function (data, type, row) {
        if (type === "display") {
          let d =
            `<div class="d-flex align-items-center">` +
            `<a href="${baseUrl}bankaccounts/${data.account_id}" class="p-1 ml-1 btn btn-link float-right">${data.name}<br>(${data.accType})</a>` +
            `</div>`;
          return d;
        }
        return data.account_id;
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
        return `${(data.rate * data.duration * 100).toFixed(0)}%`;
      },
    },
    {
      data: "appl_status",
      name: "loans.appl_status",
      render: function (data, type, row) {
        if (type === "display") {
          let labels = {
            pending: "alert-warning",
            approved: "alert-info",
            disbursed: "alert-success",
            rejected: "alert-danger",
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
            not_paid: "alert-warning",
            started: "alert-info",
            paid: "alert-success",
            defaulted: "alert-danger",
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

$("#dt-related-loan-balances").DataTable({
  responsive: !0,
  dom: "lBftip",
  buttons: ["print", "pdf", "excel"],
  order: [[0, "desc"]],
  columnDefs: [
    {
      orderable: false,
      targets: [],
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
minDate = $(".transaction-date-from");

maxDate = $(".transaction-date-to");

$.fn.DataTable.ext.search.push(function (settings, data, dataIndex) {
  var min = new Date(minDate.val());
  var max = new Date(maxDate.val());
  var date = new Date(data[0]);
  if (
    (min <= date && max >= date) ||
    (minDate.val() === "" && maxDate.val() === "")
  ) {
    return true;
  }
  return false;
});

transactionTable = $("#dt-transactions").DataTable({
  responsive: !0,
  dom: "lBftip",
  buttons: ["print", "pdf", "excel"],
  order: [[0, "desc"]],
});

$(".transaction-filter-clear").on("click", function (params) {
  $("#transaction-date-from,#transaction-date-to").val("");
  transactionTable.draw();
});

$(".transaction-filter").on("click", function (params) {
  transactionTable.draw();
});

customerTable = $("#dt-related-customers").DataTable({
  ajax: {
    url: baseUrl + "customers/datatables",
    dataType: "json",
    contentType: "application/json",
    data: function (params) {
      params.date_range_column = "members.created_at";
      params.date_from = $("#member-date-from").val();
      params.date_to = $("#member-date-to").val();
      params.marital_status = $("#marital-status").val();
      params.association_id = $(".select2-associations").val();
      params.passbook = $(".select2-passbooks2").val();
      params.education = $("#education").val();
      params.settlement = $("#settlement").val();
      params.sex = $("#sex").val();
      params.city = $("#city").val();
      params.rstate = $("#rstate").val();
      params.association_id = $("#dt-related-customers").data("association-id");
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
      name: "members.id",
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
            `<div class="d-flex align-items-center">` +
            `<a href="${baseUrl}customers/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.id}</a>` +
            `<img height="40" src="${data.getPhoto()}" class="mx-1" />` +
            `</div>`;

          return d;
        }
        return data.id;
      },
    },
    { data: "firstname", name: "firstname" },
    { data: "lastname", name: "lastname" },
    {
      data: "sex",
      name: "sex",
      render: function (data, type, row) {
        return data ? data.toUpperCase() : "other";
      },
    },
    { data: "primary_phone", name: "primary_phone" },
    { data: "identity_card_number", name: "identity_card_number" },
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
    {
      data: "created_at",
      name: "members.created_at",
      render: function (data, type, row) {
        return new Date(data).toDateString();
      },
    },
    {
      data: null,
      name: "members.id",
      render: function (data, type, row) {
        if (type === "display") {
          let id = $("#dt-related-customers").data("association-id");
          return `<a href="${baseUrl}associations/remove-member/${id}" data-member-id="${data.id}" class="btn btn-icon btn-warning delete-row"><i class="fa fa-trash"></i></a>`;
        }
        return null;
      },
    },
  ],
  order: [[0, "desc"]],
});
$(".customer-filter").on("click", function (params) {
  customerTable.ajax.reload();
});

$(".customer-filter-clear").on("click", function (params) {
  $("#customer-date-from,#customer-date-to").val("");
  customerTable.ajax.reload();
});

$(".nav-link").on("click", function () {
  setTimeout(function () {
    if ($(".select2").hasClass("select2-hidden-accessible")) {
      $(".select2").select2("destroy");
      $(".select2-passbooks2").select2("destroy");
    }
    $(".select2").select2({
      allowClear: true,
      placeholder: "Select an option",
      selectionCssClass: "form-select2",
    });

    $(".select2-passbooks2")
      .select2({
        ajax: {
          url: `${baseUrl}bankaccounts/passbook-select2`,
          dataType: "json",
          data: function (params) {
            params.association_id = $(".select2-associations").val()
              ? $(".select2-associations").val()
              : 0;
            return params;
          },
        },
        allowClear: true,
        placeholder: "Search a passbook",
        selectionCssClass: "form-select2",
        templateResult: formatPeople2Result,
      })
      .on("select2:select", function (params) {
        $(".select2-passbooks").trigger("change");
      });

    $(".filter").on(
      "keyup paste select2:select select2:unselect",
      function (params) {
        customerTable.ajax.reload();
      }
    );
  }, 100);
});

$("#dt-related-customers").on("click", ".delete-row", function (e) {
  e.preventDefault();

  let url = $(this).attr("href");
  let data = $(this).data("member-id");

  Swal.fire({
    icon: "warning",
    title: "Are you sure ?",
    text: `You want to remove this member from this association`,
    showCancelButton: true,
  }).then((result) => {
    if (!result.isConfirmed) {
      return;
    }
    $.ajax({
      method: "POST",
      url: `${url}`,
      data: {
        member_id: data,
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
          customerTable.ajax.reload();
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

$(".select2-account-types")
  .select2({
    allowClear: true,
    placeholder: "Select an account type",
    selectionCssClass: "form-select2",
  })
  .on("select2:select", function (params) {
    if ($(this).find(":selected").data("type") === "stamp") {
      $(".stamps2").prop("disabled", false);
    } else {
      $(".stamps2").val("").prop("disabled", true);
    }
  })
  .on("select2:unselect", function (params) {
    $(".stamps2").val("").prop("disabled", true);
  });

let form = $("#newAccount");
form.validate({
  rules: {
    association_id: "required",
    name: "required",
    acc_type_id: "required",
  },
  messages: {
    association_id: "Please choose an association",
    name: "Please enter the account name",
    association_id: "Please choose a type",
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

let form2 = $("#editAccount");

$(".select2-method").select2({
  allowClear: true,
  placeholder: "Select a method",
  selectionCssClass: "form-select2",
});

$(".select2-associations").select2({
  allowClear: true,
  placeholder: "Select an association",
  selectionCssClass: "form-select2",
});

form2.validate({
  rules: {
    association_id: "required",
    name: "required",
    acc_type_id: "required",
  },
  messages: {
    association_id: "Please choose an association",
    name: "Please enter the account name",
    association_id: "Please choose a type",
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

$("#dt-related-accounts").on("click", ".edit", function (e) {
  Swal.fire({
    title: "Please wait, loading data!",
    allowOutsideClick: false,
    showCancelButton: false,
    didOpen: () => {
      Swal.showLoading();
    },
  });
  let acc_number = $(this).data("id");
  $.ajax({
    url: `${baseUrl}bankaccounts/find`,
    data: { acc_number: acc_number },
    method: "GET",
    dataType: "json",
    contentType: "application/json",
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
        Swal.close();
        form2.attr("action", `${baseUrl}bankaccounts/update/${d.data.id}`);

        for (const item in d.data) {
          if (Object.hasOwnProperty.call(d.data, item)) {
            const val = d.data[item];
            $(`#editAccount input[name="${item}"]`).val(val);
            $(`#editAccount select[name="${item}"]`).val(val).trigger("change");
            if (item === "stamp_amount" && (val !== "" || val !== null)) {
              $(`#editAccount input[name="${item}"]`).prop("disabled", false);
            } else if (item === "stamp_amount") {
              $(`#editAccount input[name="${item}"]`).prop("disabled", true);
            }
          }
        }
        // $('#editAccount').addClass('show').removeAttr('aria-hidden').attr('aria-modal', 'true').show();
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
