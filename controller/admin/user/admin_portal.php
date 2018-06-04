<?php
if(!isset($_SESSION['username']) || !isset($_SESSION['level']) || $_SESSION['level'] != 2){
	header('location:index.php?site=admin&admin_obj=user&user_act=login');
}
else{
if(isset($_GET['prd_act'])){
	switch($_GET['prd_act']){
		case 'list_product' : echo '<link rel="stylesheet" type="text/css" href="common/admin/css/list_product.css" /><br />';	
							echo '<script type="text/javascript" src="common/admin/js/list_product.js"></script>';
		break;
		
		case 'edit_product' : echo '<link rel="stylesheet" type="text/css" href="common/admin/css/edit_product.css" />';
					   echo '<script type="text/javascript" src="common/admin/js/edit_product.js"></script>';
		break;
		
		case 'add_product' : echo '<link rel="stylesheet" type="text/css" href="common/admin/css/add_product.css" />';
						echo '<script type="text/javascript" src="common/admin/js/add_product.js"></script>';
		break;
	} 
}
?>
<div id="wrapper">
	<div id="header">
    	<div id="navbar">
        	<ul>
            	<li id="admin-home"><a href="index.php?site=admin&admin_obj=user&user_act=admin_portal">trang chủ quản trị</a></li>        
                <li><a href="index.php?site=admin&admin_obj=product&prd_act=list_product">sản phẩm</a></li>
            </ul>
            <div id="user-info">
            	<p>Xin chào <span><?php echo $_SESSION['username']; ?></span> đã đăng nhập vào hệ thống</p>
                <p><a href="index.php?site=admin&admin_obj=user&user_act=logout">Đăng xuất</a></p>
            </div>
        </div>
        <div id="banner">
        	<div id="logo"><a href="#"><img src="common/admin/images/logo.png" /></a></div>
        </div>
    </div>
    <div id="body">
       <?php
	   if(isset($_GET['prd_act'])){
			switch($_GET['prd_act']){
				case 'list_product' : include_once('controller/admin/product/product_list.php');
				break;
				
				case 'edit_product' : include_once('controller/admin/product/edit_product.php');
				break;

				case 'del_product' : include_once('controller/admin/product/del_product.php');
				break;
				
				case 'add_product' : include_once('controller/admin/product/add_product.php');
				break;
			} 
	   }
	   else{
		   include_once('controller/admin/user/intro.php');
	   }
		
	   ?>
    </div>
    <div id="footer">
    	<div id="footer-info">
        	<h4>trung tâm công nghệ web vietpro</h4>
            <p><span>Địa chỉ:</span> Tầng 5, Tòa nhà A4, Ngõ 120 Hoàng Quốc Việt - Cầu Giấy - Hà Nội | <span>Phone</span> (04) 3537 6697</p>
            <p><span>Trụ sở 2:</span> Số 25/178/71 Tây Sơn - Đống Đa - Hà Nội | <span>Hotline</span> 0968 511 155</p>
            <p>Bản quyền thuộc Vietpro Education</p>
        </div>
    </div>
</div>

<?php
}
?>