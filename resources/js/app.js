import './bootstrap';

import Alpine from 'alpinejs';
import sideMenu from './components/side-menu.js';
import './datetime';


Alpine.store('sidebar', {
    open: localStorage.getItem('sidebarOpen') === 'true', // Defaults to false if not set

    toggle() {
        this.open = !this.open;
        localStorage.setItem('sidebarOpen', this.open);
    },

    close() {
        this.open = false;
        localStorage.setItem('sidebarOpen', 'false');
    }
});

Alpine.data('sideMenu', sideMenu);

window.Alpine = Alpine;

Alpine.start();
