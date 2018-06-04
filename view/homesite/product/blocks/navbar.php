<ul>

	<li id="menu-home"><a href="index.php">trang chủ</a></li>

	<li><a target="" href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=intro">giới thiệu</a></li>

	<li><a href="index.php?site=admin&user_obj=user&user_act=user_portal&func=service">dịch vụ</a></li>

	<li><a href="index.php?site=admin&admin_obj=user&user_act=login">quản trị</a></li>

	<?php

		if(!isset($_SESSION['username'])){

	?>

	<li style="float:right;"><a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=signup">đăng ký</a></li>

	<li style="float:right;"><a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=login">đăng nhập</a></li>

	<?php

		}

	?>

</ul>