$('#currencies').change((event) => {
	location.href = 'currency/change?curr=' + event.target.value;
})