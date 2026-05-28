export const initGeographicMap = () => {
    const clickSection = document.querySelector('.geographic-reach--activation-click');

    if (!clickSection) return;

    const markers = clickSection.querySelectorAll('.geographic-reach__marker');

    markers.forEach(marker => {
        marker.addEventListener('click', (e) => {
            e.stopPropagation();

            if (marker.classList.contains('is-active')) {
                marker.classList.remove('is-active');
            } else {

                markers.forEach(el => el.classList.remove('is-active'));
                marker.classList.add('is-active');
            }
        })
    })


}