var links = ['.add', '.edit', '.period', '.total'];
	var t;
	$('.type').on('click', function(){
		t =  $(this).attr('id');
		$('li > a.' + t).attr('class', 'active');
		
		for (var i = 0; i < links.length; i++){
			$(links[i]).hide();

		}
		$('.' + t).show();
	});
	$('#btn').on('click', function(){
		var from = $('#from').val();
		var to = $('#to').val();
		var id = t;
		$.ajax({
			url: 'index.php?r=my/demo',
			data: {from: from, to: to},
			type: 'GET',
			success: function(res){
				console.log(res);
			},
			error: function(){
				alert('Error!');
			}
		});
	});