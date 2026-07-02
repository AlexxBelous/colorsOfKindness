import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

export const initSliderNews = () => {
	const sliderItem = document.querySelector( '.js-news-slider' );

	if ( sliderItem ) {
		const wrapper = sliderItem.querySelector( '.swiper-wrapper' );
		const slides = sliderItem.querySelectorAll( '.swiper-slide' );


		if ( slides.length > 0 && slides.length < 12 ) {
			const iterations = slides.length < 5 ? 3 : 2;

			for ( let i = 0; i < iterations; i++ ) {
				slides.forEach( slide => {
					const clone = slide.cloneNode( true );
					wrapper.appendChild( clone );
				} );
			}
		}


		new Swiper( sliderItem, {
			modules: [ Navigation, Pagination, Autoplay ],

			slidesPerView: 1,
			spaceBetween: 16,

			loop: true,

			loopAdditionalSlides: 5,

			observer: true,
			observeParents: true,
			observeSlideChildren: true,

			breakpoints: {
				768: {
					slidesPerView: 2.5,
					spaceBetween: 30,
				},

				1278: {
					slidesPerView: 3.13,
					spaceBetween: 35,
				},
			},

			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		} );
	}
};