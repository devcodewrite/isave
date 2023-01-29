let form = $(".editAccountForm");

form.validate({
  rules: {
    title: "required",
    firstname: "required",
    lastname: "required",
    sex: "required",
    marital_status: "required",
    primary_phone: {required:!0, min:10, digits:true},
    address: "required",
    city: "required",
    email: { email: !0 },
  },
  messages: {
    title: "Please choose a title",
    firstname: "Please enter the firstname",
    lastname: "Please enter the lastname",
    sex: "Please select a sex",
    marital_status: "Please choose a martial status",
    primary_phone: {
      required:"Please enter the primary phone number",
      min:"Phone number should be at least 10 digits",
      digits: "Phone number require only digits"
    },
    address: "Please enter an address",
    city: "Please enter the city",
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