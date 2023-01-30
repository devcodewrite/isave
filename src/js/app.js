import $ from "jquery";
import Swal from "sweetalert2";

require("select2");
//require('bootstrap');

window.$ = window.jQuery = $;
window.Swal = Swal;

require("jquery-validation/dist/jquery.validate");

window.JSZip = require("jszip");
let pdfmake = require("pdfmake");
let pdffonts = require("pdfmake/build/vfs_fonts.js");
pdfmake.vfs = pdffonts.pdfMake.vfs;

require("datatables.net");
require("datatables.net-responsive");
require("datatables.net-bs4");
require("datatables.net-buttons");
require("datatables.net-buttons/js/buttons.print.min.mjs");
require("datatables.net-buttons/js/buttons.html5.min.mjs");
require("datatables.net-buttons-bs4");
require("print-this");

window.baseUrl = $('meta[name="base-url"]').attr("content");

window.readURL = function (input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $(".photo-placeholder").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
};

window.formatPeopleResult = function (data) {
  if (data.loading) {
    return data.text;
  }
  data.getAvatar = function () {
    let imgs = {
      male: "/assets/images/man.png",
      female: "/assets/images/woman.png",
      other: "/assets/images/user.png",
    };
    return imgs[this.sex];
  };
  var $container = $(
    '<div class="select2-result-user py-3" style="display:flex; flex-direction:row">' +
      '<img class="select2-result-user__avatar h-6 mr-2" src="' +
      data.getAvatar() +
      '">' +
      '<span class="select2-result-user__text text-uppercase">' +
      data.text +
      "</span>" +
      "</div>"
  );
  return $container;
};

$(".find-account").on("click", function (e) {
  let accNumber = $(this).prev("input").val();

  Swal.fire({
    title: "Searching...",
    icon: "info",
    showCloseButton: false,
    allowOutsideClick: false,
    didOpen: () => {
      Swal.showLoading();
    },
  });

  $.ajax({
    url: baseUrl + `bankaccounts/find?acc_number=${accNumber}`,
    method: "GET",
    dataType: "json",
    contentType: "application/json",
    success: function (d, r) {
      Swal.close();
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
      $(".input-placeholder").text("");

      if (d.status === true) {
         let data = d.data;
        $(".input-placeholder").removeClass("bg-light");
        if (data.member.photo_url)
          $(".cus-passport-photo").attr("src", data.member.photo_url);
        if (data.acc_number) $(".acc-number").text(data.acc_number);
        if (data.name) $(".acc-name").text(data.name);
        if (data.member.primary_phone)
          $(".cus-primary-phone").text(data.member.primary_phone);
        if (data.member.identity_card_number)
          $(".acc-id").text(data.member.identity_card_number);
        if (data.idCardType.label)
          $(".acc-id-type").text(data.idCardType.label);

        Swal.fire({
          icon: "success",
          text: d.message,
        });
      } else {
        $(".input-placeholder").addClass("bg-light");
        Swal.fire({
          icon: "error",
          text: d.message,
        });
      }
    },
    error: function (r) {
      Swal.close();
      Swal.fire({
        title: "Something Went Wrong!",
        text: "Sorry, couldn't find what you are looking for! Please try again!",
        icon: "error",
      });
    },
  });
});
