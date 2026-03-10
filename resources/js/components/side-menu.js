export default (initialItem) => ({
    // Use the value passed from the Blade template as the starting state
    activeItem: initialItem || 'dashboard',

    init() {
        // Listen for back/forward browser navigation to keep UI in sync
        window.addEventListener('popstate', () => {
            this.determineActiveItemFromUrl();
        });

        console.log('Current Page Context:', this.activeItem);
    },

    determineActiveItemFromUrl() {
        const path = window.location.pathname;
        const items = [
            'dashboard', 'need-response', 'create-document', 
            'my-documents', 'all-documents', 'account', 
            'units', 'action', 'type'
        ];

        // This acts as a fallback if the page-id doesn't match for some reason
        const found = items.find(item => path.includes(`/${item}`));
        if (found) {
            this.activeItem = found;
        }
    },

    setActive(item) {
        // Since we aren't using real routes yet, this just updates the UI
        this.activeItem = item;
    }
});