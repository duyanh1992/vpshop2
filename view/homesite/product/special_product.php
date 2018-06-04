<div class="prd-block">
	<h2>sản phẩm đặc biệt</h2>
	<div class="pr-list">
		<?php
		$index = 0;
		foreach($sPrd as $item){
		?>
		<div class="prd-item">
			<a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=product_detail&id_sp=<?php echo $item['id_sp']; ?>"><img width="80" height="144" src="common/user/images/<?php echo $item['anh_sp'];?>" /></a>
			<h3><a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=product_detail&id_sp=<?php echo $item['id_sp']; ?>"><?php echo $item['ten_sp'];?></a></h3>
			<p>Bảo hành: <?php echo $item['bao_hanh'];?></p>
			<p>Tình trạng: <?php echo $item['tinh_trang'];?></p>
			<p class="price"><span>Giá: <?php echo $item['gia_sp'];?> VNĐ</span></p>
		</div>
		<?php
			$index++;
			if(($index % 3) ==0){
				echo '<div class="clear"></div>';
			}
		}
		?>
	</div>
</div>