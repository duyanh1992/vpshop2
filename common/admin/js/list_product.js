var page = 1;
var rowPerPage = 5;
var totalPage = 0;

function delConfirm(){
	var conf = confirm('Are you sure you want to delete this product ?');
	return conf;
}

function addData(res){
	$('table#prds').empty();
	$('#pagination').empty();
	
	$xhtml = '<tr id="prd-bar">';
	$xhtml += '	<td width="5%">ID</td>';
	$xhtml += '	<td width="40%">Tên sản phẩm</td>';
	$xhtml += ' <td width="15%">Giá</td>';
	$xhtml += '	<td width="20%">Nhà cung cấp</td>';
	$xhtml += '	<td width="10%">Ảnh mô tả</td>';
	$xhtml += '	<td width="5%">Sửa</td>';
	$xhtml += '	<td width="5%">Xóa</td>';
	$xhtml += '</tr>';
	
	$.each(res.data, function(k,v){			
		$xhtml += '<tr class="prd-info">';
		$xhtml +=	'<td><span>'+v.id_sp+'</span></td>';
		$xhtml +=	'<td class="l5"><a href="index.php?site=admin&admin_obj=product&prd_act=edit_product&id_sp='+v.id_sp+'">'+v.ten_sp+'</a></td>';
		$xhtml +=	'<td class="l5"><span class="price">'+v.gia_sp+'</span></td>';
		$xhtml +=	'<td class="l5">'+v.ten_dm+'</td>';
		$xhtml +=	'<td><span class="thumb"><img width="60" src="common/admin/images/'+v.anh_sp+'" /></span></td>';
		$xhtml +=	'<td><a href="index.php?site=admin&admin_obj=product&prd_act=edit_product&id_sp='+v.id_sp+'"><span>Sửa</span></a></td>';
		$xhtml +=	'<td><a onclick="return delConfirm();" href="index.php?site=admin&admin_obj=product&prd_act=del_product&id_sp='+v.id_sp+'"><span>Xóa</span></a></td>';
		$xhtml += '</tr>';
	});
	
	$('table#prds').append($xhtml);
	$('#pagination').append(res.listPage);
}

function beginningLoad(){
	$.ajax({
		url : 'controller/admin/product/product_data.php',
		type : 'post',
		data : {'page':page, 'rowPerPage':rowPerPage},
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
			url : 'controller/admin/product/product_data.php',
			type : 'post',
			data : {'page':page, 'rowPerPage':rowPerPage},
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
		url : 'controller/admin/product/product_data.php',
		type : 'post',
		data : {'page':page, 'rowPerPage':rowPerPage},
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

function goLast(totalPage){
	page = totalPage;
	loadNextAndPrev();
}

function goFirst(){
	page = 1;
	loadNextAndPrev();
}

$(document).ready(function(){
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