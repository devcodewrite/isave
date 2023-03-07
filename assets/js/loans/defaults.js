let table;

table = $("#dt-defaults").DataTable({
  responsive: !0,
  dom: "lBftip",
  buttons: ["print", "pdf", "excel"],
  order: [[0, "desc"]],
  columnDefs: [
    {
      orderable: false,
      targets: [],
    },
  ],
});
