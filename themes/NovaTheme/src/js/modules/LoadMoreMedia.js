export const initLoadMoreMedia = () => {
	const button = document.getElementById( 'load-more-media' );
	if ( !button ) return;

	button.addEventListener( 'click', async ( e ) => {
		e.preventDefault();

		const wrapper = button.closest( '.media__action' );
		const container = document.querySelector( '.media__cards' ); // основной контейнер

		const category = button.dataset.category;
		const currentPage = parseInt( button.dataset.page );
		const maxPages = parseInt( button.dataset.maxPages );
		const nextPage = currentPage + 1;

		if ( nextPage > maxPages ) return;

		// UI состояния
		const originalText = button.textContent;
		button.textContent = 'Loading...';
		button.disabled = true;

		const params = new URLSearchParams( {
			action: 'load_more_media_posts',
			page: nextPage,
			category: category,
			nonce: window.ajax.nonce || ''   // добавили nonce
		} );

		try {
			const response = await fetch( window.ajax.url, {
				method: 'POST',
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
				body: params.toString()
			} );

			const result = await response.json();

			if ( !result.success ) {
				throw new Error( result.data || 'Error' );
			}

			if ( result.data.html.trim() !== '' ) {
				container.insertAdjacentHTML( 'beforeend', result.data.html );

				// Обновляем данные кнопки
				button.dataset.page = nextPage;
				button.textContent = originalText;
				button.disabled = false;

				// Скрываем кнопку, если это последняя страница
				if ( nextPage >= result.data.max_pages ) {
					wrapper.remove();
				}
			} else {
				wrapper.remove();
			}

		} catch ( error ) {
			console.error( 'Load more error:', error );
			button.textContent = 'Try again';

			setTimeout( () => {
				button.textContent = originalText;
				button.disabled = false;
			}, 3000 );
		}
	} );
};