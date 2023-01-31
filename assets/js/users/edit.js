$("#editCustomerForm").validate({
  rules: {
    firstname: "required",
    lastname: "required",
    username: { required: !0, minlength: 2 },
    password: { required: !0, minlength: 5 },
    confirm_password: { required: !0, minlength: 5, equalTo: "#password" },
    email: { required: !0, email: !0 },
    agree: "required",
  },
  messages: { 
    firstname: "Please enter your firstname",
    lastname: "Please enter your lastname",
    username: {
      required: "Please enter a username",
      minlength: "Your username must consist of at least 2 characters",
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
    agree: "Please accept our policy",
  },
  errorElement: "em",
  errorPlacement: function (t, e) {
    t.addClass("invalid-feedback"),
      "checkbox" === e.prop("type")
        ? t.insertAfter(e.next("label"))
        : t.insertAfter(e);
  },
  highlight: function (e, i, n) {
    t(e).addClass("is-invalid").removeClass("is-valid");
  },
  unhighlight: function (e, i, n) {
    t(e).addClass("is-valid").removeClass("is-invalid");
  },
});