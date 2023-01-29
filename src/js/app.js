import $ from "jquery";
import Swal from "sweetalert2";
require('select2')

window.$ = window.jQuery = $;
window.Swal = Swal;

require('jquery-validation/dist/jquery.validate');

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

window.readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.photo-placeholder').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

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
}