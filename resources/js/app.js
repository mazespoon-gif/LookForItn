document.addEventListener('DOMContentLoaded', function() {
    initMobileMenu();
});

document.addEventListener('livewire:navigated', function() {
    initMobileMenu();
});

function initMobileMenu() {
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconClosed = document.getElementById('menu-icon-closed');
    const iconOpen = document.getElementById('menu-icon-open');

    if (!menuToggle || !mobileMenu) return;

    menuToggle.addEventListener('click', function() {
        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
                
        mobileMenu.classList.toggle('hidden');
        iconClosed.classList.toggle('hidden');
        iconOpen.classList.toggle('hidden');
        menuToggle.setAttribute('aria-expanded', !isExpanded);
    });
}