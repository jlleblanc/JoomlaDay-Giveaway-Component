window.addEvent('domready', function () {
	$$('.select_winner').addEvent('click', function  () {
		var clicked_element = this;
		var swag_id = clicked_element.getProperty('rel');

		var randomAjax = new Ajax ('index.php', {
			method: "get",
			data: {
				option: 'com_giveaway',
				swag_id: swag_id,
				view: 'random_attendee',
				format: 'raw'
			}
		});

		randomAjax.addEvent('onComplete', function (data) {
			clicked_element.getParent().setHTML(data);
		});

		randomAjax.request();
	});
});