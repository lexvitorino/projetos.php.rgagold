function selectPropriedade(obj) {
	var id = $(obj).attr("data-id");
	var predio = $(obj).html();

	$('.searchresults-propriedades').hide();
	$('#search_propriedades').val(name);
	$('#search_propriedades').attr('data-id', id);
	$('#id_propriedades').attr('value', id);
};

function excluiFoto(obj) {
	var id = $(obj).attr("data-id");
	var field = $(obj).attr("id");
	var file = $(obj).attr("data-file");

	if (id > 0 && field !== '') {
		var filename = field.replace('foto', 'filename');
		var dfoto = field.replace('foto', 'dfoto');
		$.ajax({
				url: BASE_URL+'/ajax/excluiFoto',
				type:'POST',
				data:{id:id, field:field, file:file},
				dataType:'json',
				success:function(json){
					$('#'+dfoto).hide();
					$('#'+filename).show();
				}
			});
	}	
};

$(function(){

	$('.tabitem').on('click', function() {
		
		$('.activetab').removeClass('activetab');
		$(this).addClass('activetab');

		var item = $('.activetab').index();
		$('.tabbody').hide();
		$('.tabbody').eq(item).show();

	});

	$('#search').on('focus', function(){
		$(this).animate({
			width:'300px'
		}, 'fast');
	});

	$('#search').on('blur', function(){
		if($(this).val() == '') {
			$(this).animate({
				width:'100px'
			}, 'fast');
		}

		setTimeout(function() {
			$('.searchresults').hide();
		}, 500);
	});

	$('#search').on('keyup', function(){
		
		var datatype = $(this).attr('data-type');
		var q = $(this).val();
		var url = BASE_URL+'/ajax/'+datatype;

		if (datatype != '') {
			$.ajax({
				url: url,
				type:'POST',
				data:{q:q},
				dataType:'json',
				success:function(json){
					if( $('.searchresults').length == 0) {
						$('#search').after('<div class="searchresults"></div>');
					}
					$('.searchresults').css('left', $('#search').offset().left+'px');
					$('.searchresults').css('top', $('#search').offset().top+$('#search').height()+3+'px');

					var html = '';
					for(var i in json) {
						html += '<div class="si"><a href="'+json[i].link+'">'+json[i].name+'</a></div>';
					}

					$('.searchresults').html(html);
					$('.searchresults').show();
				}
			});
		}
	});

});