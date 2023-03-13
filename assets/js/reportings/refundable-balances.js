let table;

$(function () {
  // transactions
  table = $("#dt-transactions").DataTable({
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    order: [[0, "desc"]],
    pageLength:25,
  });

  $(".transaction-filter").on("click", function (params) {
    table.draw();
  });

  $(".transaction-filter-clear").on("click", function (params) {
    $("#transaction-date-from,#transaction-date-to").val("");
    table.draw();
  });
});

$(".select2-associations1")
.select2({
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
})
.on("change", function (e) {
  if ($("#id").val() !== "") {
    location.assign(
      `${baseUrl}reporting/member-refundable-balances?association_id=${$(
        this
      ).val()}`
    );
  }
});