// resources/js/app.js

import './bootstrap';
import sideMenu from './components/side-menu.js';
import './datetime';
import 'flowbite';
import ApexCharts from 'apexcharts';

window.ApexCharts = ApexCharts;

// Breeze / Jetstream already loads Alpine, so no need to import it
// Just define the store
Alpine.store('sidebar', {
    open: false,

    toggle() {
        this.open = !this.open
    },

    close() {
        this.open = false
    },

    openSidebar() {
        this.open = true
    }
});

// Import line graph AFTER ApexCharts is available
import './components/line-graph.js';
