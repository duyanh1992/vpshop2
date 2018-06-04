<?php
$listCate = new Category();
$data = $listCate->listAllCate();

if(isset($_GET['id_sp'])){
	$id_sp = $_GET['id_sp'];
	
	$current_prd = new Product();
	$current_prd_data = $current_prd->getProductById($id_sp);
	
	
	if(isset($_POST['submit'])){
		if(isset($_POST['ten_sp'])){
			if($_POST['ten_sp'] == null){
				$error_ten_sp = '<span style="color:red;">(*)</span>';
			}
			else{
				$ten_sp = $_POST['ten_sp'];
			}
		}
		
		if(isset($_POST['gia_sp'])){
			if($_POST['gia_sp'] == null){
				$error_gia_sp = '<span style="color:red;">(*)</span>';
			}
			else{
				$gia_sp = $_POST['gia_sp'];
			}
		}
		
		if(isset($_POST['bao_hanh'])){
			if($_POST['bao_hanh'] == null){
				$error_bao_hanh = '<span style="color:red;">(*)</span>';
			}
			else{
				$bao_hanh = $_POST['bao_hanh'];
			}
		}
		
		if(isset($_POST['phu_kien'])){
			if($_POST['phu_kien'] == null){
				$error_phu_kien = '<span style="color:red;">(*)</span>';
			}
			else{
				$phu_kien = $_POST['phu_kien'];
			}
		}
		
		if(isset($_POST['tinh_trang'])){
			if($_POST['tinh_trang'] == null){
				$error_tinh_trang = '<span style="color:red;">(*)</span>';
			}
			else{
				$tinh_trang = $_POST['tinh_trang'];
			}
		}
		
		if(isset($_POST['khuyen_mai'])){
			if($_POST['khuyen_mai'] == null){
				$error_khuyen_mai = '<span style="color:red;">(*)</span>';
			}
			else{
				$khuyen_mai = $_POST['khuyen_mai'];
			}
		}
		
		if(isset($_POST['trang_thai'])){
			if($_POST['trang_thai'] == null){
				$error_trang_thai = '<span style="color:red;">(*)</span>';
			}
			else{
				$trang_thai = $_POST['trang_thai'];
			}
		}
		
		if(isset($_POST['chi_tiet_sp'])){
			if($_POST['chi_tiet_sp'] == null){
				$error_chi_tiet_sp = '<span style="color:red;">(*)</span>';
			}
			else{
				$chi_tiet_sp = $_POST['chi_tiet_sp'];
			}
		}
		
		if($_FILES['anh_sp']['name'] != null){
			$anh_sp = $_FILES['anh_sp']['name'];
		}
		
		else{
			$anh_sp = $_POST['anh_sp_cu'];
		}
		
		if(isset($_POST['id_dm'])){
			if($_POST['id_dm'] == 'unselect'){
				$error_id_dm = '<span style="color:red;">(*)</span>';
			}
			else{
				$id_dm = $_POST['id_dm'];
			}
		}
		
		$dac_biet = $_POST['dac_biet'];
		
		if(isset($ten_sp) && isset($gia_sp) && isset($anh_sp) && isset($bao_hanh) 
			&& isset($phu_kien) && isset($tinh_trang) && isset($khuyen_mai) 
			&& isset($trang_thai) && isset($chi_tiet_sp) && isset($id_dm) 
			&& isset($dac_biet)){
						
			$editProduct = new Product();
			$editProduct->setId($id_sp);
			$editProduct->setName($ten_sp);
			$editProduct->setImage($anh_sp);
			$editProduct->setCategory($id_dm);
			$editProduct->setPrice($gia_sp);
			$editProduct->setWarranty($bao_hanh);
			$editProduct->setAttachment($phu_kien);
			$editProduct->setSituation($tinh_trang);
			$editProduct->setPromotion($khuyen_mai);
			$editProduct->setState($trang_thai);
			$editProduct->setSpecial($dac_biet);
			$editProduct->setDetail($chi_tiet_sp);
			
			$row = $editProduct->editProduct();
			if($row){
				//Upload image:
				if(isset($_FILES['anh_sp'])){
					$tmp_path = $_FILES['anh_sp']['tmp_name'];
					$new_path = 'common/admin/images/'.$anh_sp;
					move_uploaded_file($tmp_path, $new_path);
				}
				
				header('location:index.php?site=admin&admin_obj=product&prd_act=list_product');
			}
			else{
				$error_ten_sp = '<span style="color:red;">Tên sản phẩm đã tồn tại</span>';
			}
		}
}
	
}
?>
<h2>sửa thông tin sản phẩm</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="id_sp" value="<?php echo $id_sp; ?>"/>
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td><label>Tên sản phẩm</label><br /><input type="text" name="ten_sp" value="<?php echo $current_prd_data['ten_sp'] ?>" /><?php if(isset($error_ten_sp)) echo ' '.$error_ten_sp; ?></td>
		</tr>
		<tr>
			<td>
				<label>Ảnh mô tả</label><br />
				<input type="file" name="anh_sp"/>
				<input type="hidden" name="anh_sp_cu" value="<?php echo $current_prd_data['anh_sp'] ?>"/>
			</td>
		</tr>
		<tr>
			<td><label>Nhà cung cấp</label><br />
				<select name="id_dm">
					<option value="unselect" selected="selected">Lựa chọn nhà cung cấp</option>
					<?php
					foreach($data as $item){
					?>
						<option value=<?php echo $item['id_dm'];?> <?php if($item['id_dm'] == $current_prd_data['id_dm']) echo "selected='selected'";?>><?php echo $item['ten_dm'];?></option>
					<?php	
					}	
					?>
				</select>
			<?php if(isset($error_id_dm)) echo ' '.$error_id_dm; ?>				
			</td>
		</tr>
		<tr>
			<td><label>Giá sản phẩm</label><br /><input type="text" name="gia_sp" value="<?php echo $current_prd_data['gia_sp'] ?>" /> VNĐ <?php if(isset($error_gia_sp)) echo ' '.$error_gia_sp; ?></td>
		</tr>
		<tr>
			<td><label>Bảo hành</label><br /><input type="text" name="bao_hanh" value="<?php echo $current_prd_data['bao_hanh'] ?>" /><?php if(isset($error_bao_hanh)) echo ' '.$error_bao_hanh; ?></td>
		</tr>
		<tr>
			<td><label>Đi kèm</label><br /><input type="text" name="phu_kien" value="<?php echo $current_prd_data['phu_kien'] ?>" /><?php if(isset($error_phu_kien)) echo ' '.$error_phu_kien; ?></td>
		</tr>
		<tr>
			<td><label>Tình trạng</label><br /><input type="text" name="tinh_trang" value="<?php echo $current_prd_data['tinh_trang'] ?>" /><?php if(isset($error_tinh_trang)) echo ' '.$error_tinh_trang; ?></td>
		</tr>
		<tr>
			<td><label>Khuyến mại</label><br /><input type="text" name="khuyen_mai" value="<?php echo $current_prd_data['khuyen_mai'] ?>" /><?php if(isset($error_khuyen_mai)) echo ' '.$error_khuyen_mai; ?></td>
		</tr>
		<tr>
			<td><label>Còn hàng</label><br /><input type="text" name="trang_thai" value="<?php echo $current_prd_data['trang_thai'] ?>" /><?php if(isset($error_trang_thai)) echo ' '.$error_trang_thai; ?></td>
		</tr>
		<tr>
			<td><label>Sản phẩm đặc biệt</label><br />
			Có <input type="radio" name="dac_biet" value=1 <?php if($current_prd_data['dac_biet'] == 1) echo "checked='checked'";?>/> 
			Không <input type="radio" name="dac_biet" value=0  <?php if($current_prd_data['dac_biet'] == 0) echo "checked='checked'";?>/></td>
		</tr>
		<tr>
			<td><label>Thông tin chi tiết sản phẩm</label><br /><textarea cols="60" rows="12" name="chi_tiet_sp"><?php echo $current_prd_data['chi_tiet_sp'] ?></textarea><?php if(isset($error_chi_tiet_sp)) echo ' '.$error_chi_tiet_sp; ?></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
		</tr>
	</table>
	</form>
</div>