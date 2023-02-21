let table, form;

form = $(".edit-account-types");

$(function () {
  table = $("#dt-types").DataTable({
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
  });

  form.validate({
    rules: {
      label: "required",
    },
    messages: {
      label: "Please enter the label",
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
  $(".submit").on("click", function (params) {
    form.trigger("submit");
  });
});

$('.select2').select2({
  allowClear: true,
  placeholder: "Select an option",
  selectionCssClass: 'form-select2'
});

$("#is_investment").on("change", function (e) {
  if ($(this).prop("checked") || $(this).prop("checked")) {
    $(".rate").removeClass("d-none");
  } else {
    $(".rate").addClass("d-none");
  }
});

$("#is_loan_acc").on("change", function (e) {
  if ($(this).prop("checked") || $(this).prop("checked")) {
    $(".rate").removeClass("d-none");
  } else {
    $(".rate").addClass("d-none");
  }
  if ($(this).prop("checked")) {
    $(".limit").removeClass("d-none");
    $(".ratetype").removeClass("d-none");
    $(".amount").addClass("d-none");
    $(".vtype").addClass("d-none");
  } else {
    $(".limit").addClass("d-none");
    $(".amount").removeClass("d-none");
    $(".vtype").removeClass("d-none");
    $(".ratetype").addClass("d-none");
  }
});

$("#actype").on("change", function (e) {
  if ($(this).val() === "amount") {
    $(".amount").removeClass("d-none");
  } else {
    $(".amount").addClass("d-none");
  }
});

$("#dt-types").on("click", ".delete-row", function (e) {
  e.preventDefault();

  let url = $(this).attr("href");

  Swal.fire({
    icon: "warning",
    title: "Are you sure ?",
    text: `You woundn't be able to record this!`,
    showCancelButton: true,
  }).then((result) => {
    if (!result.isConfirmed) {
      return;
    }
    $.ajax({
      method: "POST",
      url: `${url}`,
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
});

let changeStatus = function (id) {
  let chform = $(`#${id}`);
  $.ajax({
    method: "POST",
    url: chform.attr("action"),
    data: new FormData(chform[0]),
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
};
