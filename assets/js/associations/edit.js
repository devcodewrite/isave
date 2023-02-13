let form = $(".editAssociationForm");

form.validate({
  rules: {
    name: "required",
    community: "required",
    cluster_office_address: "required",
    assigned_person_name: "required",
    assigned_person_phone: {required:!0, min:10, digits:true},
    email: { email: !0 },
  },
  messages: {
    name: "Please enter the name",
    community: "Please enter the community",
    cluster_office_address: "Please enter the cluster office address",
    assigned_person_name: "Please enter the officer's name",
    assigned_person_phone: {
      required:"Please enter the phone number",
      min:"Phone number should be at least 10 digits",
      digits: "Phone number require only digits"
    },
    email: "Please enter a valid email address",
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

$('.select2-id-card-types,.select2-account-types').select2({
  allowClear: true,
  placeholder: "Select an account type",
  selectionCssClass: 'form-select2'
});

$('.select2-users').select2({
  ajax: {
    url: `${baseUrl}users/select2`,
        dataType: "json",
        data: function (params) {
            return params;
        },
  },
  allowClear: true,
  placeholder: "Select a user",
  selectionCssClass: 'form-select2',
  templateResult: formatPeopleResult,
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