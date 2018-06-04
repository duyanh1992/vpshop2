<?php
	if(isset($_SESSION['cart']) && (!empty($_SESSION['cart']))){
		$totalPrd = count($_SESSION['cart']);
		
		foreach($_SESSION['cart'] as $id_sp=>$quantity ){
			$arr_id[] = $id_sp;
		}

		$str_id = implode(',', $arr_id);

		$product = new Product();
		$prdsInCart = $product->showPrdByStrId($str_id);
		
		if(isset($_POST['submit_cart'])){
			if(isset($_POST['amount'])){
				foreach($_POST['amount'] as $id_sp=>$prdAmount){
					$prdAmount = (int)$prdAmount;
					if($prdAmount <= 0){
						unset($_SESSION['cart'][$id_sp]);
					}
					else{
						$_SESSION['cart'][$id_sp] = $prdAmount;
					}
				}
			}
		}
?>
<div class="prd-block">
	<h2>giỏ hàng của bạn (có <?php if(isset($totalPrd)){echo $totalPrd;} else{echo 0;}?> sản phẩm)</h2>
	<div class="cart">
	<form name="frm-cart" method="POST">
		<?php
		if(!empty($prdsInCart)){
			$totalBill = 0;
			foreach($prdsInCart as $item){	
			?>
			<table width="100%">
				<tr>
					<td class="cart-item-img" width="25%" rowspan="4"><img width="80" height="144" src="common/user/images/<?php echo $item['anh_sp']; ?>" /></td>
					<td width="25%">Sản phẩm:</td>
					<td class="cart-item-title" width="50%"><?php echo $item['ten_sp']; ?></td>
				</tr>
				<tr>
					<td>Giá:</td>
					<td><span><?php echo $item['gia_sp']; ?> VNĐ</span></td>
				</tr>
				<tr>
					<td>Số lượng:</td>
					<td><input type="text" name="amount[<?php echo $item['id_sp']; ?>]" value="<?php echo $_SESSION['cart'][$item['id_sp']]; ?>" /> (Bỏ mặt hàng này) <a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=del_cart&id_sp=<?php echo $item['id_sp']; ?>">X</a></td>
				</tr>
				<tr>
					<td>Tổng tiền:</td>
					<td><span><?php echo ($_SESSION['cart'][$item['id_sp']]) * ($item['gia_sp']); ?></span></td>
				</tr>
			</table>
			<?php
			$totalBill+=($_SESSION['cart'][$item['id_sp']]) * ($item['gia_sp']);
			}
		}
		?>
		<p>Tổng giá trị giỏ hàng là: <span><?php if(isset($totalBill)) echo $totalBill; ?> VNĐ</span></p>
		<input type="submit" name="submit_cart" value="cập nhật giỏ hàng"/>
		<p><a href="index.php">Xem sản phẩm khác</a> <span>•</span> <a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=del_cart&id_sp=0">Xóa hết sản phẩm</a> <span>•</span> <a href="#">Dừng mua và Thanh toán</a></p>
	</form>
	</div>
</div>   
<?php
	}
	else{
		echo '<p style="color:red;font-size:18px;">Giỏ hàng của bạn chưa có sản phẩm nào !</p>';
	}
?>     