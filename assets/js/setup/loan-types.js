let table, form;

form = $(".edit-loan-type");

$(function () {
  table = $("#dt-loan-types").DataTable({
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
  });

  form.validate({
    rules: {
      label: "required",
    },
    messages: {
      label: "Please enter the label",
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
            Swal.fire({
              icon: "success",
              text: d.message,
            });
              setTimeout(location.reload(), 500);
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
});
