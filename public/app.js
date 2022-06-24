// Cart
function showCart(cart) {
	if ($.trim(cart).includes('Your cart is empty!')) {
		$('#make-order-btn, #clear-cart-btn').css('display', 'none');
	} else {
		$('#make-order-btn, #clear-cart-btn').css('display', 'inline-block');
	}
	$('#cart .modal-body').html(cart);
	$('#cart').modal();

	if ($('.cart-sum').text()) {
		$('.simpleCart_total').text($('#cart .cart-sum').text());
	} else {
		$('.simpleCart_total').text('Empty cart');
	}
}

function error() {
	alert('Something went wrong! Try it again!');
}

$('body').on('click', '.add-to-cart-link', function (event) {
	event.preventDefault();

	const id = $(this).data('id');
	const quantity = $('.quantity input').val() ? $('.quantity input').val() : 1;
	const mod = $('.available select').val();

	$.ajax({
		url: '/cart/add',
		data: { id, quantity, mod },
		type: 'POST',
		success: showCart,
		error
	});
});

function getCart(isEmptyCart) {
	$.ajax({
		url: '/cart',
		type: 'GET',
		success: showCart,
		error
	});
}
$('#cart .modal-body').on('click', '#delete-product-cross', function () {
	const id = $(this).data('id');
	$.ajax({
		url: '/cart/delete',
		data: { id },
		type: 'POST',
		success: getCart,
		error
	});
});

$('#clear-cart-btn').on('click', function () {
	$.ajax({
		url: '/cart/clear',
		type: 'POST',
		success: getCart,
		error
	});
});

// Other
$('#currencies').change((event) => {
	location.href = 'currency/change?curr=' + event.target.value;
});

$('.available select').change((event) => {
	const selected = $('.available select option:selected')
	const basePriceSelector = $('#base-price')

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