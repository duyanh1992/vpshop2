var length = 3;
var start = 0;

function loadData(start, id_sp){
	var url = 'controller/homesite/product/load-comment.php';
	var data = {'start':start, 'length':length, 'id_sp':id_sp};
	
	$.ajax({
		url : url,
		type:'post',
		data : data,
		dataType : 'json',
		success : function(res){
			console.log(res);
			addData(res);		
		}	
	});
}

function addData(res){
	data = res.data;
	if(data.length>0){
		var xhtml = '';
		$.each(res.data, function(k,v){
			xhtml+= '<ul>';
			xhtml+= '<li class="com-title">'+v.ten+'<br /><span>'+v.ngay_gio+'</span></li>';
			xhtml+= '<li class="com-details">'+v.binh_luan+'</li>';
			xhtml+= '</ul>';
		});
		$('.comment-list').append(xhtml);
	}
	else{
		$('#load-more').hide();	
	}
}

$(function(){
	var id_sp = $('input[name="id_sp"]').val();
	loadData(start, id_sp);
	$('#load-more').on('click', function(event){
		event.preventDefault();
		start +=3;
		loadData(start, id_sp);
	});
});