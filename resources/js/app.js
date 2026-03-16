// resources/js/app.js

import './bootstrap';
import './datetime';
import 'flowbite';
import ApexCharts from 'apexcharts';

window.ApexCharts = ApexCharts;

document.addEventListener('alpine:init', () => {
    Alpine.store('sidebar', {
        open: false,

        toggle() {
            this.open = !this.open;
        },

        close() {
            this.open = false;
        },

        openSidebar() {
            this.open = true;
        }
    });
});

import './components/line-graph.js';
