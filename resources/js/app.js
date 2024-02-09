import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.onload = function () {
    var nodelist = document.getElementsByClassName('once');
    for (var i = 0; i < nodelist.length; i++) {
        nodelist[i].onclick = function () {
            this.onclick = function () {
                return false;
            }
        }
    }
};