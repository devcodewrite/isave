
let table;

$(function () {
  table = $("#dt-related-accounts").DataTable({
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
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

$(".select2-method")
.select2({
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

$("#dt-related-accounts").on("click",".edit", function (e) {
  Swal.fire({
    title: "Please wait, loading data!",
    allowOutsideClick: false,
    showCancelButton: false,
    didOpen: () => {
      Swal.showLoading();
    },
  });
  let acc_number = $(this).data('id');
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
        form2.attr('action', `${baseUrl}bankaccounts/update/${d.data.id}`);
        
       for (const item in d.data) {
        if (Object.hasOwnProperty.call(d.data, item)) {
            const val = d.data[item];
            $(`#editAccount input[name="${item}"]`).val(val); 
            $(`#editAccount select[name="${item}"]`).val(val).trigger('change');
            if(item === 'stamp_amount' && (val !== '' || val !== null)){
              $(`#editAccount input[name="${item}"]`).prop("disabled", false);
            }else if(item === 'stamp_amount') {
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
