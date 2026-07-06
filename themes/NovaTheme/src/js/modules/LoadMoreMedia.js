export default function initLoadMoreMedia() {

	const button = document.getElementById( 'load-more-media' );
	const container = document.querySelector( '.media__cards' );

	if ( !button || !container ) {
		return;
	}

	button.addEventListener( 'click', async () => {

		button.disabled = true;
		const originalText = button.textContent;
		button.textContent = 'Loading...';
		const currentCardsCount = container.querySelectorAll( '.media__card' ).length;
		const formData = new FormData();
		formData.append( 'action', 'load_more_media' );
		formData.append( 'offset', currentCardsCount );
		formData.append( 'category_id', novaMediaConfig.categoryId );
		formData.append( 'nonce', novaMediaConfig.nonce );
		try {

			const response = await fetch( novaMediaConfig.ajaxUrl, {
				method: 'POST',
				body: formData,
			} );
			if ( !response.ok ) {
				throw new Error( `HTTP ${response.status}` );
			}

			const result = await response.json();

			if ( !result.success ) {
				throw new Error( 'Invalid response' );
			}

			button
				.closest( '.media__action' )
				.insertAdjacentHTML( 'beforebegin', result.data.html );

			if ( !result.data.has_more ) {
				button.closest( '.media__action' ).remove();
				return;
			}

			button.textContent = originalText;
			button.disabled = false;

		} catch ( error ) {

			console.error( 'Error loading media posts:', error );
			button.textContent = 'Try again';
			button.disabled = false;

		}

	} );

}