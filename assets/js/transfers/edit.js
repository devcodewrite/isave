let form = $(".editTransferForm");

form.validate({
  rules: {
    from_association_id: "required",
    to_association_id: "required",
    from_account_id: "required",
    to_account_id: "required",
    from_passbook: "required",
    to_passbook: "required",
    amount :"required",
  },
  messages: {
    from_association_id: "Please choose an association",
    to_association_id: "Please choose an association",
    from_passbook: "Please choose a passbook",
    to_passbook: "Please choose a passbook",
    to_account_id: "Please choose an account",
    from_account_id: "Please choose an account",
    amount: "Please enter the amount",
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

$(".select2-id-card-types,.select2-account-types").select2({
  allowClear: true,
  placeholder: "Select an account type",
  selectionCssClass: "form-select2",
});

$(".select2-associations").select2({
  ajax: {
    url: `${baseUrl}associations/select2`,
    dataType: "json",
    data: function (params) {
      params._token = $('meta[name="token"]').attr("content");
      return params;
    },
  },
  allowClear: true,
  placeholder: "Select an association",
  selectionCssClass: "form-select2",
});

$('.select2-from-passbooks').select2({
  ajax: {
    url: `${baseUrl}bankaccounts/passbook-select2`,
        dataType: "json",
        data: function (params) {
          params.association_id = $('#from-association').val();
            return params;
        },
  },
  allowClear: true,
  placeholder: "Search a passbook",
  selectionCssClass: 'form-select2',
  templateResult: formatPeople2Result,
});

$('.select2-to-passbooks').select2({
  ajax: {
    url: `${baseUrl}bankaccounts/passbook-select2`,
        dataType: "json",
        data: function (params) {
          params.association_id = $('#to-association').val();
            return params;
        },
  },
  allowClear: true,
  placeholder: "Search a passbook",
  selectionCssClass: 'form-select2',
  templateResult: formatPeople2Result,
});

$('.select2-from-accounts').select2({
  ajax: {
    url: `${baseUrl}bankaccounts/select2`,
        dataType: "json",
        data: function (params) {
            params.passbook = $('.select2-from-passbooks').val();
            params.association_id = $('#from-association').val();
            return params;
        },
  },
  allowClear: true,
  placeholder: "Select an account",
  selectionCssClass: 'form-select2',
}).on('select2:select', function (params) {
  $(this).trigger('change');
});



$('.select2-to-accounts').select2({
  ajax: {
    url: `${baseUrl}bankaccounts/select2`,
        dataType: "json",
        data: function (params) {
            params.passbook = $('.select2-to-passbooks').val();
            params.association_id = $('#to-association').val();
            return params;
        },
  },
  allowClear: true,
  placeholder: "Select an account",
  selectionCssClass: 'form-select2',
}).on('select2:select', function (params) {
  $(this).trigger('change');
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
$(".transfer").on("click", function (e) {
  form.trigger("submit");
});

