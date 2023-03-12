let transactionTable;

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

transactionTable = $("#dt-transactions").DataTable({
  responsive: !0,
  dom: "lBftip",
  buttons: ["print", "pdf", "excel"],
  order: [[0, "desc"]],
  footerCallback: function (row, data, start, end, display) {
    var api = this.api();

    // Remove the formatting to get integer data for summation
    var intVal = function (i) {
      return typeof i === "string"
        ? i.replace(/[\$,]/g, "") * 1
        : typeof i === "number"
        ? i
        : 0;
    };

    // Total over all pages
    total = api
      .column(2)
      .data()
      .reduce(function (a, b) {
        return intVal(a) + intVal(b);
      }, 0);

    // Total over this page
    pageTotal = api
      .column(2, { page: "current" })
      .data()
      .reduce(function (a, b) {
        return intVal(a) + intVal(b);
      }, 0);

    // Update footer
    $(api.column(2).footer()).html("Page " + pageTotal.toFixed(2) + " (" +total.toFixed(2)+")");


    // Total over all pages
    total = api
      .column(3)
      .data()
      .reduce(function (a, b) {
        return intVal(a) + intVal(b);
      }, 0);

    // Total over this page
    pageTotal = api
      .column(3, { page: "current" })
      .data()
      .reduce(function (a, b) {
        return intVal(a) + intVal(b);
      }, 0);

    // Update footer
    $(api.column(3).footer()).html("Page " + pageTotal.toFixed(2) + " (" +total.toFixed(2)+")");


    // Total over all pages
    total = api
      .column(4)
      .data()
      .reduce(function (a, b) {
        return intVal(a) + intVal(b);
      }, 0);

    // Total over this page
    pageTotal = api
      .column(4, { page: "current" })
      .data()
      .reduce(function (a, b) {
        return intVal(a) + intVal(b);
      }, 0);

    // Update footer
    $(api.column(4).footer()).html("Page " + pageTotal.toFixed(2) + " (" +total.toFixed(2)+")");
  },
});

$(".transaction-filter-clear").on("click", function (params) {
  $("#transaction-date-from,#transaction-date-to").val("");
  transactionTable.draw();
});

$(".transaction-filter").on("click", function (params) {
  transactionTable.draw();
});