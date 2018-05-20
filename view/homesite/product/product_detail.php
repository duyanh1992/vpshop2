<?php
if(isset($_GET['id_sp'])){
	$id_sp = $_GET['id_sp'];

$prd = new Product();
$data = $prd->getProductById($id_sp);

if(isset($_POST['submit'])){
	if(isset($_POST['ten'])){
		if($_POST['ten'] == NULL){
			$error_name = '<p style="color:red">Vui lòng nhập tên của bạn</p>';
		}
		else{
			$name = $_POST['ten'];
		}
	}
	
	if(isset($_POST['dien_thoai'])){
		if($_POST['dien_thoai'] == NULL){
			$error_dien_thoai = '<p style="color:red">Vui lòng nhập số điện thoại của bạn</p>';
		}
		else{
			$phone = $_POST['dien_thoai'];
		}
	}
	
	if(isset($_POST['binh_luan'])){
		if($_POST['binh_luan'] == NULL){
			$error_binh_luan = '<p style="color:red">Vui lòng nhập bình luận của bạn</p>';
		}
		else{
			$content = $_POST['binh_luan'];
		}
	}
	
	if(isset($name) && isset($phone) && isset($content)){
		$commDate = date('Y-m-d H:i:s');

		$comm = new Comment();
		$comm->setParams($name, $phone ,$content ,$commDate);
		if($comm->postComment($id_sp)){
			echo "<script type='text/javascript'>
					alert('Bạn đã gửi bình luận thành công !!!');
				  </script>";
		}
	}
}
?>
<div class="prd-block">
	<div class="prd-only">
		<div class="prd-img"><img width="50%" src="common/user/images/<?php echo $data['anh_sp']; ?>" /></div>	
		<div class="prd-intro">
			<h3>HTC One X 32GB</h3>
			<p>Giá sản phẩm: <span><?php echo $data['gia_sp']; ?> VNĐ</span></p>
			<table>
				<tr>
					<td width="30%"><span>Bảo hành:</span></td>
					<td>• <?php echo $data['bao_hanh']; ?></td>
				</tr>
				<tr>
					<td><span>Đi kèm:</span></td>
					<td>• <?php echo $data['phu_kien']; ?></td>
				</tr>
				<tr>
					<td><span>Tình trạng:</span></td>
					<td>• <?php echo $data['tinh_trang']; ?></td>
				</tr>
				<tr>
					<td><span>Khuyến Mại:</span></td>
					<td>• <?php echo $data['khuyen_mai']; ?></td>
				</tr>
				<tr>
					<td><span>Còn hàng:</span></td>
					<td>• <?php echo $data['trang_thai']; ?></td>
				</tr>
			</table>
			<p class="add-cart">
				<a href="#"><span>đặt mua</span></a>
				<a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=add_cart&id_sp=<?php echo $id_sp; ?>"><span>thêm vào giỏ hàng</span></a>
			</p>
		</div>
		
		<div class="clear"></div>
		
		<div class="prd-details">
		<p><?php echo $data['chi_tiet_sp']; ?></p>
		</div>
	</div>
	
	<div class="prd-comment">
	<h3>Bình luận sản phẩm</h3>
	<form method="post">
	<input type="hidden" name="id_sp" value="<?php echo $id_sp; ?>"/>
		<ul>
			<li class="required">Tên <br /><input type="text" name="ten" /> <span><?php if(isset($error_name)){echo $error_name;} else{echo '(*)';}?></span></li>
			<li class="required">Số điện thoại <br /><input type="text" name="dien_thoai" /> <span><?php if(isset($error_dien_thoai)){echo $error_dien_thoai;} else{echo '(*)';}?></span></li>
			<li class="required">Nội dung <br /><textarea name="binh_luan"></textarea> <span><?php if(isset($error_binh_luan)){echo $error_name;} else{echo '(*)';}?></span></li>
			<li><input id="comm-btn" type="submit" name="submit" value="Bình luận" /></li>
		</ul>
	</form>
	</div>
	
	<div class="comment-list">
		
	</div>
	
	<div id="lmBtn"><a id="load-more">xem thêm</a></div>
	
</div> 
<?php
}
?>                    