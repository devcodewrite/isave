let form = $(".mass-deposit-form");
let passbookEls;
let newRow,
  lastCount = 10;

let table = $("#dt-mass-deposits").DataTable({
  responsive: !0,
  drawCallback: function (params) {
    passbookEls = $(".select2-mass-passbooks");
    if (!passbookEls.hasClass("select2-hidden-accessible")) {
      passbookEls
        .select2({
          ajax: {
            url: `${baseUrl}bankaccounts/passbook-select2`,
            dataType: "json",
            data: function (params) {
              params.association_id = $(".select2-associations").val();
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
    }

    passbookEls.each((i, el) => {
      let el2 = $("." + $(el).data("acc"));
      if (!el2.hasClass("select2-hidden-accessible")) {
        el2
          .select2({
            ajax: {
              url: `${baseUrl}bankaccounts/select2`,
              dataType: "json",
              data: function (params) {
                params.passbook = $(el).val();
                params.association_id = $(".select2-associations").val();
                return params;
              },
            },
            allowClear: true,
            placeholder: "Select an account",
            selectionCssClass: "form-select2",
          })
          .on("select2:select", function (params) {
            let data = $(this).select2("data")[0];
            if (data.stamp_amount) {
              $("td #stamps" + $(this).data("id")).prop("disabled", false);
              $("td #stamps" + $(this).data("id")).prop("disabled", false);

              $("td #stamp_amt" + $(this).data("id")).val(data.stamp_amount);
            } else {
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
      }
    });
  },
});

$(".add-rows").on("click", function (params) {
  let rows = $("#entries").val();

  for (let i = 0; i < rows; i++) {
    let n = i + lastCount,
      nrow = i + lastCount + 1;
    newRow = `<tr>
    <td>${nrow}</td>
<td class="col-3">
    <select name="passbook[]" class="form-control select2-mass-passbooks" data-acc="select2-acc${n}" required>
        <option value=""></option>
    </select>
</td>
<td class="col-3 owner">Not set</td>
<td class="col-3">
    <select name="account_id[]" class="form-control select2-acc${n}" data-id="${n}" required>
        <option value=""></option>
    </select>
</td>
<td class="col-1">
    <input type="hidden" min="0" value="10" id="stamp_amt${n}" >
    <input onkeyup="$('td #amount${n}').val($(this).prev('input').val()*$(this).val())" id="stamps${n}" type="number" name="stamps[]" min="0" class="form-control" data-id="${n}" disabled>
</td>
<td class="col-1"> 
    <input id="amount${n}" type="number" name="amount[]" class="form-control">
</td>
<td class="col-1">
    <button type="button" class="btn btn-icon btn-warning delete-row">
        <i class="fa fa-trash"></i>
    </button>
</td>
</tr>`;
    table.row.add($(newRow)).draw();
  }
  lastCount = lastCount + Number(rows);

  Swal.fire({
    title: `${rows} rows added!`,
    icon: "success",
  });
});
form.validate({
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
          form.trigger("reset");
          $("select").val("").trigger("change.select2");
          setTimeout(location.assign(`${baseUrl}deposits`), 500);
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

$("#dt-mass-deposits").on("click", ".delete-row", function () {
  table.row($(this).parents("tr")).remove().draw();

  Swal.fire({
    title: `A row is deleted!`,
    icon: "success",
  });
});

$(".deposit").on("click", function (params) {
  form.trigger("submit");
});

function updateTotal() {
  let total1 = 0,
    total2 = 0;
  $('table input[name="amount[]"]').each((i, el) => {
    if ($(el).val()) total1 += Number.parseFloat($(el).val());
  });
  $('table input[name="stamps[]"]').each((i, el) => {
    if ($(el).val()) total2 += Number.parseInt($(el).val());
  });
  $("#amountTotal").text(total1.toFixed(2));
  $("#stampTotal").text(total2);
}
