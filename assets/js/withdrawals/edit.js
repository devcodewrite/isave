let form = $(".editWithdrawalForm");

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

$(".select2-associations").select2({
  ajax: {
    url: `${baseUrl}associations/select2`,
    dataType: "json",
    data: function (params) {
      return params;
    },
  },
  allowClear: true,
  placeholder: "Select an association",
  selectionCssClass: "form-select2",
});

$(".select2-accounts1")
  .select2({
    ajax: {
      url: `${baseUrl}bankaccounts/select2`,
      dataType: "json",
      data: function (params) {
        params.passbook = $(".select2-passbooks").val();
        params.association_id = $(".select2-associations").val();
        params.is_loan_acc = 0;
        return params;
      },
    },
    allowClear: true,
    placeholder: "Select an account",
    selectionCssClass: "form-select2",
  });

form.on("submit", function (e) {
  e.preventDefault();
  if (form.valid() === true){
      $.ajax({
          method: 'POST',
          url: this.getAttribute("action"),
          data: new FormData(this),
          enctype: 'multipart/form-data',
          dataType: "json",
          contentType: false,
          processData: false,
          cache:false,
          success: function (d, r) {
              if (!d || r === "nocontent") {
                  Swal.fire({
                      icon: "error",
                      text: "Malformed form data sumbitted! Please try agian.",
                  });
                  return;
              }
              if (
                  typeof d.status !== "boolean" ||
                  typeof d.message !== "string"
              ) {
                  Swal.fire({
                      icon: "error",
                      text: "Malformed data response! Please try agian.",
                  });
                  return;
              }

              if (d.status === true) {
                  if(typeof d.input === 'object'){
                      if(d.input._method === 'post'){
                        form.trigger('reset');
                          $('select').val('').trigger('change.select2');
                      }
                      let default_redirect = form.attr('data-redirect-url');
                          default_redirect = default_redirect?default_redirect+`/${d.data.id}`:null;
                      let crrurl = new URL(location.href);
                      let backto = crrurl.searchParams.get('backtourl');
                      let redirect_url = backto?backto:default_redirect;

                      if(redirect_url && !d.input?.stay) setTimeout(location.assign(redirect_url),500);
                  }

                  Swal.fire({
                      icon: "success",
                      text: d.message,
                  }); 

              }else {
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

$('.withdraw').on('click', function (e) {
  form.trigger('submit');
});