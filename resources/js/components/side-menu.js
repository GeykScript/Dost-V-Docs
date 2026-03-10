export default () => ({
    activeItem: 'dashboard',

    init() {
        // Load active item
        const cachedActive = localStorage.getItem('activeSidebarItem');
        if (cachedActive) {
            this.activeItem = cachedActive;
        } else {
            this.determineActiveItemFromUrl();
        }

        window.addEventListener('popstate', () => {
            this.determineActiveItemFromUrl();
        });
    },

    determineActiveItemFromUrl() {
        const path = window.location.pathname;
        
        // Simplified mapping
        const items = ['dashboard', 'residents', 'health-programs', 'medicines', 'reports', 'schedules', 'bhws', 'logs', 'faqs', 'barangays', 'midwife'];
        this.activeItem = items.find(item => path.includes(`/${item}`)) || 'dashboard';
        
        localStorage.setItem('activeSidebarItem', this.activeItem);
    },

    setActive(item) {
        this.activeItem = item;
        localStorage.setItem('activeSidebarItem', item);
    }
});