export const initMobileMenu = () => {
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.js-mobile-menu');

    if (!menuToggle || !menu) { return; }

    const closeMenu = () => {
        menu.classList.remove('is-open');
        menuToggle.setAttribute('aria-expanded', 'false');
    };


    menuToggle.addEventListener('click', (event) => {
        event.stopPropagation();
        const isOpen = menu.classList.toggle('is-open');
        menuToggle.setAttribute('aria-expanded', isOpen);
    });

    document.addEventListener('click', (event) => {
        const target = event.target;
        const isClickInsideMenu = menu.contains(target);
        const isClickOnToggle = menuToggle.contains(target);

        if (!isClickInsideMenu && !isClickOnToggle) {
            closeMenu();
        }
    });
};