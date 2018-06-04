$(function(){
	$('input[type=submit]').click(function(){
		if(($('input[type=text]').val() != '') && ($('input[type=password]').val() != '')){
			return true;
		}
		else{
			if($('input[type=text]').val() == ''){
				$('input[type=text]').css('border-color','red').val('Hãy nhập tên');
				$('input[type=text]').css({
											color:'red',
											fontStyle:'italic',
											paddingLeft:'5px'
										});
				return false;
			}
			else{
				$('input[type=text]').css('border-color','black');
			}
			
			if($('input[type=password]').val() == ''){
				$('input[type=password]').css('border-color','red').val('Hãy nhập mật khẩu');;
				$('input[type=password]').css({
											color:'red',
											fontStyle:'italic',
											paddingLeft:'5px'
										});
				return false;
			}
			else{
				$('input[type=password]').css('border-color','black');
			}
		}
	});	
});