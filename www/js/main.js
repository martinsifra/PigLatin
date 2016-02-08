$(function () {
	$('input[name=translate].ajax').click(function (e) {
		e.preventDefault();
		
		$.ajax({
			type: "POST",
			url: 'index.php',
			data: $('#form').serialize(),
			success: function (data)
			{
				$("#piglatin").html($.parseJSON(data));
			}
		});

		
	});
});
