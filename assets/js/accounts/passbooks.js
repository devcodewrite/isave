let table;

$(function () {
  table = $("#dt-passbooks").DataTable({
    ajax: {
      url: baseUrl + "bankaccounts/passbook-datatables",
      dataType: "json",
      contentType: "application/json",
    },
    serverSide: true,
    search: false,
    paging: true,
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    columns: [
      {data: 'passbook', name: "passbook"},
      { data: null, name: "ownership" , render:function (data, type, row) {
        if(type === 'display'){
            return data.ownership === 'individual'?data.member_owner:data.association_owner;
        }
        return data.ownership;
      }},
      { data: "balance", name: "accounts.id" },
      { data: "accounts", name: "accounts.id" },
    ],
     columnDefs: [
        {
          orderable: false,
          targets: [2, 3],
        },
      ],
  });
});
