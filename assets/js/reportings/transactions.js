let transactionTable;

$(function () {
  var minDate, maxDate;

  // Create date inputs
  minDate = $("#transaction-date-from");
  maxDate = $("#transaction-date-to");

  $.fn.DataTable.ext.search.push(function (settings, data, dataIndex) {
    var min = new Date(minDate.val());
    var max = new Date(maxDate.val());
    var date = new Date(data[0]);

    if (
      (min <= date && max >= date) ||
      (minDate.val() === "" && maxDate.val() === "")
    ) {
      return true;
    }
    return false;
  });

  // transactions
  transactionTable = $("#dt-transactions").DataTable({
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    order: [[0, "desc"]],
  });

  $(".transaction-filter").on("click", function (params) {
    transactionTable.draw();
  });

  $(".transaction-filter-clear").on("click", function (params) {
    $("#transaction-date-from,#transaction-date-to").val("");
    transactionTable.draw();
  });
});