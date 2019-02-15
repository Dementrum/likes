$(document).ready(function() {
	$('span#like').click(function() {
		setVote('like', $(this));									 
	});
	
	$('span#dislike').click(function() {
			setVote('dislike', $(this));									 
	});
});

function setVote(type, element) {
	var id_user = $('#id_user').val();
	var id_news = element.parent().find('#id_news').val();
	$.ajax({
		//метод отправки
		type: 'POST',
		// путь к срипту обработчику
		url: 'lib/ajax_request.php',
		//какие именно данные мы передадим
		date: {
		 'id_user': id_user,
			'id_news': id_news,
			'type': type
	},
		dateType: 'json',
		success: function (data) {
		if(data.result = 'success'){
			alert('Голос защитан');
			var count = parseInt(element.find('b').html());
			element.find('b').html(count+1);
		} else {
			alert(data.msg);
			}
		}
	});
}