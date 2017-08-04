var links = ['.add', '.period', '.total'];
	var t;
	$('.type').on('click', function(){
		t =  $(this).attr('id');
		$('li > a.' + t).attr('class', 'active');
		
		for (var i = 0; i < links.length; i++){
			$(links[i]).hide();
		}
		$('.' + t).show();
		$('.table-container').hide();
		$('.alert, .result').hide();
		$('tbody tr').remove();
	});
	$('.btn').on('click', function(){
		var parentId = this.parentNode.id;
		var from = $('#'+parentId).find('#demoout-datefrom').val();
		var to = $('#'+parentId).find('#demoout-dateto').val();
		var opt = $('#'+parentId).find('#demoout-opt').val();
		var name = $(this).attr('id');
		if(name == 'add'){
			return;
		}
		else {
			$.ajax({
				url: 'index.php?r=my/demo-out',
				data: {from: from, to: to, opt: opt, name: name},
				type: 'POST',
				success: function(res){
					if (name == 'period') {
						var arr = JSON.parse(res);
						arr.forEach(function(item){
							$("tbody").append("<tr>" + setTd(item) + "</tr>");
						});
						$('.table-container').show();
						for (var i = 0; i < links.length; i++){
							$(links[i]).hide();
						}
					}
					else{
						$('.result').text('Итог за период с '+from+' по '+to+': ').append('<strong>'+res+' денег</strong>');
						$('.result').show();
						for (var i = 0; i < links.length; i++){
							$(links[i]).hide();
						}
					}
				},
				error: function(){
					alert('Error!');
				}
			});
		}
	});
function setTd(obj){
	var res = '';
	for(var key in obj){
	res += "<td>" + obj[key] + "</td>";
	}
	return res;	
}

