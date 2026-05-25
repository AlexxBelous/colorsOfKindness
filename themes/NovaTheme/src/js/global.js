/*
|--------------------------------------------------------------------------
| DYNAMIC MODULES LOADING
|--------------------------------------------------------------------------
| This section handles lazy-loading for heavy JS components.
| Modules are only imported if their corresponding HTML element exists.
*/
const handleDynamicModules = async () => {

    //--- Mobile Menu ---
    if (document.querySelector('.menu-toggle')) {
        const {initMobileMenu} = await import('./modules/MobileMenu');
        initMobileMenu();
    }

    // --- Swiper: Hero Slider ---
    // Loads the slider logic only on pages with the .js-hero-slider class
    if (document.querySelector('.js-hero-slider')) {
        const {initHeroSlider} = await import('./modules/HeroSlider');
        initHeroSlider();
    }

    // --- Geographic Reach Map (Click Activation) ---
    if (document.querySelector('.geographic-reach--activation-click')) {
        const {initGeographicMap} = await import('./modules/GeographicMap');
        initGeographicMap();
    }
};

document.addEventListener('DOMContentLoaded', handleDynamicModules);