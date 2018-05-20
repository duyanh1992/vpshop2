<?php
$allCates = new Category();
$data = $allCates->listAllCate();
?>
<div class="l-sidebar">
	<h2>hãng điện thoại</h2>
	<ul id="main-menu">
		<?php
		foreach($data as $item){	
		?>
		<li><a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=product_list&id_dm=<?php echo $item['id_dm']; ?>"><?php echo $item['ten_dm']; ?></a></li>
		<?php
		}
		?>
	</ul>
</div>