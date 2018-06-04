var page = 1;
var rowPerPage = 3;
var totalPage = 0;
var id_dm = 0;

function delConfirm(){
	var conf = confirm('Are you sure you want to delete this product ?');
	return conf;
}

function addData(res){
	$('.pr-list').empty();
	$('#pagination').empty();
			
	$xhtml = '';
	$.each(res.data, function(k,v){			
		$xhtml += '<div class="prd-item">';
		$xhtml +=	'<a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=product_detail&id_sp='+v.id_sp+'"><img width="80" height="144" src="common/user/images/'+v.anh_sp+'" /></a>';
		$xhtml +=	'<h3><a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=product_detail&id_sp='+v.id_sp+'">'+v.ten_sp+'</a></h3>';
		$xhtml +=	'<p>Bảo hành: '+v.bao_hanh+'</p>';
		$xhtml +=	'<p>Tình trạng: '+v.tinh_trang+'</p>';
		$xhtml +=	'<p class="price"><span>Giá: '+v.gia_sp+' VNĐ</span></p>';
		$xhtml += '</div>';
	});
	$('.pr-list').append($xhtml);
	$('#pagination').append(res.listPage);
}

function beginningLoad(){
	$.ajax({
		url : 'controller/homesite/product/load_data.php',
		type : 'post',
		data : {'page':page, 'rowPerPage':rowPerPage, 'id_dm':id_dm},
		dataType : 'json',
		success : function(res){
			totalPage = res.totalPage;
			addData(res);
		}
	});
}

function loadPage(){
	$('#pagination').on('click', '.pgn', function(event){
		event.preventDefault();
		page = parseInt($(this).text());
		$.ajax({
			url : 'controller/homesite/product/load_data.php',
			type : 'post',
			data : {'page':page, 'rowPerPage':rowPerPage, 'id_dm':id_dm},
			dataType : 'json',
			success : function(res){
				totalPage = res.totalPage;
				addData(res);
			}
		});
	});
}

function loadNextAndPrev(){
	$.ajax({
		url : 'controller/homesite/product/load_data.php',
		type : 'post',
		data : {'page':page, 'rowPerPage':rowPerPage, 'id_dm':id_dm, 'pn_action': 'list'},
		dataType : 'json',
		success : function(res){
			totalPage = res.totalPage;
			addData(res);
		}
	});
}

function clickPrev(old_page){
	if(page != 1){
		page = old_page - 1;
		loadNextAndPrev();
	}
}

function clickNext(old_page){
	if(page != totalPage){
		page = old_page + 1;
		loadNextAndPrev();
	}
}

function goLast(totalPage){
	page = totalPage;
	loadNextAndPrev();
}

function goFirst(){
	page = 1;
	loadNextAndPrev();
}

function checkNext(){
	if(page == totalPage){
		$('#next').attr('disabled', 'disabled');
	}
	else{
		$('#next').removeAttr('disabled');
	}
}

function checkPrev(){
	if(page == 1){
		$('#prev').attr('disabled', 'disabled');
	}
	else{
		$('#prev').removeAttr('disabled');
	}
}

$(document).ready(function(){
	id_dm = parseInt($("#id_dm").val());

	beginningLoad();
	loadPage();
	
	$('#pagination').on('click', '#next', function(event){
		event.preventDefault();
		clickNext(page);
	});
	
	$('#pagination').on('click', '#prev', function(event){
		event.preventDefault();
		clickPrev(page);
	});
	
	$('#pagination').on('click', '#goLast', function(event){
		event.preventDefault();
		goLast(totalPage);
	});
	
	$('#pagination').on('click', '#goFirst', function(event){
		event.preventDefault();
		goFirst();
	});
});