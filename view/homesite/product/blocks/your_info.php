<div id="cart">
	<p style="margin-bottom:10px;">Xin chào 
		<span style="color:yellow"><?php echo $_SESSION['username']; ?></span>
	</p>
	<p>
		<a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=cart">giỏ hàng của bạn</a><br />
		<a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=logout">đăng xuất</a> 
	</p>
	<!-- <p><a href="index.php?page_layout=giohang">Chi tiết giỏ hàng</a></p> -->
</div>