// Cart
$('body').on('click', '.add-to-cart-link', function (event) {
	event.preventDefault();
	const id = $(this).data('id')
	const quantity = $('.quantity input').val() ? $('.quantity input').val() : 1;
	const mod = $('.available select').val();

	$.ajax({
		url: '/cart/add',
		data: { id, quantity, mod },
		type: 'POST',
		success: function (res) {
			console.log(res);
		},
		error: function () {
			alert('Something went wrong! Try it again!');
		}
	});
});

// Other
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