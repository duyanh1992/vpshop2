$(function(){

	$('input[name=ten_sp]').change(function(){

		var prdName = $(this).val();

		
		$.ajax({

			url : 'controller/admin/product/product_data.php',

			type : 'post',

			data : {'product_name':prdName, 'action':'checkName', 'function' :'add'},

			success : function(res){

				if(res == false){

					// alert('Tên sản phẩm đã tồn tại');
					$('#name_error').html('<p style="color:red;">Tên sản phẩm đã tồn tại</p>');

					$('input[name=ten_sp]').val('');

				}
				else{

					$('#name_error').html('');					
				
				}

			}			

		});
		return false;

	});

	

	

});