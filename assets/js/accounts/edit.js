let form = $(".associationAccForm, .memberAccForm");
let form1 = $(".associationAccForm");
let form2 = $(".memberAccForm");

form1.validate({
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

$(".select2-account-types1")
  .select2({
    allowClear: true,
    placeholder: "Select an account type",
    selectionCssClass: "form-select2",
  })
  .on("select2:select", function (params) {
    if ($(this).find(":selected").data("type") === "stamp") {
      $(".stamps1").prop("disabled", false);
    } else {
      $(".stamps1").val("").prop("disabled", true);
    }
  })
  .on("select2:unselect", function (params) {
    $(".stamps1").val("").prop("disabled", true);
  });

$(".select2-account-types2")
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

$(".select2-members").select2({
  ajax: {
    url: `${baseUrl}customers/select2`,
    dataType: "json",
    data: function (params) {
      params._token = $('meta[name="token"]').attr("content");
      return params;
    },
  },
  allowClear: true,
  placeholder: "Select a member",
  selectionCssClass: "form-select2",
  templateResult: formatPeopleResult,
});

$(".select2-container").css("display", "block");

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
