let table;

$(function () {
  table = $("#dt-roles").DataTable({
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
  });
});
