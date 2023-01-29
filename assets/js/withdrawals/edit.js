let form = $(".withdrawalForm");
let placeholder = $('.input-placeholder');
let passportPhoto = $('#passport-photo');
let passportPlaceholder = passportPhoto.attr('src');

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

$('.search-customer').on('click', function(e){
  placeholder.text('');
  placeholder.addClass('bg-light');
  passportPhoto.attr('src', passportPlaceholder);

  $.ajax({
    url: search_url,
    method: 'POST',
    data: {},
    dataType: 'json',
    contentType: 'application/json',
    processData:false,
    cache: false,
    success:function(d,r){

    },
    error: function(r){

    }
  });
});

$("")