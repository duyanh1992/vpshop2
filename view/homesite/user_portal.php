<?php  
if(isset($_GET['func'])){
	switch($_GET['func']){
		case 'product_detail' : echo '<link rel="stylesheet" type="text/css" href="common/user/css/product_detail.css" />';
						   echo '<script type="text/javascript" src="common/user/js/product_detail.js"></script>';		   
		break;
		
		case 'product_list' : echo '<link rel="stylesheet" type="text/css" href="common/user/css/product_list.css" />';
							echo '<script type="text/javascript" src="common/user/js/product_list.js"></script>';
		break;
		
		case 'search_result' : echo '<link rel="stylesheet" type="text/css" href="common/user/css/search_result.css" />';
								echo '<script type="text/javascript" src="common/user/js/search_result.js"></script>';
		break;
		
		case 'login' : echo '<link rel="stylesheet" type="text/css" href="common/user/css/login.css" />';					
		break;
		
		case 'signup' : echo '<link rel="stylesheet" type="text/css" href="common/user/css/signup.css" />';		
						echo '<script type="text/javascript" src="common/user/js/signup.js"></script>';		
		break;

		case 'intro' : echo '<link rel="stylesheet" type="text/css" href="common/user/css/intro.css" />';		
		break;

		case 'service' : echo '<link rel="stylesheet" type="text/css" href="common/user/css/service.css" />';		
		break;

		case 'cart' : echo '<link rel="stylesheet" type="text/css" href="common/user/css/cart.css" />';		
		break;
	}
}
?>

<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the anh in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the anh in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 2000 );
});

</script>
<script type="text/javascript" src="common/user/js/myScript.js"></script>

<!-- Wrapper -->
<div id="wrapper">
	<!-- Header -->
    <div id="header">
    	<div id="search-bar">
        	<?php include_once('controller/homesite/product/search/search_product.php'); ?>
            <?php 
				if(isset($_SESSION['username'])){
					include_once('controller/homesite/product/blocks/your_info.php'); 
				}
			?>	
        </div>
        <div id="main-bar">
        	<div id="logo"><a href="#"><img src="common/user/images/logo.png" /></a></div>
            <div id="banner"></div>
        </div>
        <div id="navbar">
        	<?php include_once('controller/homesite/product/blocks/navbar.php'); ?>
        </div>
    </div>
    <!-- End Header -->
    <!-- Body -->
    <div id="body">
    	<!-- Left Column -->
    	<div id="l-col">
        	<?php include_once('controller/homesite/product/blocks/counselling.php'); ?>
            <?php include_once('controller/homesite/product/product_category.php'); ?>
            <?php include_once('controller/homesite/product/blocks/advertisement.php'); ?>
            
            <?php include_once('controller/homesite/product/blocks/statistic.php'); ?>
            <!-- <div class="l-sidebar"></div> -->
        </div>
        <!-- End Left Column -->
        
        <!-- Right Column -->
        <div id="r-col">
        	<?php include_once('controller/homesite/product/blocks/slideshow.php'); ?>
            
            <div id="main">
				<?php
				if(isset($_GET['func'])){
					switch($_GET['func']){
						case 'intro' : include_once('controller/homesite/product/blocks/intro.php');
						break;
						
						case 'service' : include_once('controller/homesite/product/blocks/service.php');
						break;
						
						case 'product_detail' : include_once('controller/homesite/product/product_detail.php');
						break;
						
						case 'product_list' : include_once('controller/homesite/product/product_list.php');
						break;
						
						case 'search_result' : include_once('controller/homesite/product/search/search_result.php');
						break;
						
						case 'cart' : include_once('controller/homesite/product/cart/cart.php');
						break;
						
						case 'add_cart' : include_once('controller/homesite/product/cart/add_cart.php');
						break;
						
						case 'del_cart' : include_once('controller/homesite/product/cart/del_cart.php');
						break;
						
						case 'login' : include_once('controller/homesite/user/login.php');
						break;
						
						case 'signup' : include_once('controller/homesite/user/signup.php');
						break;
						
						case 'logout' : include_once('controller/homesite/user/logout.php');
						break;
						
						case 'googleLogin' : include_once('controller/homesite/user/googleLogin.php');
						break;			
					}
				}	
				else{
					include_once('controller/homesite/product/special_product.php');
                
					include_once('controller/homesite/product/new_product.php');
				}
				?>
            </div>
        </div>
        <!-- End Right Column -->
    	    
        <div id="brand"></div>
    </div>
    <!-- End Body -->
    <!-- Footer -->
    <div id="footer">
    	<div id="footer-info">
        	<h4>trung tâm tin học & công nghệ vietpro</h4>
            <p><span>Địa chỉ:</span> Tầng 5, Tòa nhà A4, Ngõ 120 Hoàng Quốc Việt - Cầu Giấy - Hà Nội | <span>Phone</span> (04) 3537 6697</p>
            <p><span>Trụ sở 2:</span> Số 25/178/71 Tây Sơn - Đống Đa - Hà Nội | <span>Hotline</span> 0968 511 155</p>
            <p>Bản quyền thuộc Vietpro Education</p>
        </div>
    </div>
    <!-- End Footer -->
</div>
<!-- End Wrapper -->