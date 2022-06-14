$('#currencies').change((event) => {
	location.href = 'currency/change?curr=' + event.target.value;
});

$('.available select').change((event) => {
	const selected = $('.available select option:selected')
	const basePriceSelector = $('#base-price')

	const id = selected.val();
	const price = selected.data('price');
	const basePrice = basePriceSelector.data('price');
	const symbolLeft = basePriceSelector.data('leftsymb')
	const symbolRight = basePriceSelector.data('rightsymb')

	if (price) {
		basePriceSelector.text(symbolLeft + " " + price + " " + symbolRight)
	} else {
		basePriceSelector.text(symbolLeft + " " + basePrice + " " + symbolRight)
	}
});