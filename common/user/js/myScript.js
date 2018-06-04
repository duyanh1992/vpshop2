$(function(){
	$('form[name=sform] input[name=stext]').focus(function(){
		if($(this).val() == 'Tìm kiếm sản phẩm'){
			$(this).val('');
		}
	});
	
	$('form[name=sform] input[name=stext]').blur(function(){
		if($(this).val() == ''){
			$(this).val('Tìm kiếm sản phẩm');
		}
	});
});