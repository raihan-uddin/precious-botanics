import './bootstrap';

import Alpine from 'alpinejs';

import feather from 'feather-icons';

window.Alpine = Alpine;

// Initialize Feather icons after the DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    feather.replace();
});

document.addEventListener("DOMContentLoaded", function (event) {
    var scrollpos = sessionStorage.getItem('scrollpos');
    if (scrollpos) {
        window.scrollTo(0, scrollpos);
        sessionStorage.removeItem('scrollpos');
    }
});

window.addEventListener("beforeunload", function (e) {
    sessionStorage.setItem('scrollpos', window.scrollY);
});

Alpine.start();
