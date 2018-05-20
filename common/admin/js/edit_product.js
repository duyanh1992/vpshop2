$(function(){
	// $('input[type=submit]').click(function(){
		// alert(1);
	// });
	
	$('input[name=ten_sp]').change(function(){
		var prdName = $(this).val();
		var prdId = parseInt($('input[name=id_sp]').val());
		
		$.ajax({
			url : 'controller/admin/product/product_data.php',
			type : 'post',
			data : {'prdId':prdId, 'product_name':prdName, 'action':'checkName', 'function' :'edit'},
			success : function(res){
				if(res == false){
					alert('Tên sản phẩm đã tồn tại');
					$('input[name=ten_sp]').val('');
				}
			}			
		});
	});
	
	
});