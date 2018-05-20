<?php
ob_start();
session_start();

include('library/autoload.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<script type="text/javascript" src="common/admin/js/jquery-2.2.2.min.js"></script>
	<?php  
		if((isset($_GET['user_act']) && ($_GET['user_act'] == 'admin_portal')) || (isset($_GET['prd_act']))) {
			echo '<link rel="stylesheet" type="text/css" href="common/admin/css/admin_portal.css" />';
		}

		if((isset($_GET['user_act']) && ($_GET['user_act'] == 'user_portal')) || (isset($_GET['func']))) {
			echo '<link rel="stylesheet" type="text/css" href="common/user/css/user_portal.css" /><br />';

			echo '<link rel="stylesheet" type="text/css" href="common/user/css/slideshow.css" /><br />';
		}
	?>
</head>
<body>
	<?php  
		if(isset($_GET['site'])){
			switch($_GET['site']){
				case 'admin' : include('controller/admin/admin.php');	
				break;

				case 'homesite' : include('controller/homesite/homesite.php');	
				break;
			}
		}
		else{
			header('location:index.php?site=homesite&user_obj=user&user_act=user_portal');
		}
	?>
</body>
</html>