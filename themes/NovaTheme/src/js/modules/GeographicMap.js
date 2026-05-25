export const initGeographicMap = () => {
    const clickSection = document.querySelector('.geographic-reach--activation-click');


    if (!clickSection) return;

    const items = clickSection.querySelectorAll('.geographic-reach__item');

    items.forEach(item => {
        item.addEventListener('click', (e) => {
            e.stopPropagation();

            if (item.classList.contains('is-active')) {
                item.classList.remove('is-active');
            } else {
                items.forEach(el => el.classList.remove('is-active'));
                item.classList.add('is-active');
            }
        });
    });


    document.addEventListener('click', () => {
        items.forEach(el => el.classList.remove('is-active'));
    });
};