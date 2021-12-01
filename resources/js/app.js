require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.toastr = require("toastr");

// https://sweetalert2.github.io/ - CommonJS
window.Swal = require("sweetalert2");

window.onload = (event) => {
  toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: true,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
  };
};

window.addEventListener("showToast", (event) => {
  toastr[event.detail.type](event.detail.message, event.detail.title ?? "");
});

window.addEventListener("hideModal", (event) => {
  $(event.detail.modalId).modal("hide");
});