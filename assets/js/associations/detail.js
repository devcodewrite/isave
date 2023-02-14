let loanTable, withdrawalTable, transferTable, customerTable;

$(function () {
  loanTable = $("#dt-related-loans").DataTable({
    responsive: !0,
    ajax: {
      url: baseUrl + "loans/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "ldate";
        params.date_from = $("#loan-date-from").val();
        params.date_to = $("#loan-date-to").val();
      },
    },
    serverSide: true,
    search: false,
    paging: true,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    columns: [
      {
        data: null,
        name: "loans.id",
        render: function (data, type, row) {
          if (type === "display") {
            let d =
              `<div class="d-flex align-items-center">` +
              `<a href="${baseUrl}loans/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.id}</a>` +
              `</div>`;

            return d;
          }
          return data.id;
        },
      },
      {
        data: "ldate",
        name: "ldate",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      { data: "passbook", name: "loans.passbook" },
      {
        data: null,
        name: "accounts.id",
        render: function (data, type, row) {
          if (type === "display") {
            let d =
              `<div class="d-flex align-items-center">` +
              `<a href="${baseUrl}accounts/${data.account_id}" class="p-1 ml-1 btn btn-link float-right">${data.name}<br>(${data.accType})</a>` +
              `</div>`;
            return d;
          }
          return data.account_id;
        },
      },
      { data: "principal_amount", name: "principal_amount" },
      { data: "interest_amount", name: "loans.interest_amount" },
      {
        data: "duration",
        name: "duration",
        render: function (data, type, row) {
          return `${data} months`;
        },
      },
      {
        data: "rate",
        name: "loans.rate",
        render: function (data, type, row) {
          return `${data * 100}%`;
        },
      },
      {
        data: "appl_status",
        name: "loans.appl_status",
        render: function (data, type, row) {
          if (type === "display") {
            let labels = {
              pending: "alert-warning",
              approved: "alert-info",
              disbursed: "alert-success",
              rejected: "alert-danger",
            };
            return `<span class="alert p-1 px-2 text-white border-rounded ${
              labels[data]
            }">${data.replace("_", " ").toUpperCase()}</span>`;
          }
          return data;
        },
      },
      {
        data: "payout_date",
        name: "loans.payout_date",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      {
        data: "payin_start_date",
        name: "loans.payin_start_date",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      {
        data: "setl_status",
        name: "loans.setl_status",
        render: function (data, type, row) {
          if (type === "display") {
            let labels = {
              not_paid: "alert-warning",
              started: "alert-info",
              paid: "alert-success",
              defaulted: "alert-danger",
            };
            return `<span style="font-size:12px;" class="alert p-1 px-2 text-white border-rounded ${
              labels[data]
            }">${data.replace("_", " ").toUpperCase()}</span>`;
          }
          return data;
        },
      },
      { data: "loanType", name: "loans.loan_type_id" },
      {
        data: null,
        name: "loans.user_id",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="${baseUrl}users/${data.user_id}">${data.user}</a>`;
          }
          return data.user_id;
        },
      },
    ],
    order: [[0, "desc"]],
    columnDefs: [
      {
        orderable: false,
        targets: [4],
      },
    ],
  });

  $(".loan-filter").on("click", function (params) {
    loanTable.ajax.reload();
  });

  $(".loan-filter-clear").on("click", function (params) {
    $("#loan-date-from,#loan-date-to").val("");
    loanTable.ajax.reload();
  });

  transferTable = $("#dt-transfers").DataTable({
    ajax: {
      url: baseUrl + "transfers/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "tdate";
        params.date_from = $("#transfer-date-from").val();
        params.date_to = $("#transfer-date-to").val();
      },
    },
    serverSide: true,
    search: false,
    paging: true,
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    columns: [
      {
        data: "tdate",
        name: "tdate",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      {
        data: "amount",
        name: "amount",
      },
      {
        data: null,
        name: "transfers.from_account_id",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="${data.from_account_id}" class="btn btn-link">${data.from_acc_name} (${data.from_acc_number})</a>`;
          }
          return data.from_account_id;
        },
      },
      {
        data: null,
        name: "transfers.to_account_id",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="${data.to_account_id}" class="btn btn-link">${data.to_acc_name} (${data.to_acc_number})</a>`;
          }
          return data.to_account_id;
        },
      },
      {
        data: null,
        name: "transfers.from_passbook",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="members/${data.from_member_id}" class="btn btn-link">${data.from_passbook} (${data.to_acc_name})</a>`;
          }
          return data.from_passbook;
        },
      },
      {
        data: null,
        name: "transfers.to_passbook",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="members/${data.to_member_id}" class="btn btn-link">${data.to_passbook} (${data.to_acc_name})</a>`;
          }
          return data.from_passbook;
        },
      },
      {
        data: null,
        name: "transfers.from_association_id",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="associations/${data.from_association_id}" class="btn btn-link">${data.from_assoc_name}</a>`;
          }
          return data.from_association_id;
        },
      },
      {
        data: null,
        name: "transfers.to_association_id",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="associations/${data.to_association_id}" class="btn btn-link">${data.to_assoc_name}</a>`;
          }
          return data.to_association_id;
        },
      },
      {
        data: "addedby",
        name: "user_id",
      },
    ],
    // order: [[7, "desc"]],
    columnDefs: [
      {
        orderable: false,
        //targets: [4],
      },
    ],
  });
  $(".transfer-filter").on("click", function (params) {
    transferTable.ajax.reload();
  });

  $(".transfer-filter-clear").on("click", function (params) {
    $("#transfer-date-from,#transfer-date-to").val("");
    transferTable.ajax.reload();
  });

  withdrawalTable = $("#dt-related-withdrawals").DataTable({
    ajax: {
      url: baseUrl + "withdrawals/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "wdate";
        params.date_from = $("#withdrawal-date-from").val();
        params.date_to = $("#withdrawal-date-to").val();
      },
    },
    serverSide: true,
    search: false,
    paging: true,
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    columns: [
      {
        data: null,
        name: "withdrawals.id",
        render: function (data, type, row) {
          if (type === "display") {
            let d =
              `<div class="d-flex align-items-center">` +
              `<a href="${baseUrl}withdrawals/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.id}</a>` +
              `</div>`;

            return d;
          }
          return data.id;
        },
      },
      { data: "association_name", name: "associations.name" },
      { data: "passbook", name: "passbook" },
      {
        data: null,
        name: "accounts.acc_number",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="${data.account_id}" class="btn btn-link">${data.acc_name} (${data.acc_number})</a>`;
          }
          return data.acc_number;
        },
      },
      { data: "amount", name: "withdrawals.amount" },
      {
        data: "type",
        name: "withdrawals.type",
        render: function (data, type, row) {
          return data.toUpperCase();
        },
      },
      { data: "withdrawer_name", name: "withdrawer_name" },
      { data: "withdrawer_phone", name: "withdrawer_phone" },
      {
        data: "wdate",
        name: "wdate",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
    ],
    // order: [[7, "desc"]],
    columnDefs: [
      {
        orderable: false,
        //targets: [4],
      },
    ],
  });

  $(".withdrawal-filter").on("click", function (params) {
    withdrawalTable.ajax.reload();
  });

  $(".withdrawal-filter-clear").on("click", function (params) {
    $("#date-from,#date-to").val("");
    withdrawalTable.ajax.reload();
  });

  depositTable = $("#dt-related-deposits").DataTable({
    ajax: {
      url: baseUrl + "deposits/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "ddate";
        params.date_from = $("#deposit-date-from").val();
        params.date_to = $("#deposit-date-to").val();
      },
    },
    serverSide: true,
    search: false,
    paging: true,
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    columns: [
      {
        data: null,
        name: "deposits.id",
        render: function (data, type, row) {
          if (type === "display") {
            let d =
              `<div class="d-flex align-items-center">` +
              `<a href="${baseUrl}deposits/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.id}</a>` +
              `</div>`;

            return d;
          }
          return data.id;
        },
      },
      { data: "association_name", name: "associations.name" },
      { data: "passbook", name: "passbook" },
      {
        data: null,
        name: "accounts.acc_number",
        render: function (data, type, row) {
          if (type === "display") {
            return `<a href="${baseUrl}bankaccounts/${data.account_id}" class="btn btn-link">${data.acc_name} (${data.acc_number})</a>`;
          }
          return data.acc_number;
        },
      },
      { data: "amount", name: "deposits.amount" },
      {
        data: "type",
        name: "deposits.type",
        render: function (data, type, row) {
          return data.toUpperCase();
        },
      },
      { data: "depositor_name", name: "depositor_name" },
      { data: "depositor_phone", name: "depositor_phone" },
      {
        data: "ddate",
        name: "ddate",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
    ],
    // order: [[7, "desc"]],
    columnDefs: [
      {
        orderable: false,
        //targets: [4],
      },
    ],
  });
  $(".filter").on("click", function (params) {
    table.ajax.reload();
  });

  $(".filter-clear").on("click", function (params) {
    $("#date-from,#date-to").val("");
    table.ajax.reload();
  });

  customerTable = $("#dt-related-customers").DataTable({
    ajax: {
      url: baseUrl + "customers/datatables",
      dataType: "json",
      contentType: "application/json",
      data: function (params) {
        params.date_range_column = "members.created_at";
        params.date_from = $("#member-date-from").val();
        params.date_to = $("#member-date-to").val();
        params.marital_status = $("#marital-status").val();
        params.association_id = $(".select2-associations").val();
        params.education = $("#education").val();
        params.settlement = $("#settlement").val();
        params.sex = $("#sex").val();
        params.city = $("#city").val();
        params.rstate = $("#rstate").val();
        params.association_id = $("#dt-related-customers").data(
          "association-id"
        );
      },
    },
    serverSide: true,
    search: false,
    paging: true,
    responsive: !0,
    dom: "lBftip",
    buttons: ["print", "pdf", "excel"],
    columns: [
      {
        data: null,
        name: "members.id",
        render: function (data, type, row) {
          if (type === "display") {
            data.getPhoto = function () {
              let imgs = {
                male: `${baseUrl}assets/images/man.png`,
                female: `${baseUrl}assets/images/woman.png`,
                other: `${baseUrl}assets/images/user.png`,
              };
              return imgs[this.sex];
            };
            let d =
              `<div class="d-flex align-items-center">` +
              `<a href="${baseUrl}customers/${data.id}" class="p-1 ml-1 btn btn-link float-right">${data.id}</a>` +
              `<img height="40" src="${data.getPhoto()}" class="mx-1" />` +
              `</div>`;

            return d;
          }
          return data.id;
        },
      },
      { data: "firstname", name: "firstname" },
      { data: "lastname", name: "lastname" },
      {
        data: "sex",
        name: "sex",
        render: function (data, type, row) {
          return data.toUpperCase();
        },
      },
      { data: "primary_phone", name: "primary_phone" },
      { data: "identity_card_number", name: "identity_card_number" },
      { data: "occupation", name: "occupation" },
      {
        data: "rstate",
        name: "rstate",
        render: function (data, type, row) {
          if (type === "display") {
            let labels = {
              open: "alert-success",
              close: "alert-danger",
            };
            return `<span class="alert p-1 px-2 text-white border-rounded ${
              labels[data]
            }">${data.toUpperCase()}</span>`;
          }
          return data;
        },
      },
      {
        data: "created_at",
        name: "members.created_at",
        render: function (data, type, row) {
          return new Date(data).toDateString();
        },
      },
      {
        data: null,
        name: "members.id",
        render: function (data, type, row) {
          if (type === "display") {
            let id = $("#dt-related-customers").data(
                "association-id"
              );
            return `<a href="${baseUrl}associations/remove-member/${id}" data-member-id="${data.id}" class="btn btn-icon btn-warning delete-row"><i class="fa fa-trash"></i></a>`;
          }
          return null;
        },
      },
    ],
    order: [[9, "desc"]],
  });
  $(".customer-filter").on("click", function (params) {
    customerTable.ajax.reload();
  });

  $(".customer-filter-clear").on("click", function (params) {
    $("#customer-date-from,#customer-date-to").val("");
    customerTable.ajax.reload();
  });

  $("#dt-related-customers").on("click", ".delete-row", function (e) {
    e.preventDefault();

    let url = $(this).attr('href');
    let data = $(this).data('member-id');

    Swal.fire({
      icon: "warning",
      title: "Are you sure ?",
      text: `You want to remove this member from this association`,
      showCancelButton: true,
    }).then((result) => {
      if (!result.isConfirmed) {
        return;
      }
      $.ajax({
        method: "POST",
        url: `${url}`,
        data:{
            member_id:data,
        },
        dataType: "json",
        cache: false,
        success: function (d, r) {
          if (!d || r === "nocontent") {
            Swal.fire({
              icon: "error",
              text: "Malformed form data sumbitted! Please try agian.",
            });
            return;
          }
          if (
            typeof d.status !== "boolean" ||
            typeof d.message !== "string"
          ) {
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
            customerTable.ajax.reload();
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
    });
  });
});
