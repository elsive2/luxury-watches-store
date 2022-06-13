<!-- FlexSlider -->
<script src="../../public/js/imagezoom.js"></script>
<script defer src="../../public/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="../../../public/css/flexslider.css" type="text/css" media="screen" />

<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
</script>
<script type="text/javascript">
	$(function() {

		var menu_ul = $('.menu_drop > li > ul'),
			menu_a = $('.menu_drop > li > a');

		menu_ul.hide();

		menu_a.click(function(e) {
			e.preventDefault();
			if (!$(this).hasClass('active')) {
				menu_a.removeClass('active');
				menu_ul.filter(':visible').slideUp('normal');
				$(this).addClass('active').next().stop(true, true).slideDown('normal');
			} else {
				$(this).removeClass('active');
				$(this).next().stop(true, true).slideUp('normal');
			}
		});

	});
</script>