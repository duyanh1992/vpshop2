<?php
$product = new Product();
$sPrd = $product->getSpecialProduct();

$nPrd = $product->listAllProduct();

include('view/homesite/user_portal.php');
?>
