$(function(){
	$('input[name=username]').on('change', function(){
		var name = $(this).val();
		$.ajax({
			url : 'controller/homesite/user/data.php',
			type : 'post',
			dataType:'json',
			data : {'name':name, 'action':'checkName'},
			success : function(res){
				if(!jQuery.isEmptyObject(res)){
					if(res.status == 'no'){
						$('#name-error').text('Tên này đã tồn tại. Vui lòng chọn tên khác');
						$('#name-error').css('color', 'red');
					}
					
					if(res.status == 'ok'){
						$('#name-error').text('Bạn có thể sử dụng tên này');
						$('#name-error').css('color', 'green');
					}
				}
			}
		});
	});	
});