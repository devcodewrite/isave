let form = $(".editUserForm");

form.validate({
  rules: {
    firstname: "required",
    lastname: "required",
    username: { required: !0, minlength: 2 },
    password: {  minlength: 5 },
    confirm_password: {  minlength: 5, equalTo: "#password" },
    email: { required: !0, email: !0 },
    phone: { required: !0, minlength: 10 },
  },
  messages: {
    firstname: "Please enter your firstname",
    lastname: "Please enter your lastname",
    username: {
      required: "Please enter a username",
      minlength: "Your username must consist of at least 2 characters",
    },
    phone: {
      required: "Please provide a phone number",
      minlength: "Invalid phone number, should be at least 10 characters",
    },
    password: {
      required: "Please provide a password",
      minlength: "Your password must be at least 5 characters long",
    },
    confirm_password: {
      required: "Please provide a password",
      minlength: "Your password must be at least 5 characters long",
      equalTo: "Please enter the same password as above",
    },
    email: "Please enter a valid email address",
  },
  errorElement: "em",
  errorPlacement: function (t, e) {
    t.addClass("invalid-feedback"),
      "checkbox" === e.prop("type")
        ? t.insertAfter(e.next("label"))
        : t.insertAfter(e);
  },
  highlight: function (e, i, n) {
    $(e).addClass("is-invalid").removeClass("is-valid");
  },
  unhighlight: function (e, i, n) {
    $(e).addClass("is-valid").removeClass("is-invalid");
  },
});

$(".select2-role")
.select2({
  allowClear: true,
  placeholder: "Select a role",
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
