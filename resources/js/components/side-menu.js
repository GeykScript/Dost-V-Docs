export default () => ({
    activeItem: 'dashboard',

    init() {
        // No more localStorage check; just check the URL immediately
        this.determineActiveItemFromUrl();

        window.addEventListener('popstate', () => {
            this.determineActiveItemFromUrl();
        });
    },

    determineActiveItemFromUrl() {
        const path = window.location.pathname;
        
        const items = [
            'dashboard', 'need-responses', 'create-document', 
            'my-documents', 'all-documents', 'account', 
            'units', 'action', 'type'
        ];

        // Find the item based on the current URL
        this.activeItem = items.find(item => path.includes(`/${item}`)) || 'dashboard';
    },

    setActive(item) {
        console.log(item);
        this.activeItem = item;
    }
});