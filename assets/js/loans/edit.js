let form = $(".editLoanForm");

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
      params.association_id = $('.select2-associations').val();
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
            let default_redirect = form.attr("data-redirect-url");
            default_redirect = default_redirect
              ? default_redirect + `/${d.data.id}`
              : null;
            let crrurl = new URL(location.href);
            let backto = crrurl.searchParams.get("backtourl");
            let redirect_url = backto ? backto : default_redirect;

            if (redirect_url && !d.input?.stay)
              setTimeout(location.assign(redirect_url), 500);
          }

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
  }
});

$(".apply").on("click", function (e) {
  form.trigger("submit");
});
