let table;

$(function () {
  table = $("#dt-related-accounts").DataTable({
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
  });
});

$(".select2-account-types")
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

let form = $('#newAccount');

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