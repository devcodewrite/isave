let form = $(".editDepositForm");
let table = $("#dt-mass-deposits").DataTable({
  responsive: !0,
});

form.validate({
  rules: {
    title: "required",
    firstname: "required",
    lastname: "required",
    sex: "required",
    marital_status: "required",
    primary_phone: { required: !0, min: 10, digits: true },
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
      required: "Please enter the primary phone number",
      min: "Phone number should be at least 10 digits",
      digits: "Phone number require only digits",
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

$(".select2-account-types").select2({
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

let passbookEls = $(".select2-mass-passbooks");
passbookEls
  .select2({
    ajax: {
      url: `${baseUrl}bankaccounts/passbook-select2`,
      dataType: "json",
      data: function (params) {
        return params;
      },
    },
    allowClear: true,
    placeholder: "Search a passbook",
    selectionCssClass: "form-select2",
    templateResult: formatPeople2Result,
  })
  .on("select2:select", function (e) {
    $(this).parent("td").next(".owner").text(e.params.data.name);
  })
  .on("select2:unselect", function (e) {
    $(this).parent("td").next(".owner").text("Not set");
  });

passbookEls.each((i, el) => {
  $("." + $(el).data("acc"))
    .select2({
      ajax: {
        url: `${baseUrl}bankaccounts/select2`,
        dataType: "json",
        data: function (params) {
          params.passbook = $(el).val();
          return params;
        },
      },
      allowClear: true,
      placeholder: "Select an account",
      selectionCssClass: "form-select2",
    })
    .on("select2:select", function (params) {
      let data = $(this).select2("data")[0];
      if (data.stamp_amount){
        $("td #stamps" + $(this).data("id"))
          .prop("disabled", false);
          
        $("td #stamps" + $(this).data("id")).data("amount", data.stamp_amount);
      }
      else{
        $("td #stamps" + $(this).data("id"))
          .prop("disabled", true)
          .val("");
      }
    })
    .on("select2:unselect", function (params) {
      $("td #stamps" + $(this).data("id"))
        .prop("disabled", true)
        .val("");
    });
});